<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Insights — Arkonin Engineering MP</title>
  <base href="/">
  <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
 <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/insights.css') }}">
  <script defer src="{{ asset('assets/js/script.js') }}"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
  <style>
    .page-section{padding:40px 0}
  </style>
  </head>
<body>
  @include('partials.nav')

  <!-- Hero: Our Insight -->
  <section class="ins-hero">
    <div class="container mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
      <div class="hero-copy">
        <h1 class="hero-title" data-aos="fade-up" data-en="Our Insight" data-id="Wawasan Kami">Our Insight</h1>
        <p class="hero-sub" data-aos="fade-up" data-aos-delay="80" data-en="Explore our latest projects, engineering updates, and technical publications that reflect our continuous innovation and commitment to excellence." data-id="Jelajahi proyek terbaru, pembaruan rekayasa, dan publikasi teknis yang mencerminkan inovasi berkelanjutan dan komitmen kami terhadap keunggulan.">Explore our latest projects, engineering updates, and technical publications that reflect our continuous innovation and commitment to excellence.</p>
      </div>
      <div class="hero-highlights">
        <div class="highlight" data-aos="fade-up" data-aos-delay="120">
          <div class="icon bg-accent">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
          </div>
          <div class="content">
            <h3 data-en="Comprehensive Infrastructure Solutions" data-id="Solusi Infrastruktur Menyeluruh">Comprehensive Infrastructure Solutions</h3>
            <p data-en="Delivering multidisciplinary expertise in architecture, engineering, and project management." data-id="Menghadirkan keahlian multidisiplin dalam arsitektur, rekayasa, dan manajemen proyek.">Delivering multidisciplinary expertise in architecture, engineering, and project management.</p>
          </div>
        </div>
        <div class="highlight" data-aos="fade-up" data-aos-delay="160">
          <div class="icon bg-accent">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v6"/><path d="M6 6l6 6 6-6"/><path d="M4 20h16"/></svg>
          </div>
          <div class="content">
            <h3 data-en="Innovative Design Thinking" data-id="Pemikiran Desain Inovatif">Innovative Design Thinking</h3>
            <p data-en="We combine experience and creativity to build solutions that redefine functionality." data-id="Kami memadukan pengalaman dan kreativitas untuk membangun solusi yang mendefinisikan ulang fungsionalitas.">We combine experience and creativity to build solutions that redefine functionality.</p>
          </div>
        </div>
        <div class="highlight" data-aos="fade-up" data-aos-delay="200">
          <div class="icon bg-accent">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2a10 10 0 1 0 10 10"/><path d="M12 6v6l4 2"/></svg>
          </div>
          <div class="content">
            <h3 data-en="Sustainable Engineering" data-id="Rekayasa Berkelanjutan">Sustainable Engineering</h3>
            <p data-en="Every project aligns with environmental and energy efficiency principles." data-id="Setiap proyek selaras dengan prinsip lingkungan dan efisiensi energi.">Every project aligns with environmental and energy efficiency principles.</p>
          </div>
        </div>
        <div class="highlight" data-aos="fade-up" data-aos-delay="240">
          <div class="icon bg-accent">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="7" r="4"/><path d="M5 22c0-4 3-7 7-7s7 3 7 7"/></svg>
          </div>
          <div class="content">
            <h3 data-en="Trusted Expertise" data-id="Keahlian Terpercaya">Trusted Expertise</h3>
            <p data-en="Our decades of experience ensure precision and reliability in every work." data-id="Puluhan tahun pengalaman kami memastikan ketepatan dan keandalan dalam setiap pekerjaan.">Our decades of experience ensure precision and reliability in every work.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Section 2: Featured Projects (two-column overlay cards) -->
  <section id="projects" class="ins-projects">
    <div class="container mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
      <div class="section-head" data-aos="fade-up">
        <span class="section-eyebrow" data-en="POPULAR PROJECTS" data-id="PROYEK POPULER">POPULAR PROJECTS</span>
        <h2 class="section-title" data-en="Our Completed Projects" data-id="Proyek yang Telah Selesai">Our Completed Projects</h2>
        <p class="section-sub" data-en="Showcasing engineering excellence across Indonesia." data-id="Menampilkan keunggulan rekayasa di seluruh Indonesia.">Showcasing engineering excellence across Indonesia.</p>
      </div>
      <div class="projects-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $i => $p)
        <article class="project" data-aos="fade-up" @if($i>0) data-aos-delay="{{ 120*$i }}" @endif>
          <img src="{{ $p->image ?? 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1600&q=60' }}" alt="{{ $p->title }}"/>
          <div class="overlay-card">
            <span class="proj-cat">{{ $p->category ?? 'Project' }}</span>
            <h3>{{ $p->title }}</h3>
            <button class="btn-outline" data-desc="{{ e($p->description) }}" data-cat="{{ $p->category }}" data-en="View Details" data-id="Lihat Detail">View Details</button>
          </div>
        </article>
        @empty
          <p data-en="No projects available yet." data-id="Belum ada proyek yang tersedia.">No projects available yet.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Section 3: News & Updates (blog-style cards) -->
  <section id="news" class="ins-news">
    <div class="container mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
      <div class="section-head" data-aos="fade-up">
        <h2 class="section-title" data-en="News & Updates" data-id="Berita & Pembaruan">News & Updates</h2>
        <p class="section-sub" data-en="Stay informed with our latest activities, awards, and corporate developments." data-id="Tetap terinformasi dengan kegiatan, penghargaan, dan perkembangan korporat terbaru kami.">Stay informed with our latest activities, awards, and corporate developments.</p>
      </div>
      <div class="news-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($news as $i => $n)
        <article class="news-card" data-aos="fade-left" @if($i>0) data-aos-delay="{{ 120*$i }}" @endif>
          <img src="{{ $n->image ?? 'https://images.unsplash.com/photo-1557800636-894a64c1696f?auto=format&fit=crop&w=900&q=60' }}" alt="{{ $n->title }}"/>
          <div class="content">
            <time datetime="{{ optional($n->created_at)->format('Y-m-d') }}">{{ optional($n->created_at)->format('M j, Y') }}</time>
            <h3>{{ $n->title }}</h3>
            <a class="btn-link" href="#" data-news-id="news-{{ $n->id }}" data-en="Read More" data-id="Baca Selengkapnya">Read More</a>
          </div>
        </article>
        @empty
          <p data-en="No news available yet." data-id="Belum ada berita yang tersedia.">No news available yet.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Section 4: Publications & Reports (3 cards) -->
  <section id="publications" class="ins-pubs">
    <div class="container mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
      <div class="section-head" data-aos="fade-up">
        <h2 class="section-title" data-en="Publications & Reports" data-id="Publikasi & Laporan">Publications & Reports</h2>
        <p class="section-sub" data-en="Explore our research papers and engineering documents." data-id="Jelajahi makalah riset dan dokumen rekayasa kami.">Explore our research papers and engineering documents.</p>
      </div>
      <div class="pubs-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($publications as $i => $p)
        <article class="pub-card" data-aos="fade-up" @if($i>0) data-aos-delay="{{ 120*$i }}" @endif>
          <div class="doc-icon">📄</div>
          <h3>{{ $p->title }}</h3>
          <a class="btn-download" href="{{ Str::startsWith($p->file, ['http://','https://']) ? $p->file : url('/storage/'.$p->file) }}" target="_blank" rel="noopener" data-en="View File" data-id="Lihat Berkas">View File</a>
        </article>
        @empty
          <p data-en="No publications available yet." data-id="Belum ada publikasi yang tersedia.">No publications available yet.</p>
        @endforelse
      </div>
    </div>
  </section>

  @include('partials.footer')
  
  <!-- Modal Backdrop -->
  <div id="newsModal" class="modal-backdrop" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal" role="document">
      <div class="modal-header">
        <h3 id="modalTitle" data-en="News Detail" data-id="Detail Berita">News Detail</h3>
        
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Filled dynamically -->
      </div>
      <div class="modal-actions">
        <button class="btn-close" id="modalDismiss" data-en="Close" data-id="Tutup">Close</button>
      </div>
    </div>
  </div>

  <!-- Hidden news details from DB -->
  @foreach($news as $n)
    <template id="news-{{ $n->id }}">
      <time datetime="{{ optional($n->created_at)->format('Y-m-d') }}">{{ optional($n->created_at)->format('M j, Y') }}</time>
      @if(!empty($n->image))
      <img src="{{ $n->image }}" alt="{{ $n->title }}">
      @endif
      <p>{{ $n->content }}</p>
    </template>
  @endforeach
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    window.addEventListener('load', function(){
      if (window.AOS) {
        AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });
      }

      // Modal behavior
      const modal = document.getElementById('newsModal');
      const bodyEl = document.getElementById('modalBody');
      const titleEl = document.getElementById('modalTitle');
      const closeBtn = document.getElementById('modalClose');
      const dismissBtn = document.getElementById('modalDismiss');

      function openModal(id) {
        const tpl = document.getElementById(id);
        if (!tpl) return;
        bodyEl.innerHTML = tpl.innerHTML;
        titleEl.textContent = document.querySelector(`[data-news-id="${id}"]`)?.closest('.content')?.querySelector('h3')?.textContent || 'News Detail';
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
      }
      function closeModal() {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      }

      document.querySelectorAll('.btn-link[data-news-id]').forEach((link)=>{
        link.addEventListener('click', (e)=>{
          e.preventDefault();
          const id = link.getAttribute('data-news-id');
          openModal(id);
        });
      });
      // Project View Details -> open modal below navbar
      document.querySelectorAll('.overlay-card .btn-outline').forEach((btn)=>{
        btn.addEventListener('click', (e)=>{
          e.preventDefault();
          const card = btn.closest('.overlay-card');
          const project = btn.closest('.project');
          const title = card?.querySelector('h3')?.textContent || 'Project Detail';
          const img = project?.querySelector('img');
          const category = btn.getAttribute('data-cat') || card?.querySelector('.proj-cat')?.textContent || 'Project';
          const desc = btn.getAttribute('data-desc') || '';
          titleEl.textContent = title;
          bodyEl.innerHTML = `\n            ${img ? `<img src="${img.src}" alt="${img.alt || title}"/>` : ''}\n            <div class="proj-meta" style="margin:.5rem 0 0.75rem 0;">\n              <span class="badge" style="display:inline-block;padding:.25rem .5rem;border-radius:.5rem;background:#eef2f7;color:#0f172a;font-size:.75rem;">${category}</span>\n            </div>\n            <p>${desc || 'Tidak ada deskripsi.'}</p>\n          `;
          modal.classList.add('show');
          modal.setAttribute('aria-hidden', 'false');
          document.body.style.overflow = 'hidden';
        });
      });
      // header close removed; keep only bottom close and backdrop click
      dismissBtn.addEventListener('click', closeModal);
      modal.addEventListener('click', (e)=>{ if (e.target === modal) closeModal(); });
    });
  </script>
</body>
</html>