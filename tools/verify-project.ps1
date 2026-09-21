param(
    [switch]$RegenerateInformaticaPreview
)

$ErrorActionPreference = 'Stop'
$projectRoot = Split-Path -Parent $PSScriptRoot
$failures = [System.Collections.Generic.List[string]]::new()

function Resolve-ProjectTool {
    param(
        [Parameter(Mandatory)] [string]$Name,
        [string[]]$Fallbacks = @()
    )

    $command = Get-Command $Name -ErrorAction SilentlyContinue
    if ($command) {
        return $command.Source
    }

    foreach ($fallback in $Fallbacks) {
        if ($fallback -and (Test-Path -LiteralPath $fallback)) {
            return $fallback
        }
    }

    throw "Required tool '$Name' was not found. Open a new terminal after installing it."
}

$node = Resolve-ProjectTool -Name 'node' -Fallbacks @('C:\Program Files\nodejs\node.exe')
$phpFallback = $null
if ($env:LOCALAPPDATA) {
    $phpFallback = Get-ChildItem "$env:LOCALAPPDATA\Microsoft\WinGet\Packages" -Recurse -Filter php.exe -File -ErrorAction SilentlyContinue |
        Where-Object { $_.FullName -match 'PHP\.PHP\.8\.4' } |
        Select-Object -First 1 -ExpandProperty FullName
}
$php = Resolve-ProjectTool -Name 'php' -Fallbacks @($phpFallback)

if ($RegenerateInformaticaPreview) {
    & $php (Join-Path $PSScriptRoot 'render-informatica-preview.php')
    if ($LASTEXITCODE -ne 0) {
        throw 'Informatica preview generation failed.'
    }
}

$requiredFiles = @(
    'infometry-custom-templates.php',
    'templates/page-home-design-test.php',
    'templates/page-infofiscus-conversa.php',
    'templates/page-informatica-connectors.php',
    'preview-full.html',
    'preview-conversa.html',
    'preview-informatica.html'
)

foreach ($relativePath in $requiredFiles) {
    if (-not (Test-Path -LiteralPath (Join-Path $projectRoot $relativePath))) {
        $failures.Add("Missing required file: $relativePath")
    }
}

Get-ChildItem $projectRoot -Recurse -Filter *.php -File |
    Where-Object { $_.FullName -notmatch '[\\/]\.git[\\/]' } |
    ForEach-Object {
        & $php -l $_.FullName | Out-Host
        if ($LASTEXITCODE -ne 0) {
            $failures.Add("PHP syntax failed: $($_.FullName)")
        }
    }

Get-ChildItem (Join-Path $projectRoot 'assets/js') -Filter *.js -File |
    ForEach-Object {
        & $node --check $_.FullName
        if ($LASTEXITCODE -ne 0) {
            $failures.Add("JavaScript syntax failed: $($_.FullName)")
        }
    }

$localReferencePattern = [regex]'(?:src|href)=["'']([^"''#?]+)'
Get-ChildItem $projectRoot -Filter 'preview*.html' -File | ForEach-Object {
    $preview = $_
    $content = Get-Content -Raw $preview.FullName
    foreach ($match in $localReferencePattern.Matches($content)) {
        $reference = $match.Groups[1].Value
        if ($reference -match '^(?:https?:|mailto:|tel:|javascript:|data:|//)') {
            continue
        }

        $target = Join-Path $preview.DirectoryName ($reference -replace '/', [IO.Path]::DirectorySeparatorChar)
        if (-not (Test-Path -LiteralPath $target)) {
            $failures.Add("Broken local reference in $($preview.Name): $reference")
        }
    }
}

if ($failures.Count -gt 0) {
    Write-Host "`nVerification failed:" -ForegroundColor Red
    $failures | Sort-Object -Unique | ForEach-Object { Write-Host " - $_" -ForegroundColor Red }
    exit 1
}

Write-Host "`nProject verification passed: 3 templates, PHP syntax, JavaScript syntax, and preview assets." -ForegroundColor Green
