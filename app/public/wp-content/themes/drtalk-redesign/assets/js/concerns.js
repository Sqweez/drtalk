const concernsRoot = document.querySelector('[data-concerns]');

if (concernsRoot) {
  const track = concernsRoot.querySelector('[data-concerns-track]');
  const cards = [...concernsRoot.querySelectorAll('[data-concerns-card]')];
  const dots = [...concernsRoot.querySelectorAll('[data-concerns-dot]')];
  const nextButtons = [...concernsRoot.querySelectorAll('[data-concerns-next]')];
  const duration = 7000;
  let activeIndex = 0;
  let startTime = performance.now();
  let animationFrame;

  const update = (index) => {
    activeIndex = (index + cards.length) % cards.length;
    track.style.transform = `translate3d(${-activeIndex * 1040}px, 0, 0)`;

    cards.forEach((card, cardIndex) => {
      card.setAttribute('aria-hidden', cardIndex === activeIndex ? 'false' : 'true');
      card.style.setProperty('--concerns-progress', 0);
    });

    dots.forEach((dot, dotIndex) => {
      dot.setAttribute('aria-selected', dotIndex === activeIndex ? 'true' : 'false');
    });

    startTime = performance.now();
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

  update(0);
  animationFrame = requestAnimationFrame(tick);
}
