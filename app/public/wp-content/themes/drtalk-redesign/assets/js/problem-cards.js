const problemSection = document.querySelector('[data-problem-section]');

if (problemSection) {
  const cards = [...problemSection.querySelectorAll('[data-problem-card]')];
  const hoverCapable = window.matchMedia('(hover: hover) and (pointer: fine)');

  const restartIcon = (card) => {
    const icon = card.querySelector('[data-problem-icon-src]');
    const source = icon?.dataset.problemIconSrc;

    if (!icon || !source) {
      return;
    }

    icon.removeAttribute('src');
    window.requestAnimationFrame(() => {
      icon.src = source;
    });
  };

  cards.forEach((card) => {
    if (hoverCapable.matches) {
      card.addEventListener('pointerenter', () => restartIcon(card));
    }
    card.addEventListener('focusin', () => restartIcon(card));
  });
}
