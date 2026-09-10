const menuToggle = document.querySelector('[data-menu-toggle]');
const navigation = document.querySelector('[data-primary-navigation]');

if (menuToggle && navigation) {
  let closeTimer;

  const setMenuState = (isOpen) => {
    window.clearTimeout(closeTimer);
    menuToggle.setAttribute('aria-expanded', String(isOpen));
    navigation.setAttribute('aria-hidden', String(!isOpen));
    document.documentElement.classList.toggle('mobile-menu-open', isOpen);

    if (isOpen) {
      navigation.classList.remove('hidden');
      navigation.getBoundingClientRect();
      navigation.classList.add('is-open');
      return;
    }

    navigation.classList.remove('is-open');

    const transitionDuration = 320;

    closeTimer = window.setTimeout(() => {
      if (menuToggle.getAttribute('aria-expanded') === 'false') {
        navigation.classList.add('hidden');
      }
    }, transitionDuration);
  };

  menuToggle.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

    setMenuState(!isOpen);
  });

  navigation.addEventListener('click', (event) => {
    if (event.target.closest('a')) {
      setMenuState(false);
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      setMenuState(false);
      menuToggle.focus();
    }
  });

  window.addEventListener('resize', () => {
    if (window.matchMedia('(min-width: 64rem)').matches) {
      setMenuState(false);
    }
  });
}
