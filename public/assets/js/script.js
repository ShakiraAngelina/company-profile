// ==============================
// PT Arkonin Engineering MP
// script.js - Enhanced with Language Switcher
// ==============================

// ====== SCROLL & UI RESET ON LOAD ======
// Pastikan halaman selalu mulai dari atas dan tidak menggunakan scroll restoration
if ('scrollRestoration' in history) {
  history.scrollRestoration = 'manual';
}
window.addEventListener('load', () => {
  try {
    // Hilangkan hash agar tidak auto-scroll ke anchor saat refresh
    if (location.hash) {
      history.replaceState(null, '', location.pathname + location.search);
    }
    // Paksa posisi scroll ke atas
    window.scrollTo({ top: 0, behavior: 'auto' });
  } catch (e) {
    // noop
  }
});

// ====== PLACEHOLDER IMAGE FALLBACK ======
const PLACEHOLDER_IMG = 'assets/images/placeholder.svg';
document.querySelectorAll('img').forEach(img => {
  img.addEventListener('error', function() {
    if (this.src && !this.dataset.placeholderApplied) {
      this.src = PLACEHOLDER_IMG;
      this.dataset.placeholderApplied = 'true';
      this.classList.add('img-placeholder');
    }
  });
});

// ====== LANGUAGE SWITCHER (Global i18n) ======
// Default language set to English to match navbar display
let currentLang = localStorage.getItem('language') || 'en';
const currentLangDisplay = document.querySelector('.current-lang');
const langOptions = document.querySelectorAll('.lang-option');

// Cache for loaded language maps
const I18N = { maps: {}, loading: null };

async function loadLanguageMap(lang) {
  if (I18N.maps[lang]) return I18N.maps[lang];
  try {
    const res = await fetch(`/assets/i18n/${lang}.json`, { cache: 'no-cache' });
    if (!res.ok) throw new Error(`Failed to fetch i18n for ${lang}`);
    const json = await res.json();
    I18N.maps[lang] = json;
    return json;
  } catch (e) {
    console.warn('[i18n] load error:', e);
    I18N.maps[lang] = {}; // prevent re-fetch loop
    return {};
  }
}

function setElementText(el, value) {
  const tag = el.tagName.toLowerCase();
  if (tag === 'input' || tag === 'textarea') {
    el.setAttribute('placeholder', value);
  } else {
    el.textContent = value;
  }
}

async function switchLanguage(lang) {
  // Load JSON map (if available)
  const map = await loadLanguageMap(lang);

  // Apply i18n keys (JSON-based)
  document.querySelectorAll('[data-i18n-key], [data-i18n-ph], [data-i18n-title], [data-i18n-aria-label], [data-i18n-html]').forEach(el => {
    const key = el.getAttribute('data-i18n-key');
    if (key && map[key] != null) setElementText(el, map[key]);

    const phKey = el.getAttribute('data-i18n-ph');
    if (phKey && map[phKey] != null) el.setAttribute('placeholder', map[phKey]);

    const titleKey = el.getAttribute('data-i18n-title');
    if (titleKey && map[titleKey] != null) el.setAttribute('title', map[titleKey]);

    const ariaKey = el.getAttribute('data-i18n-aria-label');
    if (ariaKey && map[ariaKey] != null) el.setAttribute('aria-label', map[ariaKey]);

    const htmlKey = el.getAttribute('data-i18n-html');
    if (htmlKey && map[htmlKey] != null) el.innerHTML = map[htmlKey];
  });

  // Fallback: elements with data-en/data-id (legacy)
  // Robust: handle elements that have both, or only one of the attributes
  document.querySelectorAll('[data-en], [data-id]').forEach(element => {
    const hasEn = element.hasAttribute('data-en');
    const hasId = element.hasAttribute('data-id');
    let text = null;

    if (lang === 'en' && hasEn) {
      text = element.getAttribute('data-en');
    } else if (lang === 'id' && hasId) {
      text = element.getAttribute('data-id');
    } else if (hasEn && hasId) {
      // If both are present but none matched (shouldn't happen), default to 'en'
      text = element.getAttribute(lang === 'id' ? 'data-id' : 'data-en');
    }

    if (text !== null) setElementText(element, text);
  });

  // Fallback: placeholders with data-ph-en/data-ph-id
  document.querySelectorAll('[data-ph-en],[data-ph-id]').forEach(el => {
    const ph = lang === 'en' ? el.getAttribute('data-ph-en') : el.getAttribute('data-ph-id');
    if (ph !== null) el.setAttribute('placeholder', ph);
  });

  // Update current language display
  const display = document.querySelector('.current-lang');
  if (display) display.textContent = lang.toUpperCase();
}

function setLanguage(lang) {
  currentLang = lang;
  localStorage.setItem('language', lang);
  switchLanguage(lang);
  if (currentLangDisplay) currentLangDisplay.textContent = lang.toUpperCase();
  document.querySelectorAll('.lang-option').forEach(opt => {
    opt.classList.toggle('active', opt.getAttribute('data-lang') === lang);
  });
  document.documentElement.setAttribute('lang', lang === 'id' ? 'id' : 'en');
}

// Bind language options
langOptions.forEach(option => {
  option.addEventListener('click', (e) => {
    e.preventDefault();
    const lang = option.getAttribute('data-lang');
    if (!lang) return;
    setLanguage(lang);
  });
  if (option.getAttribute('data-lang') === currentLang) option.classList.add('active');
});

// Initial language application
switchLanguage(currentLang);

// ====== NAVBAR SCROLL EFFECT ======
let lastScroll = 0;
const header = document.querySelector("header");
const heroExists = document.querySelector('.hero-banner, .hero-section');
if (header && heroExists) {
  header.classList.add('transparent');
}

