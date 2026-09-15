(function () {
  'use strict';
  var root = document.querySelector('.infometry-informatica-product');
  if (!root) return;

  var form = root.querySelector('#wpforms-form-379751, .iin-demo-form');
  if (form) {
    form.classList.add('iin-demo-form');
    var nameRow = form.querySelector('.wpforms-field-name .wpforms-field-row');
    if (nameRow) {
      nameRow.classList.add('iin-name-row');
      Array.prototype.forEach.call(nameRow.querySelectorAll('.wpforms-field-row-block'), function (block) {
        block.classList.add('iin-name-block');
        block.style.removeProperty('width');
        block.style.removeProperty('margin-left');
        block.style.removeProperty('float');
      });
    }
    var phoneInput = form.querySelector('#wpforms-379751-field_12');
    if (!phoneInput) {
      Array.prototype.some.call(form.querySelectorAll('.wpforms-field'), function (field) {
        var fieldLabel = field.querySelector('.wpforms-field-label');
        if (fieldLabel && /contact\s*number/i.test(fieldLabel.textContent || '')) {
          phoneInput = field.querySelector('input');
          return true;
        }
        return false;
      });
    }
    if (phoneInput) {
      phoneInput.style.setProperty('display', 'block', 'important');
      phoneInput.style.setProperty('width', '100%', 'important');
      phoneInput.style.setProperty('min-width', '100%', 'important');
      phoneInput.style.setProperty('max-width', 'none', 'important');
      phoneInput.style.setProperty('margin-left', '0', 'important');
      phoneInput.style.setProperty('margin-right', '0', 'important');
    }
  }
  var dateInput = root.querySelector('[data-icp-demo-date]');
  var dateDisplay = root.querySelector('[data-icp-demo-date-display]');
  var timeInput = root.querySelector('[data-icp-demo-time]');
  var timezone = root.querySelector('[data-icp-demo-timezone]');
  var label = root.querySelector('[data-iin-calendar-label]');
  var days = root.querySelector('[data-iin-calendar-days]');
  var selectedText = root.querySelector('[data-iin-selected-date]');
  var previous = root.querySelector('[data-iin-calendar-prev]');
  var next = root.querySelector('[data-iin-calendar-next]');
  var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
  var shortMonths = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
  var today = new Date(); today.setHours(0, 0, 0, 0);
  var shown = new Date(today.getFullYear(), today.getMonth(), 1);
  var selected = new Date(today.getTime());

  function pad(value) { return String(value).padStart(2, '0'); }
  function value(date) { return date.getFullYear() + '-' + pad(date.getMonth() + 1) + '-' + pad(date.getDate()); }
  function display(date) { return shortMonths[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear(); }
  function sync(date) {
    selected = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    if (dateInput) dateInput.value = value(selected) + (timeInput && timeInput.value ? 'T' + timeInput.value : '');
    if (dateDisplay) dateDisplay.value = display(selected);
    if (selectedText) selectedText.innerHTML = '<span>✓ &nbsp; Selected demo date</span><strong>' + display(selected) + '</strong>';
  }
  function render() {
    if (!label || !days) return;
    var year = shown.getFullYear(), month = shown.getMonth();
    label.textContent = months[month] + ' ' + year; days.innerHTML = '';
    for (var blank = 0; blank < new Date(year, month, 1).getDay(); blank += 1) days.appendChild(document.createElement('span'));
    for (var day = 1; day <= new Date(year, month + 1, 0).getDate(); day += 1) {
      (function (date) {
        var button = document.createElement('button'); button.type = 'button'; button.textContent = date.getDate();
        if (date < today) { button.disabled = true; button.className = 'is-past'; }
        if (value(date) === value(selected)) button.classList.add('is-selected');
        button.addEventListener('click', function () { sync(date); render(); }); days.appendChild(button);
      }(new Date(year, month, day)));
    }
    if (previous) previous.disabled = year === today.getFullYear() && month === today.getMonth();
  }
  if (timeInput) { timeInput.value = timeInput.value || '10:00'; timeInput.addEventListener('change', function () { sync(selected); }); }
  if (timezone) {
    try {
      var zone = Intl.DateTimeFormat().resolvedOptions().timeZone;
      var offsetMinutes = -new Date().getTimezoneOffset();
      var sign = offsetMinutes >= 0 ? '+' : '-';
      var offset = sign + String(Math.floor(Math.abs(offsetMinutes) / 60)).padStart(2, '0') + ':' + String(Math.abs(offsetMinutes) % 60).padStart(2, '0');
      var option = new Option(zone + ' (UTC' + offset + ')', zone, true, true);
      timezone.insertBefore(option, timezone.firstChild); timezone.value = zone;
    } catch (error) {}
  }
  if (previous) previous.addEventListener('click', function () { shown = new Date(shown.getFullYear(), shown.getMonth() - 1, 1); render(); });
  if (next) next.addEventListener('click', function () { shown = new Date(shown.getFullYear(), shown.getMonth() + 1, 1); render(); });
  sync(selected); render();

  var network = root.querySelector('.iin-network');
  var orbitNodes = network ? Array.prototype.slice.call(network.querySelectorAll('.iin-network-node')) : [];
  var orbitLines = network ? Array.prototype.slice.call(network.querySelectorAll('.iin-network-lines i')) : [];
  var orbitFrame = 0;
  var orbitStart = performance.now();
  var orbitPausedAt = 0;
  var orbitPauseStarted = 0;
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  var desktopOrbit = window.matchMedia('(min-width: 761px)');

  function clearOrbitLayout() {
    orbitNodes.forEach(function (node) { node.style.removeProperty('transform'); });
    orbitLines.forEach(function (line) { line.style.removeProperty('width'); line.style.removeProperty('transform'); });
  }

  function positionOrbit(timestamp) {
    if (!network || !orbitNodes.length || !desktopOrbit.matches) {
      clearOrbitLayout();
      orbitFrame = 0;
      return;
    }

    var box = network.getBoundingClientRect();
    var nodeWidth = orbitNodes[0].getBoundingClientRect().width || 174;
    var nodeHeight = orbitNodes[0].getBoundingClientRect().height || 62;
    var radiusX = Math.max(230, Math.min(292, box.width / 2 - nodeWidth / 2 - 8));
    var radiusY = Math.max(180, Math.min(210, box.height / 2 - nodeHeight / 2 - 16));
    var orbitNow = orbitPauseStarted || timestamp;
    var elapsed = reduceMotion.matches ? 0 : orbitNow - orbitStart - orbitPausedAt;
    var rotation = elapsed / 72000 * Math.PI * 2;
    var angleStep = Math.PI * 2 / orbitNodes.length;

    orbitNodes.forEach(function (node, index) {
      var angle = -Math.PI / 2 + index * angleStep + rotation;
      var x = Math.cos(angle) * radiusX;
      var y = Math.sin(angle) * radiusY;
      var distance = Math.sqrt(x * x + y * y);
      var lineAngle = Math.atan2(y, x) * 180 / Math.PI;
      node.style.transform = 'translate(-50%, -50%) translate3d(' + x.toFixed(2) + 'px,' + y.toFixed(2) + 'px,0)';
      if (orbitLines[index]) {
        orbitLines[index].style.width = Math.max(62, distance - nodeWidth / 2 - 8).toFixed(2) + 'px';
        orbitLines[index].style.transform = 'rotate(' + lineAngle.toFixed(2) + 'deg)';
      }
    });

    orbitFrame = window.requestAnimationFrame(positionOrbit);
  }

  function startOrbit() {
    if (orbitFrame) window.cancelAnimationFrame(orbitFrame);
    orbitFrame = window.requestAnimationFrame(positionOrbit);
  }

  if (network && orbitNodes.length) {
    network.addEventListener('mouseenter', function () { orbitPauseStarted = performance.now(); });
    network.addEventListener('mouseleave', function () {
      if (orbitPauseStarted) orbitPausedAt += performance.now() - orbitPauseStarted;
      orbitPauseStarted = 0;
    });
    desktopOrbit.addEventListener('change', startOrbit);
    reduceMotion.addEventListener('change', startOrbit);
    window.addEventListener('resize', startOrbit, { passive: true });
    startOrbit();
  }
}());
