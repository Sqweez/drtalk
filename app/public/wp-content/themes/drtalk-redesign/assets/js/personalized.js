const personalizedRoot = document.querySelector('[data-personalized]');

if (personalizedRoot) {
  const tabs = [...personalizedRoot.querySelectorAll('[data-personalized-tab]')];
  const panel = personalizedRoot.querySelector('[data-personalized-panel]');
  const states = [...personalizedRoot.querySelectorAll('[data-personalized-state]')];
  const desktop = window.matchMedia('(min-width: 64rem)');
  let activeIndex = 0;
  let scrollFrame = 0;

  const selectAudience = (index) => {
    if (!tabs[index]) return;
    if (index !== activeIndex) {
      personalizedRoot.dataset.personaDirection = index > activeIndex ? 'next' : 'previous';
    }
    activeIndex = index;
    panel.dataset.activeIndex = String(index);
    tabs.forEach((tab, tabIndex) => {
      const selected = tabIndex === index;
      tab.classList.toggle('is-active', selected);
      tab.setAttribute('aria-selected', String(selected));
    });
    states.forEach((state, stateIndex) => {
      state.setAttribute('aria-hidden', String(desktop.matches && stateIndex !== index));
    });
  };

  tabs.forEach((tab, index) => tab.addEventListener('click', () => selectAudience(index)));
  tabs.forEach((tab, index) => {
    tab.addEventListener('keydown', (event) => {
      if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
      event.preventDefault();
      const nextIndex =
        event.key === 'Home'
          ? 0
          : event.key === 'End'
            ? tabs.length - 1
            : (index + (event.key === 'ArrowRight' ? 1 : -1) + tabs.length) % tabs.length;
      selectAudience(nextIndex);
      tabs[nextIndex].focus();
    });
  });
  const syncAudienceToScroll = () => {
    scrollFrame = 0;
    if (desktop.matches) return;

    const focusLine = Math.min(window.innerHeight * 0.38, 320);
    let closestIndex = activeIndex;
    let closestDistance = Number.POSITIVE_INFINITY;

    states.forEach((state, index) => {
      const bounds = state.getBoundingClientRect();
      const distance = Math.abs(bounds.top + Math.min(bounds.height * 0.25, 140) - focusLine);

      if (bounds.bottom > 0 && bounds.top < window.innerHeight && distance < closestDistance) {
        closestIndex = index;
        closestDistance = distance;
      }
    });

    if (closestIndex !== activeIndex) selectAudience(closestIndex);
  };

  const queueScrollSync = () => {
    if (!scrollFrame) scrollFrame = window.requestAnimationFrame(syncAudienceToScroll);
  };

  window.addEventListener('scroll', queueScrollSync, { passive: true });
  window.addEventListener('resize', queueScrollSync, { passive: true });

  desktop.addEventListener('change', () => {
    selectAudience(activeIndex);
    queueScrollSync();
  });
  selectAudience(0);
  queueScrollSync();
}
