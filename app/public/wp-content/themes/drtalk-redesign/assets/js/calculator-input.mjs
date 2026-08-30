const parseCalculatorInputValue = (value) => {
  const normalizedValue = String(value).replace(/[^\d.-]/g, '');

  return normalizedValue ? Number(normalizedValue) : Number.NaN;
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
