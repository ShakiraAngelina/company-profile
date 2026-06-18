<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Arkonin Engineering MP – Delivering Practical Engineering Solutions for Indonesia's Sustainable Future." />
  <meta name="keywords" content="Engineering, Architecture, Drainage, PDAM, Waste Management, Arkonin, Indonesia" />
  <meta name="author" content="Arkonin Engineering MP" />
  <title>Arkonin Engineering MP</title>
  <base href="/">
  <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
  
  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="assets/CSS/style.css" />
  <link rel="stylesheet" href="assets/CSS/history.css" />

  {{-- Tailwind via Vite for responsive utilities --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  @include('partials.nav')

  <!-- ===== HERO SECTION (slider + preview) ===== -->
  <section id="home" class="hero-section">
    <div class="hero-slider" aria-label="Homepage hero slider">
      <div class="slide active" data-index="0">
        <div class="hero-image">
          <img src="assets/images/Gedung-01.jpg" alt="Gedung 01" loading="eager" decoding="async" />
        </div>
      </div>
      <div class="slide" data-index="1">
        <div class="hero-image">
          <img src="assets/images/Gedung-Arkonin-Born.jpg" alt="Gedung Arkonin" loading="lazy" decoding="async" />
        </div>
      </div>
      <div class="slide" data-index="2">
        <div class="hero-image">
          <img src="assets/images/Lingkungan.jpg" alt="Lingkungan" loading="lazy" decoding="async" />
        </div>
      </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <span class="hero-label" data-en="THOUGHT LEADERSHIP" data-id="KEPEMIMPINAN PEMIKIRAN">THOUGHT LEADERSHIP</span>
      <h1 data-en="Engineering Excellence for Indonesia" data-id="Keunggulan Teknik untuk Indonesia">Engineering Excellence for Indonesia</h1>
      <p data-en="Watch our experts discuss the greatest infrastructure challenges and the opportunities to help deliver a better world" data-id="Tonton para ahli kami membahas tantangan infrastruktur terbesar dan peluang untuk membantu memberikan dunia yang lebih baik">Watch our experts discuss the greatest infrastructure challenges and the opportunities to help deliver a better world</p>
      
      <div class="slider-controls" aria-label="Hero slider controls">
        <button class="slider-btn prev" aria-label="Previous slide">‹</button>
        <button class="slider-btn next" aria-label="Next slide">›</button>
      </div>
      <div class="slider-dots" role="tablist" aria-label="Hero slider indicators">
        <button class="dot active" data-slide="0" aria-label="Slide 1" role="tab" aria-selected="true"></button>
        <button class="dot" data-slide="1" aria-label="Slide 2" role="tab"></button>
        <button class="dot" data-slide="2" aria-label="Slide 3" role="tab"></button>
      </div>
      <!-- Synced Preview Box -->
      <div class="hero-preview md:absolute md:right-[60px] md:top-[110px] md:w-[clamp(260px,42vw,420px)] md:h-[clamp(160px,24vw,250px)] static w-[92%] max-w-[420px] h-[210px] mx-auto mt-4 rounded-xl overflow-hidden z-[3] border border-white/45 bg-white/10 backdrop-blur-md shadow-xl" aria-label="Slide preview">
        <div class="preview-slider relative w-full h-full">
          <div class="preview-slide active absolute inset-0" data-index="0">
            <img class="w-full h-full object-cover" src="assets/images/Gedung-01.jpg" alt="Preview Gedung 01" loading="eager" decoding="async" />
          </div>
          <div class="preview-slide absolute inset-0" data-index="1">
            <img class="w-full h-full object-cover" src="assets/images/Gedung-Arkonin-Born.jpg" alt="Preview Gedung Arkonin" loading="lazy" decoding="async" />
          </div>
          <div class="preview-slide absolute inset-0" data-index="2">
            <img class="w-full h-full object-cover" src="assets/images/Lingkungan.jpg" alt="Preview Lingkungan" loading="lazy" decoding="async" />
          </div>
        </div>
        <div class="preview-controls md:absolute md:left-0 md:right-0 md:-bottom-14 relative mt-2 flex items-center justify-center gap-3 z-[3]" aria-label="Preview controls">
          <button class="preview-btn prev w-9 h-9 grid place-items-center rounded-full border border-white/50 bg-white text-[#00314d] text-[18px] shadow-md hover:bg-[#f3f6f9] transition" aria-label="Previous">‹</button>
          <button class="preview-btn next w-9 h-9 grid place-items-center rounded-full border border-white/50 bg-white text-[#00314d] text-[18px] shadow-md hover:bg-[#f3f6f9] transition" aria-label="Next">›</button>
        </div>
      </div>
    </div>
  </section>


  <!-- ===== EXPERTISE TABS ===== -->
  <section class="expertise-tabs">
    <div class="tabs-container">
      <a href="#environment" class="tab-link" data-en="ENVIRONMENTAL SOLUTIONS" data-id="SOLUSI LINGKUNGAN">ENVIRONMENTAL SOLUTIONS</a>
      <a href="#infrastructure" class="tab-link" data-en="INFRASTRUCTURE EXCELLENCE" data-id="KEUNGGULAN INFRASTRUKTUR">INFRASTRUCTURE EXCELLENCE</a>
      <a href="#community" class="tab-link" data-en="COMMUNITY DEVELOPMENT" data-id="PENGEMBANGAN KOMUNITAS">COMMUNITY DEVELOPMENT</a>
      <a href="#electrical" class="tab-link" data-en="INDUSTRIAL INNOVATION" data-id="INOVASI INDUSTRI">INDUSTRIAL INNOVATION</a>
      <a href="#future" class="tab-link" data-en="THE FUTURE OF ENGINEERING" data-id="MASA DEPAN TEKNIK">THE FUTURE OF ENGINEERING</a>
    </div>
  </section>

  <!-- ===== ABOUT SECTION ===== -->
  <section class="about-section" id="about">
    <div class="about-container">
      <div class="about-left">
        <span class="section-eyebrow" data-en="ABOUT US" data-id="TENTANG KAMI">ABOUT US</span>
        <h2 class="who-title" data-en="Who We Are" data-id="Siapa Kami">Who We Are</h2>
        <div class="who-text">
          <p data-en="Arkonin Engineering Manggala Pratama is a trusted Indonesian engineering consultancy with 40+ years of experience delivering integrated infrastructure solutions." data-id="Arkonin Engineering Manggala Pratama adalah konsultan teknik tepercaya di Indonesia dengan pengalaman lebih dari 40 tahun menghadirkan solusi infrastruktur terpadu.">Arkonin Engineering Manggala Pratama is a trusted Indonesian engineering consultancy with 40+ years of experience delivering integrated infrastructure solutions.</p>
          <p data-en="We bring multi-disciplinary expertise to plan and deliver roads, bridges, drainage, land development, airports, rail, ports, and water–wastewater projects across Indonesia." data-id="Kami menghadirkan keahlian multidisiplin untuk merencanakan dan melaksanakan proyek jalan, jembatan, drainase, pengembangan lahan, bandara, rel, pelabuhan, serta proyek air dan air limbah di seluruh Indonesia.">We bring multi-disciplinary expertise to plan and deliver roads, bridges, drainage, land development, airports, rail, ports, and water–wastewater projects across Indonesia.</p>
        </div>
      </div>

      <div class="about-right">
        <div class="vision-card reveal">
          <div class="icon-chip" aria-hidden="true">📌</div>
          <h3 data-en="Our Vision" data-id="Visi Kami">Our Vision</h3>
          <p data-en="To be the leading engineering consultant in Indonesia, recognized for innovation, quality, and commitment to sustainable development that improves the quality of life for all communities." data-id="Menjadi konsultan teknik terdepan di Indonesia, diakui karena inovasi, kualitas, dan komitmen terhadap pembangunan berkelanjutan yang meningkatkan kualitas hidup bagi seluruh komunitas.">To be the leading engineering consultant in Indonesia, recognized for innovation, quality, and commitment to sustainable development that improves the quality of life for all communities.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio section removed per request -->

  <!-- ===== ABOUT GROUPED SECTIONS (Landing) ===== -->
  <!-- History -->
  <section id="history" class="landing-section theme-alt reveal">
    <div class="container">
      <h2 class="section-title" data-en="Company History" data-id="Sejarah Perusahaan">Sejarah Perusahaan</h2>
      <p class="section-subtitle" data-en="Milestones of Arkonin Engineering Manggala Pratama as a trusted engineering consultant in Indonesia." data-id="Tonggak perjalanan Arkonin Engineering MP sebagai konsultan teknik terpercaya di Indonesia.">Tonggak perjalanan Arkonin Engineering MP sebagai konsultan teknik terpercaya di Indonesia.</p>
      <div class="timeline" aria-label="Company timeline">
        <div class="timeline-item left">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="1961 — Early Beginnings" data-id="1961 — Awal Mula">1961 — Awal Mula</h3>
            <p data-en="Arkonin began as the Design Department at PT Pembangunan Jaya, which later became the foundation of the Arkonin Group." data-id="Arkonin dimulai sebagai Departemen Desain di PT Pembangunan Jaya.">Arkonin dimulai sebagai Departemen Desain di PT Pembangunan Jaya.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="1982 — Establishment of PT Arkonin Engineering MP" data-id="1982 — Berdirinya PT Arkonin Engineering MP">1982 — Berdirinya PT Arkonin Engineering MP</h3>
            <p data-en="PT Arkonin Engineering Manggala Pratama was officially established as a subsidiary of PT Arkonin, focusing on infrastructure consulting and civil engineering services." data-id="Resmi berdiri sebagai anak perusahaan PT Arkonin fokus konsultansi infrastruktur.">Resmi berdiri sebagai anak perusahaan PT Arkonin fokus konsultansi infrastruktur.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="1990s — Multi-Sector Expansion" data-id="1990-an — Ekspansi Multi-Sektor">1990-an — Ekspansi Multi-Sektor</h3>
            <p data-en="Expanded services from water supply to multiple sectors: environment, roads, bridges, as well as energy and industry." data-id="Memperluas layanan ke lingkungan, jalan, jembatan, energi, dan industri.">Memperluas layanan ke lingkungan, jalan, jembatan, energi, dan industri.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="2000–2010 — Community Empowerment" data-id="2000–2010 — Pemberdayaan Komunitas">2000–2010 — Pemberdayaan Komunitas</h3>
            <p data-en="Arkonin played a role in national programs such as P2KP, PNPM, PAMSIMAS, and SANIMAS as part of community development efforts." data-id="Proyek nasional P2KP, PNPM, PAMSIMAS, SANIMAS untuk pengembangan masyarakat.">Proyek nasional P2KP, PNPM, PAMSIMAS, SANIMAS untuk pengembangan masyarakat.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="2014 — New Office" data-id="2014 — Kantor Baru">2014 — Kantor Baru</h3>
            <p data-en="Relocated to the Bintaro Persada Office Complex, South Jakarta, with modern facilities to support professional operations." data-id="Relokasi ke Komplek Perkantoran Bintaro Persada, Jakarta Selatan.">Relokasi ke Komplek Perkantoran Bintaro Persada, Jakarta Selatan.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="2022 — 40 Years of Arkonin Engineering MP" data-id="2022 — 40 Tahun Arkonin Engineering MP">2022 — 40 Tahun Arkonin Engineering MP</h3>
            <p data-en="Celebrated 40 years of Arkonin Engineering MP with over 1000 projects across Indonesia and hundreds of expert professionals." data-id="Lebih dari 1000 proyek di seluruh Indonesia dan ratusan profesional.">Lebih dari 1000 proyek di seluruh Indonesia dan ratusan profesional.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-dot pulse"></div>
          <div class="timeline-content current">
            <h3 data-en="2025 — Moving Into the Future" data-id="2025 — Melangkah ke Masa Depan">2025 — Melangkah ke Masa Depan</h3>
            <p data-en="Committed to continuous innovation in technology, sustainability, and digital transformation to support Indonesia's future development." data-id="Inovasi teknologi, keberlanjutan, dan transformasi digital untuk Indonesia.">Inovasi teknologi, keberlanjutan, dan transformasi digital untuk Indonesia.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Leadership -->
  <section id="leadership" class="landing-section theme-dark leadership-section reveal">
    <div class="container">
      <h2 class="section-title" data-en="Our Leadership" data-id="Kepemimpinan">Our Leadership</h2>
      <p class="section-subtitle" data-en="Founders, Commissioners, Management, and Division Heads." data-id="Pendiri, Komisaris, Manajemen, dan Kepala Divisi.">Founders, Commissioners, Management, and Division Heads.</p>

      <!-- Founders -->
      <h3 class="mt-6 text-center founders-title" data-en="Founders" data-id="Pendiri">Founders</h3>
      <div class="cards-grid founders-grid">
        <div class="card text-center">
          <img src="assets/images/IR.-H.-SJAIFUL-ARIFIN.jpg" alt="Ir. H. Sjaiful Arifin" loading="lazy" />
          <h4>Ir. H. Sjaiful Arifin</h4>
          <p class="mt-2 mb-4" data-en="Founding visionary who set core principles of excellence and integrity." data-id="Visi pendiri yang menetapkan prinsip inti keunggulan dan integritas.">Founding visionary who set core principles of excellence and integrity.</p>
        </div>
        <div class="card text-center">
          <img src="assets/images/IR.-H.-HABIS-SUNGKOWO-DENDAWIJAYA.jpg-128x150.jpg" alt="Ir. H. Habis Sungkowo Dendawijaya" loading="lazy" />
          <h4>Ir. H. Habis Sungkowo Dendawijaya</h4>
          <p class="mt-2 mb-4" data-en="Co-founder driving world‑class infrastructure and higher engineering standards." data-id="Wakil pendiri yang mendorong infrastruktur kelas dunia dan standar teknik yang lebih tinggi.">Co-founder driving world‑class infrastructure and higher engineering standards.</p>
        </div>
        <div class="card text-center">
          <img src="assets/images/DRS.-SLAMET-BOEDI-SUKRISNO-128x150.jpg" alt="Drs. Slamet Boedi Sukrisno" loading="lazy" />
          <h4>Drs. Slamet Boedi Sukrisno</h4>
          <p class="mt-2 mb-4" data-en="Built operations model and stakeholder relations; strengthened a trusted reputation." data-id="Membangun model operasional dan hubungan pemangku kepentingan; memperkuat reputasi tepercaya.">Built operations model and stakeholder relations; strengthened a trusted reputation.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Purpose -->
  <section id="purpose" class="landing-section theme-dark purpose-section reveal">
    <div class="container">
      <h2 class="section-title" data-en="Purpose" data-id="Tujuan">Purpose</h2>
      <p class="section-subtitle" data-en="Our Corporate Mission" data-id="Misi Korporat Kami">Our Corporate Mission</p>
      <div class="check-grid">
        <div class="check-card">
          <h3 data-en="Excellence in Service Delivery" data-id="Keunggulan dalam Layanan">Excellence in Service Delivery</h3>
          <div class="emoji-icon emoji-blue" aria-hidden="true">👍</div>
          <p data-en="We continuously improve engineering services through innovation and professional development, delivering superior technical quality, reliability, and value." data-id="Kami terus meningkatkan layanan teknik melalui inovasi dan pengembangan profesional, menghadirkan kualitas teknis unggul, keandalan, dan nilai.">We continuously improve engineering services through innovation and professional development, delivering superior technical quality, reliability, and value.</p>
        </div>
        <div class="check-card">
          <h3 data-en="Human Capital Development" data-id="Pengembangan Sumber Daya Manusia">Human Capital Development</h3>
          <div class="emoji-icon emoji-emerald" aria-hidden="true">🎓</div>
          <p data-en="We invest in our people via training, certifications, and global best practices to ensure sustained excellence in project delivery." data-id="Kami berinvestasi pada SDM melalui pelatihan, sertifikasi, dan best practices global untuk memastikan keunggulan berkelanjutan dalam pengiriman proyek.">We invest in our people via training, certifications, and global best practices to ensure sustained excellence in project delivery.</p>
        </div>
        <div class="check-card">
          <h3 data-en="Sustainable Growth & Stakeholder Value" data-id="Pertumbuhan Berkelanjutan & Nilai Pemangku Kepentingan">Sustainable Growth & Stakeholder Value</h3>
          <div class="emoji-icon emoji-indigo" aria-hidden="true">📈</div>
          <p data-en="We pursue profitable, long-term growth that creates lasting value for employees, shareholders, and clients through enduring partnerships." data-id="Kami mengejar pertumbuhan jangka panjang yang menguntungkan dan menciptakan nilai bagi karyawan, pemegang saham, serta klien melalui kemitraan berkelanjutan.">We pursue profitable, long-term growth that creates lasting value for employees, shareholders, and clients through enduring partnerships.</p>
        </div>
        <div class="check-card">
          <h3 data-en="Nation Building & Development" data-id="Pembangunan Bangsa & Pengembangan">Nation Building & Development</h3>
          <div class="emoji-icon emoji-amber" aria-hidden="true">🏗️</div>
          <p data-en="We support Indonesia’s development with infrastructure projects that improve connectivity, quality of life, and regional economic growth." data-id="Kami mendukung pembangunan Indonesia melalui proyek infrastruktur yang meningkatkan konektivitas, kualitas hidup, dan pertumbuhan ekonomi daerah.">We support Indonesia’s development with infrastructure projects that improve connectivity, quality of life, and regional economic growth.</p>
        </div>
        <div class="check-card">
          <h3 data-en="Partnership & Reliability" data-id="Kemitraan & Keandalan">Partnership & Reliability</h3>
          <div class="emoji-icon emoji-slate" aria-hidden="true">🤝</div>
          <p data-en="We build a trustworthy corporate image by consistently delivering on commitments with the highest standards of integrity." data-id="Kami membangun citra korporat yang tepercaya dengan konsisten memenuhi komitmen menggunakan standar integritas tertinggi.">We build a trustworthy corporate image by consistently delivering on commitments with the highest standards of integrity.</p>
        </div>
        <div class="check-card">
          <h3 data-en="Innovation & Best Practices" data-id="Inovasi & Praktik Terbaik">Innovation & Best Practices</h3>
          <div class="emoji-icon emoji-red" aria-hidden="true">💡</div>
          <p data-en="We adopt modern technologies and international best practices to pioneer solutions that raise industry standards." data-id="Kami mengadopsi teknologi modern dan praktik terbaik internasional untuk menghadirkan solusi yang meningkatkan standar industri.">We adopt modern technologies and international best practices to pioneer solutions that raise industry standards.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Management -->
  <section id="management" class="landing-section theme-light management-section reveal">
    <div class="container">
      <h2 class="section-title" data-en="Management" data-id="Manajemen">Management</h2>
      <p class="section-subtitle" data-en="A concise and diverse structure summarizing the organization and management approach." data-id="Struktur ringkas dan beragam, merangkum organisasi serta pendekatan manajemen.">Struktur ringkas dan beragam, merangkum organisasi serta pendekatan manajemen.</p>

      <!-- Corporate Governance -->
      <div class="mgmt-group">
        <h3 class="mgmt-group-title" data-en="Corporate Governance" data-id="Tata Kelola Perusahaan">Corporate Governance</h3>
        <div class="mgmt-grid mgmt-grid--center-3">
          <div class="mgmt-card mgmt-violet">
            <div class="mgmt-icon" aria-hidden="true">🏛️</div>
            <h4 data-en="Board of Commissioners" data-id="Dewan Komisaris">Board of Commissioners</h4>
            <p data-en="Strategic oversight, governance, and policy direction." data-id="Pengawasan strategis, tata kelola, dan arah kebijakan.">Pengawasan strategis, tata kelola, dan arah kebijakan.</p>
          </div>
          <div class="mgmt-card mgmt-blue">
            <div class="mgmt-icon" aria-hidden="true">🧭</div>
            <h4 data-en="Board of Directors" data-id="Dewan Direksi">Board of Directors</h4>
            <p data-en="Daily operations, strategic planning, and business development." data-id="Operasional harian, perencanaan strategi, dan pengembangan bisnis.">Operasional harian, perencanaan strategi, dan pengembangan bisnis.</p>
          </div>
          <div class="mgmt-card mgmt-slate">
            <div class="mgmt-icon" aria-hidden="true">⚙️</div>
            <h4 data-en="Executive Management" data-id="Manajemen Eksekutif">Executive Management</h4>
            <p data-en="Aligning operational divisions to corporate objectives." data-id="Menyelaraskan divisi operasional dengan sasaran korporat.">Menyelaraskan divisi operasional dengan sasaran korporat.</p>
          </div>
        </div>
      </div>

      <!-- Operational Divisions -->
      <div class="mgmt-group">
        <h3 class="mgmt-group-title" data-en="Operational Divisions" data-id="Divisi Operasional">Operational Divisions</h3>
        <div class="mgmt-grid">
          <div class="mgmt-card mgmt-indigo">
            <div class="mgmt-icon" aria-hidden="true">🛣️</div>
            <h4 data-en="Infrastructure" data-id="Infrastruktur">Infrastructure</h4>
            <p data-en="Roads, bridges, airports, rail & ports; QC and supervision." data-id="Jalan, jembatan, bandara, rel & pelabuhan; QC dan supervisi.">Jalan, jembatan, bandara, rel & pelabuhan; QC dan supervisi.</p>
          </div>
          <div class="mgmt-card mgmt-green">
            <div class="mgmt-icon" aria-hidden="true">🌿</div>
            <h4 data-en="Environmental" data-id="Lingkungan">Environmental</h4>
            <p data-en="Raw water, distribution networks, sanitation & waste management." data-id="Air baku, jaringan distribusi, sanitasi & pengelolaan limbah.">Air baku, jaringan distribusi, sanitasi & pengelolaan limbah.</p>
          </div>
          <div class="mgmt-card mgmt-amber">
            <div class="mgmt-icon" aria-hidden="true">🏘️</div>
            <h4 data-en="Community & Housing" data-id="Komunitas & Perumahan">Community & Housing</h4>
            <p data-en="Resettlement, community empowerment, and social infrastructure." data-id="Permukiman, pemberdayaan komunitas, dan infrastruktur sosial.">Permukiman, pemberdayaan komunitas, dan infrastruktur sosial.</p>
          </div>
          <div class="mgmt-card mgmt-red">
            <div class="mgmt-icon" aria-hidden="true">🔎</div>
            <h4 data-en="Technical Support & QA" data-id="Dukungan Teknis & QA">Technical Support & QA</h4>
            <p data-en="Quality management, technical assistance, monitoring & evaluation." data-id="Manajemen mutu, asistensi teknis, monitoring & evaluasi.">Manajemen mutu, asistensi teknis, monitoring & evaluasi.</p>
          </div>
        </div>
      </div>

      <!-- Management Approach -->
      <div class="mgmt-group">
        <h3 class="mgmt-group-title" data-en="Management Approach" data-id="Pendekatan Manajemen">Management Approach</h3>
        <div class="mgmt-grid mgmt-grid--cols-5">
          <div class="mgmt-card mgmt-blue">
            <div class="mgmt-icon" aria-hidden="true">🥇</div>
            <h4 data-en="Professional Excellence" data-id="Keunggulan Profesional">Professional Excellence</h4>
            <p data-en="Strict quality standards across all project phases." data-id="Standar mutu ketat di seluruh fase proyek.">Standar mutu ketat di seluruh fase proyek.</p>
          </div>
          <div class="mgmt-card mgmt-violet">
            <div class="mgmt-icon" aria-hidden="true">🤝</div>
            <h4 data-en="Collaborative Partnerships" data-id="Kemitraan Kolaboratif">Collaborative Partnerships</h4>
            <p data-en="Cross-consultant collaboration for comprehensive solutions." data-id="Kolaborasi lintas konsultan untuk solusi menyeluruh.">Kolaborasi lintas konsultan untuk solusi menyeluruh.</p>
          </div>
          <div class="mgmt-card mgmt-teal">
            <div class="mgmt-icon" aria-hidden="true">🎯</div>
            <h4 data-en="Client-Centric" data-id="Berorientasi Klien">Client-Centric</h4>
            <p data-en="Transparent communication, on-time delivery, responsive service." data-id="Komunikasi transparan, pengiriman tepat waktu, layanan responsif.">Komunikasi transparan, pengiriman tepat waktu, layanan responsif.</p>
          </div>
          <div class="mgmt-card mgmt-indigo">
            <div class="mgmt-icon" aria-hidden="true">📈</div>
            <h4 data-en="Continuous Improvement" data-id="Perbaikan Berkelanjutan">Continuous Improvement</h4>
            <p data-en="Training, technology updates, and knowledge sharing." data-id="Training, pembaruan teknologi, dan berbagi pengetahuan.">Training, pembaruan teknologi, dan berbagi pengetahuan.</p>
          </div>
          <div class="mgmt-card mgmt-rose">
            <div class="mgmt-icon" aria-hidden="true">🛡️</div>
            <h4 data-en="Risk Management" data-id="Manajemen Risiko">Risk Management</h4>
            <p data-en="Comprehensive assessment and integrated risk mitigation." data-id="Assessment menyeluruh dan mitigasi risiko terintegrasi.">Assessment menyeluruh dan mitigasi risiko terintegrasi.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section id="clients" class="landing-section theme-alt clients-section brand-strip reveal">
    <div class="container">
      <h2 class="section-title" data-en="Clients" data-id="Klien">Clients</h2>
      <p class="section-subtitle" data-en="Our partners in public and private sectors." data-id="Mitra kami di sektor publik dan swasta.">Mitra kami di sektor publik dan swasta.</p>
      <div class="logos-grid">
        <img class="client-logo client-logo--jm" src="assets/images/Logo-Jasa-Marga-kecil-1(1).jpg" alt="Jasa Marga" />
        <img src="assets/images/certification.png" alt="Client 2" />
        <img class="client-logo client-logo--waskita" src="assets/images/waskita.png" alt="Waskita Karya" />
        <img src="assets/images/hyundai.png" alt="Hyundai" />
      </div>
    </div>
  </section>

  <!-- Testimonials (3D Swipe Slider) -->
  <section id="testimonials" class="landing-section theme-light testimonials-section reveal">
    <div class="container">
      <h2 class="section-title" data-en="Testimonials" data-id="Testimoni">Testimonials</h2>
      

      <div class="testimonial-slider" aria-roledescription="carousel" aria-live="polite">
        <div class="t-track">
          <!-- 1 -->
          <article class="t-card" data-author="PPLP, Kementerian PUPR">
            <h4 class="t-title" data-en="Directorate of PPLP – Ministry of Public Works" data-id="Direktorat PPLP – Kementerian PUPR">Direktorat PPLP – Kementerian PUPR</h4>
            <p class="t-body" data-en="Arkonin’s technical expertise ensured success for Denpasar sewerage project." data-id="Keahlian teknis Arkonin memastikan keberhasilan proyek sewerage Denpasar.">Keahlian teknis Arkonin memastikan keberhasilan proyek sewerage Denpasar.</p>
            <span class="t-meta" data-en="City sanitation project • Design & supervision" data-id="Proyek sanitasi kota • Desain & supervisi">Proyek sanitasi kota • Desain & supervisi</span>
          </article>
          <!-- 2 -->
          <article class="t-card" data-author="Pemprov Kepulauan Riau">
            <h4 class="t-title" data-en="Provincial Government of Riau Islands" data-id="Pemerintah Prov. Kepulauan Riau">Pemerintah Prov. Kepulauan Riau</h4>
            <p class="t-body" data-en="World-class solutions, sensitive to community needs." data-id="Solusi bertaraf dunia, sensitif terhadap kebutuhan komunitas.">Solusi bertaraf dunia, sensitif terhadap kebutuhan komunitas.</p>
            <span class="t-meta" data-en="Resettlement & border area development" data-id="Resettlement & pengembangan kawasan perbatasan">Resettlement & pengembangan kawasan perbatasan</span>
          </article>
          <!-- 3 -->
          <article class="t-card" data-author="PT Jasa Marga (Persero) Tbk">
            <h4 class="t-title" data-en="PT Jasa Marga (Persero) Tbk" data-id="PT Jasa Marga (Persero) Tbk">PT Jasa Marga (Persero) Tbk</h4>
            <p class="t-body" data-en="Independent quality management, meeting international standards." data-id="Quality management independen, memenuhi standar internasional.">Quality management independen, memenuhi standar internasional.</p>
            <span class="t-meta" data-en="Toll road QA/QC • Technical inspection" data-id="QA/QC jalan tol • Inspeksi teknis">QA/QC jalan tol • Inspeksi teknis</span>
          </article>
          <!-- 4 -->
          <article class="t-card" data-author="Pemkot Denpasar">
            <h4 class="t-title" data-en="Government of Denpasar City" data-id="Pemerintah Kota Denpasar">Pemerintah Kota Denpasar</h4>
            <p class="t-body" data-en="Sanitation infrastructure improved significantly and sustainably." data-id="Infrastruktur sanitasi meningkat signifikan dan berkelanjutan.">Infrastruktur sanitasi meningkat signifikan dan berkelanjutan.</p>
            <span class="t-meta" data-en="WWTP & networks • Multi-party coordination" data-id="WWTP & jaringan • Koordinasi multi pihak">WWTP & jaringan • Koordinasi multi pihak</span>
          </article>
          <!-- 5 -->
          <article class="t-card" data-author="Pengembang Properti, Jakarta">
            <h4 class="t-title" data-en="Property Developer – Jakarta" data-id="Pengembang Properti – Jakarta">Pengembang Properti – Jakarta</h4>
            <p class="t-body" data-en="Innovative, cost-efficient, and responsive infrastructure planning." data-id="Perencanaan infrastruktur inovatif, hemat biaya, dan responsif.">Perencanaan infrastruktur inovatif, hemat biaya, dan responsif.</p>
            <span class="t-meta" data-en="Drainage • Transportation • Land use" data-id="Drainase • Transportasi • Tata guna lahan">Drainase • Transportasi • Tata guna lahan</span>
          </article>
          <!-- 6 -->
          <article class="t-card" data-author="Agensi Pembangunan Internasional">
            <h4 class="t-title" data-en="International Development Agency" data-id="Agensi Pembangunan Internasional">Agensi Pembangunan Internasional</h4>
            <p class="t-body" data-en="Globally competent, tailored to Indonesia’s local context." data-id="Kompeten secara global, tepat untuk konteks lokal Indonesia.">Kompeten secara global, tepat untuk konteks lokal Indonesia.</p>
            <span class="t-meta" data-en="International standards • Sustainability" data-id="Standar internasional • Keberlanjutan">Standar internasional • Keberlanjutan</span>
          </article>
          <!-- 7: Metrics -->
          <article class="t-card t-card--accent" data-author="Project Success Metrics">
            <h4 class="t-title" data-en="Project Success Metrics" data-id="Metrik Keberhasilan Proyek">Project Success Metrics</h4>
            <p class="t-body" data-en="95%+ retention, on-time, on-budget, zero major defects." data-id="Retensi 95%+, tepat waktu, tepat anggaran, tanpa cacat besar.">95%+ retention, on-time, on-budget, zero major defects.</p>
            <span class="t-meta" data-en="Repeat >80% • Significant referrals" data-id="Repeat >80% • Referral signifikan">Repeat >80% • Referral signifikan</span>
          </article>
          <!-- 8: Recognition -->
          <article class="t-card t-card--accent" data-author="Recognition & Awards">
            <h4 class="t-title" data-en="Recognition" data-id="Pengakuan & Penghargaan">Recognition</h4>
            <p class="t-body" data-en="Trusted by SOEs and international institutions for 40+ years." data-id="Dipercaya BUMN & lembaga internasional selama 40+ tahun.">Dipercaya BUMN & lembaga internasional selama 40+ tahun.</p>
            <span class="t-meta" data-en="Government projects • Long-term partnerships" data-id="Proyek pemerintah • Kemitraan jangka panjang">Proyek pemerintah • Kemitraan jangka panjang</span>
          </article>
          <!-- 9: Partnership Approach -->
          <article class="t-card t-card--accent" data-author="Client Partnership Approach">
            <h4 class="t-title" data-en="Client Partnership" data-id="Kemitraan Klien">Client Partnership</h4>
            <p class="t-body" data-en="Technical excellence, integrity, collaborative, innovative, sustainable, responsive." data-id="Teknis unggul, integritas, kolaboratif, inovatif, berkelanjutan, responsif.">Teknis unggul, integritas, kolaboratif, inovatif, berkelanjutan, responsif.</p>
            <span class="t-meta" data-en="True partner • Outcome-driven" data-id="Mitra sejati • Berorientasi hasil">True partner • Outcome-driven</span>
          </article>
        </div>

        <div class="t-controls" aria-hidden="true">
          <button class="t-btn t-prev" aria-label="Previous">‹</button>
          <button class="t-btn t-next" aria-label="Next">›</button>
        </div>
        <div class="t-dots" role="tablist" aria-label="Testimonial navigation"></div>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer id="contact">
    <div class="footer-main">
      <div class="footer-left">
        <h4 data-en="Visit Our Office" data-id="Kunjungi Kantor Kami">Visit Our Office</h4>
        <div class="footer-map">
          <iframe 
            src="https://www.google.com/maps?q=PT+Arkonin+Engineering+MP&output=embed"
            width="100%" height="220" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>

      <div class="footer-center">
        <div class="footer-logos">
          <img src="assets/images/logo.png" alt="Arkonin Logo" class="footer-logo">
          <img src="assets/images/certification.png" alt="Certifications" class="footer-cert">
        </div>
        <p class="footer-tagline" data-en="Delivering practical engineering solutions for Indonesia's sustainable future." data-id="Memberikan solusi teknik praktis untuk masa depan berkelanjutan Indonesia.">Delivering practical engineering solutions for Indonesia's sustainable future.</p>
      </div>

      <div class="footer-right">
        <h4 data-en="Contact Us" data-id="Hubungi Kami">Contact Us</h4>
        <div class="contact-info">
          <p data-en="Mon–Fri: 08:00 – 17:00 WIB" data-id="Sen–Jum: 08:00 – 17:00 WIB">Mon–Fri: 08:00 – 17:00 WIB</p>
          <p>Hunting: +62 21 7350211</p>
          <p>Fax: +62 21 7363947</p>
          <p>Email: areng@arkonin-emp.com</p>
        </div>
        <div class="social-icons">
          <a href="https://www.linkedin.com/company/pt-arkonin-engineering-manggala-pratama/" target="_blank" aria-label="LinkedIn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
            </svg>
          </a>
          <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
              <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
            </svg>
          </a>
          <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.59-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p data-en="© 2025 Arkonin Engineering MP. All rights reserved." data-id="© 2025 Arkonin Engineering MP. Hak cipta dilindungi.">© 2025 Arkonin Engineering MP. All rights reserved.</p>
    </div>
  </footer>

  <!-- ===== JS ===== -->
  <script src="assets/js/script.js"></script>
</body>
</html>