window.addEventListener("scroll", function() {
  const currentScroll = window.scrollY;
  
  if (currentScroll > 100) {
    header.classList.add("scrolled");
    header.classList.remove('transparent');
  } else {
    header.classList.remove("scrolled");
    if (heroExists) header.classList.add('transparent');
  }
  
  lastScroll = currentScroll;
});

// ====== SMOOTH SCROLLING ======
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function(e) {
    const href = this.getAttribute("href");
    
    // Skip if it's just # or if target doesn't exist
    if (href === "#" || href === "#!" || href === "#language") {
      e.preventDefault();
      return;
    }
    
    const target = document.querySelector(href);
    if (target) {
      e.preventDefault();
      const offsetTop = target.offsetTop - 70;
      
      window.scrollTo({
        top: offsetTop,
        behavior: "smooth"
      });
      
      // Close mobile menu if open
      closeMobileMenu();
      
      // Close search dropdown if open
      if (searchDropdown) {
        searchDropdown.classList.remove("active");
      }
    }
  });
});

// Support links that start with '/#' (navigate within home landing)
document.querySelectorAll('a[href^="/#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    const hash = href.substring(1); // '/#about' -> '#about'

    // If we are already on home/index, do smooth scroll
    const isHome = window.location.pathname === '/' || window.location.pathname.includes('index.html') || window.location.pathname === '';
    if (isHome) {
      const target = document.querySelector(hash);
      if (target) {
        e.preventDefault();
        const offsetTop = target.offsetTop - 70;
        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
        closeMobileMenu();
        if (searchDropdown) {
          searchDropdown.classList.remove('active');
        }
      }
    }
    // Else: allow default navigation to home with hash
  });
});

// ====== HANDLE ABOUT US NAVIGATION ======
const aboutUsLinks = document.querySelectorAll('a[href="about.html"], a[href*="#about"]');

aboutUsLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    const href = this.getAttribute('href');
    
    // If it's about.html page link
    if (href === 'about.html') {
      // Let the browser handle the navigation normally
      return;
    }
    
    // If it's anchor link to #about section on same page
    if (href.includes('#about')) {
      e.preventDefault();
      
      // Check if we're on index page
      const isIndexPage = window.location.pathname === '/' || 
                          window.location.pathname.includes('index.html') ||
                          window.location.pathname === '';
      
      if (isIndexPage) {
        // Scroll to about section
        const aboutSection = document.querySelector('#about, .about-section');
        if (aboutSection) {
          const offsetTop = aboutSection.offsetTop - 70;
          window.scrollTo({
            top: offsetTop,
            behavior: "smooth"
          });
        }
      } else {
        // Navigate to index page with about hash
        window.location.href = 'index.html#about';
      }
      
      closeMobileMenu();
    }
  });
});

// ====== MOBILE NAVIGATION ======
const menuIcon = document.querySelector(".menu-icon");
const navLinks = document.querySelector(".nav-links");
const closeMenuBtn = document.querySelector(".close-menu");

function closeMobileMenu() {
  if (navLinks && menuIcon) {
    navLinks.classList.remove("open");
    menuIcon.classList.remove("active");
  }
}

if (menuIcon && navLinks) {
  menuIcon.addEventListener("click", (e) => {
    e.stopPropagation();
    navLinks.classList.toggle("open");
    menuIcon.classList.toggle("active");
  });

  // Close menu when clicking outside
  document.addEventListener("click", (e) => {
    if (!menuIcon.contains(e.target) && !navLinks.contains(e.target)) {
      closeMobileMenu();
    }
  });

  // Prevent closing when clicking inside nav-links
  navLinks.addEventListener("click", (e) => {
    e.stopPropagation();
  });
}

// Close via X button on overlay
if (closeMenuBtn) {
  closeMenuBtn.addEventListener("click", (e) => {
    e.preventDefault();
    closeMobileMenu();
  });
}

// ====== Mobile Accordion for Dropdowns ======
function isMobile() { return window.innerWidth <= 1024; }
// Toggle via arrow button only, allow text link to navigate
document.querySelectorAll('.dropdown .dropdown-toggle').forEach(btn => {
  btn.addEventListener('click', (e) => {
    if (!isMobile()) return;
    e.preventDefault();
    e.stopPropagation();
    const parent = btn.closest('.dropdown');
    if (!parent) return;
    const isActive = parent.classList.contains('active');
    // close others for accordion behavior
    document.querySelectorAll('.dropdown.active').forEach(d => { if (d !== parent) d.classList.remove('active'); });
    parent.classList.toggle('active', !isActive);
    // update aria-expanded on button
    btn.setAttribute('aria-expanded', String(!isActive));
  });
});

// Khusus menu bahasa: izinkan klik pada teks EN untuk membuka dropdown di mobile
const languageBtn = document.querySelector('.language-selector .language-btn');
if (languageBtn) {
  languageBtn.addEventListener('click', (e) => {
    if (!isMobile()) return; // di desktop tetap pakai hover
    e.preventDefault();
    e.stopPropagation();
    const parent = languageBtn.closest('.dropdown');
    if (!parent) return;
    const isActive = parent.classList.contains('active');
    document.querySelectorAll('.dropdown.active').forEach(d => { if (d !== parent) d.classList.remove('active'); });
    parent.classList.toggle('active', !isActive);
  });
}

// ====== Smooth scroll for submenu links on same page and auto-close hamburger ======
document.querySelectorAll('.nav-links a[href*="#"]').forEach(link => {
  link.addEventListener('click', (e) => {
    const href = link.getAttribute('href');
    if (!href) return;
    try {
      const url = new URL(href, window.location.href);
      // Only intercept when the target page equals current page
      if (url.pathname === window.location.pathname && url.hash) {
        const target = document.querySelector(url.hash);
        if (target) {
          e.preventDefault();
          const headerOffset = 70;
          const top = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({ top, behavior: 'smooth' });
          closeMobileMenu();
        }
      }
    } catch (_) {
      // Ignore malformed URLs
    }
  });
});

