const responsivenessRoot = document.querySelector('[data-responsiveness]');

if (responsivenessRoot) {
  const counters = [...responsivenessRoot.querySelectorAll('[data-count-target]')];
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const setCounter = (counter, value) => {
    const suffix = counter.dataset.countSuffix || '';
    counter.textContent = `${Math.round(value).toLocaleString('en-US')}${suffix}`;
  };

  const animateCounters = () => {
    counters.forEach((counter) => {
      const target = Number(counter.dataset.countTarget);
      const start = Math.floor(Math.random() * Math.max(1, target * 0.35));

      if (reducedMotion) {
        setCounter(counter, target);
        return;
      }

      const startedAt = performance.now();
      const duration = 900;
      const tick = (now) => {
        const progress = Math.min((now - startedAt) / duration, 1);
        setCounter(counter, start + (target - start) * (1 - (1 - progress) ** 3));

        if (progress < 1) {
          window.requestAnimationFrame(tick);
        }
      };

      window.requestAnimationFrame(tick);
    });
  };

  const observer = new IntersectionObserver(
    (entries) => {
      if (entries.some((entry) => entry.isIntersecting)) {
        animateCounters();
        observer.disconnect();
      }
    },
    { threshold: 0.35 },
  );

  observer.observe(responsivenessRoot);
}
