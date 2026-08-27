import { clampCalculatorInputValue, getTypedCalculatorValue } from './calculator-input.mjs';

const calculatorRoot = document.querySelector('[data-calculator-root]');

if (calculatorRoot) {
  const calculatorInputs = calculatorRoot.querySelectorAll('[data-calculator-input]');
  const numberInputs = calculatorRoot.querySelectorAll('[data-calculator-number]');
  const monthlyOutput = calculatorRoot.querySelector('[data-calculator-monthly]');
  const annualOutput = calculatorRoot.querySelector('[data-calculator-annual]');
  const healthOutput = calculatorRoot.querySelector('[data-calculator-health]');
  const healthBandOutput = calculatorRoot.querySelector('[data-calculator-health-band]');
  const healthBars = calculatorRoot.querySelectorAll('[data-calculator-health-bar]');
  const currencyFormatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 0,
  });
  const numberFormatter = new Intl.NumberFormat('en-US', {
    maximumFractionDigits: 0,
  });
  const healthBands = [
    { minimum: 75, label: 'Healthy', color: '#15803d' },
    { minimum: 50, label: 'At risk', color: '#ed8f43' },
    { minimum: 25, label: 'Poor', color: '#ed8f43' },
    { minimum: 0, label: 'Critical', color: '#c9252d' },
  ];

  const getInput = (name) => calculatorRoot.querySelector(`[data-calculator-input="${name}"]`);
  const getNumberInput = (name) =>
    calculatorRoot.querySelector(`[data-calculator-number="${name}"]`);
  const getValue = (name) => Number(getInput(name).value);

  const syncInput = (name, value) => {
    const rangeInput = getInput(name);
    const numberInput = getNumberInput(name);
    const fill = calculatorRoot.querySelector(`[data-calculator-fill="${name}"]`);
    const thumb = calculatorRoot.querySelector(`[data-calculator-thumb="${name}"]`);
    const minimum = Number(rangeInput.min);
    const maximum = Number(rangeInput.max);
    const percentage = ((value - minimum) / (maximum - minimum)) * 100;

    rangeInput.value = String(value);
    numberInput.value = name === 'case-value' ? numberFormatter.format(value) : String(value);
    fill.style.width = `${percentage}%`;
    thumb.style.left = `${percentage}%`;
  };

  const updateCalculator = () => {
    const referrals = getValue('referrals');
    const caseValue = getValue('case-value');
    const conversionRate = getValue('conversion-rate');
    const leakageRate = 100 - conversionRate;
    const lostReferrals = referrals * (leakageRate / 100);
    const lostRevenueMonthly = lostReferrals * caseValue;
    const lostRevenueAnnual = lostRevenueMonthly * 12;
    const healthScore = 100 - (lostRevenueAnnual / 3000000) * 100;
    const clampedHealthScore = Math.max(5, Math.min(95, healthScore));
    const roundedHealthScore = Math.round(clampedHealthScore);
    const healthBand = healthBands.find((band) => roundedHealthScore >= band.minimum);
    const filledBars = Math.round(roundedHealthScore / 10);
    const emptyBarColor = 'rgba(74, 30, 79, 0.4)';

    monthlyOutput.textContent = currencyFormatter.format(lostRevenueMonthly);
    annualOutput.textContent = currencyFormatter.format(lostRevenueAnnual);
    healthOutput.textContent = `${roundedHealthScore}%`;
    healthBandOutput.textContent = healthBand.label;
    healthOutput.style.color = healthBand.color;
    healthBandOutput.style.color = healthBand.color;

    healthBars.forEach((bar, index) => {
      bar.style.backgroundColor = index < filledBars ? healthBand.color : emptyBarColor;
    });

    calculatorInputs.forEach((input) =>
      syncInput(input.dataset.calculatorInput, Number(input.value)),
    );
  };

  calculatorInputs.forEach((input) => {
    input.addEventListener('input', () => {
      syncInput(
        input.dataset.calculatorInput,
        clampCalculatorInputValue(input.value, Number(input.min), Number(input.max)),
      );
      updateCalculator();
    });
  });

  numberInputs.forEach((input) => {
    input.addEventListener('input', () => {
      const name = input.dataset.calculatorNumber;
      const rangeInput = getInput(name);
      const value = getTypedCalculatorValue(
        input.value,
        Number(rangeInput.min),
        Number(rangeInput.max),
      );

      if (value === null) return;

      syncInput(name, value);
      updateCalculator();
    });

    input.addEventListener('change', () => {
      const name = input.dataset.calculatorNumber;
      const rangeInput = getInput(name);
      const value = clampCalculatorInputValue(
        input.value,
        Number(rangeInput.min),
        Number(rangeInput.max),
      );

      syncInput(name, value);
      updateCalculator();
    });
  });

  updateCalculator();
}
