import {
  getActiveIndex,
  getScrollProgress,
  getScrollTarget,
  getStickyOffset,
  getTrackOffset,
} from './personalized-scroll.mjs';

const personalizedRoot = document.querySelector('[data-personalized]');

if (personalizedRoot) {
  const tabs = [...personalizedRoot.querySelectorAll('[data-personalized-tab]')];
  const panel = personalizedRoot.querySelector('[data-personalized-panel]');
  const states = [...personalizedRoot.querySelectorAll('[data-personalized-state]')];
  const sticky = personalizedRoot.querySelector('[data-personalized-sticky]');
  const track = personalizedRoot.querySelector('.personalized-track');
  const desktop = window.matchMedia('(min-width: 64rem)');
  let activeIndex = 0;
  let scrollFrame = 0;
  let resizeFrame = 0;
  let scrollStart = 0;
  let scrollDistance = 0;
  let trackStep = 0;

  const selectAudience = (index) => {
    if (!tabs[index]) return;
    if (index !== activeIndex) {
      personalizedRoot.dataset.personaDirection = index > activeIndex ? 'next' : 'previous';
    }
    activeIndex = index;
    panel.dataset.activeIndex = String(index);
    tabs.forEach((tab, tabIndex) => {
      const selected = tabIndex === index;
      tab.classList.toggle('is-active', selected);
      tab.setAttribute('aria-selected', String(selected));
    });
    states.forEach((state, stateIndex) => {
      state.setAttribute('aria-hidden', String(desktop.matches && stateIndex !== index));
    });
  };

  const clearDesktopLayout = () => {
    personalizedRoot.removeAttribute('data-personalized-scroll-ready');
    personalizedRoot.style.removeProperty('--personalized-scroll-distance');
    personalizedRoot.style.removeProperty('--personalized-sticky-height');
    personalizedRoot.style.removeProperty('--personalized-sticky-offset');
    track.style.removeProperty('transform');
    scrollStart = 0;
    scrollDistance = 0;
    trackStep = 0;
  };

  const measureDesktopLayout = () => {
    const stickyHeight = sticky.offsetHeight;
    const headerBottom =
      document.querySelector('body > header')?.getBoundingClientRect().bottom || 0;
    const stickyOffset = getStickyOffset(window.innerHeight, stickyHeight, headerBottom);
    const sectionStyles = window.getComputedStyle(personalizedRoot);
    const trackStyles = window.getComputedStyle(track);
    const trackGap = Number.parseFloat(trackStyles.columnGap || trackStyles.gap) || 0;

    trackStep = panel.getBoundingClientRect().width + trackGap;
    scrollDistance = Math.max(window.innerHeight * 0.8, 600) * Math.max(0, states.length - 1);

    personalizedRoot.style.setProperty('--personalized-sticky-height', `${stickyHeight}px`);
    personalizedRoot.style.setProperty('--personalized-scroll-distance', `${scrollDistance}px`);
    personalizedRoot.style.setProperty('--personalized-sticky-offset', `${stickyOffset}px`);
    personalizedRoot.setAttribute('data-personalized-scroll-ready', '');

    const sectionTop = personalizedRoot.getBoundingClientRect().top + window.scrollY;
    const sectionPaddingTop = Number.parseFloat(sectionStyles.paddingTop) || 0;
    scrollStart = sectionTop + sectionPaddingTop - stickyOffset;
  };

  const syncAudienceToScroll = () => {
    scrollFrame = 0;

    if (desktop.matches) {
      if (!personalizedRoot.hasAttribute('data-personalized-scroll-ready')) {
        measureDesktopLayout();
      }

      const progress = getScrollProgress(window.scrollY, scrollStart, scrollDistance);
      const offset = getTrackOffset(progress, states.length, trackStep);
      track.style.transform = `translate3d(${offset}px, 0, 0)`;
      selectAudience(getActiveIndex(progress, states.length));
      return;
    }

    track.style.removeProperty('transform');
    const focusLine = Math.min(window.innerHeight * 0.38, 320);
    let closestIndex = activeIndex;
    let closestDistance = Number.POSITIVE_INFINITY;

    states.forEach((state, index) => {
      const bounds = state.getBoundingClientRect();
      const distance = Math.abs(bounds.top + Math.min(bounds.height * 0.25, 140) - focusLine);

      if (bounds.bottom > 0 && bounds.top < window.innerHeight && distance < closestDistance) {
        closestIndex = index;
        closestDistance = distance;
      }
    });

    if (closestIndex !== activeIndex) selectAudience(closestIndex);
  };

  const queueScrollSync = () => {
    if (!scrollFrame) scrollFrame = window.requestAnimationFrame(syncAudienceToScroll);
  };

  const refreshLayout = () => {
    resizeFrame = 0;
    if (desktop.matches) {
      measureDesktopLayout();
    } else {
      clearDesktopLayout();
    }
    syncAudienceToScroll();
  };

  const queueLayoutRefresh = () => {
    if (!resizeFrame) resizeFrame = window.requestAnimationFrame(refreshLayout);
  };

  const activateAudience = (index) => {
    selectAudience(index);

    if (!desktop.matches) return;
    if (!personalizedRoot.hasAttribute('data-personalized-scroll-ready')) {
      measureDesktopLayout();
    }

    window.scrollTo({
      top: getScrollTarget(index, states.length, scrollStart, scrollDistance),
      behavior: 'smooth',
    });
  };

  tabs.forEach((tab, index) => tab.addEventListener('click', () => activateAudience(index)));
  tabs.forEach((tab, index) => {
    tab.addEventListener('keydown', (event) => {
      if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
      event.preventDefault();
      const nextIndex =
        event.key === 'Home'
          ? 0
          : event.key === 'End'
            ? tabs.length - 1
            : (index + (event.key === 'ArrowRight' ? 1 : -1) + tabs.length) % tabs.length;
      activateAudience(nextIndex);
      tabs[nextIndex].focus();
    });
  });

  window.addEventListener('scroll', queueScrollSync, { passive: true });
  window.addEventListener('resize', queueLayoutRefresh, { passive: true });
  desktop.addEventListener('change', queueLayoutRefresh);

  selectAudience(0);
  refreshLayout();
}
