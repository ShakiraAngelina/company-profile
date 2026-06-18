// ==============================
// PT Arkonin Engineering MP
// history.js - Interactive Timeline Animations
// ==============================

// ====== SIMPLE AOS ANIMATION (Scroll Animation) ======
function initScrollAnimations() {
  const observerOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        // Add delay for staggered animation
        setTimeout(() => {
          entry.target.classList.add('aos-animate');
        }, index * 100);
        
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all timeline items
  document.querySelectorAll('.timeline-item').forEach(item => {
    observer.observe(item);
  });

  // Observe founder cards
  document.querySelectorAll('.founder-card').forEach(card => {
    observer.observe(card);
  });

  // Observe stats
  document.querySelectorAll('.stat-item').forEach(stat => {
    observer.observe(stat);
  });
}

// ====== ANIMATED COUNTER ======
function animateCounter(element, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    
    const current = Math.floor(progress * (end - start) + start);
    element.textContent = current + '+';
    
    if (progress < 1) {
      window.requestAnimationFrame(step);
    } else {
      element.textContent = end + '+';
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
        const targetValue = parseInt(statNumber.textContent);
        
        animateCounter(statNumber, 0, targetValue, 2000);
        statsObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.stat-item').forEach(item => {
    statsObserver.observe(item);
  });
}

// ====== TIMELINE PROGRESS BAR ======
function updateTimelineProgress() {
  const timeline = document.querySelector('.timeline');
  if (!timeline) return;

  const timelineRect = timeline.getBoundingClientRect();
  const timelineTop = timelineRect.top + window.scrollY;
  const timelineHeight = timelineRect.height;
  
  const scrollTop = window.scrollY;
  const windowHeight = window.innerHeight;
  
  // Calculate progress
  const progress = Math.min(
    Math.max((scrollTop + windowHeight - timelineTop) / timelineHeight, 0),
    1
  );

  // Update timeline line color based on progress
  const timelineLine = document.querySelector('.timeline::before');
  if (timeline.style) {
    timeline.style.setProperty('--timeline-progress', `${progress * 100}%`);
  }
}

// ====== TIMELINE ITEM HOVER EFFECTS ======
function initTimelineHoverEffects() {
  const timelineItems = document.querySelectorAll('.timeline-item');
  
  timelineItems.forEach(item => {
    const content = item.querySelector('.timeline-content');
    const dot = item.querySelector('.timeline-dot');
    
    content.addEventListener('mouseenter', () => {
      // Highlight the dot
      dot.style.transform = 'translateX(-50%) scale(1.5)';
      dot.style.borderColor = '#a8d5ba';
    });
    
    content.addEventListener('mouseleave', () => {
      // Reset the dot
      dot.style.transform = 'translateX(-50%) scale(1)';
      dot.style.borderColor = '#006a7a';
    });
  });
}

// ====== PARALLAX EFFECT FOR HERO ======
function initParallaxEffect() {
  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const hero = document.querySelector('.history-hero');
    
    if (hero && scrolled < window.innerHeight) {
      const parallax = scrolled * 0.5;
      hero.style.transform = `translateY(${parallax}px)`;
    }
  });
}

// ====== SMOOTH REVEAL FOR LEGACY SECTION ======
function initLegacyReveal() {
  const legacyObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.3 });

  const legacyText = document.querySelector('.legacy-text');
  const legacyImage = document.querySelector('.legacy-image');

  if (legacyText) {
    legacyText.style.opacity = '0';
    legacyText.style.transform = 'translateY(30px)';
    legacyText.style.transition = 'all 0.8s ease';
    legacyObserver.observe(legacyText);
  }

  if (legacyImage) {
    legacyImage.style.opacity = '0';
    legacyImage.style.transform = 'translateY(30px)';
    legacyImage.style.transition = 'all 0.8s ease 0.2s';
    legacyObserver.observe(legacyImage);
  }
}

// ====== TIMELINE ITEM CLICK TO EXPAND ======
function initTimelineExpand() {
  const timelineItems = document.querySelectorAll('.timeline-item');
  
  timelineItems.forEach(item => {
    const content = item.querySelector('.timeline-content');
    let isExpanded = false;
    
    content.addEventListener('click', (e) => {
      // Prevent default if clicking on links
      if (e.target.tagName === 'A') return;
      
      if (!isExpanded) {
        // Expand
        content.style.maxHeight = content.scrollHeight + 'px';
        content.style.overflow = 'visible';
        isExpanded = true;
      } else {
        // Collapse
        content.style.maxHeight = '';
        content.style.overflow = 'hidden';
        isExpanded = false;
      }
    });
  });
}

