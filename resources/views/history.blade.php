<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Sejarah PT Arkonin Engineering Manggala Pratama — lebih dari 60 tahun memberikan solusi rekayasa terbaik untuk pembangunan Indonesia." />
  <title>Sejarah | PT Arkonin Engineering MP</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Tailwind via Vite; remove fixed CSS overrides -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')

  <!-- ===== HERO SECTION ===== -->
  <section class="bg-gray-50">
    <div class="container mx-auto px-4 md:px-6 lg:px-8 py-10">
      <h1 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900">Perjalanan Arkonin Engineering MP</h1>
      <p class="mt-2 max-w-3xl text-gray-600 text-wrap">Lebih dari enam dekade berkontribusi dalam inovasi dan pembangunan infrastruktur berkelanjutan di seluruh Indonesia.</p>
    </div>
  </section>

  <!-- ===== TIMELINE SECTION ===== -->
  <section>
    <div class="container mx-auto px-4 md:px-6 lg:px-8 py-8">
      <h2 class="text-xl md:text-2xl font-semibold text-gray-900">Sejarah Perusahaan</h2>
      <p class="mt-1 max-w-3xl text-gray-600">Tonggak perjalanan Arkonin Engineering Manggala Pratama sebagai konsultan teknik terpercaya di Indonesia.</p>

      <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" aria-label="Company timeline">
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">1961 — Awal Mula</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">Arkonin dimulai sebagai Departemen Desain di PT Pembangunan Jaya, yang kemudian menjadi cikal bakal berdirinya Arkonin Group.</p></article>
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">1982 — Berdirinya PT Arkonin Engineering MP</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">PT Arkonin Engineering Manggala Pratama resmi berdiri sebagai anak perusahaan PT Arkonin dengan fokus pada layanan konsultansi infrastruktur dan teknik sipil.</p></article>
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">1990-an — Ekspansi Multi-Sektor</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">Memperluas layanan dari bidang air minum ke berbagai sektor: lingkungan, jalan, jembatan, serta energi dan industri.</p></article>
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">2000–2010 — Pemberdayaan Komunitas</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">Arkonin berperan dalam proyek-proyek nasional seperti P2KP, PNPM, PAMSIMAS, dan SANIMAS dalam upaya pengembangan masyarakat.</p></article>
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">2014 — Kantor Baru</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">Relokasi ke Komplek Perkantoran Bintaro Persada, Jakarta Selatan, dengan fasilitas modern untuk mendukung operasional profesional.</p></article>
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">2022 — 40 Tahun Arkonin Engineering MP</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">Merayakan 40 tahun kiprah Arkonin Engineering MP dengan lebih dari 1000 proyek di seluruh Indonesia dan ratusan profesional ahli.</p></article>
        <article class="rounded-xl border bg-white p-5 shadow-sm"><h3 class="text-lg md:text-xl font-semibold text-gray-900">2025 — Melangkah ke Masa Depan</h3><p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">Berkomitmen terus berinovasi dalam teknologi, keberlanjutan, dan transformasi digital untuk mendukung pembangunan Indonesia masa depan.</p></article>
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

  <script src="assets/js/script.js"></script>
</body>
</html>