const faqRoot = document.querySelector('[data-faq]');

if (faqRoot) {
  const faqTabs = faqRoot.querySelector('[data-faq-tabs]');
  const faqContent = faqRoot.querySelector('[data-faq-content]');
  const faqData = faqRoot.querySelector('[data-faq-data]');
  const plusIconUrl = faqRoot.dataset.faqIcon;
  const categories = JSON.parse(faqData.textContent);
  let activeCategoryId = categories[0]?.id;
  let categoryTransitionTimer;

  const renderTabs = () => {
    faqTabs.replaceChildren();

    categories.forEach((category) => {
      const isSelected = category.id === activeCategoryId;
      const tab = document.createElement('button');

      tab.type = 'button';
      tab.id = `faq-tab-${category.id}`;
      tab.role = 'tab';
      tab.textContent = category.label;
      tab.setAttribute('aria-selected', String(isSelected));
      tab.setAttribute('aria-controls', `faq-panel-${category.id}`);
      tab.className =
        'flex h-10 cursor-pointer items-center justify-center rounded-[20px] bg-[#ede8e1] px-4 py-2 text-xs font-bold leading-4 transition-colors duration-200 lg:text-base lg:leading-6';
      tab.classList.toggle('bg-purple-dark', isSelected);
      tab.classList.toggle('text-cream', isSelected);
      tab.classList.toggle('bg-[#ede8e1]', !isSelected);
      tab.classList.toggle('text-purple-dark', !isSelected);
      tab.addEventListener('click', () => changeCategory(category.id));

      faqTabs.append(tab);
    });
  };

  const renderQuestions = (category) => {
    const panel = document.createElement('div');

    panel.id = `faq-panel-${category.id}`;
    panel.role = 'tabpanel';
    panel.setAttribute('aria-labelledby', `faq-tab-${category.id}`);

    category.questions.forEach((item, index) => {
      const answerId = `faq-answer-${category.id}-${index + 1}`;
      const row = document.createElement('div');
      const button = document.createElement('button');
      const question = document.createElement('span');
      const plusIcon = document.createElement('img');
      const answerWrapper = document.createElement('div');
      const answer = document.createElement('p');

      row.className = 'border-b border-[#d6d1cb]';
      button.type = 'button';
      button.className =
        'flex w-full cursor-pointer items-center gap-4 px-2 py-6 text-left lg:px-6';
      button.setAttribute('aria-expanded', 'false');
      button.setAttribute('aria-controls', answerId);
      question.className = 'flex-1 text-lg font-bold leading-6 text-purple-dark';
      question.textContent = item.question;
      plusIcon.className = 'size-6 shrink-0 transition-transform duration-300 ease-out';
      plusIcon.src = plusIconUrl;
      plusIcon.width = 24;
      plusIcon.height = 24;
      plusIcon.alt = '';
      plusIcon.setAttribute('aria-hidden', 'true');
      answerWrapper.id = answerId;
      answerWrapper.className =
        'grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out';
      answer.className = 'min-h-0 overflow-hidden px-6 text-lg leading-6 text-purple-dark/75';
      answer.innerHTML = item.answer;

      button.addEventListener('click', () => {
        const isExpanded = button.getAttribute('aria-expanded') === 'true';

        button.setAttribute('aria-expanded', String(!isExpanded));
        answerWrapper.classList.toggle('grid-rows-[0fr]', isExpanded);
        answerWrapper.classList.toggle('grid-rows-[1fr]', !isExpanded);
        answer.classList.toggle('pb-6', !isExpanded);
        plusIcon.classList.toggle('rotate-45', !isExpanded);
      });

      button.append(question, plusIcon);
      answerWrapper.append(answer);
      row.append(button, answerWrapper);
      panel.append(row);
    });

    faqContent.replaceChildren(panel);
  };

  faqTabs.addEventListener('keydown', (event) => {
    if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
    const tabs = [...faqTabs.querySelectorAll('[role="tab"]')];
    const currentIndex = tabs.indexOf(document.activeElement);

    if (currentIndex < 0) return;
    event.preventDefault();
    const nextIndex =
      event.key === 'Home'
        ? 0
        : event.key === 'End'
          ? tabs.length - 1
          : (currentIndex + (event.key === 'ArrowRight' ? 1 : -1) + tabs.length) % tabs.length;
    tabs[nextIndex].click();
    tabs[nextIndex].focus();
  });

  const changeCategory = (categoryId) => {
    if (categoryId === activeCategoryId) {
      return;
    }

    const nextCategory = categories.find((category) => category.id === categoryId);

    if (!nextCategory) {
      return;
    }

    window.clearTimeout(categoryTransitionTimer);
    activeCategoryId = categoryId;
    renderTabs();
    faqContent.setAttribute('aria-busy', 'true');
    faqContent.classList.add('translate-y-2', 'opacity-0');

    categoryTransitionTimer = window.setTimeout(() => {
      renderQuestions(nextCategory);
      window.requestAnimationFrame(() => faqContent.classList.remove('translate-y-2', 'opacity-0'));
      faqContent.removeAttribute('aria-busy');
    }, 200);
  };

  renderTabs();
  renderQuestions(categories[0]);
}
