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
    if (demoCopy[1]) demoCopy[1].textContent = 'Book a personalized demo and see governed conversational analytics working with your enterprise data.';
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

    function maximumScroll() {
      return Math.max(0, carousel.scrollWidth - carousel.clientWidth);
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

    window.requestAnimationFrame(autoScroll);
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
}());