// ====== DISABLE NAVBAR DROPDOWNS COMPLETELY ======
const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach(dropdown => {
  dropdown.classList.remove('active');
  const toggle = dropdown.querySelector('.dropdown-toggle');
  if (toggle) toggle.setAttribute('aria-expanded', 'false');
});

// ====== SEARCH DROPDOWN (below navbar) ======
const searchBtn = document.querySelector(".search-btn");
const searchDropdown = document.querySelector(".search-dropdown");
const closeSearchDropdown = document.querySelector(".close-search-dropdown");
const searchInput = document.querySelector(".search-input");

// Toggle search dropdown below navbar
if (searchBtn && searchDropdown) {
  searchBtn.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    searchDropdown.classList.toggle('active');
    if (searchDropdown.classList.contains('active') && searchInput) {
      setTimeout(() => searchInput.focus(), 30);
    }
  });
}

if (closeSearchDropdown && searchDropdown) {
  closeSearchDropdown.addEventListener("click", () => {
    searchDropdown.classList.remove("active");
  });
}

// Close search when clicking outside dropdown and button
document.addEventListener("click", (e) => {
  if (!searchDropdown) return;
  const clickedInside = searchDropdown.contains(e.target);
  const clickedBtn = searchBtn && searchBtn.contains(e.target);
  if (!clickedInside && !clickedBtn) {
    searchDropdown.classList.remove("active");
  }
});

// Close on ESC key
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && searchDropdown) {
    searchDropdown.classList.remove("active");
  }
});

// ====== SEARCH FUNCTIONALITY ======
const resultsContainer = document.querySelector('.search-results');
let __searchIndex = null;

async function buildSearchIndex() {
  if (__searchIndex) return __searchIndex;
  const pages = ['/', '/about', '/expertise', '/insights', '/careers', '/contact'];
  const index = [];
  const parser = new DOMParser();

  const collectFromDoc = (doc, url) => {
    const pageTitle = (doc.querySelector('title')?.textContent || url).trim();
    // Item tingkat halaman (tetap ada untuk kata kunci umum)
    const pageTextNodes = Array.from(doc.querySelectorAll('h1,h2,h3,h4,p,li,section,article'));
    const pageText = pageTextNodes.map(n => (n.textContent || '')).join(' ').replace(/\s+/g, ' ').trim();
    if (pageText.length) index.push({ type: 'page', pageTitle, title: pageTitle, url, text: pageText });

    // Item tingkat section: buat tautan langsung ke anchor id
    const sections = Array.from(doc.querySelectorAll('section[id], div[id], article[id], h1[id], h2[id], h3[id]'));
    sections.forEach(el => {
      const id = el.id;
      if (!id) return;
      let heading = '';
      if (/^H[1-6]$/.test(el.tagName)) {
        heading = (el.textContent || '').trim();
      } else {
        const headEl = el.querySelector('h1,h2,h3,h4,h5,h6');
        heading = (headEl?.textContent || '').trim();
      }
      if (!heading) heading = id;

      const textNodes = Array.from(el.querySelectorAll('p,li'));
      const sectionText = (textNodes.length ? textNodes.map(n => (n.textContent || '')).join(' ') : (el.textContent || ''))
        .replace(/\s+/g, ' ') 
        .trim();

      index.push({
        type: 'section',
        pageTitle,
        heading,
        anchor: id,
        title: `${pageTitle} — ${heading}`,
        url: `${url}#${id}`,
        text: sectionText
      });
    });
  };

  // Halaman saat ini
  try { collectFromDoc(document, window.location.pathname || '/'); } catch (_) {}

  // Ambil halaman lain
  await Promise.all(pages.map(async (p) => {
    const current = window.location.pathname || '/';
    if (p === current) return;
    try {
      const res = await fetch(p, { credentials: 'same-origin' });
      if (!res.ok) return;
      const html = await res.text();
      const doc = parser.parseFromString(html, 'text/html');
      collectFromDoc(doc, p);
    } catch (_) { /* ignore */ }
  }));

  // Deduplikasi entri yang sama
  const seen = new Set();
  const unique = index.filter(item => {
    const key = `${item.url}|${item.title}`;
    if (seen.has(key)) return false;
    seen.add(key);
    return true;
  });

  __searchIndex = unique;
  return unique;
}

function highlight(text, query) {
  const q = query.trim();
  if (!q) return text;
  const escaped = q.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  const re = new RegExp(escaped, 'ig');
  return text.replace(re, (m) => `<mark>${m}</mark>`);
}

function getSnippet(text, query, radius = 80) {
  const idx = text.toLowerCase().indexOf(query.toLowerCase());
  if (idx < 0) return text.slice(0, radius * 2) + (text.length > radius * 2 ? '…' : '');
  const start = Math.max(0, idx - radius);
  const end = Math.min(text.length, idx + query.length + radius);
  const snippet = text.slice(start, end);
  return (start > 0 ? '…' : '') + snippet + (end < text.length ? '…' : '');
}

function renderResults(results, query) {
  if (!resultsContainer) return;
  if (!query) { resultsContainer.innerHTML = ''; return; }
  if (!results.length) {
    resultsContainer.innerHTML = `<div class="search-empty">Tidak ada hasil untuk "${query}"</div>`;
    return;
  }
  const html = results.slice(0, 12).map(r => {
    const snippet = getSnippet(r.text, query);
    const linkText = r.type === 'section' ? r.heading : r.title;
    const meta = r.type === 'section' ? `<div class="meta">${r.pageTitle}</div>` : '';
    const snippetHtml = r.type === 'section' ? '' : `<div class="snippet">${highlight(snippet, query)}</div>`;
    return `<div class="search-result">
      <a href="${r.url}">${highlight(linkText, query)}</a>
      ${meta}
      ${snippetHtml}
    </div>`;
  }).join('');
  resultsContainer.innerHTML = html;
}

