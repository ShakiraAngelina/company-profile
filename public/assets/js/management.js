// ============== MANAGEMENT PAGE INTERACTIONS ==============

// Simple fade-in on scroll using IntersectionObserver
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll("[data-aos]");

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("aos-animate");
        }
      });
    },
    { threshold: 0.2 }
  );

  elements.forEach(el => {
    el.classList.add("aos-init");
    observer.observe(el);
  });
});

// Mouse parallax effect on hero
document.addEventListener("mousemove", e => {
  const hero = document.querySelector(".management-hero");
  if (!hero) return;
  const x = (window.innerWidth - e.pageX * 2) / 100;
  const y = (window.innerHeight - e.pageY * 2) / 100;
  hero.style.backgroundPosition = `${x}px ${y}px`;
});

// Subtle card tilt effect
document.querySelectorAll(".manager-card").forEach(card => {
  card.addEventListener("mousemove", e => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const rotateX = (y / rect.height - 0.5) * 10;
    const rotateY = (x / rect.width - 0.5) * -10;
    card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
  });
  card.addEventListener("mouseleave", () => {
    card.style.transform = "rotateX(0) rotateY(0)";
  });
});

console.log("%cManagement Page Loaded Successfully", "color:#006a7a;font-weight:bold;");
