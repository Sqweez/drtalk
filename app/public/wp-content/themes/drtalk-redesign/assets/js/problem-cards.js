const problemSection = document.querySelector('[data-problem-section]');

if (problemSection) {
  const cards = [...problemSection.querySelectorAll('[data-problem-card]')];
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const coarsePointer = window.matchMedia('(hover: none)');

  const restartIcon = (card) => {
    if (reduceMotion.matches) {
      return;
    }

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
    card.addEventListener('pointerenter', () => restartIcon(card));
    card.addEventListener('focusin', () => restartIcon(card));

    card.addEventListener('click', () => {
      if (!coarsePointer.matches) {
        return;
      }

      cards.forEach((otherCard) => {
        otherCard.classList.toggle('is-active', otherCard === card);
      });
      restartIcon(card);
    });
  });
}
