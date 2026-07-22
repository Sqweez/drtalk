import Swiper from 'swiper';

const testimonialsRoot = document.querySelector('[data-testimonials]');

if (testimonialsRoot) {
  const swiperElement = testimonialsRoot.querySelector('[data-testimonials-swiper]');
  const previous = testimonialsRoot.querySelector('[data-testimonials-previous]');
  const next = testimonialsRoot.querySelector('[data-testimonials-next]');
  const swiper = new Swiper(swiperElement, {
    centeredSlides: true,
    initialSlide: 1,
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 16,
    speed: 500,
  });

  previous.addEventListener('click', () => swiper.slidePrev());
  next.addEventListener('click', () => swiper.slideNext());
}
