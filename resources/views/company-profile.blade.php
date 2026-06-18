<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Arkonin Engineering MP — Corporate Landing</title>
  <base href="/">
  <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
 <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script defer src="{{ asset('assets/js/script.js') }}"></script>
</head>
<body class="company-landing-page">
  @include('partials.nav')

  <!-- Hero -->
  <section class="hero clean">
    <div class="hero-wrap">
      <div class="hero-media">
        <img src="https://images.unsplash.com/photo-1482192596544-9eb780fc7f66?auto=format&fit=crop&w=2000&q=60" alt="Urban Infrastructure" />
        <div class="overlay"></div>
      </div>
      <div class="hero-content">
        <h1>Building a Sustainable Future Together</h1>
        <p>Engineering, Architecture, and Community Solutions</p>
        <a href="/expertise" class="btn btn-accent">Explore Our Expertise</a>
      </div>
    </div>
  </section>

  <!-- Expertise Overview -->
  <section class="section">
    <div class="container">
      <div class="section-head reveal">
        <h2>Our Expertise</h2>
        <p>Clean, reliable solutions in environmental engineering, infrastructure, and community development.</p>
      </div>
      <div class="features-grid">
        <a href="/expertise#environmental" class="feature-card reveal">
          <img src="https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&w=1200&q=60" alt="Environmental Division" loading="lazy">
          <div class="content">
            <h3>Environmental Division</h3>
            <p>Waste, drainage, water quality, sustainability.</p>
          </div>
        </a>
        <a href="/expertise#infrastructure" class="feature-card reveal">
          <img src="https://images.unsplash.com/photo-1517971071642-34a2d3f8d623?auto=format&fit=crop&w=1200&q=60" alt="Infrastructure & Water Resources" loading="lazy">
          <div class="content">
            <h3>Infrastructure & Water Resources</h3>
            <p>Roads, bridges, flood control, water treatment.</p>
          </div>
        </a>
        <a href="/expertise#community" class="feature-card reveal">
          <img src="https://images.unsplash.com/photo-1483058712412-4245e9b90334?auto=format&fit=crop&w=1200&q=60" alt="Community Development & Settlement" loading="lazy">
          <div class="content">
            <h3>Community Development & Settlement</h3>
            <p>Housing, sanitation, public spaces, empowerment.</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- About Expertise -->
  <section class="section light">
    <div class="container">
      <div class="about-grid">
        <div class="about-text reveal">
          <h2>Engineering & Architecture Expertise</h2>
          <p>Since 1975, Arkonin Engineering Manggala Pratama has partnered with public and private clients to plan and deliver projects across Indonesia. We focus on practical outcomes with sustainability at the core, blending engineering rigor, architectural clarity, and community empowerment.</p>
        </div>
        <div class="about-icons">
          <div class="icon-card reveal">
            <svg viewBox="0 0 24 24" class="icon"><path d="M12 2v20M5 9l7-7 7 7" stroke="currentColor" stroke-width="2" fill="none"/></svg>
            <span>Sustainability</span>
          </div>
          <div class="icon-card reveal">
            <svg viewBox="0 0 24 24" class="icon"><path d="M12 6v12M6 12h12" stroke="currentColor" stroke-width="2" fill="none"/></svg>
            <span>Innovation</span>
          </div>
          <div class="icon-card reveal">
            <svg viewBox="0 0 24 24" class="icon"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/><path d="M8 12h8" stroke="currentColor" stroke-width="2"/></svg>
            <span>Teamwork</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Projects -->
  <section class="section featured-white">
    <div class="container">
      <div class="section-head reveal">
        <h2>Featured Projects</h2>
        <p>Selected work across infrastructure, environment, and community development.</p>
      </div>
      <div class="portfolio-grid">
        <div class="portfolio-card reveal">
          <div class="portfolio-image"><img src="assets/images/gedung 6.jpg" alt="Urban Road Network — Gedung 6" loading="lazy" decoding="async"></div>
          <div class="portfolio-info"><h4 data-en="Urban Road Network" data-id="Jaringan Jalan Perkotaan">Urban Road Network</h4></div>
        </div>
        <div class="portfolio-card reveal">
          <div class="portfolio-image"><img src="assets/images/Infrastruktur.jpg" alt="Flood Control System — Infrastruktur" loading="lazy" decoding="async"></div>
          <div class="portfolio-info"><h4 data-en="Flood Control System" data-id="Sistem Pengendalian Banjir">Flood Control System</h4></div>
        </div>
        <div class="portfolio-card reveal">
          <div class="portfolio-image"><img src="assets/images/Instalasi-pengolahan-air-limbah-Denpasar-Bali.jpg" alt="Water Treatment Plant" loading="lazy" decoding="async"></div>
          <div class="portfolio-info"><h4 data-en="Water Treatment Plant" data-id="Instalasi Pengolahan Air Limbah">Water Treatment Plant</h4></div>
        </div>
        <div class="portfolio-card reveal">
          <div class="portfolio-image"><img src="assets/images/divisi.jpg" alt="Community Housing — Divisi" loading="lazy" decoding="async"></div>
          <div class="portfolio-info"><h4 data-en="Community Housing" data-id="Perumahan Komunitas">Community Housing</h4></div>
        </div>
      </div>
      <button class="scroll-btn scroll-left" aria-label="Scroll left">‹</button>
      <button class="scroll-btn scroll-right" aria-label="Scroll right">›</button>
    </div>
  </section>

  @include('partials.footer')
</body>
</html>