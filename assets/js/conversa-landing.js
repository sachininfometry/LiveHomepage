/*
 * INFOFISCUS Conversa ads landing page: demo buttons scroll to the form, the
 * lead form submits in place (includes/conversa-landing-form.php), scroll
 * reveals, counting stats, the "How it works" stepper and the team tabs.
 * The product tour comes from infofiscus-conversa.js.
 */
(function () {
  'use strict';

  var page = document.querySelector('.icl-page');
  if (!page) {
    return;
  }

  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var canObserve = 'IntersectionObserver' in window;
  var form = page.querySelector('[data-icl-form]');

  function all(selector, root) {
    return Array.prototype.slice.call((root || page).querySelectorAll(selector));
  }

  // Call fn once when el first comes into view.
  function onceVisible(el, fn, threshold) {
    if (!canObserve) {
      fn();
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      if (entries.some(function (e) { return e.isIntersecting; })) {
        io.disconnect();
        fn();
      }
    }, { threshold: threshold || 0.15 });
    io.observe(el);
  }

  // Top bar: transparent on the hero; the dark blurred bar fades in on scroll.
  var topbar = page.querySelector('[data-icl-topbar]');
  if (topbar) {
    var onScroll = function () {
      if ((window.pageYOffset || document.documentElement.scrollTop || 0) > 20) {
        topbar.classList.add('is-scrolled');
      } else {
        topbar.classList.remove('is-scrolled');
      }
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // Scroll reveals.
  if (canObserve && !reduce) {
    page.classList.add('icl-js');
    all('[data-icl-reveal]').forEach(function (el) {
      onceVisible(el, function () { el.classList.add('is-in'); }, 0.12);
    });
  }

  // Stats count up from zero.
  all('[data-icl-count]').forEach(function (el) {
    var target = parseFloat(el.getAttribute('data-icl-count'));
    if (reduce || !target) {
      return;
    }
    el.textContent = '0';
    onceVisible(el, function () {
      var start = null;
      var step = function (now) {
        if (!start) { start = now; }
        var p = Math.min((now - start) / 1400, 1);
        el.textContent = String(Math.round(target * (1 - Math.pow(1 - p, 3))));
        if (p < 1) { window.requestAnimationFrame(step); }
      };
      window.requestAnimationFrame(step);
    }, 0.4);
  });

  // Demo buttons bring the visitor to the form; "Try the interactive demo" goes to the tour.
  all('[data-icl-demo]').forEach(function (link) {
    link.addEventListener('click', function (event) {
      if (!form) {
        return;
      }
      event.preventDefault();
      form.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
      var first = form.querySelector('#icl-name');
      if (first) {
        window.setTimeout(function () { first.focus({ preventScroll: true }); }, reduce ? 0 : 450);
      }
    });
  });

  var tourSection = page.querySelector('#icl-tour');
  all('[data-icl-tour]').forEach(function (link) {
    link.addEventListener('click', function (event) {
      if (!tourSection) {
        return;
      }
      event.preventDefault();
      tourSection.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
    });
  });

  // "How it works": steps play in turn and light up the matching part of the example.
  var stepper = page.querySelector('[data-icl-stepper]');
  if (stepper) {
    var steps = all('[data-icl-step]', stepper);
    var parts = all('[data-icl-ex]', stepper);
    var current = 0;
    var timer = null;
    var visible = false;
    var held = false;

    var show = function (n) {
      current = (n + steps.length) % steps.length;
      steps.forEach(function (step, i) {
        var on = i === current;
        step.classList.toggle('is-active', on);
        step.setAttribute('aria-selected', on ? 'true' : 'false');
        // Restart the progress bar animation.
        var bar = step.querySelector('.icl-step-bar');
        if (on && bar) {
          bar.style.animation = 'none';
          void bar.offsetWidth;
          bar.style.animation = '';
        }
      });
      parts.forEach(function (part) {
        var at = parseInt(part.getAttribute('data-icl-ex'), 10);
        part.classList.toggle('is-lit', at <= current);
      });
    };

    var stop = function () {
      window.clearInterval(timer);
      timer = null;
    };

    var play = function () {
      if (timer || held || !visible || reduce) {
        return;
      }
      stepper.classList.remove('is-paused');
      timer = window.setInterval(function () { show(current + 1); }, 3200);
    };

    stepper.classList.add('is-live');
    show(0);
    if (reduce) {
      stepper.classList.add('is-paused');
    }

    steps.forEach(function (step, i) {
      step.addEventListener('click', function () {
        held = true;
        stop();
        stepper.classList.add('is-paused');
        show(i);
      });
    });

    stepper.addEventListener('mouseenter', function () {
      stop();
      stepper.classList.add('is-paused');
    });
    stepper.addEventListener('mouseleave', function () {
      if (!held) {
        show(current);
        play();
      }
    });

    if (canObserve) {
      new IntersectionObserver(function (entries) {
        visible = entries.some(function (e) { return e.isIntersecting; });
        if (visible) {
          play();
        } else {
          stop();
        }
      }, { threshold: 0.3 }).observe(stepper);
    }
  }

  // Lead form.
  if (form) {
    var time = form.querySelector('[data-icl-time]');
    var url = form.querySelector('[data-icl-url]');
    var msg = form.querySelector('[data-icl-msg]');
    var button = form.querySelector('.icl-submit');
    var label = button ? button.innerHTML : '';

    if (time) {
      time.value = String(Math.floor(Date.now() / 1000));
    }
    if (url) {
      url.value = window.location.href; // keeps utm_* and gclid for the lead email
    }

    var say = function (text, state) {
      msg.textContent = text;
      msg.className = 'icl-form-msg' + (state ? ' is-' + state : '');
    };

    var check = function () {
      var bad = null;
      ['icl-name', 'icl-email', 'icl-company'].forEach(function (id) {
        var input = form.querySelector('#' + id);
        var value = input.value.trim();
        var ok = value !== '' && (input.type !== 'email' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value));
        input.setAttribute('aria-invalid', ok ? 'false' : 'true');
        if (!ok && !bad) {
          bad = input;
        }
      });
      return bad;
    };

    form.addEventListener('submit', function (event) {
      var bad = check();
      if (bad) {
        event.preventDefault();
        say('Please enter your full name, a valid company email and your company.', 'error');
        bad.focus();
        return;
      }
      if (!window.fetch || !window.FormData) {
        return; // normal post + redirect back
      }
      event.preventDefault();
      var data = new FormData(form);
      data.append('icl_ajax', '1');
      button.disabled = true;
      button.textContent = 'Sending...';
      say('', '');
      // getAttribute: the hidden input named "action" shadows form.action.
      fetch(form.getAttribute('action'), { method: 'POST', body: data, credentials: 'same-origin' })
        .then(function (response) { return response.json(); })
        .then(function (result) {
          if (result && result.ok) {
            form.reset();
            if (time) { time.value = String(Math.floor(Date.now() / 1000)); }
            if (url) { url.value = window.location.href; }
            if (window.dataLayer) {
              window.dataLayer.push({ event: 'conversa_landing_lead' });
            }
            // Send the visitor to the thank-you page on success.
            say('Thank you. Redirecting you now...', 'ok');
            window.location.assign(result.redirect || 'https://www.infometry.net/thank-you/');
            return;
          } else {
            say((result && result.message) || 'Something went wrong. Please try again.', 'error');
          }
        })
        .catch(function () {
          say('Something went wrong. Please try again or email info@infometry.net.', 'error');
        })
        .then(function () {
          button.disabled = false;
          button.innerHTML = label;
        });
    });

    form.addEventListener('input', function (event) {
      if (event.target.getAttribute('aria-invalid') === 'true') {
        event.target.setAttribute('aria-invalid', 'false');
      }
    });
  }

  // In-demo "Request demo" nudge: appears when the visitor opens another chat
  // or switches a dashboard tab, and can be dismissed for the rest of the visit.
  var liveApp = page.querySelector('[data-lv-app]');
  var nudge = page.querySelector('[data-lv-nudge]');
  if (liveApp && nudge) {
    var nudgeClose = nudge.querySelector('[data-lv-nudge-close]');
    var nudgeTimer = null;
    var interactions = 0;
    var dismissed = false;
    var nudgeShown = false;

    var hideNudge = function () {
      nudge.hidden = true;
      nudge.classList.remove('is-in');
      window.clearTimeout(nudgeTimer);
    };

    var showNudge = function () {
      if (dismissed || nudgeShown) {
        return;
      }
      nudgeShown = true;
      nudge.hidden = false;
      // Next frame so the entrance transition runs.
      window.requestAnimationFrame(function () { nudge.classList.add('is-in'); });
      // Auto-hide after a while if ignored; it can come back on the next switch.
      window.clearTimeout(nudgeTimer);
      nudgeTimer = window.setTimeout(function () {
        hideNudge();
        nudgeShown = false;
      }, 9000);
    };

    if (nudgeClose) {
      nudgeClose.addEventListener('click', function () {
        dismissed = true;
        hideNudge();
      });
    }

    // "Request now" and the pinned CTA already scroll to the form via
    // [data-icl-demo]; dismiss the nudge once the visitor acts on it.
    nudge.addEventListener('click', function (event) {
      if (event.target.closest('[data-lv-nudge-go]')) {
        dismissed = true;
        hideNudge();
      }
    });

    // Count meaningful interactions; prompt from the second one on (e.g. a
    // second chat, or switching the dashboard tab / nav / industry).
    liveApp.addEventListener('click', function (event) {
      if (dismissed) {
        return;
      }
      var trigger = event.target.closest('[data-lv-chat], [data-lv-tab], [data-lv-go], [data-lv-pick]');
      if (!trigger || nudge.contains(trigger)) {
        return;
      }
      interactions += 1;
      if (interactions >= 2) {
        nudgeShown = false; // allow it to reappear on later switches
        showNudge();
      }
    });
  }

  // Team tabs.
  var tabs = all('[data-icl-tab]');
  var panels = all('[data-icl-panel]');

  function showTab(index, focus) {
    var on = (index + tabs.length) % tabs.length;
    tabs.forEach(function (tab, i) {
      tab.setAttribute('aria-selected', i === on ? 'true' : 'false');
      tab.tabIndex = i === on ? 0 : -1;
      if (i === on && focus) {
        tab.focus();
      }
    });
    panels.forEach(function (panel, i) {
      panel.hidden = i !== on;
    });
  }

  tabs.forEach(function (tab, i) {
    tab.addEventListener('click', function () {
      showTab(i);
    });
    tab.addEventListener('keydown', function (event) {
      var move = { ArrowRight: 1, ArrowLeft: -1 }[event.key];
      if (event.key === 'Home') {
        event.preventDefault();
        showTab(0, true);
      } else if (event.key === 'End') {
        event.preventDefault();
        showTab(tabs.length - 1, true);
      } else if (move) {
        event.preventDefault();
        showTab(i + move, true);
      }
    });
  });
}());
