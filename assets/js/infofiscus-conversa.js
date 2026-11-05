(function () {
  'use strict';

  var root = document.querySelector('.infometry-conversa-product');
  if (!root) {
    return;
  }

  var customersPartnersUrl = 'https://www.infometry.net/company/customers-partners/';
  root.querySelectorAll('.icp-customers .icp-logo-slide').forEach(function (logo) {
    if (logo.tagName === 'A') {
      logo.href = customersPartnersUrl;
      return;
    }

    var logoLink = document.createElement('a');
    logoLink.className = logo.className;
    logoLink.href = customersPartnersUrl;
    logoLink.setAttribute('aria-label', 'View Infometry customers and partners');
    while (logo.firstChild) {
      logoLink.appendChild(logo.firstChild);
    }
    logo.replaceWith(logoLink);
  });

  var demoForm = root.querySelector('#wpforms-form-379751, .icp-demo-form');
  if (demoForm) {
    demoForm.classList.add('icp-demo-form');
    demoForm.id = 'icp-demo-request-form';
  }
  if (demoForm && !demoForm.querySelector('.icp-demo-form-head')) {
    var demoFormHead = document.createElement('div');
    demoFormHead.className = 'icp-demo-form-head';
    demoFormHead.innerHTML = '<strong>Request your personalized demo</strong><p>Share your details and our analytics team will connect with you.</p>';
    var demoFormHiddenField = demoForm.querySelector('input[type="hidden"]');
    if (demoFormHiddenField) {
      demoFormHiddenField.insertAdjacentElement('afterend', demoFormHead);
    } else {
      demoForm.prepend(demoFormHead);
    }
  }

  function detectDemoTimezone() {
    var timezone = 'UTC';
    var offsetMinutes = -new Date().getTimezoneOffset();
    var offsetSign = offsetMinutes >= 0 ? '+' : '-';
    var offsetHours = String(Math.floor(Math.abs(offsetMinutes) / 60)).padStart(2, '0');
    var offsetRemainder = String(Math.abs(offsetMinutes) % 60).padStart(2, '0');
    var timezoneControl;
    var timezoneOption;
    var timezoneLabel;

    try {
      timezone = Intl.DateTimeFormat().resolvedOptions().timeZone || timezone;
    } catch (error) {
      timezone = 'UTC';
    }

    if (!demoForm) {
      return;
    }

    timezoneControl = demoForm.querySelector('[data-icp-demo-timezone], select[name*="timezone" i], input[name*="timezone" i]');
    if (!timezoneControl) {
      timezoneControl = Array.prototype.find.call(demoForm.querySelectorAll('select, input'), function (field) {
        var fieldGroup = field.closest('label, .wpforms-field');
        return fieldGroup && /time\s*zone/i.test(fieldGroup.textContent || '');
      });
    }

    if (!timezoneControl) {
      return;
    }

    timezoneControl.setAttribute('data-icp-demo-timezone', '');
    timezoneLabel = timezone + ' (UTC' + offsetSign + offsetHours + ':' + offsetRemainder + ')';

    if (timezoneControl.tagName === 'SELECT') {
      timezoneOption = Array.prototype.find.call(timezoneControl.options, function (option) {
        return option.value === timezone;
      });
      if (!timezoneOption) {
        timezoneOption = new Option(timezoneLabel, timezone, true, true);
        timezoneControl.insertBefore(timezoneOption, timezoneControl.firstChild);
      } else {
        timezoneOption.textContent = timezoneLabel;
      }
      timezoneControl.value = timezone;
    } else {
      timezoneControl.value = timezone;
    }

    timezoneControl.dataset.detectedTimezone = timezone;
    timezoneControl.setAttribute('aria-label', 'Time Zone: ' + timezoneLabel);
  }

  detectDemoTimezone();

  var demoHeading = root.querySelector('.icp-demo-form-section .icp-section-heading');
  if (demoHeading) {
    var demoTitle = demoHeading.querySelector('h2');
    var demoCopy = demoHeading.querySelectorAll('p');
    if (demoTitle) demoTitle.textContent = 'Experience INFOFISCUS Conversa.';
    if (demoCopy[0]) demoCopy[0].innerHTML = '<strong>Turn every business question into a confident decision.</strong>';
    if (demoCopy[1]) demoCopy[1].textContent = 'Book a personalized demo and see how Conversa investigates questions, uncovers key drivers, and helps your teams make confident decisions across enterprise data.';
  }

  var tabButtons = Array.prototype.slice.call(root.querySelectorAll('[data-icp-shot]'));
  var panels = Array.prototype.slice.call(root.querySelectorAll('[data-icp-shot-panel]'));

  function activateShot(name) {
    tabButtons.forEach(function (button) {
      button.classList.toggle('is-active', button.getAttribute('data-icp-shot') === name);
    });

    panels.forEach(function (panel) {
      panel.classList.toggle('is-active', panel.getAttribute('data-icp-shot-panel') === name);
    });
  }

  tabButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      activateShot(button.getAttribute('data-icp-shot'));
    });
  });

  function chartSvg(name, type) {
    var charts = {
      finance: {
        labels: ["Q1 '25", "Q2 '25", "Q3 '25", "Q4 '25", "Q1 '26", "Q2 '26"],
        values: ['$14.8M', '$15.6M', '$15.4M', '$16.9M', '$17.8M', '$18.6M'],
        y: [126, 106, 111, 73, 50, 30],
        axis: ['$19M', '$17M', '$15M'],
        event: 'PRICING CHANGE',
        eventIndex: 3
      },
      sales: {
        labels: ["Q1 '25", "Q2 '25", "Q3 '25", "Q4 '25", "Q1 '26", "Q2 '26"],
        values: ['34.4%', '36.1%', '35.7%', '39.2%', '41.0%', '42.8%'],
        y: [126, 108, 113, 76, 56, 36],
        axis: ['44%', '39%', '34%'],
        event: 'NEW QUALIFICATION',
        eventIndex: 3
      },
      operations: {
        labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6'],
        values: ['88.2%', '89.6%', '91.1%', '90.4%', '93.2%', '96.4%'],
        y: [126, 112, 96, 104, 72, 35],
        axis: ['97%', '92%', '87%'],
        event: 'CAPACITY REALLOCATED',
        eventIndex: 4
      },
      marketing: {
        labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
        values: ['31.5%', '30.8%', '29.9%', '26.2%', '24.1%', '24.8%'],
        y: [42, 49, 57, 93, 116, 108],
        axis: ['32%', '28%', '24%'],
        event: 'SEND TIME CHANGED',
        eventIndex: 2
      },
      hr: {
        labels: ["Q1 '25", "Q2 '25", "Q3 '25", "Q4 '25", "Q1 '26", "Q2 '26"],
        values: ['4.7%', '4.9%', '5.1%', '5.6%', '6.0%', '6.4%'],
        y: [124, 114, 103, 78, 57, 38],
        axis: ['6.5%', '5.5%', '4.5%'],
        event: 'MANAGER CHANGES',
        eventIndex: 3
      }
    };
    var config = charts[name] || charts.finance;
    var xs = [54, 112, 170, 228, 286, 344];
    var path = xs.map(function (x, index) { return (index ? 'L' : 'M') + x + ' ' + config.y[index]; }).join(' ');
    var area = path + ' L344 146 L54 146 Z';
    var eventX = xs[config.eventIndex];
    var points = xs.map(function (x, index) {
      return '<g class="icp-chart-point-group"><circle cx="' + x + '" cy="' + config.y[index] + '" r="5"></circle><text class="icp-chart-value" x="' + x + '" y="' + (config.y[index] - 12) + '">' + config.values[index] + '</text><text class="icp-chart-period" x="' + x + '" y="166">' + config.labels[index] + '</text></g>';
    }).join('');
    var baselinePath = xs.map(function (x, index) {
      var baselineY = Math.max(28, Math.min(132, config.y[index] + (index < config.eventIndex ? 2 : 18)));
      return (index ? 'L' : 'M') + x + ' ' + baselineY;
    }).join(' ');
    var bars = xs.map(function (x, index) {
      return '<rect x="' + (x - 16) + '" y="' + config.y[index] + '" width="32" height="' + (146 - config.y[index]) + '" rx="5"></rect>';
    }).join('');
    var typeMarkup = '<path class="icp-chart-line" d="' + path + '"></path><g class="icp-chart-points">' + points + '</g>';
    if (type === 'bar') {
      typeMarkup = '<g class="icp-informed-bars">' + bars + '</g><g class="icp-chart-points">' + points + '</g>';
    } else if (type === 'area') {
      typeMarkup = '<path class="icp-chart-area icp-chart-area-strong" d="' + area + '"></path><path class="icp-chart-line" d="' + path + '"></path><g class="icp-chart-points">' + points + '</g>';
    } else if (type === 'comparison') {
      typeMarkup = '<g class="icp-chart-legend"><circle cx="55" cy="13" r="3"></circle><text x="62" y="16">ACTUAL</text><path d="M112 13H126"></path><text x="132" y="16">WITHOUT ACTION</text></g><path class="icp-chart-baseline" d="' + baselinePath + '"></path><path class="icp-chart-line" d="' + path + '"></path><g class="icp-chart-points">' + points + '</g>';
    }
    return '<svg class="icp-informed-chart is-' + (type || 'line') + '" viewBox="0 0 380 180" role="img" aria-label="' + name + ' ' + (type || 'line') + ' chart with values by period"><g class="icp-chart-grid"><path d="M46 40H360M46 88H360M46 136H360"/></g><g class="icp-chart-axis"><text x="4" y="44">' + config.axis[0] + '</text><text x="4" y="92">' + config.axis[1] + '</text><text x="4" y="140">' + config.axis[2] + '</text></g><path class="icp-chart-event-line" d="M' + eventX + ' 20V146"></path><text class="icp-chart-event-label" x="' + Math.min(eventX + 7, 270) + '" y="27">' + config.event + '</text>' + (type === 'line' || !type ? '<path class="icp-chart-area" d="' + area + '"></path>' : '') + typeMarkup + '</svg>';
  }

  var chartOutputs = {
    finance: {
      takeaway: 'Pricing and fulfillment efficiency generated 82% of the quarter’s profit improvement.',
      action: 'Protect enterprise pricing and extend logistics savings across other regions.'
    },
    sales: {
      takeaway: 'Enterprise deals are converting faster, while mid-market pipeline remains the largest growth gap.',
      action: 'Prioritize executive support for the $3.6M mid-market pipeline at risk.'
    },
    operations: {
      takeaway: 'Two distribution centers account for 71% of missed service-level commitments.',
      action: 'Add evening carrier capacity and reduce picking congestion at DC-04 first.'
    },
    marketing: {
      takeaway: 'Email timing caused 74% of the engagement decline; other channels remained stable.',
      action: 'Restore morning sends and run a segmented timing test for returning customers.'
    },
    hr: {
      takeaway: 'Mid-tenure engineering and customer success employees carry the highest exit risk.',
      action: 'Accelerate promotion reviews and launch targeted manager interventions.'
    }
  };

  root.querySelectorAll('.icp-chart-card-line[data-chart]').forEach(function (chart) {
    var chartName = chart.getAttribute('data-chart');
    var output = chartOutputs[chartName] || chartOutputs.finance;
    var controls = document.createElement('div');
    controls.className = 'icp-chart-view-tabs';
    controls.setAttribute('role', 'tablist');
    controls.setAttribute('aria-label', 'Choose chart view');
    controls.innerHTML = [
      ['line', 'Line'],
      ['bar', 'Bar'],
      ['area', 'Area'],
      ['comparison', 'Compare']
    ].map(function (item, index) {
      return '<button type="button" role="tab" data-chart-view="' + item[0] + '" aria-selected="' + (index === 0 ? 'true' : 'false') + '" class="' + (index === 0 ? 'is-active' : '') + '">' + item[1] + '</button>';
    }).join('');
    chart.parentNode.insertBefore(controls, chart);
    chart.innerHTML = chartSvg(chartName, 'line');
    var footer = document.createElement('div');
    footer.className = 'icp-chart-context';
    footer.innerHTML = '<article><span>Key Takeaway</span><strong>' + output.takeaway + '</strong></article><article><span>Recommended Action</span><strong>' + output.action + '</strong></article>';
    chart.parentNode.insertBefore(footer, chart.nextSibling);
    controls.addEventListener('click', function (event) {
      var button = event.target.closest('[data-chart-view]');
      if (!button) return;
      Array.prototype.slice.call(controls.querySelectorAll('button')).forEach(function (item) {
        var active = item === button;
        item.classList.toggle('is-active', active);
        item.setAttribute('aria-selected', active ? 'true' : 'false');
      });
      chart.innerHTML = chartSvg(chartName, button.getAttribute('data-chart-view'));
    });
  });

  root.querySelectorAll('.icp-comparison-table-wrap').forEach(function (wrap) {
    var table = wrap.querySelector('.icp-comparison-table');
    if (!table || wrap.querySelector('.icp-comparison-board')) {
      return;
    }

    wrap.classList.add('icp-comparison-simple');
    var comparisonCapabilities = [
      'Natural Language Query',
      'Automated Insights',
      'Root Cause Analysis',
      'Predictive Analytics',
      'Semantic Layer',
      'SQL Transparency',
      'Multi Data Sources',
      'Unstructured Data',
      'Governance'
    ];
    Array.prototype.slice.call(table.querySelectorAll('tbody tr')).forEach(function (row) {
      var heading = row.querySelector('th');
      if (heading && comparisonCapabilities.indexOf(heading.textContent.trim()) === -1) {
        row.remove();
      }
    });
    return;

    var preferredCapabilities = [
      'Natural Language Query',
      'Automated Insights',
      'Root Cause Analysis',
      'Predictive Analytics',
      'Semantic Layer',
      'SQL Transparency',
      'Multi Data Sources',
      'Unstructured Data',
      'Governance'
    ];
    var allRows = Array.prototype.slice.call(table.querySelectorAll('tbody tr'));
    var rows = preferredCapabilities.map(function (capability) {
      return allRows.find(function (row) {
        return row.querySelector('th') && row.querySelector('th').textContent.trim() === capability;
      });
    }).filter(Boolean);
    var providerNames = ['Conversa', 'Tableau', 'Power BI', 'Modern AI'];
    var board = document.createElement('div');
    board.className = 'icp-comparison-board';
    board.innerHTML = '<div class="icp-comparison-board-head"><div class="icp-comparison-board-intro"><span>QUICK COMPARISON</span><strong>Compare essential analytics capabilities.</strong><small><i class="yes"></i>Yes <i class="partial"></i>Some <i class="no"></i>No</small></div><div class="icp-comparison-providers">' + providerNames.map(function (name, index) {
      return '<div class="icp-provider-chip' + (index === 0 ? ' is-conversa' : '') + '"><i>' + (index === 0 ? 'RECOMMENDED' : 'PLATFORM') + '</i><b>' + name + '</b></div>';
    }).join('') + '</div></div><div class="icp-capability-scroll"><div class="icp-capability-matrix"></div></div>';

    var matrix = board.querySelector('.icp-capability-matrix');
    rows.forEach(function (row, rowIndex) {
      var cells = Array.prototype.slice.call(row.querySelectorAll('td'));
      var card = document.createElement('article');
      card.className = 'icp-capability-row-card';
      card.innerHTML = '<div class="icp-capability-title"><span>0' + (rowIndex + 1) + '</span><strong>' + row.querySelector('th').textContent.trim() + '</strong></div><div class="icp-capability-values">' + cells.map(function (cell, index) {
        var status = cell.querySelector('.icp-status');
        var state = status ? status.textContent.trim() : '';
        var stateClass = status && status.classList.contains('icp-status-yes') ? 'is-yes' : status && status.classList.contains('icp-status-no') ? 'is-no' : 'is-partial';
        return '<div class="icp-mini-status ' + stateClass + (index === 0 ? ' is-conversa' : '') + '"><small>' + providerNames[index] + '</small><b><i></i>' + state + '</b></div>';
      }).join('') + '</div>';
      matrix.appendChild(card);
    });

    table.classList.add('icp-comparison-source-table');
    wrap.appendChild(board);
  });

  root.querySelectorAll('[data-icp-use-cases]').forEach(function (wrap) {
    var buttons = Array.prototype.slice.call(wrap.querySelectorAll('[data-icp-use-tab]'));
    var usePanels = Array.prototype.slice.call(wrap.querySelectorAll('[data-icp-use-panel]'));

    function activateUseCase(name) {
      buttons.forEach(function (button) {
        var active = button.getAttribute('data-icp-use-tab') === name;
        button.classList.toggle('is-active', active);
        button.setAttribute('aria-selected', active ? 'true' : 'false');
      });

      usePanels.forEach(function (panel) {
        var panelActive = panel.getAttribute('data-icp-use-panel') === name;
        panel.classList.toggle('is-active', panelActive);

        if (panelActive) {
          panel.querySelectorAll('.icp-chart-line, .icp-chart-points circle, .icp-bar-set rect, .icp-group-bars rect, .icp-ring-value').forEach(function (part) {
            part.style.animation = 'none';
            void part.getBoundingClientRect();
            part.style.animation = '';
          });
        }
      });
    }

    buttons.forEach(function (button) {
      button.addEventListener('click', function () {
        activateUseCase(button.getAttribute('data-icp-use-tab'));
      });
    });
  });

  var demoForm = root.querySelector('#icp-demo-request-form, #wpforms-form-379751');
  var demoDateInput = root.querySelector('[data-icp-demo-date]');
  var demoDateDisplayInput = root.querySelector('[data-icp-demo-date-display]');
  var demoTimeInput = root.querySelector('[data-icp-demo-time]');
  var demoCalendar = root.querySelector('[data-icp-demo-calendar]');
  var monthLabel = root.querySelector('[data-icp-calendar-label]');
  var daysGrid = root.querySelector('[data-icp-calendar-days]');
  var selectedDateText = root.querySelector('[data-icp-selected-date]');

  if (demoForm && window.jQuery) {
    window.jQuery(demoForm).on('wpformsAjaxSubmitSuccess', function () {
      window.open('https://app.supademo.com/demo/cmrpbnvrk00aozw0jd3ao0z6v?utm_source=link', '_blank', 'noopener');
    });
  }

  var monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
  ];
  var shortMonthNames = [
    'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN',
    'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'
  ];

  function padDatePart(value) {
    return String(value).padStart(2, '0');
  }

  function toDateValue(date) {
    return date.getFullYear() + '-' + padDatePart(date.getMonth() + 1) + '-' + padDatePart(date.getDate());
  }

  function formatDemoDate(date) {
    return shortMonthNames[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
  }

  function focusDemoForm() {
    if (!demoForm) {
      return;
    }

    demoForm.scrollIntoView({ behavior: 'smooth', block: 'center' });

    var firstField = demoForm.querySelector('input:not([type="hidden"]), button');
    if (firstField) {
      window.setTimeout(function () {
        firstField.focus({ preventScroll: true });
      }, 350);
    }
  }

  if (demoCalendar && monthLabel && daysGrid) {
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    var shownMonth = new Date(today.getFullYear(), today.getMonth(), 1);
    var selectedDemoDate = new Date(today.getTime());
    var previousMonth = root.querySelector('[data-icp-calendar-prev]');
    var nextMonth = root.querySelector('[data-icp-calendar-next]');

    function syncDemoDate(date) {
      selectedDemoDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());

      if (demoDateInput) {
        demoDateInput.value = toDateValue(selectedDemoDate) + (demoTimeInput && demoTimeInput.value ? 'T' + demoTimeInput.value : '');
      }

      if (demoDateDisplayInput) {
        demoDateDisplayInput.value = formatDemoDate(selectedDemoDate);
      }

      if (selectedDateText) {
        selectedDateText.innerHTML = '<span>Selected demo date</span><strong>' + formatDemoDate(selectedDemoDate) + '</strong>';
      }
    }

    function renderDemoCalendar() {
      var year = shownMonth.getFullYear();
      var month = shownMonth.getMonth();
      var firstDayIndex = new Date(year, month, 1).getDay();
      var daysInMonth = new Date(year, month + 1, 0).getDate();
      var isCurrentMonth = year === today.getFullYear() && month === today.getMonth();

      monthLabel.textContent = monthNames[month] + ' ' + year;
      daysGrid.innerHTML = '';

      for (var blank = 0; blank < firstDayIndex; blank += 1) {
        var spacer = document.createElement('span');
        spacer.setAttribute('aria-hidden', 'true');
        daysGrid.appendChild(spacer);
      }

      for (var day = 1; day <= daysInMonth; day += 1) {
        var date = new Date(year, month, day);
        var button = document.createElement('button');
        var dateValue = toDateValue(date);

        button.type = 'button';
        button.textContent = String(day);
        button.setAttribute('aria-label', 'Schedule demo on ' + formatDemoDate(date));
        button.setAttribute('aria-pressed', toDateValue(selectedDemoDate) === dateValue ? 'true' : 'false');
        button.dataset.demoDate = dateValue;

        if (date < today) {
          button.disabled = true;
          button.classList.add('is-past');
          button.setAttribute('aria-label', formatDemoDate(date) + ' is unavailable');
        }

        if (toDateValue(today) === dateValue) {
          button.classList.add('is-today');
        }

        if (toDateValue(selectedDemoDate) === dateValue) {
          button.classList.add('is-selected');
        }

        button.addEventListener('click', function () {
          var parts = this.dataset.demoDate.split('-').map(Number);
          syncDemoDate(new Date(parts[0], parts[1] - 1, parts[2]));
          renderDemoCalendar();
          focusDemoForm();
        });

        daysGrid.appendChild(button);
      }

      if (previousMonth) {
        previousMonth.disabled = isCurrentMonth;
        previousMonth.setAttribute('aria-disabled', isCurrentMonth ? 'true' : 'false');
      }
    }

    syncDemoDate(selectedDemoDate);
    renderDemoCalendar();

    if (demoTimeInput) {
      demoTimeInput.value = demoTimeInput.value || '10:00';
      demoTimeInput.addEventListener('change', function () {
        syncDemoDate(selectedDemoDate);
      });
      syncDemoDate(selectedDemoDate);
    }

    if (previousMonth) {
      previousMonth.addEventListener('click', function () {
        if (shownMonth.getFullYear() === today.getFullYear() && shownMonth.getMonth() === today.getMonth()) {
          return;
        }
        shownMonth = new Date(shownMonth.getFullYear(), shownMonth.getMonth() - 1, 1);
        renderDemoCalendar();
      });
    }

    if (nextMonth) {
      nextMonth.addEventListener('click', function () {
        shownMonth = new Date(shownMonth.getFullYear(), shownMonth.getMonth() + 1, 1);
        renderDemoCalendar();
      });
    }

    if (demoForm && demoDateInput) {
      demoForm.addEventListener('submit', function () {
        if (!demoDateInput.value) {
          syncDemoDate(selectedDemoDate);
        }
      });
    }
  }

  root.querySelectorAll('[data-icp-demo-trigger]').forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      focusDemoForm();
    });
  });

  root.querySelectorAll('.icp-capability-carousel').forEach(function (carousel) {
    var track = carousel.querySelector('.icp-capability-grid');
    var dragging = false;
    var dragged = false;
    var pointerStart = 0;
    var scrollStart = 0;
    var resumeAt = 0;
    var previousFrame = performance.now();

    if (!track) {
      return;
    }

    carousel.classList.add('is-hand-slider');
    carousel.setAttribute('tabindex', '0');
    carousel.setAttribute('aria-label', 'Platform capabilities. Drag or swipe horizontally to browse.');

    // Width is measured on resize only (not every frame), and the auto-scroll
    // loop runs only while the carousel is on screen.
    var maximumCache = 0;
    var inView = true;
    var running = false;

    function maximumScroll() {
      return maximumCache;
    }

    function measureMaximum() {
      maximumCache = Math.max(0, carousel.scrollWidth - carousel.clientWidth);
    }

    carousel.addEventListener('pointerdown', function (event) {
      if (event.pointerType === 'mouse' && event.button !== 0) {
        return;
      }
      dragging = true;
      dragged = false;
      pointerStart = event.clientX;
      scrollStart = carousel.scrollLeft;
      resumeAt = Infinity;
      carousel.classList.add('is-dragging');
      carousel.setPointerCapture(event.pointerId);
    });

    carousel.addEventListener('pointermove', function (event) {
      var delta;
      if (!dragging) {
        return;
      }
      delta = event.clientX - pointerStart;
      if (Math.abs(delta) > 4) {
        dragged = true;
      }
      carousel.scrollLeft = scrollStart - delta;
    });

    function finishDrag(event) {
      if (!dragging) {
        return;
      }
      dragging = false;
      resumeAt = performance.now() + 1400;
      carousel.classList.remove('is-dragging');
      if (carousel.hasPointerCapture(event.pointerId)) {
        carousel.releasePointerCapture(event.pointerId);
      }
    }

    carousel.addEventListener('pointerup', finishDrag);
    carousel.addEventListener('pointercancel', finishDrag);
    carousel.addEventListener('lostpointercapture', function () {
      if (dragging) {
        dragging = false;
        resumeAt = performance.now() + 1400;
        carousel.classList.remove('is-dragging');
      }
    });

    carousel.addEventListener('click', function (event) {
      if (dragged) {
        event.preventDefault();
        event.stopPropagation();
        dragged = false;
      }
    }, true);

    carousel.addEventListener('keydown', function (event) {
      if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') {
        return;
      }
      event.preventDefault();
      carousel.scrollBy({
        left: event.key === 'ArrowRight' ? 300 : -300,
        behavior: 'smooth'
      });
      resumeAt = performance.now() + 1600;
    });

    carousel.addEventListener('wheel', function () {
      resumeAt = performance.now() + 1600;
    }, { passive: true });

    function autoScroll(now) {
      if (!inView) {
        running = false;
        return;
      }
      var elapsed = Math.min(now - previousFrame, 40);
      var maximum = maximumScroll();
      previousFrame = now;
      if (maximum > 0 && !dragging && now >= resumeAt && document.visibilityState === 'visible') {
        if (carousel.scrollLeft >= maximum - 0.5) {
          carousel.scrollLeft = 0;
        } else {
          carousel.scrollLeft = Math.min(maximum, carousel.scrollLeft + (elapsed * 0.035));
        }
      }
      window.requestAnimationFrame(autoScroll);
    }

    function startAutoScroll() {
      if (!running) {
        running = true;
        previousFrame = performance.now();
        window.requestAnimationFrame(autoScroll);
      }
    }

    measureMaximum();
    window.addEventListener('resize', measureMaximum, { passive: true });
    window.addEventListener('load', measureMaximum, { once: true });
    if ('ResizeObserver' in window) {
      new ResizeObserver(measureMaximum).observe(track);
    }
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (entries) {
        inView = entries[0].isIntersecting;
        if (inView) {
          measureMaximum();
          startAutoScroll();
        }
      }).observe(carousel);
    }
    startAutoScroll();
  });

  function animateCounter(el) {
    if (el.icpCounterFrame) {
      window.cancelAnimationFrame(el.icpCounterFrame);
    }

    var target = parseFloat(el.getAttribute('data-icp-count') || '0');
    var suffix = el.getAttribute('data-icp-suffix') || '';
    var prefix = el.getAttribute('data-icp-prefix') || '';
    var decimals = String(target).indexOf('.') > -1 ? 1 : 0;
    var startTime = null;
    var duration = 1150;
    el.textContent = prefix + (0).toFixed(decimals) + suffix;

    function frame(time) {
      if (!startTime) {
        startTime = time;
      }
      var progress = Math.min((time - startTime) / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var value = target * eased;
      el.textContent = prefix + value.toFixed(decimals) + suffix;
      if (progress < 1) {
        el.icpCounterFrame = window.requestAnimationFrame(frame);
      } else {
        el.textContent = prefix + target.toFixed(decimals) + suffix;
        el.icpCounterFrame = null;
      }
    }

    el.icpCounterFrame = window.requestAnimationFrame(frame);
  }

  root.querySelectorAll('[data-icp-hero-slider]').forEach(function (slider) {
    var slides = Array.prototype.slice.call(slider.querySelectorAll('.icp-hero-slide'));
    var dots = Array.prototype.slice.call(slider.querySelectorAll('.icp-hero-slider-dots span'));
    var activeSlide = 0;
    if (slides.length < 2) {
      return;
    }
    window.setInterval(function () {
      slides[activeSlide].classList.remove('is-active');
      if (dots[activeSlide]) {
        dots[activeSlide].classList.remove('is-active');
      }
      activeSlide = (activeSlide + 1) % slides.length;
      slides[activeSlide].classList.add('is-active');
      if (dots[activeSlide]) {
        dots[activeSlide].classList.add('is-active');
      }
    }, 4200);
  });

  var counters = Array.prototype.slice.call(root.querySelectorAll('[data-icp-count]'));
  if ('IntersectionObserver' in window) {
    var counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
        }
      });
    }, { threshold: 0.35 });

    counters.forEach(function (counter) {
      counterObserver.observe(counter);
    });
  } else {
    counters.forEach(animateCounter);
  }

  // Decorative CSS animations (glows, pulses, colour shifts) repaint every frame.
  // Pause them while their section is off screen; they resume when it scrolls back.
  if ('IntersectionObserver' in window) {
    var sectionObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        entry.target.classList.toggle('icp-offscreen', !entry.isIntersecting);
      });
    }, { rootMargin: '200px 0px' });

    Array.prototype.slice.call(root.children).forEach(function (section) {
      sectionObserver.observe(section);
    });
  }
}());