function scoreText(text, tokens) {
  const lower = text.toLowerCase();
  let score = 0;
  tokens.forEach(t => { if (t && lower.includes(t)) score += 1; });
  return score;
}

function scoreItem(item, tokens, q) {
  const lowerQ = q.toLowerCase();
  const inText = scoreText(item.text || '', tokens);
  let score = inText;
  // Bobot tinggi untuk kecocokan judul section
  if (item.type === 'section') {
    const h = (item.heading || '').toLowerCase();
    if (h.includes(lowerQ)) score += 100; // prioritas utama
    // bonus jika prefix cocok
    if (h.startsWith(lowerQ)) score += 50;
  }
  // Bonus untuk judul halaman cocok
  const page = (item.pageTitle || item.title || '').toLowerCase();
  if (page.includes(lowerQ)) score += 20;
  return score;
}

async function performSearch(query) {
  const q = query.trim();
  if (!q) { renderResults([], ''); return; }
  const idx = await buildSearchIndex();
  const tokens = q.toLowerCase().split(/\s+/).filter(Boolean);
  const ranked = idx.map(item => ({
    ...item,
    score: scoreItem(item, tokens, q)
  })).filter(i => i.score > 0).sort((a, b) => {
    // Sections selalu didahulukan saat skor sama
    if (b.score === a.score && a.type !== b.type) {
      return a.type === 'section' ? -1 : 1;
    }
    return b.score - a.score;
  });
  renderResults(ranked, q);
}

if (searchInput) {
  searchInput.addEventListener('input', (e) => {
    performSearch(searchInput.value);
  });
  searchInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      performSearch(searchInput.value);
    }
  });
}

// ====== BACK TO TOP BUTTON ======
const backToTop = document.createElement("button");
backToTop.innerHTML = "↑";
backToTop.classList.add("back-to-top");
backToTop.setAttribute("aria-label", "Back to top");
document.body.appendChild(backToTop);

window.addEventListener("scroll", () => {
  if (window.scrollY > 400) {
    backToTop.classList.add("show");
  } else {
    backToTop.classList.remove("show");
  }

  // Toggle white circular style when overlapping footer
  const footerEl = document.querySelector('footer');
  if (footerEl) {
    const rect = footerEl.getBoundingClientRect();
    const footerVisible = rect.top < window.innerHeight; // footer entering viewport
    if (footerVisible) {
      backToTop.classList.add('at-footer');
    } else {
      backToTop.classList.remove('at-footer');
    }
  }
});

backToTop.addEventListener("click", () => {
  window.scrollTo({ 
    top: 0, 
    behavior: "smooth" 
  });
});

// ====== HERO TEXT ANIMATION ======
window.addEventListener("load", () => {
  const heroContent = document.querySelector(".hero-content");
  if (heroContent) {
    heroContent.style.opacity = 0;
    heroContent.style.transform = "translateY(30px)";
    
    setTimeout(() => {
      heroContent.style.transition = "all 1.2s ease";
      heroContent.style.opacity = 1;
      heroContent.style.transform = "translateY(0)";
    }, 300);
  }
});

// Scroll to hash target on initial load (with header offset)
window.addEventListener('load', () => {
  if (window.location.hash && window.location.hash !== '#!' && window.location.hash !== '#language') {
    const target = document.querySelector(window.location.hash);
    if (target) {
      const offsetTop = target.offsetTop - 70;
      window.scrollTo({ top: offsetTop, behavior: 'smooth' });
    }
  }
});

// ====== INTERSECTION OBSERVER FOR ANIMATIONS ======
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -100px 0px"
};

const observer = new IntersectionObserver((entries, obs) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;

    const el = entry.target;
    if (el.dataset.animated === 'true') {
      // Sudah dianimasikan, hentikan observasi untuk memastikan tidak terulang
      obs.unobserve(el);
      return;
    }

    // Jalankan animasi sekali
    el.style.opacity = 1;
    el.style.transform = "translateY(0)";
    el.dataset.animated = 'true';
    // Hentikan observasi setelah animasi pertama
    obs.unobserve(el);
  });
}, observerOptions);

// Observe portfolio cards
document.querySelectorAll(".portfolio-card").forEach((card, index) => {
  card.style.opacity = 0;
  card.style.transform = "translateY(30px)";
  card.dataset.initialTransform = "translateY(30px)";
  card.style.transition = `all 0.6s ease ${index * 0.1}s`;
  observer.observe(card);
});

// Fallback: if cards stay hidden (observer not firing), force them visible
window.addEventListener('load', () => {
  const firstCard = document.querySelector('.portfolio-card');
  if (firstCard) {
    const computed = window.getComputedStyle(firstCard);
    const isHidden = Number(computed.opacity) < 0.1;
    if (isHidden) {
      document.querySelectorAll('.portfolio-card').forEach(c => {
        c.style.opacity = 1;
        c.style.transform = 'none';
      });
    }
  }
});

// Observe timeline items (History page)
document.querySelectorAll('.timeline-item').forEach((item, index) => {
  const isLeft = item.classList.contains('left');
  const initialTranslate = isLeft ? 'translateX(-30px)' : 'translateX(30px)';
  item.style.opacity = 0;
  item.style.transform = initialTranslate;
  item.dataset.initialTransform = initialTranslate;
  item.style.transition = `all 0.6s ease ${index * 0.08}s`;
  observer.observe(item);
});

