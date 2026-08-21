const howItWorksRoot = document.querySelector('[data-how-it-works]');

if (howItWorksRoot) {
  const steps = [...howItWorksRoot.querySelectorAll('[data-how-it-works-step]')];
  const demo = howItWorksRoot.querySelector('[data-how-it-works-demo]');
  const demoStates = [...howItWorksRoot.querySelectorAll('[data-how-it-works-demo-state]')];
  const rotationInterval = 7000;
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  let activeStepIndex = 0;
  let rotationTimer;

  const setActiveStep = (nextIndex) => {
    if (!steps[nextIndex] || !demo) {
      return;
    }

    activeStepIndex = nextIndex;
    demo.dataset.activeStep = String(nextIndex);

    steps.forEach((step, index) => {
      const isActive = index === nextIndex;

      step.classList.toggle('is-active', isActive);
      step.setAttribute('aria-selected', String(isActive));
      step.setAttribute('tabindex', isActive ? '0' : '-1');
    });

    demoStates.forEach((state, index) => {
      state.setAttribute('aria-hidden', String(index !== nextIndex));
    });
  };

  const restartRotation = () => {
    window.clearTimeout(rotationTimer);

    if (reducedMotion.matches || steps.length < 2) {
      return;
    }

    rotationTimer = window.setTimeout(() => {
      setActiveStep((activeStepIndex + 1) % steps.length);
      restartRotation();
    }, rotationInterval);
  };

  steps.forEach((step, index) => {
    step.addEventListener('click', () => {
      setActiveStep(index);
      restartRotation();
    });

    step.addEventListener('keydown', (event) => {
      const previousKeys = ['ArrowUp', 'ArrowLeft'];
      const nextKeys = ['ArrowDown', 'ArrowRight'];
      let nextIndex = null;

      if (previousKeys.includes(event.key)) {
        nextIndex = (index - 1 + steps.length) % steps.length;
      } else if (nextKeys.includes(event.key)) {
        nextIndex = (index + 1) % steps.length;
      } else if (event.key === 'Home') {
        nextIndex = 0;
      } else if (event.key === 'End') {
        nextIndex = steps.length - 1;
      }

      if (nextIndex === null) {
        return;
      }

      event.preventDefault();
      setActiveStep(nextIndex);
      steps[nextIndex].focus();
      restartRotation();
    });
  });

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      window.clearTimeout(rotationTimer);
      return;
    }

    restartRotation();
  });

  reducedMotion.addEventListener('change', restartRotation);

  if (steps.length && demo) {
    setActiveStep(activeStepIndex);
    restartRotation();
  }
}
