/*
 * Press release hero: the Conversa answer in the Slack window switches between
 * Chart / Table / SQL views and redraws its chart as bar, line, area or pie, and
 * plays the four steps of an answer on a loop until a visitor takes over.
 * The bar chart is rendered by the template, so the page looks complete before
 * (or without) this script.
 */
(function () {
	'use strict';

	var DATA = [
		{ label: 'Cloud Platform', value: 57.7 },
		{ label: 'Data Products', value: 33.7 },
		{ label: 'Professional Services', value: 30.0 }
	];
	var PIE_COLORS = ['#ff8a26', '#2fb4ff', '#8b5cf6'];
	var W = 560, LEFT = 44, RIGHT = 10, TOP = 16, PLOT = 92, MAX = 60;
	var BASE = TOP + PLOT;
	var BAND = (W - LEFT - RIGHT) / DATA.length;
	var TOTAL = DATA.reduce(function (sum, d) { return sum + d.value; }, 0);

	function y(value) { return TOP + PLOT * (1 - value / MAX); }
	function cx(index) { return LEFT + BAND * index + BAND / 2; }
	function money(value) { return '$' + value.toFixed(1) + 'M'; }
	function esc(text) { return String(text).replace(/&/g, '&amp;').replace(/</g, '&lt;'); }

	function axes() {
		var out = '<defs><linearGradient id="spr-bar-grad" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffb15c"/><stop offset="1" stop-color="#f2600f"/></linearGradient></defs>';
		[0, 20, 40, 60].forEach(function (tick) {
			var ty = y(tick).toFixed(1);
			out += '<line class="spr-grid" x1="' + LEFT + '" x2="' + (W - RIGHT) + '" y1="' + ty + '" y2="' + ty + '"/>' +
				'<text class="spr-tick" x="36" y="' + (y(tick) + 4).toFixed(1) + '">' + (tick ? '$' + tick + 'M' : '0') + '</text>';
		});
		DATA.forEach(function (d, i) {
			out += '<text class="spr-lab" x="' + cx(i).toFixed(1) + '" y="126">' + esc(d.label) + '</text>';
		});
		return out;
	}

	function values() {
		return DATA.map(function (d, i) {
			return '<text class="spr-val" x="' + cx(i).toFixed(1) + '" y="' + (y(d.value) - 8).toFixed(1) + '">' + money(d.value) + '</text>';
		}).join('');
	}

	function points() {
		return DATA.map(function (d, i) { return cx(i).toFixed(1) + ',' + y(d.value).toFixed(1); });
	}

	var DRAW = {
		bar: function () {
			return axes() + DATA.map(function (d, i) {
				var w = BAND * 0.36;
				return '<rect class="spr-bar spr-anim" x="' + (cx(i) - w / 2).toFixed(1) + '" y="' + y(d.value).toFixed(1) + '" width="' + w.toFixed(1) +
					'" height="' + (BASE - y(d.value)).toFixed(1) + '" rx="6"><title>' + esc(d.label) + ': ' + money(d.value) + '</title></rect>';
			}).join('') + values();
		},
		line: function () {
			return axes() + '<polyline class="spr-line spr-fade" points="' + points().join(' ') + '"/>' + dots() + values();
		},
		area: function () {
			var pts = points();
			var area = 'M' + cx(0).toFixed(1) + ',' + BASE + ' L' + pts.join(' L') + ' L' + cx(DATA.length - 1).toFixed(1) + ',' + BASE + ' Z';
			return axes() + '<path class="spr-area spr-fade" d="' + area + '"/><polyline class="spr-line spr-fade" points="' + pts.join(' ') + '"/>' + dots() + values();
		},
		pie: function () {
			var r = 48, ox = 170, oy = 62, angle = -Math.PI / 2, out = '';
			DATA.forEach(function (d, i) {
				var sweep = d.value / TOTAL * Math.PI * 2;
				var x1 = ox + r * Math.cos(angle), y1 = oy + r * Math.sin(angle);
				angle += sweep;
				var x2 = ox + r * Math.cos(angle), y2 = oy + r * Math.sin(angle);
				out += '<path class="spr-slice spr-fade" fill="' + PIE_COLORS[i] + '" d="M' + ox + ',' + oy + ' L' + x1.toFixed(2) + ',' + y1.toFixed(2) +
					' A' + r + ',' + r + ' 0 ' + (sweep > Math.PI ? 1 : 0) + ' 1 ' + x2.toFixed(2) + ',' + y2.toFixed(2) + ' Z"><title>' +
					esc(d.label) + ': ' + money(d.value) + ' (' + (d.value / TOTAL * 100).toFixed(1) + '%)</title></path>';
				var ly = 30 + i * 30;
				out += '<rect x="290" y="' + (ly - 9) + '" width="10" height="10" rx="2" fill="' + PIE_COLORS[i] + '"/>' +
					'<text class="spr-legend" x="306" y="' + ly + '">' + esc(d.label) + '</text>' +
					'<text class="spr-legend-val" x="306" y="' + (ly + 14) + '">' + money(d.value) + ' &#183; ' + (d.value / TOTAL * 100).toFixed(1) + '%</text>';
			});
			return out;
		}
	};

	function dots() {
		return DATA.map(function (d, i) {
			return '<circle class="spr-dot spr-fade" cx="' + cx(i).toFixed(1) + '" cy="' + y(d.value).toFixed(1) + '" r="4.5"><title>' + esc(d.label) + ': ' + money(d.value) + '</title></circle>';
		}).join('');
	}

	var LABELS = { bar: 'Bar', line: 'Line', area: 'Area', pie: 'Pie' };
	var STEPS = ['Ask in Slack', 'Summary & KPIs', 'Interactive charts', 'Table & SQL'];

	function wait(ms) {
		return new Promise(function (resolve) { setTimeout(resolve, ms); });
	}

	function init(dash) {
		var svg = dash.querySelector('[data-chart]');
		var types = dash.querySelector('[data-types]');
		var tabs = dash.querySelectorAll('[role="tab"]');
		var panels = dash.querySelectorAll('[data-panel]');
		if (!svg || !types) {
			return;
		}

		function setType(type) {
			types.querySelectorAll('[data-type]').forEach(function (other) {
				var on = other.getAttribute('data-type') === type;
				other.classList.toggle('is-active', on);
				other.setAttribute('aria-pressed', on ? 'true' : 'false');
			});
			svg.innerHTML = DRAW[type]();
			svg.setAttribute('aria-label', LABELS[type] + ' chart: ' + DATA.map(function (d) { return d.label + ' ' + money(d.value); }).join(', '));
		}

		function setTab(name) {
			tabs.forEach(function (tab) { tab.setAttribute('aria-selected', tab.getAttribute('data-tab') === name ? 'true' : 'false'); });
			panels.forEach(function (panel) { panel.hidden = panel.getAttribute('data-panel') !== name; });
			types.classList.toggle('is-off', name !== 'chart');
		}

		// Every panel gets the tallest panel's height, so switching tabs never moves the page.
		function lockPanelHeight() {
			var tallest = 0;
			panels.forEach(function (panel) { panel.style.minHeight = ''; });
			panels.forEach(function (panel) {
				var wasHidden = panel.hidden;
				panel.hidden = false;
				tallest = Math.max(tallest, panel.offsetHeight);
				panel.hidden = wasHidden;
			});
			panels.forEach(function (panel) { panel.style.minHeight = tallest + 'px'; });
		}
		lockPanelHeight();
		window.addEventListener('resize', lockPanelHeight);

		var player = autoplay(dash, setType, setTab);

		types.addEventListener('click', function (event) {
			var button = event.target.closest('[data-type]');
			if (!button || !DRAW[button.getAttribute('data-type')]) {
				return;
			}
			player.stop();
			setType(button.getAttribute('data-type'));
		});

		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				player.stop();
				setTab(tab.getAttribute('data-tab'));
			});
		});
	}

	/*
	 * Plays the answer like a short video, one step at a time, and loops:
	 * 1 the question is typed, 2 Conversa thinks, then the summary and KPIs arrive,
	 * 3 the chart grows and switches through its types, 4 the table and SQL open.
	 * It starts when the window scrolls into view and stops for good as soon as a
	 * visitor clicks a tab or chart type, leaving the full answer on screen.
	 */
	function autoplay(dash, setType, setTab) {
		var stage = dash.closest('.spr-dash-stage') || dash;
		var none = { stop: function () {} };
		var question = dash.querySelector('[data-type-text]');
		var label = dash.querySelector('[data-step-label]');
		var labelText = dash.querySelector('[data-step-text]');
		if (!window.Promise || !question || !label || !labelText ||
			(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
			return none;
		}

		var seq = {};
		stage.querySelectorAll('[data-seq]').forEach(function (el) { seq[el.getAttribute('data-seq')] = el; });
		var kpis = seq.kpis ? seq.kpis.querySelectorAll('p') : [];
		var bars = label.querySelectorAll('.spr-dash-step-bars i');
		var fullQuestion = question.textContent;
		var kpiValues = Array.prototype.map.call(kpis, function (p) { var b = p.querySelector('b'); return b ? b.textContent : ''; });
		var run = 0;
		var stopped = false;

		function show(name, on) {
			if (seq[name]) {
				seq[name].classList.toggle('is-in', on !== false);
			}
		}

		function step(index, ms) {
			label.style.setProperty('--spr-step-ms', ms + 'ms');
			Array.prototype.forEach.call(bars, function (bar, i) {
				bar.classList.remove('is-now');
				bar.classList.toggle('is-done', i < index);
			});
			if (bars[index]) {
				void bars[index].offsetWidth;
				bars[index].classList.add('is-now');
			}
			labelText.textContent = (index + 1) + '/4 · ' + STEPS[index];
		}

		// The untyped rest of the question stays in place (transparent), so the line never re-wraps.
		function typed(count) {
			question.innerHTML = '<span class="spr-type-done">' + esc(fullQuestion.slice(0, count)) + '</span><span class="spr-type-rest">' + esc(fullQuestion.slice(count)) + '</span>';
		}

		function countUp(b, text, ms) {
			var match = /^([^0-9]*)([0-9.]+)(.*)$/.exec(text);
			if (!match) {
				return;
			}
			var target = parseFloat(match[2]);
			var decimals = (match[2].split('.')[1] || '').length;
			var began = performance.now();
			(function frame(now) {
				var k = Math.min(1, Math.max(0, (now - began) / ms));
				k = 1 - Math.pow(1 - k, 3);
				b.textContent = match[1] + (target * k).toFixed(decimals) + match[3];
				if (k < 1 && !stopped) {
					requestAnimationFrame(frame);
				} else {
					b.textContent = text;
				}
			}(began));
		}

		function tap(selector) {
			var button = dash.querySelector(selector);
			if (!button) {
				return;
			}
			button.classList.add('is-tap');
			setTimeout(function () { button.classList.remove('is-tap'); }, 450);
		}

		function reset() {
			Object.keys(seq).forEach(function (name) { show(name, false); });
			Array.prototype.forEach.call(kpis, function (p) { p.classList.remove('is-in'); });
			setTab('chart');
			setType('bar');
			typed(0);
		}

		function play(id) {
			// Every pause rejects once this run is stopped or replaced, which ends the chain.
			function pause(ms) {
				return wait(ms).then(function () {
					if (stopped || id !== run) {
						throw id;
					}
				});
			}
			function each(list, fn) {
				return Array.prototype.reduce.call(list, function (chain, item, i) {
					return chain.then(function () { return fn(item, i); });
				}, Promise.resolve());
			}

			var chars = 0;
			function typeNext() {
				if (chars >= fullQuestion.length) {
					return pause(500);
				}
				chars += 1;
				typed(chars);
				return pause(28).then(typeNext);
			}

			reset();
			stage.classList.remove('is-fading');
			step(0, 2650);
			show('ask');
			stage.classList.add('is-typing');

			return pause(400).then(typeNext).then(function () {
				stage.classList.remove('is-typing');
				step(1, 3600);
				show('reply');
				stage.classList.add('is-thinking');
				return pause(1300);
			}).then(function () {
				stage.classList.remove('is-thinking');
				show('summary');
				show('chip-answer');
				return pause(700);
			}).then(function () {
				show('kpis');
				return each(kpis, function (p, i) {
					p.classList.add('is-in');
					var b = p.querySelector('b');
					if (b) {
						countUp(b, kpiValues[i], 900);
					}
					return pause(260);
				});
			}).then(function () {
				return pause(700);
			}).then(function () {
				step(2, 6400);
				show('card');
				setType('bar');
				return pause(1900);
			}).then(function () {
				return each(['line', 'area', 'pie'], function (type) {
					tap('[data-type="' + type + '"]');
					setType(type);
					return pause(1500);
				});
			}).then(function () {
				step(3, 5800);
				tap('[data-tab="table"]');
				setTab('table');
				return pause(2200);
			}).then(function () {
				tap('[data-tab="sql"]');
				setTab('sql');
				show('chip-sql');
				return pause(3000);
			}).then(function () {
				stage.classList.add('is-fading');
				return pause(600);
			}).then(function () {
				run += 1;
				play(run);
			}).catch(function () {});
		}

		function stop() {
			if (stopped) {
				return;
			}
			stopped = true;
			run += 1;
			stage.classList.remove('is-auto', 'is-typing', 'is-thinking', 'is-fading');
			question.textContent = fullQuestion;
			Array.prototype.forEach.call(kpis, function (p, i) {
				var b = p.querySelector('b');
				if (b) {
					b.textContent = kpiValues[i];
				}
			});
			label.hidden = true;
		}

		function begin() {
			if (stopped) {
				return;
			}
			// The full answer is on screen until now: fade it out first so the first run starts cleanly.
			stage.classList.add('is-fading');
			run += 1;
			var id = run;
			wait(450).then(function () {
				if (stopped || id !== run) {
					return;
				}
				stage.classList.add('is-auto');
				label.hidden = false;
				play(id);
			});
		}

		if ('IntersectionObserver' in window) {
			var seen = new IntersectionObserver(function (entries) {
				if (entries.some(function (entry) { return entry.isIntersecting; })) {
					seen.disconnect();
					begin();
				}
			}, { threshold: 0.25 });
			seen.observe(dash);
		} else {
			begin();
		}

		return { stop: stop };
	}

	function start() {
		document.querySelectorAll('[data-spr-dash]').forEach(init);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', start);
	} else {
		start();
	}
}());
