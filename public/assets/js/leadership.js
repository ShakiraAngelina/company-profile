// Fade-in animation for leader cards
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".leader-card");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = 1;
        entry.target.style.transform = "translateY(0)";
      }
    });
  }, { threshold: 0.1 });

  cards.forEach(card => observer.observe(card));
});

// Navbar scroll shadow
window.addEventListener("scroll", () => {
  const header = document.querySelector("header");
  if (window.scrollY > 100) header.classList.add("scrolled");
  else header.classList.remove("scrolled");
});
