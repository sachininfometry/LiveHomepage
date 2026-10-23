(function () {
	'use strict';

	function initToc() {
		var toc = document.querySelector('.ifb-toc');
		if (!toc) {
			return;
		}

		var box = toc.querySelector('.ifb-toc-box');
		var links = Array.prototype.slice.call(toc.querySelectorAll('a[href^="#"]'));
		var headings = links
			.map(function (link) { return document.getElementById(decodeURIComponent(link.getAttribute('href').slice(1))); })
			.filter(Boolean);
		var compact = window.matchMedia('(max-width: 1100px)');

		// Collapsed by default on tablet/mobile, open on desktop.
		function syncOpenState() {
			if (box) {
				box.open = !compact.matches;
			}
		}
		syncOpenState();
		if (compact.addEventListener) {
			compact.addEventListener('change', syncOpenState);
		}

		// Keep the desktop panel always open (summary is a label there, not a toggle).
		if (box) {
			box.querySelector('summary').addEventListener('click', function (event) {
				if (!compact.matches) {
					event.preventDefault();
				}
			});
		}

		function setActive(id) {
			links.forEach(function (link) {
				var active = link.getAttribute('href') === '#' + id;
				link.classList.toggle('is-active', active);
				if (active) {
					link.setAttribute('aria-current', 'true');
				} else {
					link.removeAttribute('aria-current');
				}
			});
		}

		links.forEach(function (link) {
			link.addEventListener('click', function () {
				setActive(decodeURIComponent(link.getAttribute('href').slice(1)));
				if (compact.matches && box) {
					box.open = false;
				}
			});
		});

		if (!headings.length || !('IntersectionObserver' in window)) {
			return;
		}

		var progress = toc.querySelector('.ifb-toc-progress i');
		var article = document.querySelector('.ifb-content');

		// The active section is the last heading that has scrolled past the top band.
		function update() {
			if (progress && article) {
				var rect = article.getBoundingClientRect();
				var span = rect.height - window.innerHeight * 0.6;
				var done = span > 0 ? Math.min(1, Math.max(0, -rect.top / span)) : 1;
				progress.style.width = (done * 100).toFixed(1) + '%';
			}
			var current = headings[0];
			var line = 140;
			headings.forEach(function (heading) {
				if (heading.getBoundingClientRect().top - line <= 0) {
					current = heading;
				}
			});
			setActive(current.id);
		}

		var ticking = false;
		window.addEventListener('scroll', function () {
			if (!ticking) {
				ticking = true;
				window.requestAnimationFrame(function () {
					update();
					ticking = false;
				});
			}
		}, { passive: true });
		update();
	}

	// Thin bar at the top of the viewport showing how far through the article the reader is.
	function initProgress() {
		var bar = document.querySelector('.ifb-progress i');
		var article = document.querySelector('.ifb-content');
		if (!bar || !article) {
			return;
		}
		var ticking = false;
		function update() {
			var rect = article.getBoundingClientRect();
			var span = rect.height - window.innerHeight * 0.6;
			var done = span > 0 ? Math.min(1, Math.max(0, -rect.top / span)) : 1;
			bar.style.width = (done * 100).toFixed(1) + '%';
			ticking = false;
		}
		window.addEventListener('scroll', function () {
			if (!ticking) {
				ticking = true;
				window.requestAnimationFrame(update);
			}
		}, { passive: true });
		update();
	}

	function initCopyLink() {
		document.querySelectorAll('[data-ifb-copy]').forEach(function (button) {
			button.addEventListener('click', function () {
				var url = window.location.href.split('#')[0];
				var done = function () {
					button.classList.add('is-copied');
					window.setTimeout(function () { button.classList.remove('is-copied'); }, 1600);
				};
				if (navigator.clipboard && navigator.clipboard.writeText) {
					navigator.clipboard.writeText(url).then(done, function () {});
				} else {
					window.prompt('Copy this link', url);
				}
			});
		});
	}

	function init() {
		initToc();
		initProgress();
		initCopyLink();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
}());