// Observe generic reveal elements (About landing sections)
document.querySelectorAll('.reveal').forEach((el, index) => {
  el.style.opacity = 0;
  el.style.transform = 'translateY(24px)';
  el.dataset.initialTransform = 'translateY(24px)';
  el.style.transition = `all 0.6s ease ${index * 0.08}s`;
  observer.observe(el);
});

// Observe about section parts
const aboutLeft = document.querySelector(".about-left");
if (aboutLeft) {
  aboutLeft.style.opacity = 0;
  aboutLeft.style.transform = "translateY(30px)";
  aboutLeft.dataset.initialTransform = "translateY(30px)";
  aboutLeft.style.transition = "all 0.8s ease";
  observer.observe(aboutLeft);
}

const aboutRight = document.querySelector(".about-right");
if (aboutRight) {
  aboutRight.style.opacity = 0;
  aboutRight.style.transform = "translateY(30px)";
  aboutRight.dataset.initialTransform = "translateY(30px)";
  aboutRight.style.transition = "all 0.8s ease 0.2s";
  observer.observe(aboutRight);
}

// Observe news items
document.querySelectorAll(".news-item").forEach((item, index) => {
  item.style.opacity = 0;
  item.style.transform = "translateX(20px)";
  item.dataset.initialTransform = "translateX(20px)";
  item.style.transition = `all 0.5s ease ${0.4 + (index * 0.1)}s`;
  observer.observe(item);
});

// ====== PORTFOLIO CARD HOVER EFFECT ======
const portfolioCards = document.querySelectorAll(".portfolio-card");
portfolioCards.forEach(card => {
  card.addEventListener("mouseenter", function() {
    this.style.zIndex = "10";
  });
  
  card.addEventListener("mouseleave", function() {
    this.style.zIndex = "1";
  });
});

// ====== PORTFOLIO HORIZONTAL SCROLL ======
const portfolioGrid = document.querySelector(".portfolio-grid");
const scrollLeftBtn = document.querySelector(".scroll-left");
const scrollRightBtn = document.querySelector(".scroll-right");

if (scrollLeftBtn && scrollRightBtn && portfolioGrid) {
  scrollLeftBtn.addEventListener("click", () => {
    portfolioGrid.scrollBy({
      left: -370,
      behavior: "smooth"
    });
  });

  scrollRightBtn.addEventListener("click", () => {
    portfolioGrid.scrollBy({
      left: 370,
      behavior: "smooth"
    });
  });

  // Update button visibility based on scroll position
  function updateScrollButtons() {
    const scrollLeft = portfolioGrid.scrollLeft;
    const maxScroll = portfolioGrid.scrollWidth - portfolioGrid.clientWidth;

    if (scrollLeft <= 0) {
      scrollLeftBtn.style.opacity = "0.5";
      scrollLeftBtn.style.cursor = "default";
    } else {
      scrollLeftBtn.style.opacity = "1";
      scrollLeftBtn.style.cursor = "pointer";
    }

    if (scrollLeft >= maxScroll - 1) {
      scrollRightBtn.style.opacity = "0.5";
      scrollRightBtn.style.cursor = "default";
    } else {
      scrollRightBtn.style.opacity = "1";
      scrollRightBtn.style.cursor = "pointer";
    }
  }

  portfolioGrid.addEventListener("scroll", updateScrollButtons);
  window.addEventListener("load", updateScrollButtons);
  window.addEventListener("resize", updateScrollButtons);
}

// ====== TAB ACTIVE STATE ======
const tabLinks = document.querySelectorAll(".tab-link");
tabLinks.forEach(tab => {
  tab.addEventListener("click", function(e) {
    // Don't prevent default if it's a real link
    if (this.getAttribute('href') !== '#') {
      return;
    }
    e.preventDefault();
    tabLinks.forEach(t => t.classList.remove("active"));
    this.classList.add("active");
  });
});

// ====== LAZY LOADING IMAGES ======
if ('IntersectionObserver' in window) {
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        if (img.dataset.src) {
          img.src = img.dataset.src;
          img.removeAttribute('data-src');
          img.classList.add('loaded');
        }
        observer.unobserve(img);
      }
    });
  });

  document.querySelectorAll('img[data-src]').forEach(img => {
    imageObserver.observe(img);
  });
}

// ====== HERO SLIDER + PARALLAX ======
function getActiveHeroImage() {
  const active = document.querySelector('.hero-slider .slide.active .hero-image img');
  return active || document.querySelector('.hero-image img');
}

const initialHeroImage = getActiveHeroImage();
if (initialHeroImage) {
  window.addEventListener('scroll', () => {
    const img = getActiveHeroImage();
    if (img) {
      const scrolled = window.scrollY;
      const parallax = scrolled * 0.5;
      if (scrolled < window.innerHeight) {
        img.style.transform = `translateY(${parallax}px)`;
      }
    }
  });
}

const slides = document.querySelectorAll('.hero-slider .slide');
const prevBtn = document.querySelector('.slider-btn.prev');
const nextBtn = document.querySelector('.slider-btn.next');
const dots = document.querySelectorAll('.slider-dots .dot');
// Preview elements (synced with main slides)
const previewSlides = document.querySelectorAll('.hero-preview .preview-slide');
const previewPrev = document.querySelector('.preview-btn.prev');
const previewNext = document.querySelector('.preview-btn.next');

let currentSlide = 0;
let autoTimer = null;

