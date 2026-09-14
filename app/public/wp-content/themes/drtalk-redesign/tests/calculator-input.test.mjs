import assert from 'node:assert/strict';
import test from 'node:test';

import {
  getTypedCalculatorState,
  getTypedCalculatorValue,
  normalizeCalculatorRange,
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

test('normalizes invalid calculator configuration', () => {
  assert.deepEqual(normalizeCalculatorRange(500, 100, 100, 0, 80, 10, 300, 1), {
    value: 80,
    minimum: 10,
    maximum: 300,
    step: 1,
  });
});

test('clamps the configured value into a valid range', () => {
  assert.deepEqual(normalizeCalculatorRange(500, 10, 300, 5, 80, 10, 300, 1), {
    value: 300,
    minimum: 10,
    maximum: 300,
    step: 5,
  });
});
