const testimonialsRoot = document.querySelector('[data-testimonials]');

if (testimonialsRoot) {
  const track = testimonialsRoot.querySelector('[data-testimonials-track]');
  const cards = [...track.children];
  const previous = testimonialsRoot.querySelector('[data-testimonials-previous]');
  const next = testimonialsRoot.querySelector('[data-testimonials-next]');
  let activeIndex = 1;

  const render = () => {
    const cardWidth = cards[0].offsetWidth + 16;
    track.style.transform = `translateX(${(1 - activeIndex) * cardWidth}px)`;
  };

  previous.addEventListener('click', () => {
    activeIndex = (activeIndex - 1 + cards.length) % cards.length;
    render();
  });
  next.addEventListener('click', () => {
    activeIndex = (activeIndex + 1) % cards.length;
    render();
  });

  render();
  window.addEventListener('resize', render);
}