function showSlide(index) {
  if (!slides.length) return;
  currentSlide = (index + slides.length) % slides.length;
  slides.forEach((s, i) => s.classList.toggle('active', i === currentSlide));
  dots.forEach((d, i) => {
    d.classList.toggle('active', i === currentSlide);
    d.setAttribute('aria-selected', i === currentSlide ? 'true' : 'false');
  });
  // Sync preview slides
  if (previewSlides.length) {
    previewSlides.forEach((p, i) => p.classList.toggle('active', i === currentSlide));
  }
}

function nextSlide() { showSlide(currentSlide + 1); }
function prevSlide() { showSlide(currentSlide - 1); }

function startAutoPlay() { stopAutoPlay(); autoTimer = setInterval(nextSlide, 6000); }
function stopAutoPlay() { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }

if (slides.length) {
  showSlide(0);
  startAutoPlay();
  if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); startAutoPlay(); });
  if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); startAutoPlay(); });
  // Preview controls also control main slider
  if (previewNext) previewNext.addEventListener('click', () => { nextSlide(); startAutoPlay(); });
  if (previewPrev) previewPrev.addEventListener('click', () => { prevSlide(); startAutoPlay(); });
  dots.forEach(dot => dot.addEventListener('click', () => { const i = parseInt(dot.dataset.slide, 10); showSlide(i); startAutoPlay(); }));

  const heroSection = document.querySelector('.hero-section');
  if (heroSection) {
    heroSection.addEventListener('mouseenter', stopAutoPlay);
    heroSection.addEventListener('mouseleave', startAutoPlay);
    let startX = null;
    heroSection.addEventListener('touchstart', (e) => { startX = e.changedTouches[0].clientX; stopAutoPlay(); });
    heroSection.addEventListener('touchend', (e) => {
      const dx = e.changedTouches[0].clientX - (startX ?? e.changedTouches[0].clientX);
      if (dx > 40) prevSlide(); else if (dx < -40) nextSlide();
      startAutoPlay();
    });
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') prevSlide();
    if (e.key === 'ArrowRight') nextSlide();
  });
}

// ====== FOOTER YEAR AUTO UPDATE ======
// Footer bottom dihapus, tidak perlu memperbarui teks dinamis

// ====== PAGE LOAD PERFORMANCE ======
window.addEventListener("load", () => {
  document.body.classList.add("loaded");
  
  // Apply saved language
  if (currentLang) {
    switchLanguage(currentLang);
  }
  
  // Handle hash navigation (e.g., index.html#about)
  if (window.location.hash) {
    setTimeout(() => {
      const targetId = window.location.hash;
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        const offsetTop = targetElement.offsetTop - 70;
        window.scrollTo({
          top: offsetTop,
          behavior: "smooth"
        });
      }
    }, 500);
  }
  
  // Log page load time
  if (window.performance && window.performance.timing) {
    const loadTime = window.performance.timing.domContentLoadedEventEnd - 
                     window.performance.timing.navigationStart;
    console.log(`%cPage loaded in ${loadTime}ms`, "color:#006a7a;font-weight:bold;");
  }
});

// ====== ACTIVE NAV LINK HIGHLIGHTING ======
function highlightActiveNav() {
  // Normalize current path to compare without extension
  const path = window.location.pathname.replace(/\/+$/, '');
  let currentPage = path.split('/').pop() || 'index';
  currentPage = currentPage.replace(/\.html$/, '');

  const navLinks = document.querySelectorAll('.nav-links a');
  
  navLinks.forEach(link => {
    const href = (link.getAttribute('href') || '').trim();
    // Skip pure hash links
    if (href.startsWith('#')) return;

    let hrefPage = href.replace(/^\//, '').split('/').pop();
    hrefPage = hrefPage.replace(/\.html$/, '').replace(/#.*$/, '');

    if (hrefPage === currentPage || (currentPage === '' && hrefPage === 'index')) {
      link.classList.add('active');

      // Also highlight parent dropdown if exists
      const parentDropdown = link.closest('.dropdown');
      if (parentDropdown) {
        const dropdownLink = parentDropdown.querySelector('a');
        if (dropdownLink) {
          dropdownLink.classList.add('active');
        }
      }
    }
  });
}

// Run on page load
highlightActiveNav();

// ====== CONSOLE BRANDING ======
  console.log("%cArkonin Engineering MP", "color:#006a7a;font-weight:bold;font-size:24px;font-family:Poppins,sans-serif;");
  console.log("%cDelivering Practical Engineering Solutions", "color:#333;font-size:14px;font-family:Poppins,sans-serif;");
  console.log("%cLanguage: " + (localStorage.getItem('language') || currentLang).toUpperCase(), "color:#666;font-size:12px;");

  // Inisialisasi AOS global jika tersedia, dengan opsi sekali
  if (window.AOS && typeof window.AOS.init === 'function') {
    window.AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });
  }

// ====== UTILITY: Detect Language from Browser ======
function detectBrowserLanguage() {
  const browserLang = navigator.language || navigator.userLanguage;
  if (browserLang.startsWith('id')) {
    return 'id';
  }
  return 'en';
}

// Auto-detect language on first visit
if (!localStorage.getItem('language')) {
  const detectedLang = detectBrowserLanguage();
  currentLang = detectedLang;
  localStorage.setItem('language', detectedLang);
  switchLanguage(detectedLang);
  document.documentElement.setAttribute('lang', detectedLang === 'id' ? 'id' : 'en');
} else {
  // Ensure document lang reflects stored preference
  document.documentElement.setAttribute('lang', localStorage.getItem('language') === 'id' ? 'id' : 'en');
}
// Observe leadership cards
document.querySelectorAll('.cards-grid .card').forEach((card, index) => {
  card.style.opacity = 0;
  card.style.transform = 'translateY(24px) scale(0.98)';
  card.dataset.initialTransform = 'translateY(24px) scale(0.98)';
  card.style.transition = `all 0.6s ease ${index * 0.1}s`;
  observer.observe(card);
});

