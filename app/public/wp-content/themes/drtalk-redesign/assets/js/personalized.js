const personalizedRoot = document.querySelector('[data-personalized]');

if (personalizedRoot) {
  const tabs = [...personalizedRoot.querySelectorAll('[data-personalized-tab]')];
  const panel = personalizedRoot.querySelector('[data-personalized-panel]');
  const states = [...personalizedRoot.querySelectorAll('[data-personalized-state]')];
  let activeIndex = 0;
  let scrollLocked = false;

  const selectAudience = (index) => {
    if (!tabs[index]) return;
    activeIndex = index;
    panel.dataset.activeIndex = String(index);
    tabs.forEach((tab, tabIndex) => {
      const selected = tabIndex === index;
      tab.classList.toggle('is-active', selected);
      tab.setAttribute('aria-selected', String(selected));
    });
    states.forEach((state, stateIndex) =>
      state.setAttribute('aria-hidden', String(stateIndex !== index)),
    );
  };

  tabs.forEach((tab, index) => tab.addEventListener('click', () => selectAudience(index)));
  personalizedRoot.addEventListener(
    'wheel',
    (event) => {
      if (scrollLocked || Math.abs(event.deltaY) < 30) return;
      scrollLocked = true;
      selectAudience((activeIndex + (event.deltaY > 0 ? 1 : -1) + tabs.length) % tabs.length);
      window.setTimeout(() => {
        scrollLocked = false;
      }, 500);
    },
    { passive: true },
  );
}
