import assert from 'node:assert/strict';
import test from 'node:test';

import {
  getTypedCalculatorState,
  getTypedCalculatorValue,
} from '../assets/js/calculator-input.mjs';

test('keeps an incomplete typed value until it reaches the slider range', () => {
  assert.equal(getTypedCalculatorValue('3', 100, 10000), null);
  assert.equal(getTypedCalculatorValue('30', 100, 10000), null);
  assert.equal(getTypedCalculatorValue('300', 100, 10000), 300);
});

test('accepts a valid manually typed value', () => {
  assert.equal(getTypedCalculatorValue('120', 10, 300), 120);
});

test('keeps the exact valid value while a case value is typed', () => {
  const values = ['4', '45', '450', '4500'].reduce(
    (state, value) => getTypedCalculatorState(state, 'case-value', value, 100, 10000),
    { 'case-value': 3000 },
  );

  assert.equal(values['case-value'], 4500);
});