// Observe purpose checklist items
document.querySelectorAll('.check-card').forEach((item, index) => {
  item.style.opacity = 0;
  item.style.transform = 'translateX(20px)';
  item.dataset.initialTransform = 'translateX(20px)';
  item.style.transition = `all 0.6s ease ${index * 0.08}s`;
  observer.observe(item);
});

// Observe management list items
document.querySelectorAll('.management-list .list-item').forEach((item, index) => {
  item.style.opacity = 0;
  item.style.transform = 'translateY(20px)';
  item.dataset.initialTransform = 'translateY(20px)';
  item.style.transition = `all 0.5s ease ${index * 0.08}s`;
  observer.observe(item);
});

// Observe client logos
document.querySelectorAll('.logos-grid img').forEach((logo, index) => {
  logo.style.opacity = 0;
  logo.style.transform = 'scale(0.92)';
  logo.dataset.initialTransform = 'scale(0.92)';
  logo.style.transition = `all 0.5s ease ${index * 0.06}s`;
  observer.observe(logo);
});

// Observe testimonials quote cards
document.querySelectorAll('.quote-card').forEach((q, index) => {
  q.style.opacity = 0;
  q.style.transform = 'translateY(24px)';
  q.dataset.initialTransform = 'translateY(24px)';
  q.style.transition = `all 0.6s ease ${index * 0.1}s`;
  observer.observe(q);
});

// ====== TESTIMONIALS: 3D Swipe Slider with Autoplay ======
(function initTestimonialSlider() {
  const slider = document.querySelector('.testimonial-slider');
  if (!slider) return;

  const track = slider.querySelector('.t-track');
  const cards = Array.from(track.querySelectorAll('.t-card'));
  const prevBtn = slider.querySelector('.t-prev');
  const nextBtn = slider.querySelector('.t-next');
  const dotsWrap = slider.querySelector('.t-dots');

  let idx = 0;
  let autoTimer = null;
  const AUTO_MS = 5000; // autoplay setiap 5 detik

  function renderDots() {
    if (!dotsWrap) return;
    dotsWrap.innerHTML = '';
    cards.forEach((_, i) => {
      const d = document.createElement('button');
      d.className = 'dot' + (i === idx ? ' is-active' : '');
      d.setAttribute('role', 'tab');
      d.setAttribute('aria-label', `Go to testimonial ${i + 1}`);
      d.addEventListener('click', () => {
        idx = i;
        update();
        restartAuto();
      });
      dotsWrap.appendChild(d);
    });
  }

  function setTrackHeight() {
    const active = cards[idx];
    if (active && track) {
      track.style.height = active.offsetHeight + 'px';
    }
  }

  function update() {
    const prevIndex = (idx - 1 + cards.length) % cards.length;
    const nextIndex = (idx + 1) % cards.length;
    cards.forEach((c, i) => {
      c.classList.remove('is-prev', 'is-active', 'is-next');
      c.style.opacity = 0; // default: tersembunyi
      if (i === idx) { c.classList.add('is-active'); c.style.opacity = 1; }
      else if (i === prevIndex) { c.classList.add('is-prev'); c.style.opacity = 1; }
      else if (i === nextIndex) { c.classList.add('is-next'); c.style.opacity = 1; }
    });
    setTrackHeight();
    renderDots();
  }

  function next() { idx = (idx + 1) % cards.length; update(); }
  function prev() { idx = (idx - 1 + cards.length) % cards.length; update(); }

  function startAuto() {
    if (autoTimer) return;
    autoTimer = setInterval(next, AUTO_MS);
  }
  function stopAuto() {
    clearInterval(autoTimer);
    autoTimer = null;
  }
  function restartAuto() { stopAuto(); startAuto(); }

  // Init
  update();
  startAuto();

  // Controls
  if (nextBtn) nextBtn.addEventListener('click', () => { next(); restartAuto(); });
  if (prevBtn) prevBtn.addEventListener('click', () => { prev(); restartAuto(); });

  // Autoplay tidak berhenti saat hover agar terus bergeser

  // Touch swipe
  let startX = null;
  track.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', (e) => {
    if (startX == null) return;
    const dx = e.changedTouches[0].clientX - startX;
    if (Math.abs(dx) > 30) { dx < 0 ? next() : prev(); restartAuto(); }
    startX = null;
  });

  // Responsif: sesuaikan tinggi saat resize
  window.addEventListener('resize', setTrackHeight);
  // ====== EXPERTISE PAGE INTERACTIONS ======
  (function initExpertiseInteractions(){
    // 1) Environmental: swipeable slider + tilt
    const envSlider = document.querySelector('.env-3d-slider');
    const leftBtn = document.querySelector('.env-scroll.env-left');
    const rightBtn = document.querySelector('.env-scroll.env-right');
    if(envSlider){
      const scrollAmt = Math.min(360, Math.max(240, envSlider.clientWidth/3));
      leftBtn && leftBtn.addEventListener('click', ()=> envSlider.scrollBy({left: -scrollAmt, behavior: 'smooth'}));
      rightBtn && rightBtn.addEventListener('click', ()=> envSlider.scrollBy({left: scrollAmt, behavior: 'smooth'}));

      envSlider.querySelectorAll('.env-card').forEach(card => {
        const maxTilt = 10; // deg
        const maxTransZ = 30; // px
        const onMove = (e) => {
          const rect = card.getBoundingClientRect();
          const mx = (e.clientX - rect.left) / rect.width - 0.5;
          const my = (e.clientY - rect.top) / rect.height - 0.5;
          const rx = (+my)*maxTilt;
          const ry = (-mx)*maxTilt;
          const tz = maxTransZ * (1 - Math.hypot(mx,my));
          card.style.transform = `rotateX(${rx}deg) rotateY(${ry}deg) translateZ(${tz}px)`;
        };
        const reset = () => { card.style.transform = 'translateZ(0)'; };
        card.addEventListener('mousemove', onMove, {passive:true});
        card.addEventListener('mouseleave', reset);
      });
    }

    // 2) Infrastructure: pipeline progress animation on intersection
    const infraFlow = document.querySelector('.infra-flow');
    if(infraFlow){
      const obs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if(entry.isIntersecting){ infraFlow.classList.add('active'); }
        });
      }, { threshold: 0.3 });
      obs.observe(infraFlow);
    }

    // 3) Community: parallax background on scroll
    const parallaxBg = document.querySelector('.community-immersive .parallax-bg');
    if(parallaxBg){
      const onScroll = () => {
        const rect = parallaxBg.parentElement.getBoundingClientRect();
        const viewportH = window.innerHeight || document.documentElement.clientHeight;
        const progress = Math.min(1, Math.max(0, (viewportH - rect.top) / (viewportH + rect.height)));
        const translate = (progress * 30) - 15; // -15px..15px
        parallaxBg.style.transform = `translateY(${translate}px)`;
      };
      window.addEventListener('scroll', onScroll, {passive:true});
      onScroll();
    }

    // 4) Electrical: cyclic node highlight
    const elecNodes = Array.from(document.querySelectorAll('.elec-node'));
    if(elecNodes.length){
      let idx = 0;
      setInterval(() => {
        elecNodes.forEach(n => n.classList.remove('active'));
        elecNodes[idx % elecNodes.length].classList.add('active');
        idx++;
      }, 2200);
    }

    // 5) Featured Projects: centered swipe carousel with active middle card
    const fpContainer = document.querySelector('.expertise-page .portfolio-scroll-container');
    const fpTrack = fpContainer ? fpContainer.querySelector('.portfolio-grid') : null;
    const fpCards = fpTrack ? Array.from(fpTrack.querySelectorAll('.portfolio-card')) : [];
    if (fpContainer && fpTrack && fpCards.length) {
      // Helper: center a given card in the container
      function centerCard(card, smooth = true) {
        const cRect = fpContainer.getBoundingClientRect();
        const rect = card.getBoundingClientRect();
        const delta = (rect.left + rect.width / 2) - (cRect.left + cRect.width / 2);
        fpContainer.scrollBy({ left: delta, behavior: smooth ? 'smooth' : 'auto' });
      }

      // Helper: update active card by closest to center
      function updateActive() {
        const cRect = fpContainer.getBoundingClientRect();
        let best = { idx: 0, dist: Infinity };
        fpCards.forEach((card, i) => {
          const r = card.getBoundingClientRect();
          const d = Math.abs((r.left + r.width/2) - (cRect.left + cRect.width/2));
          if (d < best.dist) best = { idx: i, dist: d };
        });
        fpCards.forEach((c, i) => c.classList.toggle('active', i === best.idx));
      }

      // Init: choose middle as active and center it
      const mid = Math.floor(fpCards.length / 2);
      fpCards.forEach((c, i) => c.classList.toggle('active', i === mid));
      centerCard(fpCards[mid], false);

      // Keep active in sync while user swipes
      fpContainer.addEventListener('scroll', () => { updateActive(); });
      window.addEventListener('resize', () => { updateActive(); });

      // Optional: right button (if present) continues to work but uses container scroll
      const rightBtn = document.querySelector('.scroll-right');
      const leftBtn = document.querySelector('.scroll-left');
      const step = 370;
      rightBtn && rightBtn.addEventListener('click', () => fpContainer.scrollBy({ left: step, behavior: 'smooth' }));
      leftBtn && leftBtn.addEventListener('click', () => fpContainer.scrollBy({ left: -step, behavior: 'smooth' }));
    }

    // Strengthen generic reveal for these sections (if not already visible)
    document.querySelectorAll('.reveal').forEach((el, index) => {
      el.style.opacity = el.style.opacity || 0;
      el.style.transform = el.style.transform || 'translateY(16px)';
      el.style.transition = el.style.transition || `all 0.6s ease ${index * 0.08}s`;
    });
  })();
})();

