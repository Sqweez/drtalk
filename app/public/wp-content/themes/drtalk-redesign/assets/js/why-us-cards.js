const whyUsCards = [...document.querySelectorAll('[data-why-us-card]')];

if (whyUsCards.length) {
  const hoverCapable = window.matchMedia('(hover: hover) and (pointer: fine)');

  const restartIcon = (card) => {
    const icon = card.querySelector('[data-why-us-icon-src]');
    const source = icon?.dataset.whyUsIconSrc;

    if (!icon || !source) {
      return;
    }

    icon.removeAttribute('src');
    window.requestAnimationFrame(() => {
      icon.src = source;
    });
  };

  whyUsCards.forEach((card) => {
    if (hoverCapable.matches) {
      card.addEventListener('pointerenter', () => restartIcon(card));
    }
    card.addEventListener('focusin', () => restartIcon(card));
  });
}
