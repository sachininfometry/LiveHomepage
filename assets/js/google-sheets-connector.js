/*
 * Google Sheets Connector page: the hero sync loop, scroll reveals, the
 * "how it works" progress line and the tutorial video player.
 */
(function () {
  'use strict';

  var page = document.querySelector('.igs-page');
  if (!page) {
    return;
  }

  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var canObserve = 'IntersectionObserver' in window;

  function all(selector, root) {
    return Array.prototype.slice.call((root || page).querySelectorAll(selector));
  }

  // Scroll reveals and the steps line: shown once they come into view.
  if (canObserve && !reduce) {
    document.documentElement.classList.add('igs-js');
    var revealer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in');
          revealer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    all('[data-igs-reveal], [data-igs-steps]').forEach(function (el, i) {
      if (el.hasAttribute('data-igs-reveal')) {
        el.style.transitionDelay = (i % 4) * 0.08 + 's';
      }
      revealer.observe(el);
    });
  } else {
    all('[data-igs-steps]').forEach(function (el) { el.classList.add('is-in'); });
  }

  // Hero: the sheet's selection walks down the rows; each row flows through the connector to a different
  // source or target in the ecosystem, which lights up; after a full pass the toast confirms the run.
  var live = page.querySelector('[data-igs-live]');
  if (live) {
    var rows = all('[data-igs-row]', live);
    var targets = all('[data-igs-target]', live);
    var sheet = live.querySelector('[data-igs-sheet]');
    var core = live.querySelector('[data-igs-core]');
    var eco = live.querySelector('[data-igs-eco]');
    var select = live.querySelector('[data-igs-select]');
    var fx = live.querySelector('[data-igs-fx]');
    var toast = live.querySelector('[data-igs-toast]');
    var wires = live.querySelector('.igs-flow-wires');
    var packets = document.createElement('div');
    packets.className = 'igs-flow-packets';
    packets.setAttribute('aria-hidden', 'true');
    wires.parentNode.insertBefore(packets, wires.nextSibling);
    var fxIdle = fx.textContent;
    var fxVerb = live.getAttribute('data-igs-fx-verb');
    var timers = [];
    var tick = 0;
    var running = false;
    var onScreen = false;
    var active = -1;
    var flowing = false;

    // Dotted wires: sheet into the connector, connector into the ecosystem, and a live wire to the active tile.
    var drawWires = function () {
      if (!live.offsetWidth || window.getComputedStyle(wires).display === 'none') {
        return;
      }
      var box = live.getBoundingClientRect();
      var s = sheet.getBoundingClientRect();
      var c = core.getBoundingClientRect();
      var e = eco.getBoundingClientRect();
      var f = function (n) { return n.toFixed(1); };
      var curve = function (x1, y1, x2, y2) {
        var mx = (x1 + x2) / 2;
        return 'M' + f(x1) + ',' + f(y1) + ' C' + f(mx) + ',' + f(y1) + ' ' + f(mx) + ',' + f(y2) + ' ' + f(x2) + ',' + f(y2);
      };
      var o = toast.getBoundingClientRect();
      // A wire, plus a data packet travelling along it (a CSS motion path) while it carries data.
      var dots = '';
      var wire = function (d, cls, packet) {
        if (packet && !reduce) {
          dots += '<i class="igs-packet ' + cls + '" style="offset-path: path(&quot;' + d + '&quot;)"></i>';
        }
        return '<path class="' + cls + '" d="' + d + '"/>';
      };
      var cx = c.left + c.width / 2 - box.left;
      var ox = c.right - box.left;
      var oy = c.top + c.height / 2 - box.top;
      var ex = e.left + e.width / 2 - box.left;
      var paths = wire('M' + f(cx) + ',' + f(s.bottom - box.top) + ' V' + f(c.top - box.top), 'is-in' + (flowing ? ' is-on' : ''), flowing);
      paths += wire(curve(ox, oy, e.left - box.left, e.top + e.height / 2 - box.top), '', false);
      if (active >= 0) {
        var t = targets[active].getBoundingClientRect();
        paths += wire(curve(ox, oy, t.left + t.width / 2 - box.left, t.top + t.height / 2 - box.top), 'is-on', true);
      }
      var done = toast.classList.contains('is-on');
      paths += wire('M' + f(ex) + ',' + f(e.bottom - box.top) + ' V' + f(o.top - box.top), 'is-done' + (done ? ' is-on' : ''), done && running);
      wires.setAttribute('viewBox', '0 0 ' + f(box.width) + ' ' + f(box.height));
      wires.innerHTML = paths;
      packets.innerHTML = dots;
    };

    // Google Sheets style selection box over the row being read.
    var placeSelect = function (row) {
      if (!row) {
        select.classList.remove('is-on');
        return;
      }
      var grid = select.parentNode.getBoundingClientRect();
      var first = row.cells[1].getBoundingClientRect();
      var r = row.getBoundingClientRect();
      select.style.left = (first.left - grid.left) + 'px';
      select.style.width = (r.right - first.left) + 'px';
      select.style.top = (r.top - grid.top) + 'px';
      select.style.height = r.height + 'px';
      select.classList.add('is-on');
    };

    var later = function (ms, fn) {
      timers.push(window.setTimeout(fn, ms));
    };

    var step = function () {
      var r = tick % rows.length;
      var row = rows[r];
      var targetIndex = tick % targets.length;
      var target = targets[targetIndex];
      if (r === 0) {
        toast.classList.remove('is-on');
        rows.forEach(function (el) { el.classList.remove('is-done'); });
      }
      rows.forEach(function (el) { el.classList.toggle('is-active', el === row); });
      placeSelect(row);
      // Sheets shows a formula; the Drive page names the file action instead (data-igs-fx-verb on the hero).
      fx.textContent = fxVerb ? fxVerb + ' ' + row.cells[1].textContent.trim() + ' \u2192 ' + target.getAttribute('data-name') :
        '=SYNC(A' + (r + 2) + ':C' + (r + 2) + ') \u2192 ' + target.getAttribute('data-name');
      flowing = true;
      active = -1;
      drawWires();
      later(500, function () {
        core.classList.add('is-busy');
        active = targetIndex;
        drawWires();
      });
      later(1200, function () {
        core.classList.remove('is-busy');
        target.classList.add('is-hit');
      });
      later(1950, function () {
        target.classList.remove('is-hit');
        row.classList.remove('is-active');
        row.classList.add('is-done');
        if (r === rows.length - 1) {
          placeSelect(null);
          fx.textContent = fxIdle;
          flowing = false;
          active = -1;
          toast.classList.add('is-on');
          drawWires();
        }
      });
      later(r === rows.length - 1 ? 4300 : 2150, function () {
        tick += 1;
        step();
      });
    };

    var stop = function () {
      timers.forEach(window.clearTimeout);
      timers = [];
      running = false;
      active = -1;
      flowing = false;
      all('.is-active, .is-hit, .is-busy', live).forEach(function (el) { el.classList.remove('is-active', 'is-hit', 'is-busy'); });
      placeSelect(null);
      fx.textContent = fxIdle;
      toast.classList.add('is-on');
      drawWires();
    };

    var sync = function () {
      var go = onScreen && !document.hidden;
      if (go && !running) {
        running = true;
        step();
      } else if (!go && running) {
        stop();
      }
    };

    if (window.ResizeObserver) {
      new window.ResizeObserver(drawWires).observe(live);
    } else {
      window.addEventListener('resize', drawWires);
    }
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(drawWires);
    }
    drawWires();

    if (reduce) {
      toast.classList.add('is-on');
      drawWires();
    } else if (canObserve) {
      live.classList.add('is-anim');
      new IntersectionObserver(function (entries) {
        onScreen = entries.some(function (entry) { return entry.isIntersecting; });
        sync();
      }, { threshold: 0.25 }).observe(live);
      document.addEventListener('visibilitychange', sync);
    } else {
      onScreen = true;
      sync();
    }
  }

  // Connectivity: pipelines from Google Sheets (two lanes, both directions) into IDMC and out to each group.
  var pipe = page.querySelector('[data-igs-pipe]');
  if (pipe) {
    var pipeSvg = pipe.querySelector('.igs-pipe-svg');
    var pipeDots = pipe.querySelector('.igs-pipe-dots');
    var source = pipe.querySelector('[data-igs-pipe-source]');
    var hub = pipe.querySelector('[data-igs-pipe-hub]');
    var groups = all('[data-igs-pipe-group]', pipe);
    var tones = { blue: '#1f6fff', green: '#16a34a', violet: '#7c3aed', orange: '#f97316' };

    var drawPipes = function () {
      if (!pipe.offsetWidth || window.getComputedStyle(pipeSvg).display === 'none') {
        return;
      }
      var box = pipe.getBoundingClientRect();
      var f = function (n) { return n.toFixed(1); };
      var defs = '';
      Object.keys(tones).forEach(function (tone) {
        defs += '<marker id="igs-head-' + tone + '" viewBox="0 0 10 10" refX="6" refY="5" markerWidth="5" markerHeight="5" orient="auto-start-reverse"><path class="igs-pipe-head" d="M0 0 10 5 0 10 2.5 5Z" fill="' + tones[tone] + '"/></marker>';
      });
      var body = '';
      var dots = '';
      var run = function (x1, y1, x2, y2, tone, back, delay) {
        var mx = (x1 + x2) / 2;
        var d = 'M' + f(x1) + ',' + f(y1) + ' C' + f(mx) + ',' + f(y1) + ' ' + f(mx) + ',' + f(y2) + ' ' + f(x2) + ',' + f(y2);
        body += '<path class="igs-pipe-track is-' + tone + '" d="' + d + '"/>';
        body += '<path class="igs-pipe-flow is-' + tone + (back ? ' is-back' : '') + '" d="' + d + '" ' + (back ? 'marker-start' : 'marker-end') + '="url(#igs-head-' + tone + ')"/>';
        if (!reduce) {
          [0, 1.1].forEach(function (offset) {
            dots += '<i class="igs-pipe-dot is-' + tone + (back ? ' is-back' : '') + '" style="offset-path: path(&quot;' + d + '&quot;); animation-delay: -' + (delay + offset) + 's"></i>';
          });
        }
      };
      var s = source.getBoundingClientRect();
      var h = hub.getBoundingClientRect();
      var sy = s.top + s.height / 2 - box.top;
      var hy = h.top + h.height / 2 - box.top;
      // Read lane into IDMC, write lane back to the sheet; a gap at each end leaves room for the arrowheads.
      run(s.right - box.left + 4, sy - 12, h.left - box.left - 12, hy - 12, 'green', false, 0);
      run(s.right - box.left + 12, sy + 12, h.left - box.left - 4, hy + 12, 'blue', true, .5);
      var groupTones = ['blue', 'violet', 'orange'];
      groups.forEach(function (group, i) {
        var g = group.getBoundingClientRect();
        run(h.right - box.left + 4, hy, g.left - box.left - 12, g.top + g.height / 2 - box.top, groupTones[i % 3], false, i * .4);
      });
      pipeSvg.setAttribute('viewBox', '0 0 ' + f(box.width) + ' ' + f(box.height));
      pipeSvg.innerHTML = '<defs>' + defs + '</defs>' + body;
      pipeDots.innerHTML = dots;
    };

    if (window.ResizeObserver) {
      new window.ResizeObserver(drawPipes).observe(pipe);
    } else {
      window.addEventListener('resize', drawPipes);
    }
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(drawPipes);
    }
    window.addEventListener('load', drawPipes);
    drawPipes();
  }

  // Tutorials: playlist items load into the featured player; its play button opens the video.
  var tv = page.querySelector('[data-igs-tv]');
  if (tv) {
    var stage = tv.querySelector('[data-igs-stage]');
    var picks = all('[data-igs-pick]', tv);
    picks.forEach(function (pick) {
      pick.addEventListener('click', function (event) {
        event.preventDefault();
        if (pick.getAttribute('aria-current') === 'true') {
          stage.click();
          return;
        }
        picks.forEach(function (p) { p.removeAttribute('aria-current'); });
        pick.setAttribute('aria-current', 'true');
        stage.classList.add('is-swap');
        window.setTimeout(function () {
          var id = pick.getAttribute('data-igs-pick');
          stage.setAttribute('data-igs-video', id);
          stage.href = 'https://www.youtube.com/watch?v=' + id;
          stage.querySelector('[data-igs-stage-title]').textContent = pick.querySelector('.igs-tv-item b').textContent;
          stage.querySelector('[data-igs-stage-op]').textContent = pick.getAttribute('data-op');
          stage.querySelector('[data-igs-stage-ep]').textContent = pick.getAttribute('data-ep');
          stage.classList.remove('is-swap');
        }, reduce ? 0 : 250);
      });
    });
  }

  // Tutorials open in a player over the page; without the script the cards link to YouTube.
  var modal = page.querySelector('[data-igs-modal]');
  if (modal) {
    var frame = modal.querySelector('[data-igs-frame]');
    var closeButton = modal.querySelector('[data-igs-close]');
    var opener = null;

    var onKey = function (event) {
      if (event.key === 'Escape') {
        close();
      }
    };

    var close = function () {
      modal.hidden = true;
      frame.innerHTML = '';
      document.removeEventListener('keydown', onKey);
      if (opener) {
        opener.focus();
      }
    };

    all('[data-igs-video]').forEach(function (card) {
      card.addEventListener('click', function (event) {
        event.preventDefault();
        opener = card;
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(card.getAttribute('data-igs-video')) + '?autoplay=1&rel=0';
        iframe.title = card.textContent.trim();
        iframe.allow = 'autoplay; encrypted-media; picture-in-picture; fullscreen';
        iframe.allowFullscreen = true;
        frame.innerHTML = '';
        frame.appendChild(iframe);
        modal.hidden = false;
        closeButton.focus();
        document.addEventListener('keydown', onKey);
      });
    });

    closeButton.addEventListener('click', close);
    modal.addEventListener('click', function (event) {
      if (event.target === modal) {
        close();
      }
    });
  }
}());
