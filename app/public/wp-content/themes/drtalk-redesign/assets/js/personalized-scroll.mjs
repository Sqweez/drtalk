const clampProgress = (value) => Math.min(1, Math.max(0, value));

export const getScrollProgress = (scrollY, scrollStart, scrollDistance) =>
  scrollDistance > 0 ? clampProgress((scrollY - scrollStart) / scrollDistance) : 0;

export const getTrackOffset = (progress, stateCount, trackStep) =>
  -clampProgress(progress) * Math.max(0, stateCount - 1) * trackStep;

export const getActiveIndex = (progress, stateCount) =>
  Math.round(clampProgress(progress) * Math.max(0, stateCount - 1));

export const getStickyOffset = (viewportHeight, stickyHeight, headerBottom) =>
  Math.min(headerBottom, viewportHeight - stickyHeight);

export const getScrollTarget = (index, stateCount, scrollStart, scrollDistance) => {
  const lastIndex = Math.max(0, stateCount - 1);
  const safeIndex = Math.min(lastIndex, Math.max(0, index));

  return scrollStart + (lastIndex ? safeIndex / lastIndex : 0) * scrollDistance;
};
