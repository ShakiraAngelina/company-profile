// === Manual Carousel Scroll ===
const track = document.querySelector('.carousel-track');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let scrollAmount = 0;
const scrollStep = 300;

nextBtn.addEventListener('click', () => {
  track.scrollBy({ left: scrollStep, behavior: 'smooth' });
});
prevBtn.addEventListener('click', () => {
  track.scrollBy({ left: -scrollStep, behavior: 'smooth' });
});

// === Pause animation on hover ===
track.addEventListener('mouseover', () => {
  track.style.animationPlayState = 'paused';
});
track.addEventListener('mouseout', () => {
  track.style.animationPlayState = 'running';
});

// === Fade-up animation on load ===
window.addEventListener('load', () => {
  document.querySelectorAll('.client-logo').forEach((logo, i) => {
    logo.style.opacity = 0;
    logo.style.transform = 'translateY(20px)';
    setTimeout(() => {
      logo.style.transition = 'all 0.6s ease';
      logo.style.opacity = 1;
      logo.style.transform = 'translateY(0)';
    }, i * 100);
  });
});
