<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Expertise — Arkonin Engineering MP</title>
  <base href="/">
  <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
 <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script defer src="{{ asset('assets/js/script.js') }}"></script>
</head>
<body class="expertise-page">
  @include('partials.nav')

  <!-- Hero: Banner foto besar + CTA -->
  <section class="hero-banner">
    <div class="hero-wrap">
      <div class="hero-media">
        <img src="https://images.unsplash.com/photo-1482192596544-9eb780fc7f66?auto=format&fit=crop&w=2000&q=60" alt="Urban Infrastructure" />
        <div class="overlay"></div>
      </div>
      <div class="hero-content">
        <h1 data-en="Our Expertise" data-id="Keahlian Kami">Our Expertise</h1>
        <p data-en="Delivering Engineering Excellence Across Disciplines" data-id="Menghadirkan Keunggulan Rekayasa di Berbagai Disiplin">Delivering Engineering Excellence Across Disciplines</p>
        <a href="#overview" class="btn btn-accent" data-en="Explore Our Expertise" data-id="Jelajahi Keahlian Kami">Explore Our Expertise</a>
      </div>
    </div>
  </section>

  <!-- Mini Tabs Navigation (dikembalikan) -->

  <!-- Overview 4-box (desain asli dengan badge angka) -->
  <section id="overview" class="process-section">
    <div class="page-container">
      <div class="process-grid">
        <!-- 01 Environmental -->
        <a href="#environmental" class="process-card card-env reveal" aria-label="Go to Environmental">
          <div class="proc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 21s-7-6.2-7-11a7 7 0 1 1 14 0c0 4.8-7 11-7 11z"/>
              <circle cx="12" cy="10" r="2"/>
            </svg>
          </div>
          <h3 data-en="Environmental Division" data-id="Divisi Lingkungan">Environmental Division</h3>
          <p data-en="Environmental planning, monitoring, and sustainable engineering solutions." data-id="Perencanaan lingkungan, pemantauan, dan solusi rekayasa berkelanjutan.">Environmental planning, monitoring, and sustainable engineering solutions.</p>
        </a>

        <!-- 02 Infrastructure & Water Resources -->
        <a href="#infrastructure" class="process-card card-infra reveal" aria-label="Go to Infrastructure & Water Resources Division">
          <div class="proc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 6h16M4 12h10M4 18h6"/>
            </svg>
          </div>
          <h3 data-en="Infrastructure & Water Resources Division" data-id="Divisi Infrastruktur & Sumber Daya Air">Infrastructure & Water Resources Division</h3>
          <p data-en="Integrated infrastructure design and water resource management for sustainable cities." data-id="Desain infrastruktur terintegrasi dan pengelolaan sumber daya air untuk kota berkelanjutan.">Integrated infrastructure design and water resource management for sustainable cities.</p>
  
        </a>

        <!-- 03 Community Development & Settlement -->
        <a href="#community" class="process-card card-comm reveal" aria-label="Go to Community Development & Settlement Division">
          <div class="proc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4z"/>
              <path d="M2 20a10 10 0 0 1 20 0"/>
            </svg>
          </div>
          <h3 data-en="Community Development & Settlement Division" data-id="Divisi Pengembangan Komunitas & Permukiman">Community Development & Settlement Division</h3>
          <p data-en="Urban planning and sustainable settlement design supporting community growth." data-id="Perencanaan kota dan desain permukiman berkelanjutan yang mendukung pertumbuhan masyarakat.">Urban planning and sustainable settlement design supporting community growth.</p>

        </a>

        <!-- 04 Electrical & Industrial -->
        <a href="#electrical" class="process-card card-elec reveal" aria-label="Go to Electrical & Industrial Division">
          <div class="proc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M13 2L3 14h7l-1 8 10-12h-7z"/>
            </svg>
          </div>
          <h3 data-en="Electrical & Industrial Division" data-id="Divisi Kelistrikan & Industri">Electrical & Industrial Division</h3>
          <p data-en="Innovating electrical and industrial systems for modern infrastructure." data-id="Berinovasi pada sistem kelistrikan dan industri untuk infrastruktur modern.">Innovating electrical and industrial systems for modern infrastructure.</p>
      
        </a>
      </div>

    </div>
  </section>

  <!-- About Expertise -->
  <section class="page-section about-expertise">
    <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 gap-10 items-center justify-items-center text-center">
        <div class="reveal">
          <h2 class="text-2xl md:text-3xl font-semibold text-slate-900" data-en="Engineering & Architecture Expertise" data-id="Keahlian Rekayasa & Arsitektur">Engineering & Architecture Expertise</h2>
          <p class="mt-3 text-slate-700" data-en="Since 1975, Arkonin Engineering Manggala Pratama has partnered with public and private clients to plan and deliver projects across Indonesia. Our focus on practical outcomes with sustainability at the core blends engineering rigor, architectural clarity, and community empowerment." data-id="Sejak 1975, Arkonin Engineering Manggala Pratama bermitra dengan klien publik dan privat untuk merencanakan dan meng-deliver proyek di seluruh Indonesia. Fokus kami pada hasil yang praktis dengan keberlanjutan sebagai inti, memadukan ketelitian rekayasa, kejelasan arsitektur, dan pemberdayaan komunitas.">Sejak 1975, Arkonin Engineering Manggala Pratama bermitra dengan klien publik dan privat untuk merencanakan dan meng-deliver proyek di seluruh Indonesia. Fokus kami pada hasil yang praktis dengan keberlanjutan sebagai inti, memadukan ketelitian rekayasa, kejelasan arsitektur, dan pemberdayaan komunitas.</p>
        </div>
        <div class="about-feature-grid reveal">
          <div class="about-feature-card">
            <span class="feature-emoji" aria-hidden="true">🌱</span>
            <div class="label" data-en="Sustainability" data-id="Keberlanjutan">Sustainability</div>
          </div>
          <div class="about-feature-card">
            <span class="feature-emoji" aria-hidden="true">💡</span>
            <div class="label" data-en="Innovation" data-id="Inovasi">Innovation</div>
          </div>
          <div class="about-feature-card">
            <span class="feature-emoji" aria-hidden="true">🤝</span>
            <div class="label" data-en="Teamwork" data-id="Kerja Tim">Teamwork</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Projects (dedicated section, white background) -->
  <section class="featured-section">
    <div class="featured-container">
      <div class="featured-header reveal">
        <h2 class="text-2xl md:text-3xl font-semibold text-slate-900" data-en="Featured Projects" data-id="Proyek Unggulan">Featured Projects</h2>
        <p class="mt-2 text-slate-600" data-en="Selected work across infrastructure, environment, and community development." data-id="Pilihan karya di bidang infrastruktur, lingkungan, dan pengembangan komunitas.">Selected work across infrastructure, environment, and community development.</p>
      </div>
      <div class="featured-slider">
        <button class="fp-btn fp-prev" aria-label="Previous">‹</button>
        <div class="featured-track">
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
        <button class="fp-btn fp-next" aria-label="Next">›</button>
      </div>
    </div>
  </section>

  <style>
    /* Featured Projects: dedicated section (white background, centered content) */
    .expertise-page .featured-section{
      background:#ffffff;
      padding:48px 0;
    }
    /* Container khusus tanpa bergantung ke kelas utilitas */
    .expertise-page .featured-section .featured-container{
      max-width:1120px;
      margin:0 auto;
      padding:0 24px;
      box-sizing:border-box;
    }
    .expertise-page .featured-section .featured-header{
      max-width:900px;
      margin:0 auto;
      text-align:center;
    }
    /* Pastikan seluruh section benar-benar putih (anti override) */
    .expertise-page .featured-section{ background:#ffffff !important; position:relative; z-index:0; }
    .expertise-page .featured-section .featured-container{ background:#ffffff !important; }
    .expertise-page .featured-section .featured-slider{ background:#ffffff !important; }
    .expertise-page .featured-section .featured-slider{ position:relative; perspective: 800px; min-height: 420px; }
    .expertise-page .featured-section .featured-track{
      display:flex; flex-wrap:nowrap; gap:0; margin-top:24px;
      overflow:hidden;
      scroll-snap-type:none; /* disable snap saat ticker */
      justify-content:flex-start; /* pastikan baris mulai dari kiri */
      align-items:center; /* jaga tinggi konsisten */
      position:relative;
    }
    .expertise-page .featured-section .ticker-row{
      display:inline-flex; gap:24px; will-change:transform; align-items:flex-start;
    }
    /* Saat autoplay, matikan snap agar gerakan mulus tanpa jeda */
    .expertise-page .featured-section .featured-track.is-autoplay{ scroll-snap-type: none; }
    .expertise-page .featured-section .featured-track::-webkit-scrollbar{ display:none }
    /* Override ukuran kartu agar tidak dipaksa oleh min-width global */
    .expertise-page .featured-section .portfolio-card{ width:340px; min-width:0; flex:0 0 auto; scroll-snap-align:center; transition:transform .3s ease, filter .3s ease; transform: scale(.96); }
    @media (min-width:1024px){ .expertise-page .featured-section .portfolio-card{ width:360px; min-width:0; } }
    /* 3D nuance: card state */
    .expertise-page .featured-section .portfolio-card.is-center{ transform: translateZ(14px) scale(1.06); z-index:2 }
    .expertise-page .featured-section .portfolio-card.is-left{ transform: rotateY(6deg) scale(.96); filter:saturate(.95) }
    .expertise-page .featured-section .portfolio-card.is-right{ transform: rotateY(-6deg) scale(.96); filter:saturate(.95) }
    /* Nav buttons */
    .expertise-page .featured-section .fp-btn{ position:absolute; top:50%; transform:translateY(-50%); background:#fff; border:1px solid #e5e7eb; color:#374151; width:36px; height:36px; border-radius:999px; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 14px rgba(0,0,0,.08); cursor:pointer }
    .expertise-page .featured-section .fp-prev{ left:8px }
    .expertise-page .featured-section .fp-next{ right:8px }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      const track = document.querySelector('.expertise-page .featured-section .featured-track');
      const cards = track ? Array.from(track.querySelectorAll('.portfolio-card')) : [];
      const prev = document.querySelector('.expertise-page .featured-section .fp-prev');
      const next = document.querySelector('.expertise-page .featured-section .fp-next');
      if(!track || !cards.length) return;

      let activeIdx = Math.min(1, cards.length-1);

      // Hitung spacer kiri/kanan agar kartu bisa snap ke pusat viewport
      function applySpacers(){
        if(!cards.length) return;
        const cardW = cards[0].offsetWidth || 340;
        const viewportW = track.clientWidth;
        const spacer = Math.max(24, Math.round((viewportW - cardW)/2));
        track.style.setProperty('--fs-spacer', spacer + 'px');
      }
      applySpacers();

      function applyState(){
        cards.forEach((c,i)=>{
          c.classList.remove('is-left','is-right','is-center');
          if(i === activeIdx) c.classList.add('is-center');
          else if(i === activeIdx-1) c.classList.add('is-left');
          else if(i === activeIdx+1) c.classList.add('is-right');
        });
      }

      function centerByIndex(idx, smooth=true){
        const cRect = track.getBoundingClientRect();
        const rect = cards[idx].getBoundingClientRect();
        const delta = (rect.left + rect.width/2) - (cRect.left + cRect.width/2);
        track.scrollBy({left: delta, behavior: smooth ? 'smooth' : 'auto'});
      }

      // Slow, custom animation to center target card
      function animateToCenter(idx, duration=1400){
        const cRect = track.getBoundingClientRect();
        const rect = cards[idx].getBoundingClientRect();
        const delta = (rect.left + rect.width/2) - (cRect.left + cRect.width/2);
        let last = 0;
        const start = performance.now();
        function step(now){
          const t = Math.min(1, (now - start)/duration);
          const ease = 0.5 - Math.cos(Math.PI*t)/2; // easeInOut
          const target = delta * ease;
          track.scrollBy({left: target - last, behavior: 'auto'});
          last = target;
          if(t < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
      }

      function updateActiveOnScroll(){
        const cRect = track.getBoundingClientRect();
        let best = {idx: activeIdx, dist: Infinity};
        cards.forEach((card,i)=>{
          const r = card.getBoundingClientRect();
          const d = Math.abs((r.left + r.width/2) - (cRect.left + cRect.width/2));
          if(d < best.dist) best = {idx:i, dist:d};
        });
        if(best.idx !== activeIdx){ activeIdx = best.idx; applyState(); }
      }

      // Init
      applyState();
      centerByIndex(activeIdx, false);

      // Ticker transform: tiga rangkaian (clone-pre, originals, clone-post) untuk loop mulus
      track.classList.add('is-autoplay');
      const gapPx = 24;
      const originals = Array.from(cards);
      const row = document.createElement('div');
      row.className = 'ticker-row';
      const frag = document.createDocumentFragment();
      // pre-clone
      originals.forEach(card => frag.appendChild(card.cloneNode(true)));
      // originals (pindahkan)
      originals.forEach(card => frag.appendChild(card));
      // post-clone
      originals.forEach(card => frag.appendChild(card.cloneNode(true)));
      row.appendChild(frag);
      track.appendChild(row);
      const baseCount = originals.length;
      const calcSequenceWidth = () => originals.reduce((sum,c)=> sum + c.offsetWidth, 0) + gapPx * (baseCount - 1);
      let baseWidth = Math.max(1, calcSequenceWidth());
      // Mulai di tengah agar kedua sisi terisi
      let offset = baseWidth;
      let speed = 0.8; // pelan tapi terlihat (≈48px/detik)
      function runTicker(){
        offset += speed;
        // Jika kartu pertama sudah lewat sepenuhnya, pindahkan ke belakang dan kurangi offset
        const first = row.firstElementChild;
        const step = first ? (first.offsetWidth + gapPx) : 0;
        if(step > 0 && offset >= step){
          offset -= step;
          row.appendChild(first);
        }
        row.style.transform = `translateX(${-offset}px)`;
        requestAnimationFrame(runTicker);
      }
      requestAnimationFrame(runTicker);

      // Controls (geser satu kartu)
      const stepW = baseWidth / baseCount;
      if(prev) prev.addEventListener('click', ()=>{ offset = (offset - stepW); if(offset < 0) offset += baseWidth; });
      if(next) next.addEventListener('click', ()=>{ offset = (offset + stepW); if(offset >= baseWidth * 2) offset -= baseWidth; });

      // Sync when user swipes
      track.addEventListener('scroll', updateActiveOnScroll, {passive:true});
      // Recalculate once images fully loaded to ensure width correct
      window.addEventListener('load', ()=>{ baseWidth = Math.max(1, calcSequenceWidth()); });
      window.addEventListener('resize', ()=>{
        applySpacers();
        centerByIndex(activeIdx, false);
        // Recalculate width in case of responsive changes
        baseWidth = Math.max(1, calcSequenceWidth());
      });

      // Optional: pause autoplay saat tab tidak aktif, lanjut saat kembali
      // Tetap jalan terus; jika ingin hemat resource bisa diubah nanti
    });
  </script>

  <!-- Environmental Division — Grid cards (4 per row, image background + overlay box) -->
  <section id="environmental" class="env-section">
    <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
      <div class="section-head">
        <div class="title-row">
          <span class="section-emoji" aria-hidden="true">🌿</span>
          <h2 data-en="Environmental Division" data-id="Divisi Lingkungan">Environmental Division</h2>
        </div>
        <p data-en="Innovating Sustainable Systems for a Better Future." data-id="Berinovasi pada Sistem Berkelanjutan untuk Masa Depan yang Lebih Baik.">“Innovating Sustainable Systems for a Better Future.”</p>
      </div>
      <div class="env-grid" role="list">
        <article class="env-item reveal" role="listitem">
          <div class="env-image">
            <img src="assets/images/divisi lingkungan 1.jpg" alt="Sustainability & Green Design" loading="lazy" decoding="async">
          </div>
          <div class="env-overlay">
            <div class="env-icon" aria-hidden="true">🌿</div>
            <h3 data-en="Sustainability & Green Design" data-id="Keberlanjutan & Desain Ramah Lingkungan">Sustainability & Green Design</h3>
            <p class="env-desc" data-en="We integrate eco-conscious strategies, ensuring long-term environmental." data-id="Kami mengintegrasikan strategi ramah lingkungan untuk memastikan keberlanjutan.">We integrate eco-conscious strategies, ensuring long-term environmental.</p>
          </div>
        </article>
        <article class="env-item reveal" role="listitem">
          <div class="env-image">
            <img src="assets/images/divisi lingkungan 2.jpg" alt="Environmental Impact Assessment" loading="lazy" decoding="async">
          </div>
          <div class="env-overlay">
            <div class="env-icon" aria-hidden="true">📊</div>
            <h3 data-en="Environmental Impact Assessment" data-id="Kajian Dampak Lingkungan">Environmental Impact Assessment</h3>
            <p class="env-desc" data-en="We measure and mitigate environmental effects with precision and care." data-id="Kami mengukur dan memitigasi dampak lingkungan secara presisi dan cermat.">We measure and mitigate environmental effects with precision and care.</p>
          </div>
        </article>
        <article class="env-item reveal" role="listitem">
          <div class="env-image">
            <img src="assets/images/divisi lingkungan 3.jpg" alt="Water & Waste Management Systems" loading="lazy" decoding="async">
          </div>
          <div class="env-overlay">
            <div class="env-icon" aria-hidden="true">💧</div>
            <h3 data-en="Water & Waste Management Systems" data-id="Sistem Pengelolaan Air & Limbah">Water & Waste Management Systems</h3>
            <p class="env-desc" data-en="Designing efficient systems that balance usability with ecological harmony." data-id="Merancang sistem efisien yang menyeimbangkan kegunaan dengan keharmonisan ekologis.">Designing efficient systems that balance usability with ecological harmony.</p>
          </div>
        </article>
        <article class="env-item reveal" role="listitem">
          <div class="env-image">
            <img src="assets/images/divisi lingkungan 4.jpg" alt="Renewable & Smart Resource Integration" loading="lazy" decoding="async">
          </div>
          <div class="env-overlay">
            <div class="env-icon" aria-hidden="true">⚡</div>
            <h3 data-en="Renewable & Smart Resource Integration" data-id="Integrasi Sumber Daya Terbarukan & Cerdas">Renewable & Smart Resource Integration</h3>
            <p class="env-desc" data-en="Merging renewable energy with intelligent systems for a sustainable future." data-id="Menggabungkan energi terbarukan dengan sistem cerdas untuk masa depan berkelanjutan.">Merging renewable energy with intelligent systems for a sustainable future.</p>
          </div>
        </article>
      </div>
    </div>
  </section>
    </div>
  </section>

  <!-- Infrastructure & Water Resources section -->
  <section id="infrastructure" class="infra-section">
    <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
      <!-- Header Infrastructure -->
      <div class="section-head reveal">
        <div class="title-row">
          <span class="title-avatar left" aria-hidden="true"><img src="assets/images/divisi air 1.jpg" alt="Water division avatar left" loading="lazy" decoding="async"></span>
          <span class="section-emoji" aria-hidden="true">💧</span>
          <h2 class="section-title" data-en="Infrastructure & Water Resources Division" data-id="Divisi Infrastruktur & Sumber Daya Air">Infrastructure & Water Resources Division</h2>
          <span class="title-avatar right" aria-hidden="true"><img src="assets/images/divisi air 2.jpg" alt="Water division avatar right" loading="lazy" decoding="async"></span>
        </div>
        <p class="section-subtitle" data-en="Projects and capabilities in water and civil infrastructure." data-id="Proyek dan kapabilitas di bidang infrastruktur air dan sipil.">Projects and capabilities in water and civil infrastructure.</p>
      </div>
      <div class="infra-stats reveal" role="list">
        <!-- 1) Water Infrastructure Projects -->
        <article class="infra-card" role="listitem">
          <div class="infra-circle" aria-hidden="true">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#0f1115" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <!-- Dam (infrastructure) + water waves -->
              <path d="M4 16V8h16v8"/>
              <path d="M8 16V10"/>
              <path d="M12 16V10"/>
              <path d="M16 16V10"/>
              <path d="M3 20c2 1 4 1 6 0"/>
              <path d="M9 20c2 1 4 1 6 0"/>
              <path d="M15 20c2 1 4 1 6 0"/>
            </svg>
          </div>
          <div class="infra-text">
            <h2 class="infra-number counter" data-target="180" data-suffix="+">0</h2>
            <p class="infra-label" data-en="Water Infrastructure Projects" data-id="Proyek Infrastruktur Air">Water Infrastructure Projects</p>
            <p class="infra-desc" data-en="Dam, irrigation, and clean water distribution projects." data-id="Proyek bendungan, irigasi, dan distribusi air bersih.">Proyek bendungan, irigasi, dan distribusi air bersih.</p>
          </div>
        </article>

        <!-- 2) Irrigation Systems Developed -->
        <article class="infra-card" role="listitem">
          <div class="infra-circle" aria-hidden="true">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#0f1115" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <!-- Gear (system) icon -->
              <circle cx="12" cy="12" r="3"/>
              <path d="M12 2v2"/>
              <path d="M12 20v2"/>
              <path d="M4 12h2"/>
              <path d="M18 12h2"/>
              <path d="M5.6 5.6l1.4 1.4"/>
              <path d="M17 17l1.4 1.4"/>
              <path d="M18.4 5.6L17 7"/>
              <path d="M7 17l-1.4 1.4"/>
            </svg>
          </div>
          <div class="infra-text">
            <h2 class="infra-number counter" data-target="250" data-suffix="+">0</h2>
            <p class="infra-label" data-en="Irrigation Systems Developed" data-id="Pengembangan Sistem Irigasi">Irrigation Systems Developed</p>
            <p class="infra-desc" data-en="Development of modern irrigation networks for food resilience." data-id="Pengembangan jaringan irigasi modern untuk ketahanan pangan.">Pengembangan jaringan irigasi modern untuk ketahanan pangan.</p>
          </div>
        </article>

        <!-- 3) Environmental Restoration Initiatives -->
        <article class="infra-card" role="listitem">
          <div class="infra-circle" aria-hidden="true">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#0f1115" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <!-- Leaf icon -->
              <path d="M3 12c4-8 14-8 18 0-4 8-14 8-18 0z"/>
              <path d="M12 6v12"/>
              <path d="M7.5 9.5l9 5.5"/>
            </svg>
          </div>
          <div class="infra-text">
            <h2 class="infra-number counter" data-target="90" data-suffix="+">0</h2>
            <p class="infra-label" data-en="Environmental Restoration Initiatives" data-id="Inisiatif Restorasi Lingkungan">Environmental Restoration Initiatives</p>
            <p class="infra-desc" data-en="Rehabilitation of water sources and watershed management." data-id="Rehabilitasi sumber air dan pengelolaan DAS.">Rehabilitasi sumber air dan pengelolaan DAS.</p>
          </div>
        </article>

        <!-- 4) Collaborative Engineering Partners -->
        <article class="infra-card" role="listitem">
          <div class="infra-circle" aria-hidden="true">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#0f1115" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <!-- Users (social) icon -->
              <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
          </div>
          <div class="infra-text">
            <h2 class="infra-number counter" data-target="60" data-suffix="+">0</h2>
            <p class="infra-label" data-en="Collaborative Engineering Partners" data-id="Mitra Teknik Kolaboratif">Collaborative Engineering Partners</p>
            <p class="infra-desc" data-en="Collaboration among government, private, and engineering partners." data-id="Kolaborasi pemerintah, swasta, dan mitra teknik.">Kolaborasi pemerintah, swasta, dan mitra teknik.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Community Development & Settlement section -->
  <section id="community" class="comm-section">
    <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
      <!-- Header Community -->
      <div class="section-head reveal">
        <div class="title-row">
          <span class="section-emoji" aria-hidden="true">🏘️</span>
          <h2 class="section-title" data-en="Community Development & Settlement Division" data-id="Divisi Pengembangan Komunitas & Permukiman">Community Development & Settlement Division</h2>
        </div>
        <p class="section-subtitle" data-en="Inclusive planning and sustainable settlement initiatives." data-id="Perencanaan inklusif dan inisiatif permukiman berkelanjutan.">Inclusive planning and sustainable settlement initiatives.</p>
      </div>

      <div class="community-immersive">
        <div class="parallax-bg" aria-hidden="true"></div>
        <div class="immersive-grid">
          <article class="immersive-card reveal">
            <img src="assets/images/divisi pemukiman 1.jpg" alt="Inclusive planning" loading="lazy" decoding="async">
            <div class="txt"><h3 data-en="Inclusive Planning" data-id="Perencanaan Inklusif">Inclusive Planning</h3><p data-en="Empowering local communities through inclusive planning." data-id="Memberdayakan komunitas lokal melalui perencanaan inklusif.">Empowering local communities through inclusive planning.</p></div>
          </article>
          <article class="immersive-card reveal">
            <img src="assets/images/divisi pemukiman 2.jpg" alt="Sustainable housing" loading="lazy" decoding="async">
            <div class="txt"><h3 data-en="Sustainable Housing" data-id="Perumahan Berkelanjutan">Sustainable Housing</h3><p data-en="Sustainable housing design integrating cultural context." data-id="Desain perumahan berkelanjutan yang mengintegrasikan konteks budaya.">Sustainable housing design integrating cultural context.</p></div>
          </article>
          <article class="immersive-card reveal">
            <img src="assets/images/divisi pemukiman 3.jpg" alt="Partnership initiatives" loading="lazy" decoding="async">
            <div class="txt"><h3 data-en="Partnership Initiatives" data-id="Inisiatif Kemitraan">Partnership Initiatives</h3><p data-en="Partnership‑driven initiatives for social progress." data-id="Inisiatif berbasis kemitraan untuk kemajuan sosial.">Partnership‑driven initiatives for social progress.</p></div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- Electrical & Industrial section -->
  <section id="electrical" class="elec-section">
    <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
      <!-- Header Electrical & Industrial -->
      <div class="section-head reveal">
        <div class="title-row">
          <span class="section-emoji" aria-hidden="true">⚡</span>
          <h2 class="section-title" data-en="Electrical & Industrial Division" data-id="Divisi Kelistrikan & Industri">Electrical & Industrial Division</h2>
        </div>
        <p class="section-subtitle" data-en="Systems engineering and industrial innovation." data-id="Rekayasa sistem dan inovasi industri.">Systems engineering and industrial innovation.</p>
        <p class="section-desc" data-en="Our Electrical & Industrial Division delivers integrated system engineering solutions, empowering industries with automation, control systems, and sustainable power management designed for long-term operational excellence." data-id="Divisi Kelistrikan & Industri kami menghadirkan solusi rekayasa sistem terintegrasi, memperkuat industri dengan otomasi, sistem kontrol, dan manajemen daya berkelanjutan untuk keunggulan operasional jangka panjang.">Our Electrical & Industrial Division delivers integrated system engineering solutions, empowering industries with automation, control systems, and sustainable power management designed for long-term operational excellence.</p>
      </div>

      <div class="elec-circle reveal">
        <div class="core" aria-hidden="true"></div>
        <div class="core-avatar" aria-label="Electrical Division Center Image">
          <img src="assets/images/divisi listrik 1.jpg" alt="Center image" loading="lazy" decoding="async">
        </div>
        <div class="ring"></div>
        <div class="nodes">
          <div class="elec-node" data-step="1">
            <span class="node-title" data-en="Introductory Call" data-id="Panggilan Pengantar">Introductory Call</span>
            <div class="node-desc" data-en="Understand project requirements and system complexity." data-id="Memahami kebutuhan proyek dan kompleksitas sistem.">Understand project requirements and system complexity.</div>
          </div>
          <div class="elec-node" data-step="2">
            <span class="node-title" data-en="Onboarding" data-id="Onboarding">Onboarding</span>
            <div class="node-desc" data-en="Align design standards, safety protocols, and technical documentation." data-id="Menyesuaikan standar desain, protokol keselamatan, dan dokumentasi teknis.">Align design standards, safety protocols, and technical documentation.</div>
          </div>
          <div class="elec-node" data-step="3">
            <span class="node-title" data-en="Project Sessions" data-id="Sesi Proyek">Project Sessions</span>
            <div class="node-desc" data-en="Execute precision-driven solutions across electrical and control systems." data-id="Mengeksekusi solusi presisi untuk sistem kelistrikan dan kontrol.">Execute precision-driven solutions across electrical and control systems.</div>
          </div>
          <div class="elec-node" data-step="4">
            <span class="node-title" data-en="Ongoing Support" data-id="Dukungan Berkelanjutan">Ongoing Support</span>
            <div class="node-desc" data-en="Dedicated maintenance and improvement for sustainable operation." data-id="Pemeliharaan dan peningkatan terdedikasi untuk operasi berkelanjutan.">Dedicated maintenance and improvement for sustainable operation.</div>
          </div>
          <div class="elec-node" data-step="5">
            <span class="node-title" data-en="Performance Iteration" data-id="Iterasi Kinerja">Performance Iteration</span>
            <div class="node-desc" data-en="Continuous optimization to ensure industrial reliability." data-id="Optimasi berkelanjutan untuk memastikan keandalan industri.">Continuous optimization to ensure industrial reliability.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('partials.footer')
</body>
</html>