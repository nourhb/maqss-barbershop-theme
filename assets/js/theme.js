/**
 * Maqss theme script: back-to-top, scroll reveal, animated counters.
 * Vanilla JS. Honors prefers-reduced-motion and degrades without JS.
 */
(function () {
	'use strict';

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* Back-to-top visibility + smooth scroll. */
	var toTop = document.getElementById('maqssToTop');
	if (toTop) {
		var onScroll = function () {
			if (window.scrollY > 600) {
				toTop.classList.add('show');
			} else {
				toTop.classList.remove('show');
			}
		};
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();

		toTop.addEventListener('click', function () {
			window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
		});
	}

	if (reduceMotion) {
		return;
	}

	/* Scroll reveal for .maqss-reveal elements. */
	var revealEls = document.querySelectorAll('.maqss-reveal');
	if ('IntersectionObserver' in window && revealEls.length) {
		var revealObserver = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						revealObserver.unobserve(entry.target);
					}
				});
			},
			{ threshold: 0.12 }
		);
		revealEls.forEach(function (el) {
			revealObserver.observe(el);
		});
	} else {
		revealEls.forEach(function (el) {
			el.classList.add('is-visible');
		});
	}

	/* Animated count-up for [data-count] stats. Final values stay in markup for no-JS. */
	var counters = document.querySelectorAll('[data-count]');
	if ('IntersectionObserver' in window && counters.length) {
		var easeOut = function (t) {
			return 1 - Math.pow(1 - t, 3);
		};
		var animate = function (el) {
			var target = parseInt(el.getAttribute('data-count'), 10);
			var suffix = el.getAttribute('data-suffix') || '';
			var duration = 1400;
			var start = null;

			var step = function (now) {
				if (!start) {
					start = now;
				}
				var progress = Math.min((now - start) / duration, 1);
				var value = Math.round(easeOut(progress) * target);
				el.textContent = value.toLocaleString('en-US') + suffix;
				if (progress < 1) {
					requestAnimationFrame(step);
				}
			};
			requestAnimationFrame(step);
		};
		var counterObserver = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						animate(entry.target);
						counterObserver.unobserve(entry.target);
					}
				});
			},
			{ threshold: 0.4 }
		);
		counters.forEach(function (el) {
			counterObserver.observe(el);
		});
	}
})();
