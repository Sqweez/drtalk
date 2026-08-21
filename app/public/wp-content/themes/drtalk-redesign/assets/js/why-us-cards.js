const whyUsCards = [...document.querySelectorAll('[data-why-us-card]')];

if (whyUsCards.length) {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const coarsePointer = window.matchMedia('(hover: none)');

  const restartIcon = (card) => {
    if (reduceMotion.matches) {
      return;
    }

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
    card.addEventListener('pointerenter', () => restartIcon(card));
    card.addEventListener('focusin', () => restartIcon(card));

    card.addEventListener('click', () => {
      if (!coarsePointer.matches) {
        return;
      }

      whyUsCards.forEach((otherCard) => {
        otherCard.classList.toggle('is-active', otherCard === card);
      });
      restartIcon(card);
    });
  });
}
