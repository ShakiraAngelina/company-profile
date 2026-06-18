// ==============================
// PT Arkonin Engineering MP
// scriptabout.js - About Page Interactivity
// ==============================

// ====== ANIMATED COUNTER ======
function animateCounter(element, start, end, duration, suffix = '+') {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    
    const current = Math.floor(progress * (end - start) + start);
    element.textContent = current + suffix;
    
    if (progress < 1) {
      window.requestAnimationFrame(step);
    } else {
      element.textContent = end + suffix;
    }
  };
  window.requestAnimationFrame(step);
}

// ====== STATS COUNTER ON SCROLL ======
function initStatsCounter() {
  const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const statNumber = entry.target.querySelector('.stat-number');
        if (statNumber && !statNumber.classList.contains('counted')) {
          const targetValue = parseInt(statNumber.textContent);
          const suffix = statNumber.textContent.includes('+') ? '+' : '';
          
          animateCounter(statNumber, 0, targetValue, 2000, suffix);
          statNumber.classList.add('counted');
          statsObserver.unobserve(entry.target);
        }
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.stat-item').forEach(item => {
    statsObserver.observe(item);
  });
}

// ====== SCROLL ANIMATIONS ======
function initScrollAnimations() {
  const animateElements = document.querySelectorAll('.animate-on-scroll');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add('animated');
        }, index * 100);
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  animateElements.forEach(el => {
    observer.observe(el);
  });
}

// ====== SMOOTH PARALLAX FOR HERO ======
function initParallaxEffect() {
  const hero = document.querySelector('.about-page-hero');
  if (!hero) return;

  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    if (scrolled < window.innerHeight) {
      const parallax = scrolled * 0.5;
      hero.style.transform = `translateY(${parallax}px)`;
    }
  });
}

// ====== VALUE CARDS SEQUENTIAL ANIMATION ======
function initValueCardsAnimation() {
  const valueCards = document.querySelectorAll('.value-card');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }, index * 150);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  valueCards.forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = 'all 0.6s ease';
    observer.observe(card);
  });
}

// ====== VM CARDS STAGGER ANIMATION ======
function initVMCardsAnimation() {
  const vmCards = document.querySelectorAll('.vm-card');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }, index * 200);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  vmCards.forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(40px)';
    card.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
    observer.observe(card);
  });
}

// ====== EXPERTISE CARDS ANIMATION ======
function initExpertiseCardsAnimation() {
  const expertiseCards = document.querySelectorAll('.expertise-card');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }, index * 150);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  expertiseCards.forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = 'all 0.6s ease';
    observer.observe(card);
  });
}

// ====== WHO WE ARE IMAGE ANIMATION ======
function initWhoWeAreAnimation() {
  const whoText = document.querySelector('.who-text');
  const whoImage = document.querySelector('.who-image');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        if (entry.target === whoText) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateX(0)';
        } else if (entry.target === whoImage) {
          setTimeout(() => {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'rotate(0deg)';
          }, 300);
        }
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  if (whoText) {
    whoText.style.opacity = '0';
    whoText.style.transform = 'translateX(-50px)';
    whoText.style.transition = 'all 0.8s ease';
    observer.observe(whoText);
  }

  if (whoImage) {
    whoImage.style.opacity = '0';
    whoImage.style.transform = 'rotate(-5deg) scale(0.9)';
    whoImage.style.transition = 'all 0.8s ease';
    observer.observe(whoImage);
  }
}

// ====== RIPPLE EFFECT ON BUTTONS ======
function createRipple(event) {
  const button = event.currentTarget;
  const ripple = document.createElement('span');
  const rect = button.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height);
  const x = event.clientX - rect.left - size / 2;
  const y = event.clientY - rect.top - size / 2;

  ripple.style.width = ripple.style.height = `${size}px`;
  ripple.style.left = `${x}px`;
  ripple.style.top = `${y}px`;
  ripple.classList.add('ripple');

  button.appendChild(ripple);

  setTimeout(() => {
    ripple.remove();
  }, 600);
}

// Add ripple effect to CTA buttons
document.querySelectorAll('.btn-primary-cta, .btn-secondary-cta').forEach(button => {
  button.addEventListener('click', createRipple);
});

// Add CSS for ripple
const style = document.createElement('style');
style.textContent = `
  .btn-primary-cta,
  .btn-secondary-cta {
    position: relative;
    overflow: hidden;
  }
  
  .ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    transform: scale(0);
    animation: rippleEffect 0.6s ease-out;
    pointer-events: none;
  }
  
  @keyframes rippleEffect {
    to {
      transform: scale(4);
      opacity: 0;
    }
  }
`;
document.head.appendChild(style);

// ====== SMOOTH SCROLL TO SECTIONS ======
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    if (href === '#' || href === '#!') {
      e.preventDefault();
      return;
    }

    const target = document.querySelector(href);
    if (target) {
      e.preventDefault();
      const offsetTop = target.offsetTop - 70;
      
      window.scrollTo({
        top: offsetTop,
        behavior: 'smooth'
      });
    }
  });
});

// ====== PROGRESS BAR ON SCROLL ======
function initProgressBar() {
  const progressBar = document.createElement('div');
  progressBar.style.cssText = `
    position: fixed;
    top: 70px;
    left: 0;
    width: 0%;
    height: 4px;
    background: linear-gradient(to right, #006a7a, #a8d5ba);
    z-index: 9999;
    transition: width 0.1s ease;
  `;
  document.body.appendChild(progressBar);

  window.addEventListener('scroll', () => {
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;
    const scrollTop = window.scrollY;
    const scrollPercent = (scrollTop / (documentHeight - windowHeight)) * 100;
    
    progressBar.style.width = scrollPercent + '%';
  });
}

// ====== LAZY LOAD IMAGES ======
function initLazyLoad() {
  const images = document.querySelectorAll('img[data-src]');
  
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
        img.classList.add('loaded');
        imageObserver.unobserve(img);
      }
    });
  });

  images.forEach(img => imageObserver.observe(img));
}

// ====== HEADER SHADOW ON SCROLL ======
function initHeaderShadow() {
  const header = document.querySelector('header');
  if (!header) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
    } else {
      header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.08)';
    }
  });
}

// ====== INITIALIZE ALL FUNCTIONS ======
document.addEventListener('DOMContentLoaded', () => {
  // Initialize stats counter
  initStatsCounter();
  
  // Initialize scroll animations
  initScrollAnimations();
  
  // Initialize parallax effect
  initParallaxEffect();
  
  // Initialize value cards animation
  initValueCardsAnimation();
  
  // Initialize VM cards animation
  initVMCardsAnimation();
  
  // Initialize expertise cards animation
  initExpertiseCardsAnimation();
  
  // Initialize who we are animation
  initWhoWeAreAnimation();
  
  // Initialize progress bar
  initProgressBar();
  
  // Initialize lazy load
  initLazyLoad();
  
  // Initialize header shadow
  initHeaderShadow();
  
  console.log('%cAbout Page Loaded Successfully! 🎉', 'color:#006a7a;font-weight:bold;font-size:16px;');
  console.log('%cInteractive features activated', 'color:#a8d5ba;font-size:14px;');
});

// ====== PERFORMANCE MONITORING ======
window.addEventListener('load', () => {
  if (window.performance && window.performance.timing) {
    const loadTime = window.performance.timing.domContentLoadedEventEnd - 
                     window.performance.timing.navigationStart;
    console.log(`%cPage loaded in ${loadTime}ms`, "color:#006a7a;font-weight:bold;");
  }
});