/*
 * Hero product tour (templates/partials/conversa-live-dashboard.php): plays the
 * Conversa app like a short video, scene by scene (Home, Ask, Storybooks,
 * Dashboard, Connections), with a pointer doing the clicks, and loops. The round
 * button on the "Interactive demo" label pauses or resumes; clicking inside
 * the app pauses the tour and leaves the visitor in control.
 */
(function () {
  'use strict';

  var tour = document.querySelector('[data-icp-live]');
  if (!tour || !window.Promise || !tour.querySelector('[data-lv-app]')) {
    return;
  }

  var app = tour.querySelector('[data-lv-app]');
  var cursor = app.querySelector('.lv-cursor');
  var crumb = tour.querySelector('[data-lv-crumb]');
  var input = tour.querySelector('.lv-input');
  var inputText = tour.querySelector('[data-lv-input]');
  var playButton = tour.querySelector('[data-lv-play]');
  var stepButtons = Array.prototype.slice.call(tour.querySelectorAll('[data-lv-scene]'));
  var views = {};
  Array.prototype.forEach.call(tour.querySelectorAll('[data-lv-view]'), function (view) {
    views[view.getAttribute('data-lv-view')] = view;
  });

  var CRUMBS = { home: 'Home', chat: 'New chat', storybooks: 'Storybooks', dashboard: 'Dashboard', connections: 'Connections' };
  var SCENE_VIEWS = ['home', 'chat', 'storybooks', 'dashboard', 'connections'];
  var placeholder = inputText.textContent;
  var picked = tour.querySelector('[data-lv-pick][aria-pressed="true"]');
  var vertical = picked ? picked.getAttribute('data-lv-pick') : 'retail';
  var VERTICALS = Array.prototype.map.call(tour.querySelectorAll('[data-lv-pick]'), function (tab) { return tab.getAttribute('data-lv-pick'); });
  var toast = tour.querySelector('.lv-toast');
  var toastTimer = 0;
  var chatRuns = 0;
  var pickedByUser = false;
  var current = 'chat';
  var scene = 1;
  var run = 0;
  var playing = false;
  var resumeOnShow = false;

  Array.prototype.forEach.call(tour.querySelectorAll('[data-lv-count]'), function (el) {
    el.setAttribute('data-final', el.textContent);
  });

  function $(selector, scope) {
    return (scope || tour).querySelector(selector);
  }

  function all(selector, scope) {
    return Array.prototype.slice.call((scope || tour).querySelectorAll(selector));
  }

  function wait(ms) {
    return new Promise(function (resolve) { window.setTimeout(resolve, ms); });
  }

  function show(name) {
    current = name;
    Object.keys(views).forEach(function (key) {
      views[key].classList.toggle('is-active', key === name);
      views[key].hidden = key !== name;
    });
    all('[data-lv-go]').forEach(function (item) {
      var on = item.getAttribute('data-lv-go') === name;
      item.classList.toggle('is-active', on);
      if (on) {
        item.setAttribute('aria-current', 'page');
      } else {
        item.removeAttribute('aria-current');
      }
    });
    crumb.textContent = CRUMBS[name];
  }

  function draw(chart) {
    chart.classList.remove('is-drawn');
    void chart.getBoundingClientRect();
    chart.classList.add('is-drawn');
  }

  function countUp(el, id) {
    var text = el.getAttribute('data-final');
    var match = /^([^0-9]*)([0-9][0-9,]*\.?[0-9]*)(.*)$/.exec(text);
    if (!match) {
      return;
    }
    var raw = match[2].replace(/,/g, '');
    var target = parseFloat(raw);
    var decimals = (raw.split('.')[1] || '').length;
    var commas = match[2].indexOf(',') !== -1;
    var began = window.performance.now();
    (function frame(now) {
      var k = Math.min(1, Math.max(0, (now - began) / 900));
      k = 1 - Math.pow(1 - k, 3);
      var value = target * k;
      el.textContent = match[1] + (commas ? value.toLocaleString('en-US', { minimumFractionDigits: decimals, maximumFractionDigits: decimals }) : value.toFixed(decimals)) + match[3];
      if (k < 1 && id === run) {
        window.requestAnimationFrame(frame);
      } else {
        el.textContent = text;
      }
    }(began));
  }

  // Everything in a view shown in its finished state.
  function finish(view) {
    view.classList.remove('is-staging');
    all('[data-in], .lv-ask', view).forEach(function (el) { el.classList.add('is-in'); });
    all('.lv-chart', view).forEach(function (chart) { chart.classList.add('is-drawn'); });
    all('[data-lv-count]', view).forEach(function (el) { el.textContent = el.getAttribute('data-final'); });
  }

  // Hide the parts of a view the scene is about to reveal.
  function stage(view) {
    view.classList.add('is-staging');
    all('[data-in], .lv-ask', view).forEach(function (el) { el.classList.remove('is-in'); });
    all('.lv-chart', view).forEach(function (chart) { chart.classList.remove('is-drawn'); });
  }

  function setType(type) {
    all('.lv-viz, .lv-combo').forEach(function (el) { el.setAttribute('data-type', type); });
    all('[data-lv-type]').forEach(function (button) {
      var on = button.getAttribute('data-lv-type') === type;
      button.classList.toggle('is-active', on);
      button.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
  }

  function setTab(view, key) {
    all('[data-lv-tab]', view).forEach(function (tab) {
      tab.setAttribute('aria-selected', tab.getAttribute('data-lv-tab') === key ? 'true' : 'false');
    });
    all('[data-lv-panel]', view).forEach(function (panel) {
      panel.hidden = panel.getAttribute('data-lv-panel') !== key;
    });
    return $('[data-lv-panel="' + key + '"]', view);
  }

  function setStep(index, ms) {
    scene = index;
    stepButtons.forEach(function (button, i) {
      button.classList.toggle('is-done', i < index);
      button.classList.toggle('is-active', i === index);
      button.classList.remove('is-running', 'is-start');
      if (i === index) {
        button.setAttribute('aria-current', 'step');
      } else {
        button.removeAttribute('aria-current');
      }
    });
    if (ms && stepButtons[index]) {
      var active = stepButtons[index];
      active.style.setProperty('--lv-ms', ms + 'ms');
      active.classList.add('is-running', 'is-start');
      void active.offsetWidth;
      active.classList.remove('is-start');
    }
  }

  function moveTo(el) {
    if (!el) {
      return;
    }
    var a = app.getBoundingClientRect();
    var r = el.getBoundingClientRect();
    var x = r.left - a.left + Math.min(r.width * 0.5, 40);
    var y = r.top - a.top + r.height * 0.55;
    cursor.style.transform = 'translate(' + x.toFixed(1) + 'px,' + y.toFixed(1) + 'px)';
  }

  function tap(el) {
    if (!el) {
      return;
    }
    cursor.classList.remove('is-click');
    el.classList.remove('lv-tap');
    void el.offsetWidth;
    cursor.classList.add('is-click');
    el.classList.add('lv-tap');
    window.setTimeout(function () {
      cursor.classList.remove('is-click');
      el.classList.remove('lv-tap');
    }, 500);
  }

  function setSql(box, open) {
    $('[data-lv-sql]', box).setAttribute('aria-expanded', open ? 'true' : 'false');
    $('pre', box).hidden = !open;
  }

  function resetChat() {
    all('.lv-sql').forEach(function (box) { setSql(box, false); });
    tour.classList.remove('is-thinking');
    input.classList.remove('is-typing');
    inputText.textContent = placeholder;
  }

  // Scroll the answer like a chat: the newest part settles at the bottom of the thread.
  function scrollThread(el) {
    var thread = el.closest('.lv-thread');
    if (!thread) {
      return;
    }
    var top = thread.scrollTop + el.getBoundingClientRect().bottom - thread.getBoundingClientRect().bottom + 10;
    if (top <= thread.scrollTop) {
      return;
    }
    if (thread.scrollTo) {
      thread.scrollTo({ top: top, behavior: 'smooth' });
    } else {
      thread.scrollTop = top;
    }
  }

  // Open one of the sidebar chats in the chat view.
  function setThread(index) {
    all('[data-lv-thread]').forEach(function (convo) {
      var on = convo.getAttribute('data-lv-thread') === String(index);
      convo.hidden = !on;
      $('.lv-thread', convo).scrollTop = 0;
    });
    all('[data-lv-chat]').forEach(function (item) {
      var on = item.getAttribute('data-lv-chat') === String(index);
      item.classList.toggle('is-active', on);
      if (on) {
        item.setAttribute('aria-current', 'true');
      } else {
        item.removeAttribute('aria-current');
      }
    });
    inputText.textContent = placeholder;
  }

  // Permissions: granting a user updates the selected count and the summary.
  function toggleUser(button, on) {
    var panel = button.closest('[data-lv-panel]');
    button.setAttribute('aria-pressed', on ? 'true' : 'false');
    var count = all('[data-lv-user][aria-pressed="true"]', panel).length;
    $('[data-lv-selected]', panel).textContent = count;
    $('[data-lv-active]', panel).textContent = count;
    $('[data-lv-grants]', panel).textContent = count * 3;
  }

  /*
   * The pipeline under the app: every industry card has a line that joins a bus
   * and runs up into the window. The chosen industry's line is lit and its data
   * flows into the app.
   */
  function drawPipe() {
    var pipe = $('.lv-pipe');
    var svg = $('.lv-pipe-lines', pipe);
    if (!pipe.offsetWidth || window.getComputedStyle(svg).display === 'none') {
      return;
    }
    var box = pipe.getBoundingClientRect();
    var mid = box.width / 2;
    var bus = 46;
    var lines = '';
    var lit = '';
    var dot = '';
    all('[data-lv-pick]', pipe).forEach(function (card) {
      var r = card.getBoundingClientRect();
      var x = r.left - box.left + r.width / 2;
      var top = r.top - box.top;
      var dir = x < mid ? 1 : -1;
      var bend = Math.min(10, Math.abs(mid - x) / 2);
      var d = 'M' + x.toFixed(1) + ',' + top.toFixed(1) + ' V' + (bus + bend) + ' Q' + x.toFixed(1) + ',' + bus + ' ' + (x + dir * bend).toFixed(1) + ',' + bus +
        ' H' + (mid - dir * bend).toFixed(1) + ' Q' + mid.toFixed(1) + ',' + bus + ' ' + mid.toFixed(1) + ',' + (bus - bend) + ' V0';
      lines += '<path class="lv-pipe-base" d="' + d + '"/>';
      if (card.getAttribute('data-lv-pick') === vertical) {
        lit = d;
        dot = '<circle class="lv-pipe-dot" cx="' + x.toFixed(1) + '" cy="' + top.toFixed(1) + '" r="3.5"/>';
      }
    });
    svg.setAttribute('viewBox', '0 0 ' + box.width.toFixed(1) + ' ' + box.height.toFixed(1));
    svg.innerHTML = lines + '<path class="lv-pipe-lit" d="' + lit + '"/><path class="lv-pipe-flow" d="' + lit + '"/>' + dot +
      '<circle class="lv-pipe-port" cx="' + mid.toFixed(1) + '" cy="1" r="4.5"/>';
  }

  // Switch industry: its agent bar, sidebar chats and first conversation.
  function setVertical(key) {
    vertical = key;
    all('[data-lv-vertical]').forEach(function (el) {
      el.hidden = el.getAttribute('data-lv-vertical') !== key;
    });
    all('[data-lv-pick]').forEach(function (card) {
      card.setAttribute('aria-pressed', card.getAttribute('data-lv-pick') === key ? 'true' : 'false');
    });
    var agent = $('.lv-agent-bar[data-lv-vertical="' + key + '"]').getAttribute('data-agent');
    placeholder = 'Ask ' + agent + '...';
    setThread(key + '-0');
    tour.setAttribute('data-vertical', key);
    $('[data-lv-ws]').textContent = $('[data-lv-pick="' + key + '"]').textContent.trim();
    drawPipe();
    // A short confirmation inside the app that the whole workspace switched.
    $('[data-lv-toast]').textContent = $('[data-lv-pick="' + key + '"]').textContent.trim() + ' workspace · ' + agent;
    toast.classList.remove('is-on');
    void toast.offsetWidth;
    toast.classList.add('is-on');
    window.clearTimeout(toastTimer);
    toastTimer = window.setTimeout(function () { toast.classList.remove('is-on'); }, 2200);
  }

  /*
   * One scene per step. Each gets helpers bound to the run that started it;
   * every pause rejects once that run is replaced, which ends the chain.
   */
  function scenes(id) {
    function pause(ms) {
      return wait(ms).then(function () {
        if (id !== run) {
          throw id;
        }
      });
    }
    function click(el, after) {
      moveTo(el);
      return pause(850).then(function () {
        tap(el);
        return pause(after || 450);
      });
    }
    function each(list, ms, fn) {
      return list.reduce(function (chain, item, i) {
        return chain.then(function () {
          item.classList.add('is-in');
          if (fn) {
            fn(item, i);
          }
          return pause(ms);
        });
      }, Promise.resolve());
    }
    function counters(scope) {
      all('[data-lv-count]', scope).forEach(function (el) { countUp(el, id); });
    }
    function open(name) {
      var go = $('[data-lv-go="' + name + '"]');
      return (current === name ? Promise.resolve() : click(go)).then(function () {
        stage(views[name]);
        show(name);
        return pause(350);
      });
    }
    function openTab(view, key) {
      var panel = setTab(view, key);
      all('[data-in]', panel).forEach(function (el) { el.classList.add('is-in'); });
      all('.lv-chart', panel).forEach(draw);
      counters(panel);
    }

    return [
      { ms: 5200, play: function () {
        var home = views.home;
        return open('home').then(function () {
          return each(all('[data-in]', home), 170);
        }).then(function () {
          return pause(700);
        }).then(function () {
          return click($('[data-lv-target="start"]', home));
        });
      } },
      { ms: 18500, play: function () {
        var chat = views.chat;
        // On its own the tour moves to the next industry tab each loop; a visitor's pick plays as chosen.
        var auto = !pickedByUser;
        var next = auto && chatRuns > 0 ? VERTICALS[(VERTICALS.indexOf(vertical) + 1) % VERTICALS.length] : vertical;
        pickedByUser = false;
        chatRuns += 1;
        resetChat();
        stage(chat);
        show('chat');
        setType('combo');
        // The industry cards sit outside the app window, so the tour taps the next one with a pulse instead of the pointer.
        var lead = !auto ? Promise.resolve() : pause(300).then(function () {
          tap($('[data-lv-pick="' + next + '"]'));
          return pause(450);
        }).then(function () {
          setVertical(next);
          return pause(1000);
        });
        return lead.then(function () {
          var convo = $('[data-lv-thread="' + vertical + '-0"]', chat);
          var viz = $('.lv-viz', convo);
          var ask = $('[data-lv-ask]', convo);
          var question = ask.textContent;
          inputText.textContent = placeholder;
          var typed = 0;
          function typeNext() {
            if (typed >= question.length) {
              return pause(250);
            }
            typed += 2;
            inputText.textContent = question.slice(0, typed);
            return pause(30).then(typeNext);
          }
          function reveal(el, ms) {
            el.classList.add('is-in');
            scrollThread(el);
            return pause(ms);
          }
          return pause(300).then(function () {
            moveTo(input);
            return pause(700);
          }).then(function () {
            input.classList.add('is-typing');
            inputText.textContent = '';
            return typeNext();
          }).then(function () {
            return click($('[data-lv-target="send"]', chat), 300);
          }).then(function () {
            input.classList.remove('is-typing');
            inputText.textContent = placeholder;
            ask.classList.add('is-in');
            tour.classList.add('is-thinking');
            return pause(900);
          }).then(function () {
            tour.classList.remove('is-thinking');
            return reveal($('.lv-thought', convo), 250);
          }).then(function () {
            return reveal($('.lv-sql', convo), 250);
          }).then(function () {
            return reveal($('.lv-table', convo), 1300);
          }).then(function () {
            return reveal($('.lv-summary', convo), 1100);
          }).then(function () {
            // Key insights, then the action plan, scrolling down as each arrives.
            return each(all('.lv-section', convo), 1200, function (section) {
              scrollThread(section);
              counters(section);
            });
          }).then(function () {
            viz.classList.add('is-in');
            scrollThread(viz);
            all('.lv-chart', viz).forEach(draw);
            return pause(1500);
          }).then(function () {
            return click($('[data-lv-type="pie"]', viz), 1);
          }).then(function () {
            setType('pie');
            draw($('.lv-pie', viz));
            return pause(1600);
          }).then(function () {
            return click($('[data-lv-type="combo"]', viz), 1);
          }).then(function () {
            setType('combo');
            draw($('.lv-combo', viz));
            return pause(1200);
          });
        });
      } },
      { ms: 5900, play: function () {
        var books = views.storybooks;
        return open('storybooks').then(function () {
          return each(all('.lv-view-head, .lv-stats [data-in]', books), 180, function (item) { counters(item); });
        }).then(function () {
          return each(all('.lv-book-grid [data-in], .lv-recent', books), 200);
        }).then(function () {
          var first = $('[data-lv-target="book"]', books);
          moveTo(first);
          return pause(900).then(function () {
            first.classList.add('is-hover');
            return pause(1300);
          }).then(function () {
            first.classList.remove('is-hover');
          });
        });
      } },
      { ms: 11800, play: function () {
        var dash = views.dashboard;
        var panel = setTab(dash, 'overview');
        return open('dashboard').then(function () {
          return each(all('.lv-view-head, .lv-tabs', dash), 180);
        }).then(function () {
          return each(all('.lv-dash-kpis [data-in]', panel), 180, function (item) { counters(item); });
        }).then(function () {
          return each(all('.lv-dash-charts [data-in]', panel), 200, function (item) { all('.lv-chart', item).forEach(draw); });
        }).then(function () {
          return pause(1800);
        }).then(function () {
          return click($('[data-lv-tab="performance"]', dash), 1);
        }).then(function () {
          openTab(dash, 'performance');
          return pause(2000);
        }).then(function () {
          return click($('[data-lv-tab="tokens"]', dash), 1);
        }).then(function () {
          openTab(dash, 'tokens');
          return pause(2000);
        });
      } },
      { ms: 10500, play: function () {
        var conn = views.connections;
        var panel = setTab(conn, 'db');
        return open('connections').then(function () {
          return each(all('.lv-tabs', conn), 200);
        }).then(function () {
          return each(all('[data-in]', panel), 140, function (item) { counters(item); });
        }).then(function () {
          return pause(1500);
        }).then(function () {
          return click($('[data-lv-tab="agents"]', conn), 1);
        }).then(function () {
          openTab(conn, 'agents');
          return pause(1500);
        }).then(function () {
          return click($('[data-lv-tab="permissions"]', conn), 1);
        }).then(function () {
          toggleUser($('[data-lv-target="grant"]', conn), false);
          openTab(conn, 'permissions');
          return pause(1200);
        }).then(function () {
          var grant = $('[data-lv-target="grant"]', conn);
          return click(grant, 1).then(function () {
            toggleUser(grant, true);
            return pause(1800);
          });
        });
      } }
    ];
  }

  function play(id, index) {
    var list = scenes(id);
    setStep(index, list[index].ms);
    list[index].play().then(function () {
      if (id === run) {
        play(id, (index + 1) % list.length);
      }
    }).catch(function () {});
  }

  function start(index) {
    run += 1;
    playing = true;
    tour.classList.add('is-auto');
    tour.classList.remove('is-paused', 'is-thinking');
    playButton.setAttribute('aria-label', 'Pause the product tour');
    play(run, index);
  }

  // Stop the tour and leave the current screen complete and usable.
  function halt() {
    run += 1;
    playing = false;
    resumeOnShow = false;
    tour.classList.add('is-paused');
    resetChat();
    finish(views[current]);
    setStep(SCENE_VIEWS.indexOf(current) === -1 ? scene : SCENE_VIEWS.indexOf(current));
    playButton.setAttribute('aria-label', 'Play the product tour');
  }

  playButton.addEventListener('click', function () {
    if (playing) {
      halt();
    } else {
      start(scene);
    }
  });

  stepButtons.forEach(function (button, i) {
    button.addEventListener('click', function () {
      start(i);
    });
  });

  all('[data-lv-go]').forEach(function (item) {
    item.addEventListener('click', function () {
      halt();
      show(item.getAttribute('data-lv-go'));
      finish(views[current]);
      setStep(SCENE_VIEWS.indexOf(current));
    });
  });

  all('[data-lv-chat]').forEach(function (item) {
    item.addEventListener('click', function () {
      halt();
      setThread(item.getAttribute('data-lv-chat'));
      show('chat');
      finish(views.chat);
      setStep(1);
    });
  });

  all('[data-lv-type]').forEach(function (button) {
    button.addEventListener('click', function () {
      halt();
      setType(button.getAttribute('data-lv-type'));
    });
  });

  all('[data-lv-sql]').forEach(function (button) {
    button.addEventListener('click', function () {
      var open = button.getAttribute('aria-expanded') !== 'true';
      halt();
      setSql(button.parentNode, open);
    });
  });

  all('[data-lv-user]').forEach(function (button) {
    button.addEventListener('click', function () {
      halt();
      toggleUser(button, button.getAttribute('aria-pressed') !== 'true');
    });
  });

  all('[data-lv-switch]').forEach(function (button) {
    button.addEventListener('click', function () {
      halt();
      button.setAttribute('aria-pressed', button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true');
    });
  });

  // Picking an industry plays its chat scene, or just shows it when motion is reduced.
  all('[data-lv-pick]').forEach(function (button) {
    button.addEventListener('click', function () {
      pickedByUser = true;
      setVertical(button.getAttribute('data-lv-pick'));
      if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        halt();
        show('chat');
        finish(views.chat);
        setStep(1);
      } else {
        start(1);
      }
    });
  });

  all('[data-lv-tab]').forEach(function (tab) {
    tab.addEventListener('click', function () {
      var view = tab.closest('[data-lv-view]');
      halt();
      setTab(view, tab.getAttribute('data-lv-tab'));
      finish(view);
    });
  });

  setStep(1);
  drawPipe();
  if (window.ResizeObserver) {
    new window.ResizeObserver(drawPipe).observe($('.lv-pipe'));
  } else {
    window.addEventListener('resize', drawPipe);
  }
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(drawPipe);
  }

  // Reduced motion: no tour; the app stays clickable.
  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    tour.classList.add('is-paused');
    playButton.setAttribute('aria-label', 'Play the product tour');
    return;
  }

  // Play while the hero is on screen; pick the scene up again on return.
  function visible(on) {
    if (!on && playing) {
      run += 1;
      playing = false;
      resumeOnShow = true;
    } else if (on && resumeOnShow) {
      resumeOnShow = false;
      start(scene);
    }
  }

  if ('IntersectionObserver' in window) {
    var first = true;
    new IntersectionObserver(function (entries) {
      var on = entries.some(function (entry) { return entry.isIntersecting; });
      if (on && first) {
        first = false;
        start(0);
      } else {
        visible(on && !document.hidden);
      }
    }, { threshold: 0.2 }).observe(tour);
  } else {
    start(0);
  }

  document.addEventListener('visibilitychange', function () {
    if (!tour.classList.contains('is-paused') || resumeOnShow) {
      visible(!document.hidden);
    }
  });
}());