// (rolled back) — hero 3D tilt removed per request

// ===== Infrastructure counters & fade-in =====
(function initInfrastructureCounters(){
  const cards = document.querySelectorAll('.infra-card');
  if (!cards.length) return;

  // Prepare reveal via existing observer
  cards.forEach((card, index) => {
    card.style.opacity = 0;
    card.style.transform = 'translateY(18px)';
    card.dataset.initialTransform = 'translateY(18px)';
    card.style.transition = `all 0.6s ease ${index * 0.08}s`;
    if (typeof observer !== 'undefined' && observer) {
      observer.observe(card);
    }
  });

  function animateCount(el){
    if (!el || el.dataset.counted === 'true') return;
    const target = parseInt(el.dataset.target || '0', 10);
    const suffix = el.dataset.suffix || '';
    const duration = 1400; // ms
    const start = 0;
    const startTime = performance.now();

    function tick(now){
      const progress = Math.min((now - startTime) / duration, 1);
      // easeOutCubic
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = Math.floor(start + (target - start) * eased);
      el.textContent = `${value}${suffix}`;
      if (progress < 1){
        requestAnimationFrame(tick);
      } else {
        el.dataset.counted = 'true';
      }
    }
    requestAnimationFrame(tick);
  }

  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        const num = entry.target.querySelector('.infra-number[data-target]');
        if (num) animateCount(num);
      }
    });
  }, { threshold: 0.3, rootMargin: '0px 0px -60px 0px' });

  cards.forEach(card => counterObserver.observe(card));
})();