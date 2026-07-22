const fomoRoot = document.querySelector('[data-fomo]');

if (fomoRoot) {
  const amount = fomoRoot.querySelector('[data-fomo-amount]');
  const time = fomoRoot.querySelector('[data-fomo-time]');
  const baseline = Number.parseFloat(fomoRoot.dataset.fomoBaseline);
  const hourlyRate = Number.parseFloat(fomoRoot.dataset.fomoHourlyRate);
  const startedAt = performance.now();

  const formatAmount = (value) =>
    new Intl.NumberFormat('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(value);

  const update = (now) => {
    const elapsedSeconds = Math.floor((now - startedAt) / 1000);
    const lostRevenue = baseline + (hourlyRate / 3600) * elapsedSeconds;
    const minutes = Math.floor(elapsedSeconds / 60)
      .toString()
      .padStart(2, '0');
    const seconds = (elapsedSeconds % 60).toString().padStart(2, '0');

    amount.textContent = `$${formatAmount(lostRevenue)}`;
    time.textContent = `${minutes}m:${seconds}s on page`;
    requestAnimationFrame(update);
  };

  requestAnimationFrame(update);
}