/*
 * Business decision journey: plays the question, the business context feeding
 * the engine, the four reasoning steps and the decision-ready outputs as four
 * chapters, looping while on screen. The chapter buttons jump to any part.
 */
(function () {
  'use strict';

  var jr = document.querySelector('[data-icp-journey]');
  if (!jr) {
    return;
  }

  function $(selector) {
    return jr.querySelector(selector);
  }

  function all(selector) {
    return Array.prototype.slice.call(jr.querySelectorAll(selector));
  }

  var ask = $('.jr-ask');
  var typed = $('[data-jr-typed]');
  var question = typed.textContent;
  var statusText = $('[data-jr-status]');
  var engine = $('.jr-engine');
  var orb = $('.jr-orb');
  var flow = $('.jr-flow');
  var wires = $('.jr-wires');
  var chips = all('.jr-context li');
  var stepList = $('.jr-steps');
  var steps = all('.jr-steps li');
  var outputs = all('.jr-outputs article');
  var count = $('[data-jr-count]');
  var chapterButtons = all('[data-jr-go]');
  var playButton = $('[data-jr-play]');
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var timers = [];
  var chapter = 0;
  var playing = false;
  var userPaused = false;
  var onScreen = false;

  function later(ms, fn) {
    timers.push(window.setTimeout(fn, ms));
  }

  function stopTimers() {
    timers.forEach(window.clearTimeout);
    timers = [];
  }

  function status(text) {
    statusText.textContent = text;
  }

  function setCount(value) {
    count.textContent = '−' + value;
  }

  // Each wire runs from the right edge of its source to the left edge of its
  // target; when the target sits below (narrower layouts) it drops from the bottom.
  function wire(from, to, cls) {
    var box = flow.getBoundingClientRect();
    var a = from.getBoundingClientRect();
    var b = to.getBoundingClientRect();
    var d;
    if (b.left >= a.right - 2) {
      var x1 = a.right - box.left;
      var y1 = a.top + a.height / 2 - box.top;
      var x2 = b.left - box.left;
      var y2 = b.top + b.height / 2 - box.top;
      var mx = (x1 + x2) / 2;
      d = 'M' + x1.toFixed(1) + ',' + y1.toFixed(1) + ' C' + mx.toFixed(1) + ',' + y1.toFixed(1) + ' ' + mx.toFixed(1) + ',' + y2.toFixed(1) + ' ' + x2.toFixed(1) + ',' + y2.toFixed(1);
    } else {
      var sx = a.left + a.width / 2 - box.left;
      var sy = a.bottom - box.top;
      var tx = b.left + b.width / 2 - box.left;
      var ty = b.top - box.top;
      var my = (sy + ty) / 2;
      d = 'M' + sx.toFixed(1) + ',' + sy.toFixed(1) + ' C' + sx.toFixed(1) + ',' + my.toFixed(1) + ' ' + tx.toFixed(1) + ',' + my.toFixed(1) + ' ' + tx.toFixed(1) + ',' + ty.toFixed(1);
    }
    var busy = to === stepList ? $('.jr-steps .is-active') : to.classList.contains('is-active');
    var lit = busy || to.classList.contains('is-on') || to.classList.contains('is-done') || from.classList.contains('is-on') ||
      (to === stepList && $('.jr-steps .is-done'));
    var animated = jr.classList.contains('is-anim');
    var path = '<path class="jr-wire ' + cls + (lit || !animated ? ' is-on' : '') + '" d="' + d + '"/>';
    if (animated && (from.classList.contains('is-on') || busy)) {
      path += '<path class="jr-wire-flow ' + cls + '" d="' + d + '"/>';
    }
    return path;
  }

  function drawWires() {
    if (!flow.offsetWidth || window.getComputedStyle(wires).display === 'none') {
      return;
    }
    var box = flow.getBoundingClientRect();
    var paths = '';
    chips.forEach(function (chip) {
      paths += wire(chip, orb, 'is-in');
    });
    // Steps beside the engine get a wire each; stacked under it, one wire feeds the block.
    if (stepList.getBoundingClientRect().left >= orb.getBoundingClientRect().right - 2) {
      steps.forEach(function (step) {
        paths += wire(orb, step, 'is-out');
      });
    } else {
      paths += wire(orb, stepList, 'is-out');
    }
    wires.setAttribute('viewBox', '0 0 ' + box.width.toFixed(1) + ' ' + box.height.toFixed(1));
    wires.innerHTML = paths;
  }

  // Chapter n: reset() is the state before it plays, done() the state after.
  var CHAPTERS = [
    {
      ms: 2600,
      reset: function () {
        typed.textContent = '';
        ask.classList.remove('is-sent', 'is-typing');
      },
      play: function () {
        status('Asking a question');
        ask.classList.add('is-typing');
        var step = 38;
        for (var i = 1; i <= question.length; i += 1) {
          (function (n) {
            later(n * step, function () {
              typed.textContent = question.slice(0, n);
            });
          }(i));
        }
        later(question.length * step + 250, function () {
          ask.classList.remove('is-typing');
          ask.classList.add('is-sent');
        });
      },
      done: function () {
        typed.textContent = question;
        ask.classList.remove('is-typing');
        ask.classList.add('is-sent');
      }
    },
    {
      ms: 2600,
      reset: function () {
        engine.classList.remove('is-on', 'is-thinking');
        chips.forEach(function (chip) { chip.classList.remove('is-on'); });
      },
      play: function () {
        status('Reading business context');
        engine.classList.add('is-on', 'is-thinking');
        chips.forEach(function (chip, i) {
          later(250 + i * 300, function () {
            chip.classList.add('is-on');
            drawWires();
          });
        });
      },
      done: function () {
        engine.classList.add('is-on');
        chips.forEach(function (chip) { chip.classList.add('is-on'); });
      }
    },
    {
      ms: 4900,
      reset: function () {
        steps.forEach(function (step) { step.classList.remove('is-done', 'is-active'); });
      },
      play: function () {
        engine.classList.add('is-thinking');
        steps.forEach(function (step, i) {
          later(i * 1150, function () {
            status('Investigating · step ' + (i + 1) + ' of ' + steps.length);
            if (i) {
              steps[i - 1].classList.remove('is-active');
              steps[i - 1].classList.add('is-done');
            }
            step.classList.add('is-active');
            drawWires();
          });
        });
        later(steps.length * 1150, function () {
          steps[steps.length - 1].classList.remove('is-active');
          steps[steps.length - 1].classList.add('is-done');
          drawWires();
        });
      },
      done: function () {
        steps.forEach(function (step) {
          step.classList.remove('is-active');
          step.classList.add('is-done');
        });
      }
    },
    {
      ms: 5600,
      reset: function () {
        outputs.forEach(function (output) { output.classList.remove('is-on'); });
        setCount(0);
      },
      play: function () {
        status('Decision ready');
        engine.classList.remove('is-thinking');
        outputs.forEach(function (output, i) {
          later(i * 450, function () { output.classList.add('is-on'); });
        });
        var target = parseInt(count.getAttribute('data-jr-count'), 10);
        for (var v = 1; v <= target; v += 1) {
          (function (n) {
            later(n * 50, function () { setCount(n); });
          }(v));
        }
      },
      done: function () {
        engine.classList.remove('is-thinking');
        outputs.forEach(function (output) { output.classList.add('is-on'); });
        setCount(count.getAttribute('data-jr-count'));
        status('Decision ready');
      }
    }
  ];

  function setProgress(n, runMs) {
    chapterButtons.forEach(function (button, i) {
      var bar = button.querySelector('b');
      button.classList.toggle('is-done', i < n || (i === n && !runMs));
      button.classList.toggle('is-current', i === n);
      if (i === n && runMs) {
        bar.style.transition = 'none';
        bar.style.width = '0';
        void bar.offsetWidth;
        bar.style.transition = 'width ' + runMs + 'ms linear';
        bar.style.width = '100%';
      } else {
        bar.style.transition = 'none';
        bar.style.width = '';
      }
    });
  }

  // Lay everything out as it stands just before chapter n.
  function seek(n) {
    stopTimers();
    for (var i = CHAPTERS.length - 1; i >= n; i -= 1) {
      CHAPTERS[i].reset();
    }
    for (var j = 0; j < n; j += 1) {
      CHAPTERS[j].done();
    }
    chapter = n;
  }

  function playFrom(n) {
    seek(n);
    playing = true;
    jr.classList.add('is-playing');
    playButton.setAttribute('aria-label', 'Pause the journey');
    setProgress(n, CHAPTERS[n].ms);
    CHAPTERS[n].play();
    drawWires();
    later(CHAPTERS[n].ms, function () {
      playFrom((n + 1) % CHAPTERS.length);
    });
  }

  function pause() {
    stopTimers();
    playing = false;
    jr.classList.remove('is-playing');
    playButton.setAttribute('aria-label', 'Play the journey');
    chapterButtons.forEach(function (button) {
      var bar = button.querySelector('b');
      if (button.classList.contains('is-current')) {
        bar.style.width = window.getComputedStyle(bar).width;
        bar.style.transition = 'none';
      }
    });
  }

  // A chapter shown without playing it: everything up to and including it finished.
  function show(n) {
    seek(n);
    CHAPTERS[n].done();
    status(['Asking a question', 'Reading business context', 'Investigation complete', 'Decision ready'][n]);
    setProgress(n, 0);
    drawWires();
  }

  playButton.addEventListener('click', function () {
    if (playing) {
      userPaused = true;
      pause();
    } else {
      userPaused = false;
      playFrom(chapter);
    }
  });

  chapterButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      var n = parseInt(button.getAttribute('data-jr-go'), 10);
      if (reduce || userPaused) {
        show(n);
      } else {
        playFrom(n);
      }
    });
  });

  if (window.ResizeObserver) {
    new window.ResizeObserver(drawWires).observe(flow);
  } else {
    window.addEventListener('resize', drawWires);
  }
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(drawWires);
  }

  // Reduced motion: everything finished and still; the chapters show each part.
  if (reduce) {
    jr.classList.add('is-anim');
    show(CHAPTERS.length - 1);
    return;
  }

  jr.classList.add('is-anim');
  seek(0);
  setProgress(0, 0);
  chapterButtons[0].classList.remove('is-done');
  drawWires();

  // Play while on screen and the tab is visible; a paused chapter restarts on return.
  function sync() {
    var on = onScreen && !document.hidden;
    if (on && !playing && !userPaused) {
      playFrom(chapter);
    } else if (!on && playing) {
      pause();
    }
  }

  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (entries) {
      onScreen = entries.some(function (entry) { return entry.isIntersecting; });
      sync();
    }, { threshold: 0.35 }).observe(jr);
  } else {
    playFrom(0);
  }

  document.addEventListener('visibilitychange', sync);
}());
