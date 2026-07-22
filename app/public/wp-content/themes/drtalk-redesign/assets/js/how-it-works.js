const howItWorksRoot = document.querySelector('[data-how-it-works]');

if (howItWorksRoot) {
  const steps = [...howItWorksRoot.querySelectorAll('[data-how-it-works-step]')];
  const demo = howItWorksRoot.querySelector('[data-how-it-works-demo]');
  const demoStates = [...howItWorksRoot.querySelectorAll('[data-how-it-works-demo-state]')];
  const rotationInterval = 7000;
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
      step.setAttribute('aria-pressed', String(isActive));
    });

    demoStates.forEach((state, index) => {
      state.setAttribute('aria-hidden', String(index !== nextIndex));
    });
  };

  const restartRotation = () => {
    window.clearTimeout(rotationTimer);
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
  });

  if (steps.length && demo) {
    setActiveStep(activeStepIndex);
    restartRotation();
  }
}
