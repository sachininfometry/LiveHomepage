(function () {
  'use strict';

  var root = document.querySelector('.igc-page');
  var orbit = root && root.querySelector('[data-igc-orbit]');

  if (!orbit) {
    return;
  }

  var nodes = Array.prototype.slice.call(orbit.querySelectorAll('.igc-orbit-node'));
  var lines = Array.prototype.slice.call(orbit.querySelectorAll('.igc-orbit-lines i'));
  var desktop = window.matchMedia('(min-width: 821px)');
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  var rotation = 0;
  var lastTime = 0;
  var frame = 0;
  var paused = false;
  var duration = 60000;

  function clearPositions() {
    nodes.forEach(function (node) {
      node.style.transform = '';
    });
    lines.forEach(function (line) {
      line.style.width = '';
      line.style.transform = '';
    });
  }

  function positionOrbit() {
    if (!desktop.matches) {
      clearPositions();
      return;
    }

    var bounds = orbit.getBoundingClientRect();
    var radius = Math.max(175, Math.min(220, (bounds.width / 2) - 104, (bounds.height / 2) - 84));
    var radiusX = radius;
    var radiusY = radius;

    nodes.forEach(function (node, index) {
      var angle = rotation + ((Math.PI * 2 * index) / nodes.length) - (Math.PI / 2);
      var x = Math.cos(angle) * radiusX;
      var y = Math.sin(angle) * radiusY;
      var distance = Math.sqrt((x * x) + (y * y));
      var line = lines[index];

      node.style.transform = 'translate(-50%, -50%) translate3d(' + x.toFixed(2) + 'px, ' + y.toFixed(2) + 'px, 0)';

      if (line) {
        line.style.width = Math.max(0, distance - 88) + 'px';
        line.style.transform = 'rotate(' + Math.atan2(y, x) + 'rad)';
      }
    });
  }

  function tick(time) {
    if (!lastTime) {
      lastTime = time;
    }

    var hoverPaused = orbit.matches(':hover');
    orbit.classList.toggle('is-paused', paused || hoverPaused);

    if (!paused && !hoverPaused && !document.hidden && desktop.matches && !reducedMotion.matches) {
      rotation += ((time - lastTime) / duration) * Math.PI * 2;
    }

    lastTime = time;
    positionOrbit();
    frame = window.requestAnimationFrame(tick);
  }

  function setPaused(value) {
    paused = value;
    orbit.classList.toggle('is-paused', value);
  }

  orbit.addEventListener('pointerenter', function () { setPaused(true); });
  orbit.addEventListener('pointerleave', function () { setPaused(false); });
  orbit.addEventListener('focusin', function () { setPaused(true); });
  orbit.addEventListener('focusout', function (event) {
    if (!orbit.contains(event.relatedTarget)) {
      setPaused(false);
    }
  });
  window.addEventListener('resize', positionOrbit, { passive: true });
  desktop.addEventListener('change', positionOrbit);
  reducedMotion.addEventListener('change', positionOrbit);

  positionOrbit();
  frame = window.requestAnimationFrame(tick);

  window.addEventListener('pagehide', function () {
    window.cancelAnimationFrame(frame);
  }, { once: true });
}());

(function () {
  'use strict';

  var root = document.querySelector('.igc-page');
  if (!root) return;

  var form = root.querySelector('#wpforms-form-351429, .igc-demo-form');
  if (form) {
    form.classList.add('igc-demo-form');

    var submitButton = form.querySelector('button[type="submit"], input[type="submit"]');
    if (submitButton) {
      if (submitButton.tagName === 'INPUT') submitButton.value = 'Book a Demo';
      else submitButton.textContent = 'Book a Demo';
    }
  }

  var dateInput = root.querySelector('[data-icp-demo-date]');
  var dateDisplay = root.querySelector('[data-icp-demo-date-display]');
  var timeInput = root.querySelector('[data-icp-demo-time]');
  var timezone = root.querySelector('[data-icp-demo-timezone]');
  var label = root.querySelector('[data-igc-calendar-label]');
  var days = root.querySelector('[data-igc-calendar-days]');
  var selectedText = root.querySelector('[data-igc-selected-date]');
  var previous = root.querySelector('[data-igc-calendar-prev]');
  var next = root.querySelector('[data-igc-calendar-next]');

  if (!label || !days) return;

  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var shortMonths = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
  var today = new Date();
  today.setHours(0, 0, 0, 0);
  var shown = new Date(today.getFullYear(), today.getMonth(), 1);
  var selected = new Date(today.getTime());

  function pad(value) {
    return String(value).padStart(2, '0');
  }

  function dateValue(date) {
    return date.getFullYear() + '-' + pad(date.getMonth() + 1) + '-' + pad(date.getDate());
  }

  function dateLabel(date) {
    return shortMonths[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
  }

  function sync(date) {
    selected = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    if (dateInput) dateInput.value = dateValue(selected) + (timeInput && timeInput.value ? 'T' + timeInput.value : '');
    if (dateDisplay) dateDisplay.value = dateLabel(selected);
    if (selectedText) selectedText.innerHTML = '<span>✓ &nbsp; Selected demo date</span><strong>' + dateLabel(selected) + '</strong>';
  }

  function render() {
    var year = shown.getFullYear();
    var month = shown.getMonth();
    label.textContent = months[month] + ' ' + year;
    days.innerHTML = '';

    for (var blank = 0; blank < new Date(year, month, 1).getDay(); blank += 1) {
      days.appendChild(document.createElement('span'));
    }

    for (var day = 1; day <= new Date(year, month + 1, 0).getDate(); day += 1) {
      (function (date) {
        var button = document.createElement('button');
        button.type = 'button';
        button.textContent = date.getDate();
        if (date < today) {
          button.disabled = true;
          button.className = 'is-past';
        }
        if (dateValue(date) === dateValue(selected)) button.classList.add('is-selected');
        button.addEventListener('click', function () {
          sync(date);
          render();
        });
        days.appendChild(button);
      }(new Date(year, month, day)));
    }

    if (previous) previous.disabled = year === today.getFullYear() && month === today.getMonth();
  }

  if (timeInput) {
    timeInput.value = timeInput.value || '10:00';
    timeInput.addEventListener('change', function () { sync(selected); });
  }

  if (timezone) {
    try {
      var zone = Intl.DateTimeFormat().resolvedOptions().timeZone;
      var offsetMinutes = -new Date().getTimezoneOffset();
      var sign = offsetMinutes >= 0 ? '+' : '-';
      var offset = sign + pad(Math.floor(Math.abs(offsetMinutes) / 60)) + ':' + pad(Math.abs(offsetMinutes) % 60);
      var option = new Option(zone + ' (UTC' + offset + ')', zone, true, true);
      timezone.insertBefore(option, timezone.firstChild);
      timezone.value = zone;
    } catch (error) {}
  }

  if (previous) previous.addEventListener('click', function () {
    shown = new Date(shown.getFullYear(), shown.getMonth() - 1, 1);
    render();
  });
  if (next) next.addEventListener('click', function () {
    shown = new Date(shown.getFullYear(), shown.getMonth() + 1, 1);
    render();
  });

  sync(selected);
  render();
}());