// ====== INITIALIZE ALL ANIMATIONS ======
document.addEventListener('DOMContentLoaded', () => {
  // Initialize scroll animations
  initScrollAnimations();
  
  // Initialize stats counter
  initStatsCounter();
  
  // Initialize timeline hover effects
  initTimelineHoverEffects();
  
  // Initialize parallax effect
  initParallaxEffect();
  
  // Initialize legacy section reveal
  initLegacyReveal();
  
  // Update timeline progress on scroll
  window.addEventListener('scroll', updateTimelineProgress);
  
  // Initial timeline progress
  updateTimelineProgress();
});

// ====== RESPONSIVE TIMELINE ADJUSTMENT ======
function adjustTimelineForMobile() {
  const isMobile = window.innerWidth <= 992;
  const timelineDots = document.querySelectorAll('.timeline-dot');
  
  if (isMobile) {
    timelineDots.forEach(dot => {
      dot.style.left = '30px';
      dot.style.transform = 'translateX(0)';
    });
  } else {
    timelineDots.forEach(dot => {
      dot.style.left = '50%';
      dot.style.transform = 'translateX(-50%)';
    });
  }
}

// Adjust on load and resize
window.addEventListener('load', adjustTimelineForMobile);
window.addEventListener('resize', adjustTimelineForMobile);

// ====== EASTER EGG: CONFETTI ON 40TH ANNIVERSARY ======
function triggerAnniversaryConfetti() {
  const anniversaryItem = Array.from(document.querySelectorAll('.timeline-year'))
    .find(year => year.textContent === '2022');
  
  if (anniversaryItem) {
    const content = anniversaryItem.closest('.timeline-content');
    
    content.addEventListener('click', () => {
      // Simple confetti effect using emoji
      const confettiEmojis = ['🎉', '🎊', '✨', '🎈', '🎆'];
      const confettiCount = 20;
      
      for (let i = 0; i < confettiCount; i++) {
        const confetti = document.createElement('div');
        confetti.textContent = confettiEmojis[Math.floor(Math.random() * confettiEmojis.length)];
        confetti.style.position = 'fixed';
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.top = '-50px';
        confetti.style.fontSize = '2rem';
        confetti.style.zIndex = '9999';
        confetti.style.pointerEvents = 'none';
        confetti.style.animation = `fall ${2 + Math.random() * 2}s linear`;
        
        document.body.appendChild(confetti);
        
        setTimeout(() => confetti.remove(), 4000);
      }
    });
  }
}

// Add CSS animation for confetti
const style = document.createElement('style');
style.textContent = `
  @keyframes fall {
    to {
      transform: translateY(100vh) rotate(360deg);
      opacity: 0;
    }
  }
`;
document.head.appendChild(style);

// Initialize confetti easter egg
triggerAnniversaryConfetti();

// ====== TIMELINE NAVIGATION ======
function createTimelineNavigation() {
  const timeline = document.querySelector('.timeline');
  if (!timeline) return;
  
  const nav = document.createElement('div');
  nav.className = 'timeline-nav';
  nav.style.position = 'fixed';
  nav.style.right = '30px';
  nav.style.top = '50%';
  nav.style.transform = 'translateY(-50%)';
  nav.style.zIndex = '100';
  nav.style.display = 'flex';
  nav.style.flexDirection = 'column';
  nav.style.gap = '10px';
  
  const timelineItems = document.querySelectorAll('.timeline-item');
  
  timelineItems.forEach((item, index) => {
    const dot = document.createElement('button');
    dot.style.width = '12px';
    dot.style.height = '12px';
    dot.style.borderRadius = '50%';
    dot.style.border = '2px solid #006a7a';
    dot.style.background = 'white';
    dot.style.cursor = 'pointer';
    dot.style.transition = 'all 0.3s ease';
    dot.setAttribute('aria-label', `Jump to timeline item ${index + 1}`);
    
    dot.addEventListener('click', () => {
      item.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });
    
    dot.addEventListener('mouseenter', () => {
      dot.style.background = '#006a7a';
      dot.style.transform = 'scale(1.3)';
    });
    
    dot.addEventListener('mouseleave', () => {
      dot.style.background = 'white';
      dot.style.transform = 'scale(1)';
    });
    
    nav.appendChild(dot);
  });
  
  document.body.appendChild(nav);
  
  // Hide navigation on mobile
  if (window.innerWidth <= 768) {
    nav.style.display = 'none';
  }
}

// Create timeline navigation
window.addEventListener('load', createTimelineNavigation);

console.log('%cHistory Timeline Loaded! 🎉', 'color:#006a7a;font-weight:bold;font-size:16px;');
console.log('%c60+ Years of Excellence', 'color:#a8d5ba;font-size:14px;');