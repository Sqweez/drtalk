const menuToggle = document.querySelector('[data-menu-toggle]');
const navigation = document.querySelector('[data-primary-navigation]');

if (menuToggle && navigation) {
  menuToggle.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

    menuToggle.setAttribute('aria-expanded', String(!isOpen));
    navigation.classList.toggle('hidden', isOpen);
  });
}

const faqTabs = document.querySelector('[data-faq-tabs]');
const faqPanels = document.querySelectorAll('[data-faq-panel]');

if (faqTabs && faqPanels.length) {
  const faqTabButtons = faqTabs.querySelectorAll('[data-faq-category]');

  faqTabButtons.forEach((tabButton) => {
    tabButton.addEventListener('click', () => {
      const category = tabButton.dataset.faqCategory;

      faqTabButtons.forEach((button) => {
        const isSelected = button === tabButton;

        button.setAttribute('aria-selected', String(isSelected));
        button.classList.toggle('bg-purple-dark', isSelected);
        button.classList.toggle('text-cream', isSelected);
        button.classList.toggle('text-purple-dark', !isSelected);
      });

      faqPanels.forEach((panel) => {
        panel.hidden = panel.dataset.faqPanel !== category;
      });
    });
  });
}

document.querySelectorAll('[data-faq-question]').forEach((questionButton) => {
  questionButton.addEventListener('click', () => {
    const isExpanded = questionButton.getAttribute('aria-expanded') === 'true';
    const answer = questionButton.parentElement.querySelector('[data-faq-answer]');
    const plusIcon = questionButton.querySelector('[data-faq-plus]');

    questionButton.setAttribute('aria-expanded', String(!isExpanded));
    answer.classList.toggle('hidden', isExpanded);
    plusIcon.classList.toggle('rotate-45', !isExpanded);
  });
});
