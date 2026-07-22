(() => {
  // assets/js/menu.js
  var menuToggle = document.querySelector("[data-menu-toggle]");
  var navigation = document.querySelector("[data-primary-navigation]");
  if (menuToggle && navigation) {
    menuToggle.addEventListener("click", () => {
      const isOpen = menuToggle.getAttribute("aria-expanded") === "true";
      menuToggle.setAttribute("aria-expanded", String(!isOpen));
      navigation.classList.toggle("hidden", isOpen);
    });
  }

  // assets/js/faq.js
  var faqRoot = document.querySelector("[data-faq]");
  var _a;
  if (faqRoot) {
    const faqTabs = faqRoot.querySelector("[data-faq-tabs]");
    const faqContent = faqRoot.querySelector("[data-faq-content]");
    const faqData = faqRoot.querySelector("[data-faq-data]");
    const plusIconUrl = faqRoot.dataset.faqIcon;
    const categories = JSON.parse(faqData.textContent);
    let activeCategoryId = (_a = categories[0]) == null ? void 0 : _a.id;
    let categoryTransitionTimer;
    const renderTabs = () => {
      faqTabs.replaceChildren();
      categories.forEach((category) => {
        const isSelected = category.id === activeCategoryId;
        const tab = document.createElement("button");
        tab.type = "button";
        tab.id = `faq-tab-${category.id}`;
        tab.role = "tab";
        tab.textContent = category.label;
        tab.setAttribute("aria-selected", String(isSelected));
        tab.setAttribute("aria-controls", `faq-panel-${category.id}`);
        tab.className = "flex h-10 cursor-pointer items-center justify-center rounded-[20px] px-4 py-2 text-base font-bold leading-6 transition-colors duration-200";
        tab.classList.toggle("bg-purple-dark", isSelected);
        tab.classList.toggle("text-cream", isSelected);
        tab.classList.toggle("text-purple-dark", !isSelected);
        tab.addEventListener("click", () => changeCategory(category.id));
        faqTabs.append(tab);
      });
    };
    const renderQuestions = (category) => {
      const panel = document.createElement("div");
      panel.id = `faq-panel-${category.id}`;
      panel.role = "tabpanel";
      panel.setAttribute("aria-labelledby", `faq-tab-${category.id}`);
      category.questions.forEach((item, index) => {
        const answerId = `faq-answer-${category.id}-${index + 1}`;
        const row = document.createElement("div");
        const button = document.createElement("button");
        const question = document.createElement("span");
        const plusIcon = document.createElement("img");
        const answerWrapper = document.createElement("div");
        const answer = document.createElement("p");
        row.className = "border-b border-[#d6d1cb]";
        button.type = "button";
        button.className = "flex w-full cursor-pointer items-center gap-4 p-6 text-left";
        button.setAttribute("aria-expanded", "false");
        button.setAttribute("aria-controls", answerId);
        question.className = "flex-1 text-lg font-bold leading-6 text-purple-dark";
        question.textContent = item.question;
        plusIcon.className = "size-6 shrink-0 transition-transform duration-300 ease-out";
        plusIcon.src = plusIconUrl;
        plusIcon.width = 24;
        plusIcon.height = 24;
        plusIcon.alt = "";
        plusIcon.setAttribute("aria-hidden", "true");
        answerWrapper.id = answerId;
        answerWrapper.className = "grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out";
        answer.className = "min-h-0 overflow-hidden px-6 text-lg leading-6 text-purple-dark/75";
        answer.textContent = item.answer;
        button.addEventListener("click", () => {
          const isExpanded = button.getAttribute("aria-expanded") === "true";
          button.setAttribute("aria-expanded", String(!isExpanded));
          answerWrapper.classList.toggle("grid-rows-[0fr]", isExpanded);
          answerWrapper.classList.toggle("grid-rows-[1fr]", !isExpanded);
          answer.classList.toggle("pb-6", !isExpanded);
          plusIcon.classList.toggle("rotate-45", !isExpanded);
        });
        button.append(question, plusIcon);
        answerWrapper.append(answer);
        row.append(button, answerWrapper);
        panel.append(row);
      });
      faqContent.replaceChildren(panel);
    };
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
      faqContent.setAttribute("aria-busy", "true");
      faqContent.classList.add("translate-y-2", "opacity-0");
      categoryTransitionTimer = window.setTimeout(() => {
        renderQuestions(nextCategory);
        window.requestAnimationFrame(() => faqContent.classList.remove("translate-y-2", "opacity-0"));
        faqContent.removeAttribute("aria-busy");
      }, 200);
    };
    renderTabs();
    renderQuestions(categories[0]);
  }

  // assets/js/calculator.js
  var calculatorRoot = document.querySelector("[data-calculator-root]");
  if (calculatorRoot) {
    const calculatorInputs = calculatorRoot.querySelectorAll("[data-calculator-input]");
    const numberInputs = calculatorRoot.querySelectorAll("[data-calculator-number]");
    const monthlyOutput = calculatorRoot.querySelector("[data-calculator-monthly]");
    const annualOutput = calculatorRoot.querySelector("[data-calculator-annual]");
    const healthOutput = calculatorRoot.querySelector("[data-calculator-health]");
    const healthBandOutput = calculatorRoot.querySelector("[data-calculator-health-band]");
    const healthBars = calculatorRoot.querySelectorAll("[data-calculator-health-bar]");
    const currencyFormatter = new Intl.NumberFormat("en-US", {
      style: "currency",
      currency: "USD",
      maximumFractionDigits: 0
    });
    const healthBands = [
      { minimum: 75, label: "Healthy", color: "#237a57" },
      { minimum: 50, label: "At risk", color: "#ed8f43" },
      { minimum: 25, label: "Poor", color: "#c9252d" },
      { minimum: 5, label: "Critical", color: "#7f1d1d" }
    ];
    const getInput = (name) => calculatorRoot.querySelector(`[data-calculator-input="${name}"]`);
    const getNumberInput = (name) => calculatorRoot.querySelector(`[data-calculator-number="${name}"]`);
    const getValue = (name) => Number(getInput(name).value);
    const syncInput = (name, value) => {
      const rangeInput = getInput(name);
      const numberInput = getNumberInput(name);
      const fill = calculatorRoot.querySelector(`[data-calculator-fill="${name}"]`);
      const thumb = calculatorRoot.querySelector(`[data-calculator-thumb="${name}"]`);
      const minimum = Number(rangeInput.min);
      const maximum = Number(rangeInput.max);
      const percentage = (value - minimum) / (maximum - minimum) * 100;
      rangeInput.value = String(value);
      numberInput.value = String(value);
      fill.style.width = `${percentage}%`;
      thumb.style.left = `${percentage}%`;
    };
    const updateCalculator = () => {
      const referrals = getValue("referrals");
      const caseValue = getValue("case-value");
      const conversionRate = getValue("conversion-rate");
      const leakageRate = 100 - conversionRate;
      const lostReferrals = referrals * (leakageRate / 100);
      const lostRevenueMonthly = lostReferrals * caseValue;
      const lostRevenueAnnual = lostRevenueMonthly * 12;
      const healthScore = 100 - lostRevenueAnnual / 3e6 * 100;
      const clampedHealthScore = Math.max(5, Math.min(95, healthScore));
      const roundedHealthScore = Math.round(clampedHealthScore);
      const healthBand = healthBands.find((band) => roundedHealthScore >= band.minimum);
      const filledBars = Math.round(roundedHealthScore / 10);
      monthlyOutput.textContent = currencyFormatter.format(lostRevenueMonthly);
      annualOutput.textContent = currencyFormatter.format(lostRevenueAnnual);
      healthOutput.textContent = `${roundedHealthScore}%`;
      healthBandOutput.textContent = healthBand.label;
      healthOutput.style.color = healthBand.color;
      healthBandOutput.style.color = healthBand.color;
      healthBars.forEach((bar, index) => {
        bar.style.backgroundColor = index < filledBars ? healthBand.color : "rgba(74, 30, 79, 0.25)";
      });
      calculatorInputs.forEach(
        (input) => syncInput(input.dataset.calculatorInput, Number(input.value))
      );
    };
    const clampInputValue = (input, minimum = Number(input.min), maximum = Number(input.max)) => {
      const value = Number(input.value);
      return Math.max(minimum, Math.min(maximum, Number.isFinite(value) ? value : minimum));
    };
    calculatorInputs.forEach((input) => {
      input.addEventListener("input", () => {
        syncInput(input.dataset.calculatorInput, clampInputValue(input));
        updateCalculator();
      });
    });
    numberInputs.forEach((input) => {
      input.addEventListener("input", () => {
        const name = input.dataset.calculatorNumber;
        const rangeInput = getInput(name);
        const value = clampInputValue(input, Number(rangeInput.min), Number(rangeInput.max));
        syncInput(name, value);
        updateCalculator();
      });
    });
    updateCalculator();
  }

  // assets/js/how-it-works.js
  var howItWorksRoot = document.querySelector("[data-how-it-works]");
  if (howItWorksRoot) {
    const steps = [...howItWorksRoot.querySelectorAll("[data-how-it-works-step]")];
    const demo = howItWorksRoot.querySelector("[data-how-it-works-demo]");
    const demoStates = [...howItWorksRoot.querySelectorAll("[data-how-it-works-demo-state]")];
    const rotationInterval = 7e3;
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
        step.classList.toggle("is-active", isActive);
        step.setAttribute("aria-pressed", String(isActive));
      });
      demoStates.forEach((state, index) => {
        state.setAttribute("aria-hidden", String(index !== nextIndex));
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
      step.addEventListener("click", () => {
        setActiveStep(index);
        restartRotation();
      });
    });
    if (steps.length && demo) {
      setActiveStep(activeStepIndex);
      restartRotation();
    }
  }

  // assets/js/responsiveness.js
  var responsivenessRoot = document.querySelector("[data-responsiveness]");
  if (responsivenessRoot) {
    const counters = [...responsivenessRoot.querySelectorAll("[data-count-target]")];
    const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const setCounter = (counter, value) => {
      const suffix = counter.dataset.countSuffix || "";
      counter.textContent = `${Math.round(value).toLocaleString("en-US")}${suffix}`;
    };
    const animateCounters = () => {
      counters.forEach((counter) => {
        const target = Number(counter.dataset.countTarget);
        const start = Math.floor(Math.random() * Math.max(1, target * 0.35));
        if (reducedMotion) {
          setCounter(counter, target);
          return;
        }
        const startedAt = performance.now();
        const duration = 900;
        const tick = (now) => {
          const progress = Math.min((now - startedAt) / duration, 1);
          setCounter(counter, start + (target - start) * (1 - (1 - progress) ** 3));
          if (progress < 1) {
            window.requestAnimationFrame(tick);
          }
        };
        window.requestAnimationFrame(tick);
      });
    };
    const observer = new IntersectionObserver(
      (entries) => {
        if (entries.some((entry) => entry.isIntersecting)) {
          animateCounters();
          observer.disconnect();
        }
      },
      { threshold: 0.35 }
    );
    observer.observe(responsivenessRoot);
  }

  // assets/js/personalized.js
  var personalizedRoot = document.querySelector("[data-personalized]");
  if (personalizedRoot) {
    const tabs = [...personalizedRoot.querySelectorAll("[data-personalized-tab]")];
    const panel = personalizedRoot.querySelector("[data-personalized-panel]");
    const states = [...personalizedRoot.querySelectorAll("[data-personalized-state]")];
    let activeIndex = 0;
    let scrollLocked = false;
    const selectAudience = (index) => {
      if (!tabs[index]) return;
      activeIndex = index;
      panel.dataset.activeIndex = String(index);
      tabs.forEach((tab, tabIndex) => {
        const selected = tabIndex === index;
        tab.classList.toggle("is-active", selected);
        tab.setAttribute("aria-selected", String(selected));
      });
      states.forEach(
        (state, stateIndex) => state.setAttribute("aria-hidden", String(stateIndex !== index))
      );
    };
    tabs.forEach((tab, index) => tab.addEventListener("click", () => selectAudience(index)));
    personalizedRoot.addEventListener(
      "wheel",
      (event) => {
        if (scrollLocked || Math.abs(event.deltaY) < 30) return;
        scrollLocked = true;
        selectAudience((activeIndex + (event.deltaY > 0 ? 1 : -1) + tabs.length) % tabs.length);
        window.setTimeout(() => {
          scrollLocked = false;
        }, 500);
      },
      { passive: true }
    );
  }
})();
