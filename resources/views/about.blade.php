<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
 <link rel="stylesheet" href="assets/CSS/history.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')

  <!-- Hero: versi baru sesuai snippet (slider + preview & atribut data) -->
  <section id="about-hero" class="hero-section">
    <div class="hero-slider" aria-label="About hero slider">
      <div class="slide active" data-index="0">
        <div class="hero-image">
          <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1600&q=60" alt="Corporate Architecture" loading="eager" decoding="async" />
        </div>
      </div>
      <div class="slide" data-index="1">
        <div class="hero-image">
          <img src="https://images.pexels.com/photos/256381/pexels-photo-256381.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Engineering Construction Site" loading="lazy" decoding="async" />
        </div>
      </div>
      <div class="slide" data-index="2">
        <div class="hero-image">
          <img src="https://images.pexels.com/photos/830891/pexels-photo-830891.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Corporate Office Skyline" loading="lazy" decoding="async" />
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
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1600&q=60" alt="Preview Corporate Architecture" loading="eager" decoding="async" />
          </div>
          <div class="preview-slide absolute inset-0" data-index="1">
            <img class="w-full h-full object-cover" src="https://images.pexels.com/photos/256381/pexels-photo-256381.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Preview Engineering Construction Site" loading="lazy" decoding="async" />
          </div>
          <div class="preview-slide absolute inset-0" data-index="2">
            <img class="w-full h-full object-cover" src="https://images.pexels.com/photos/830891/pexels-photo-830891.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Preview Corporate Office Skyline" loading="lazy" decoding="async" />
          </div>
        </div>
        <div class="preview-controls md:absolute md:left-0 md:right-0 md:-bottom-14 relative mt-2 flex items-center justify-center gap-3 z-[3]" aria-label="Preview controls">
          <button class="preview-btn prev w-9 h-9 grid place-items-center rounded-full border border-white/50 bg-white text-[#00314d] text-[18px] shadow-md hover:bg-[#f3f6f9] transition" aria-label="Previous">‹</button>
          <button class="preview-btn next w-9 h-9 grid place-items-center rounded-full border border-white/50 bg-white text-[#00314d] text-[18px] shadow-md hover:bg-[#f3f6f9] transition" aria-label="Next">›</button>
        </div>
      </div>
    </div>
  </section>

  <!-- About section -->
  <section id="about" class="landing-section theme-light">
    <div class="page-container">
      <h2 class="section-title" data-en="About Arkonin Engineering Manggala Pratama" data-id="Tentang Arkonin Engineering Manggala Pratama">About Arkonin Engineering Manggala Pratama</h2>
      <div class="mt-4 md:max-w-none lg:max-w-5xl text-slate-800 space-y-4">
        <p data-en="Arkonin Engineering Manggala Pratama is a trusted Indonesian engineering consultancy with 40+ years of experience delivering integrated infrastructure solutions." data-id="Arkonin Engineering Manggala Pratama adalah konsultan teknik tepercaya di Indonesia dengan pengalaman lebih dari 40 tahun menghadirkan solusi infrastruktur terpadu.">Arkonin Engineering Manggala Pratama is a trusted Indonesian engineering consultancy with 40+ years of experience delivering integrated infrastructure solutions.</p>
        <p data-en="We bring multi-disciplinary expertise to plan and deliver roads, bridges, drainage, land development, airports, rail, ports, and water–wastewater projects across Indonesia." data-id="Kami menghadirkan keahlian multidisiplin untuk merencanakan dan melaksanakan proyek jalan, jembatan, drainase, pengembangan lahan, bandara, rel, pelabuhan, serta proyek air dan air limbah di seluruh Indonesia.">We bring multi-disciplinary expertise to plan and deliver roads, bridges, drainage, land development, airports, rail, ports, and water–wastewater projects across Indonesia.</p>
      </div>
    </div>
  </section>

  <!-- History (timeline) section -->
  <section id="history" class="history-section">
    <div class="mx-auto w-full px-4 md:px-6 lg:px-8">
      <h2 data-en="Company History" data-id="Sejarah Perusahaan">Sejarah Perusahaan</h2>
      <p class="subtitle" data-en="Milestones of Arkonin Engineering Manggala Pratama as a trusted engineering consultant in Indonesia." data-id="Tonggak perjalanan Arkonin Engineering Manggala Pratama sebagai konsultan teknik terpercaya di Indonesia.">Tonggak perjalanan Arkonin Engineering Manggala Pratama sebagai konsultan teknik terpercaya di Indonesia.</p>

      <div class="timeline" aria-label="Company timeline">
        <div class="timeline-item left">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="1961 — Early Beginnings" data-id="1961 — Awal Mula">1961 — Awal Mula</h3>
            <p data-en="Arkonin began as the Design Department at PT Pembangunan Jaya, which later became the foundation of the Arkonin Group." data-id="Arkonin dimulai sebagai Departemen Desain di PT Pembangunan Jaya, yang kemudian menjadi cikal bakal berdirinya Arkonin Group.">Arkonin dimulai sebagai Departemen Desain di PT Pembangunan Jaya, yang kemudian menjadi cikal bakal berdirinya Arkonin Group.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="1982 — Establishment of PT Arkonin Engineering MP" data-id="1982 — Berdirinya PT Arkonin Engineering MP">1982 — Berdirinya PT Arkonin Engineering MP</h3>
            <p data-en="PT Arkonin Engineering Manggala Pratama was officially established as a subsidiary of PT Arkonin, focusing on infrastructure consulting and civil engineering services." data-id="PT Arkonin Engineering Manggala Pratama resmi berdiri sebagai anak perusahaan PT Arkonin dengan fokus pada layanan konsultansi infrastruktur dan teknik sipil.">PT Arkonin Engineering Manggala Pratama resmi berdiri sebagai anak perusahaan PT Arkonin dengan fokus pada layanan konsultansi infrastruktur dan teknik sipil.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="1990s — Multi-Sector Expansion" data-id="1990-an — Ekspansi Multi-Sektor">1990-an — Ekspansi Multi-Sektor</h3>
            <p data-en="Expanded services from water supply to multiple sectors: environment, roads, bridges, as well as energy and industry." data-id="Memperluas layanan dari bidang air minum ke berbagai sektor: lingkungan, jalan, jembatan, serta energi dan industri.">Memperluas layanan dari bidang air minum ke berbagai sektor: lingkungan, jalan, jembatan, serta energi dan industri.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="2000–2010 — Community Empowerment" data-id="2000–2010 — Pemberdayaan Komunitas">2000–2010 — Pemberdayaan Komunitas</h3>
            <p data-en="Arkonin played a role in national programs such as P2KP, PNPM, PAMSIMAS, and SANIMAS as part of community development efforts." data-id="Arkonin berperan dalam proyek-proyek nasional seperti P2KP, PNPM, PAMSIMAS, dan SANIMAS dalam upaya pengembangan masyarakat.">Arkonin berperan dalam proyek-proyek nasional seperti P2KP, PNPM, PAMSIMAS, dan SANIMAS dalam upaya pengembangan masyarakat.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="2014 — New Office" data-id="2014 — Kantor Baru">2014 — Kantor Baru</h3>
            <p data-en="Relocated to the Bintaro Persada Office Complex, South Jakarta, with modern facilities to support professional operations." data-id="Relokasi ke Komplek Perkantoran Bintaro Persada, Jakarta Selatan, dengan fasilitas modern untuk mendukung operasional profesional.">Relokasi ke Komplek Perkantoran Bintaro Persada, Jakarta Selatan, dengan fasilitas modern untuk mendukung operasional profesional.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h3 data-en="2022 — 40 Years of Arkonin Engineering MP" data-id="2022 — 40 Tahun Arkonin Engineering MP">2022 — 40 Tahun Arkonin Engineering MP</h3>
            <p data-en="Celebrated 40 years of Arkonin Engineering MP with over 1000 projects across Indonesia and hundreds of expert professionals." data-id="Merayakan 40 tahun kiprah Arkonin Engineering MP dengan lebih dari 1000 proyek di seluruh Indonesia dan ratusan profesional ahli.">Merayakan 40 tahun kiprah Arkonin Engineering MP dengan lebih dari 1000 proyek di seluruh Indonesia dan ratusan profesional ahli.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-dot pulse"></div>
          <div class="timeline-content current">
            <h3 data-en="2025 — Moving Into the Future" data-id="2025 — Melangkah ke Masa Depan">2025 — Melangkah ke Masa Depan</h3>
            <p data-en="Committed to continuous innovation in technology, sustainability, and digital transformation to support Indonesia's future development." data-id="Berkomitmen terus berinovasi dalam teknologi, keberlanjutan, dan transformasi digital untuk mendukung pembangunan Indonesia masa depan.">Berkomitmen terus berinovasi dalam teknologi, keberlanjutan, dan transformasi digital untuk mendukung pembangunan Indonesia masa depan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Leadership section -->
  <section id="leadership" class="landing-section theme-alt">
    <div class="page-container">
      <h2 class="section-title" data-en="Our Leadership" data-id="Kepemimpinan">Our Leadership</h2>
      <p class="section-subtitle" data-en="Founders, Commissioners, Management, and Division Heads." data-id="Pendiri, Komisaris, Manajemen, dan Kepala Divisi.">Founders, Commissioners, Management, and Division Heads.</p>

      <!-- Founders -->
      <h3 class="mt-6" data-en="Founders" data-id="Pendiri">Founders</h3>
      <div class="page-grid">
        <div class="page-card reveal">
          <div class="content">
            <h4>Ir. H. Sjaiful Arifin</h4>
            <p data-en="As one of the founding visionaries of Arkonin Engineering Manggala Pratama, Ir. H. Sjaiful Arifin brought decades of engineering expertise and strategic foresight that shaped the company's foundational principles. His commitment to engineering excellence and professional integrity established the cornerstone values that continue to guide our operations today." data-id="Sebagai salah satu pendiri visioner Arkonin Engineering Manggala Pratama, Ir. H. Sjaiful Arifin membawa puluhan tahun keahlian teknik dan wawasan strategis yang membentuk prinsip dasar perusahaan. Komitmennya terhadap keunggulan teknik dan integritas profesional menjadi nilai dasar yang terus membimbing operasional kami hingga saat ini.">As one of the founding visionaries of Arkonin Engineering Manggala Pratama, Ir. H. Sjaiful Arifin brought decades of engineering expertise and strategic foresight that shaped the company's foundational principles. His commitment to engineering excellence and professional integrity established the cornerstone values that continue to guide our operations today.</p>
          </div>
        </div>
        <div class="page-card reveal">
          <div class="content">
            <h4>Ir. H. Habis Sungkowo Dendawijaya</h4>
            <p data-en="A pioneering figure in Indonesia's engineering consulting sector, Ir. H. Habis Sungkowo Dendawijaya co-founded the company with a vision to create world-class infrastructure solutions. His technical prowess and dedication to advancing Indonesian engineering standards have left an indelible mark on the industry." data-id="Sebagai tokoh perintis di sektor konsultansi teknik Indonesia, Ir. H. Habis Sungkowo Dendawijaya ikut mendirikan perusahaan dengan visi menghadirkan solusi infrastruktur kelas dunia. Keahlian teknis dan dedikasinya dalam memajukan standar teknik Indonesia meninggalkan jejak yang kuat di industri.">A pioneering figure in Indonesia's engineering consulting sector, Ir. H. Habis Sungkowo Dendawijaya co-founded the company with a vision to create world-class infrastructure solutions. His technical prowess and dedication to advancing Indonesian engineering standards have left an indelible mark on the industry.</p>
          </div>
        </div>
        <div class="page-card reveal">
          <div class="content">
            <h4>Drs. Slamet Boedi Sukrisno</h4>
            <p data-en="With exceptional leadership acumen and strategic business insight, Drs. Slamet Boedi Sukrisno helped establish the company's operational framework and business model. His contribution to building lasting relationships with key stakeholders positioned Arkonin EMP as a trusted partner in Indonesia's development sector." data-id="Dengan kecakapan kepemimpinan dan wawasan bisnis yang luar biasa, Drs. Slamet Boedi Sukrisno membantu membangun kerangka operasional dan model bisnis perusahaan. Kontribusinya dalam membangun hubungan jangka panjang dengan para pemangku kepentingan menempatkan Arkonin EMP sebagai mitra tepercaya di sektor pembangunan Indonesia.">With exceptional leadership acumen and strategic business insight, Drs. Slamet Boedi Sukrisno helped establish the company's operational framework and business model. His contribution to building lasting relationships with key stakeholders positioned Arkonin EMP as a trusted partner in Indonesia's development sector.</p>
          </div>
        </div>
      </div>

      <!-- Commissioners -->
      <div class="mt-10">
        <h3 data-en="Commissioners" data-id="Komisaris">Commissioners</h3>
        <p data-en="Our Board of Commissioners provides strategic oversight and governance, ensuring that the company maintains its commitment to excellence, professional ethics, and sustainable growth. The commissioners bring diverse perspectives from various sectors of industry, finance, and engineering, guiding Arkonin EMP's long-term strategic direction." data-id="Dewan Komisaris kami memberikan pengawasan dan tata kelola strategis, memastikan perusahaan tetap berkomitmen pada keunggulan, etika profesional, dan pertumbuhan berkelanjutan. Para komisaris membawa perspektif beragam dari berbagai sektor industri, keuangan, dan teknik, membimbing arah strategis jangka panjang Arkonin EMP.">Our Board of Commissioners provides strategic oversight and governance, ensuring that the company maintains its commitment to excellence, professional ethics, and sustainable growth. The commissioners bring diverse perspectives from various sectors of industry, finance, and engineering, guiding Arkonin EMP's long-term strategic direction.</p>
      </div>

      <!-- Management Team -->
      <div class="mt-10">
        <h3 data-en="Management Team" data-id="Tim Manajemen">Management Team</h3>
        <p data-en="Our management structure is led by experienced professionals who oversee key operational divisions." data-id="Struktur manajemen kami dipimpin oleh para profesional berpengalaman yang mengawasi divisi-divisi operasional utama.">Our management structure is led by experienced professionals who oversee key operational divisions.</p>
      </div>

      <!-- Head of Divisions -->
      <div class="mt-6 page-grid">
        <div class="page-card reveal"><div class="content"><h4 data-en="Infrastructure Division" data-id="Divisi Infrastruktur">Infrastructure Division</h4><p data-en="Overseeing road, bridge, highway, and transportation infrastructure projects." data-id="Mengawasi proyek infrastruktur jalan, jembatan, jalan raya, dan transportasi.">Overseeing road, bridge, highway, and transportation infrastructure projects.</p></div></div>
        <div class="page-card reveal"><div class="content"><h4 data-en="Environmental Division" data-id="Divisi Lingkungan">Environmental Division</h4><p data-en="Managing water resources, wastewater systems, and environmental solutions." data-id="Mengelola sumber daya air, sistem air limbah, dan solusi lingkungan.">Managing water resources, wastewater systems, and environmental solutions.</p></div></div>
        <div class="page-card reveal"><div class="content"><h4 data-en="Community Development & Housing Division" data-id="Divisi Pengembangan Komunitas & Perumahan">Community Development & Housing Division</h4><p data-en="Focusing on resettlement, community empowerment, and residential development." data-id="Berfokus pada permukiman kembali, pemberdayaan masyarakat, dan pengembangan perumahan.">Focusing on resettlement, community empowerment, and residential development.</p></div></div>
        <div class="page-card reveal"><div class="content"><h4 data-en="Technical Services Division" data-id="Divisi Layanan Teknis">Technical Services Division</h4><p data-en="Coordinating quality control, project supervision, and technical assistance programs." data-id="Mengkoordinasikan pengendalian mutu, supervisi proyek, dan program bantuan teknis.">Coordinating quality control, project supervision, and technical assistance programs.</p></div></div>
      </div>

      <p class="mt-6" data-en="Each division head possesses extensive industry experience and maintains strong relationships with government agencies, private clients, and international partners, ensuring seamless project execution and client satisfaction." data-id="Setiap kepala divisi memiliki pengalaman industri yang luas dan menjalin hubungan yang kuat dengan lembaga pemerintah, klien swasta, dan mitra internasional, memastikan pelaksanaan proyek yang mulus dan kepuasan klien.">Each division head possesses extensive industry experience and maintains strong relationships with government agencies, private clients, and international partners, ensuring seamless project execution and client satisfaction.</p>
    </div>
  </section>

  <!-- Purpose section -->
  <section id="purpose" class="landing-section theme-dark">
    <div class="page-container">
      <h2 class="section-title" data-en="Our Purpose" data-id="Tujuan Kami">Our Purpose</h2>
      <p class="section-subtitle" data-en="The purpose that drives our work." data-id="Tujuan yang mendorong kami berkarya.">Tujuan yang mendorong kami berkarya.</p>
      <div class="page-grid">
        <div class="page-card reveal">
          <div class="content">
            <h3 data-en="Sustainability" data-id="Keberlanjutan">Sustainability</h3>
            <p data-en="Committed to delivering sustainable infrastructure." data-id="Berkomitmen menghadirkan infrastruktur berkelanjutan.">Berkomitmen menghadirkan infrastruktur berkelanjutan.</p>
          </div>
        </div>
        <div class="page-card reveal">
          <div class="content">
            <h3 data-en="Community" data-id="Komunitas">Community</h3>
            <p data-en="Empowering communities through inclusive design." data-id="Memberdayakan masyarakat melalui desain yang inklusif.">Memberdayakan masyarakat melalui desain yang inklusif.</p>
          </div>
        </div>
        <div class="page-card reveal">
          <div class="content">
            <h3 data-en="Innovation" data-id="Inovasi">Innovation</h3>
            <p data-en="Exploring practical and adaptive solutions for the future." data-id="Menggali solusi praktis dan adaptif untuk masa depan.">Menggali solusi praktis dan adaptif untuk masa depan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Management section -->
  <section id="management" class="landing-section theme-light">
    <div class="page-container">
      <h2 class="section-title" data-en="Management" data-id="Manajemen">Management</h2>
      <p class="section-subtitle" data-en="An agile and collaborative management structure." data-id="Struktur manajemen yang agile dan kolaboratif.">Struktur manajemen yang agile dan kolaboratif.</p>
      <div class="page-grid">
        <div class="page-card reveal"><div class="content"><h3 data-en="Water Division" data-id="Divisi Air">Water Division</h3><p data-en="Water resources development." data-id="Pengembangan sumber daya air.">Pengembangan sumber daya air.</p></div></div>
        <div class="page-card reveal"><div class="content"><h3 data-en="Environment Division" data-id="Divisi Lingkungan">Environment Division</h3><p data-en="Integrated environmental solutions." data-id="Solusi lingkungan terpadu.">Solusi lingkungan terpadu.</p></div></div>
        <div class="page-card reveal"><div class="content"><h3 data-en="Electrical & Industrial" data-id="Kelistrikan & Industri">Electrical & Industrial</h3><p data-en="Efficient energy and industrial solutions." data-id="Energi dan industri efisien.">Energi dan industri efisien.</p></div></div>
      </div>
    </div>
  </section>

  <!-- Clients section -->
  <section id="clients" class="landing-section theme-alt">
    <div class="page-container">
      <h2 class="section-title" data-en="Clients" data-id="Klien">Clients</h2>
      <p class="section-subtitle" data-en="Collaboration with public and private institutions." data-id="Kolaborasi dengan institusi publik dan swasta.">Kolaborasi dengan institusi publik dan swasta.</p>
      <div class="page-grid">
        <div class="page-card reveal"><img src="https://images.unsplash.com/photo-1556761175-4b46a572b87b?auto=format&fit=crop&w=800&q=60" alt="Client" loading="lazy" /><div class="content"><h3 data-en="Client A" data-id="Klien A">Client A</h3><p data-en="Urban infrastructure projects." data-id="Proyek infrastruktur perkotaan.">Proyek infrastruktur perkotaan.</p></div></div>
        <div class="page-card reveal"><img src="https://images.unsplash.com/photo-1529336953121-4f3b0a0f0b8c?auto=format&fit=crop&w=800&q=60" alt="Client" loading="lazy" /><div class="content"><h3 data-en="Client B" data-id="Klien B">Client B</h3><p data-en="Drinking water management." data-id="Pengelolaan air minum.">Pengelolaan air minum.</p></div></div>
        <div class="page-card reveal"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=60" alt="Client" loading="lazy" /><div class="content"><h3 data-en="Client C" data-id="Klien C">Client C</h3><p data-en="Energy and industrial facilities." data-id="Energi dan fasilitas industri.">Energi dan fasilitas industri.</p></div></div>
      </div>
    </div>
  </section>

  <!-- Testimonials section -->
  <section id="testimonials" class="landing-section theme-light">
    <div class="page-container">
      <h2 class="section-title" data-en="Testimonials" data-id="Testimoni">Testimonials</h2>
      <p class="section-subtitle" data-en="What our clients and partners say." data-id="Apa kata klien dan mitra kami.">Apa kata klien dan mitra kami.</p>
      <div class="page-grid">
        <div class="page-card reveal"><div class="content"><p data-en="Arkonin is very responsive and solution-oriented in our project." data-id="Arkonin sangat responsif dan solutif dalam proyek kami.">“Arkonin sangat responsif dan solutif dalam proyek kami.”</p></div></div>
        <div class="page-card reveal"><div class="content"><p data-en="Efficient design with strong impact orientation." data-id="Desain yang efisien dan berorientasi dampak.">“Desain yang efisien dan berorientasi dampak.”</p></div></div>
        <div class="page-card reveal"><div class="content"><p data-en="A professional team with high working standards." data-id="Tim profesional dengan standar kerja tinggi.">“Tim profesional dengan standar kerja tinggi.”</p></div></div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('partials.footer')

  <script src="assets/js/script.js"></script>
</body>
</html>