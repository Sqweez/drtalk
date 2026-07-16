const menuToggle = document.querySelector('[data-menu-toggle]');
const navigation = document.querySelector('[data-primary-navigation]');

if (menuToggle && navigation) {
  menuToggle.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

    menuToggle.setAttribute('aria-expanded', String(!isOpen));
    navigation.classList.toggle('hidden', isOpen);
  });
}
