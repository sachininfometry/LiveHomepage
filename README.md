# Infometry Homepage

Staging-safe custom WordPress page-template plugin for the Infometry homepage.
The repository root is the plugin root and is ready for Cloudways Git deployment.

![Infometry homepage preview](docs/homepage-preview.png)

## Repository contents

- `infometry-custom-templates.php` — main WordPress plugin bootstrap.
- `templates/page-home-design-test.php` — “Home Design Test” page template.
- `assets/css/` and `assets/js/` — template-scoped frontend assets.
- `assets/images/` — local design and brand assets.
- `preview-full.html` — standalone local preview of the complete homepage.
- `docs/homepage-preview.png` — current desktop preview.

## WordPress installation

1. Clone or deploy this repository to
   `wp-content/plugins/infometry-custom-templates/` on staging.
2. Activate **Infometry Custom Templates** in WordPress.
3. Edit the staging page and select **Home Design Test** under Page Template.
4. Update/preview the page and clear staging caches if needed.

Version 2.0.0 does not automatically replace the site front page. The plugin
loads its template and enqueues its CSS/JavaScript only when **Home Design Test**
is selected. It does not modify WordPress core, BeTheme files, Theme Options, or
the database.

## Cloudways Git deployment

Configure the deployment path so the repository root lands directly in:

```text
public_html/wp-content/plugins/infometry-custom-templates/
```

Do not deploy the repository into `public_html/` itself. Deployment only copies
plugin files; activation and template selection remain explicit staging actions.

## Local preview

Serve the repository root with any static HTTP server, for example:

```bash
python -m http.server 4189
```

Then open `http://127.0.0.1:4189/preview-full.html`.
