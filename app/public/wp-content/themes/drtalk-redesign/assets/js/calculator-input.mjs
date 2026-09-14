const parseCalculatorInputValue = (value) => {
  const normalizedValue = String(value).replace(/[^\d.-]/g, '');

  return normalizedValue ? Number(normalizedValue) : Number.NaN;
};

export const normalizeCalculatorRange = (
  value,
  minimum,
  maximum,
  step,
  fallbackValue,
  fallbackMinimum,
  fallbackMaximum,
  fallbackStep,
) => {
  let normalizedMinimum = Number.isFinite(Number(minimum)) ? Number(minimum) : fallbackMinimum;
  let normalizedMaximum = Number.isFinite(Number(maximum)) ? Number(maximum) : fallbackMaximum;
  let normalizedValue = Number.isFinite(Number(value)) ? Number(value) : fallbackValue;
  let normalizedStep = Number.isFinite(Number(step)) ? Number(step) : fallbackStep;

  if (normalizedMaximum <= normalizedMinimum) {
    normalizedMinimum = fallbackMinimum;
    normalizedMaximum = fallbackMaximum;
    normalizedValue = fallbackValue;
  }
  if (normalizedStep <= 0) normalizedStep = Math.max(1, fallbackStep);

  return {
    value: Math.max(normalizedMinimum, Math.min(normalizedMaximum, normalizedValue)),
    minimum: normalizedMinimum,
    maximum: normalizedMaximum,
    step: normalizedStep,
  };
};

export const getTypedCalculatorValue = (value, minimum, maximum) => {
  const parsedValue = parseCalculatorInputValue(value);

  return Number.isFinite(parsedValue) && parsedValue >= minimum && parsedValue <= maximum
    ? parsedValue
    : null;
};

export const getTypedCalculatorState = (values, name, value, minimum, maximum) => {
  const parsedValue = getTypedCalculatorValue(value, minimum, maximum);

  return parsedValue === null ? values : { ...values, [name]: parsedValue };
};

export const clampCalculatorInputValue = (value, minimum, maximum) => {
  const parsedValue = parseCalculatorInputValue(value);

  return Math.max(minimum, Math.min(maximum, Number.isFinite(parsedValue) ? parsedValue : minimum));
};
