import assert from 'node:assert/strict';
import test from 'node:test';

import {
  getActiveIndex,
  getScrollProgress,
  getScrollTarget,
  getStickyOffset,
  getTrackOffset,
} from '../assets/js/personalized-scroll.mjs';

test('clamps scroll progress to the section runway', () => {
  assert.equal(getScrollProgress(900, 1000, 800), 0);
  assert.equal(getScrollProgress(1400, 1000, 800), 0.5);
  assert.equal(getScrollProgress(2000, 1000, 800), 1);
});

test('translates three cards across two measured track steps', () => {
  assert.equal(getTrackOffset(0.5, 3, 1224), -1224);
  assert.equal(getTrackOffset(1, 3, 1224), -2448);
});

test('selects the persona nearest to the current resting position', () => {
  assert.equal(getActiveIndex(0.24, 3), 0);
  assert.equal(getActiveIndex(0.26, 3), 1);
  assert.equal(getActiveIndex(0.76, 3), 2);
});

test('maps a selected tab to its point in the scroll runway', () => {
  assert.equal(getScrollTarget(0, 3, 1000, 1200), 1000);
  assert.equal(getScrollTarget(1, 3, 1000, 1200), 1600);
  assert.equal(getScrollTarget(2, 3, 1000, 1200), 2200);
});

test('keeps sticky content below the header when it fits in the viewport', () => {
  assert.equal(getStickyOffset(900, 797, 80), 80);
  assert.equal(getStickyOffset(768, 797, 80), -29);
});
