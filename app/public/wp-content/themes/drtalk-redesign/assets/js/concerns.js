const concernsRoot = document.querySelector('[data-concerns]');

if (concernsRoot) {
  const track = concernsRoot.querySelector('[data-concerns-track]');
  const cards = [...concernsRoot.querySelectorAll('[data-concerns-card]')];
  const dots = [...concernsRoot.querySelectorAll('[data-concerns-dot]')];
  const nextButtons = [...concernsRoot.querySelectorAll('[data-concerns-next]')];
  const duration = 7000;
  let activeIndex = 0;
  let startTime = performance.now();
  let pausedElapsed = 0;
  let animationFrame;
  let isPaused = false;
  let pointerStartX = null;

  const cardStep = () => {
    const cardWidth = cards[0]?.getBoundingClientRect().width ?? 0;
    const gap = Number.parseFloat(window.getComputedStyle(track).columnGap) || 0;

    return cardWidth + gap;
  };

  const update = (index) => {
    activeIndex = (index + cards.length) % cards.length;
    track.style.transform = `translate3d(${-activeIndex * cardStep()}px, 0, 0)`;

    cards.forEach((card, cardIndex) => {
      card.setAttribute('aria-hidden', cardIndex === activeIndex ? 'false' : 'true');
      card.style.setProperty('--concerns-progress', 0);
    });

    dots.forEach((dot, dotIndex) => {
      dot.setAttribute('aria-selected', dotIndex === activeIndex ? 'true' : 'false');
    });

    startTime = performance.now();
    pausedElapsed = 0;
  };

  const tick = (now) => {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / duration, 1);
    cards[activeIndex].style.setProperty('--concerns-progress', progress);

    if (progress === 1) {
      update(activeIndex + 1);
    }

    animationFrame = requestAnimationFrame(tick);
  };

  nextButtons.forEach((button) => {
    button.addEventListener('click', () => update(activeIndex + 1));
  });

  dots.forEach((dot, dotIndex) => {
    dot.addEventListener('click', () => update(dotIndex));
  });

  track.addEventListener('pointerdown', (event) => {
    if (event.pointerType === 'mouse') return;
    pointerStartX = event.clientX;
    pauseTimer();
  });

  track.addEventListener('pointerup', (event) => {
    if (pointerStartX === null) return;
    const distance = event.clientX - pointerStartX;

    if (Math.abs(distance) > 40) {
      update(activeIndex + (distance < 0 ? 1 : -1));
    }

    pointerStartX = null;
    resumeTimer();
  });

  track.addEventListener('pointercancel', () => {
    pointerStartX = null;
    resumeTimer();
  });

  window.addEventListener('resize', () => update(activeIndex));

  const pauseTimer = () => {
    if (isPaused) {
      return;
    }

    pausedElapsed = performance.now() - startTime;
    isPaused = true;
    cancelAnimationFrame(animationFrame);
  };

  const resumeTimer = () => {
    if (!isPaused) {
      return;
    }

    startTime = performance.now() - pausedElapsed;
    isPaused = false;
    animationFrame = requestAnimationFrame(tick);
  };

  nextButtons.forEach((button) => {
    button.addEventListener('mouseenter', pauseTimer);
    button.addEventListener('mouseleave', resumeTimer);
  });

  update(0);
  animationFrame = requestAnimationFrame(tick);
}
