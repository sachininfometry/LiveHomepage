(function () {
	'use strict';

	function initSectionReveals() {
		var revealTargets = document.querySelectorAll(
			'.dematic-challenge, .dematic-solution, .dematic-outcomes, .dematic-tech, .dematic-final-cta, .infometry-custom-footer'
		);
		if (!revealTargets.length) {
			return;
		}

		var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		if (prefersReducedMotion || !('IntersectionObserver' in window)) {
			revealTargets.forEach(function (target) { target.classList.add('is-visible'); });
			return;
		}

		revealTargets.forEach(function (target) { target.classList.add('dematic-motion-ready'); });
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) {
					return;
				}

				entry.target.classList.add('is-visible');
				observer.unobserve(entry.target);
			});
		}, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });

		revealTargets.forEach(function (target) { observer.observe(target); });
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initSectionReveals);
	} else {
		initSectionReveals();
	}
}());
