<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Careers — Arkonin Engineering MP</title>
  <base href="/">
  <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Always include site assets to ensure navbar/footer styling works -->
 <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/careers.css') }}">
  <script defer src="{{ asset('assets/js/script.js') }}"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  @include('partials.nav')

  <!-- Hero -->
  <section class="careers-hero">
    <div class="container mx-auto max-w-screen-xl px-6 md:px-12 text-center">
      <h1 class="text-2xl md:text-4xl lg:text-5xl" data-en="Join Our Team" data-id="Bergabung dengan Tim Kami">Join Our Team</h1>
      <p class="text-sm md:text-base" data-en="Build Indonesia’s infrastructure future with Arkonin Engineering MP." data-id="Bangun masa depan infrastruktur Indonesia bersama Arkonin Engineering MP.">Build Indonesia’s infrastructure future with Arkonin Engineering MP.</p>
    </div>
  </section>

  <!-- Why work with us -->
  <section class="careers-benefits">
    <div class="container mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
      <div class="benefits-grid grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="benefit-card">
          <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="12" cy="12" r="3" fill="currentColor"/></svg>
          <div class="title-row">
            <h3 data-en="Impactful Projects" data-id="Proyek Berdampak">Impactful Projects</h3>
            <span class="benefit-check" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <p data-en="Nationwide projects in water, urban, and industrial sectors." data-id="Proyek berskala nasional di sektor air, perkotaan, dan industri.">Nationwide projects in water, urban, and industrial sectors.</p>
        </div>
        <div class="benefit-card">
          <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="2" fill="none"/><path d="M8 10h8" stroke="currentColor" stroke-width="2"/></svg>
          <div class="title-row">
            <h3 data-en="Growth & Learning" data-id="Pertumbuhan & Pembelajaran">Growth & Learning</h3>
            <span class="benefit-check" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <p data-en="Mentoring, training, and certifications." data-id="Mentoring, pelatihan, dan sertifikasi.">Mentoring, training, and certifications.</p>
        </div>
        <div class="benefit-card">
          <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="10" r="3" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="15" cy="10" r="3" stroke="currentColor" stroke-width="2" fill="none"/><path d="M5 18c1.5-3 5.5-3 7 0M12 18c1.5-3 5.5-3 7 0" stroke="currentColor" stroke-width="2" fill="none"/></svg>
          <div class="title-row">
            <h3 data-en="Collaborative Culture" data-id="Budaya Kolaboratif">Collaborative Culture</h3>
            <span class="benefit-check" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <p data-en="Work with experienced engineers and planners." data-id="Bekerja dengan insinyur dan perencana berpengalaman.">Work with experienced engineers and planners.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Open roles (dynamic) -->
  <section class="careers-open">
    <div class="container mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
      <h2 data-en="Open Positions" data-id="Lowongan Tersedia">Open Positions</h2>
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
      @endif
      @if($errors->any())
        <div class="alert alert-error">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="cards-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($careers as $c)
          <div class="career-card rounded-xl shadow-md hover:shadow-lg p-5 transition-all duration-300">
            <p class="career-title">{{ $c->job_title }}</p>
            <span class="status-badge"><span data-en="Status:" data-id="Status:">Status:</span> {{ ucfirst($c->status) }}</span>
            <p class="career-desc">{{ Str::limit($c->description, 140) }}</p>
            <button class="apply-btn" data-id="{{ $c->id }}" data-title="{{ $c->job_title }}" data-en="Apply Now" data-id="Lamar Sekarang">Apply Now</button>
          </div>
        @empty
          <p class="flex items-center justify-center h-64" data-en="No open positions at the moment." data-id="Belum ada lowongan saat ini.">No open positions at the moment.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Apply Modal -->
  <div id="applyModal" class="modal-backdrop">
    <div class="modal w-11/12 md:w-2/3 lg:w-1/2 overflow-y-auto max-h-[90vh]" style="margin-top: 90px;">
      <div class="modal-header">
        <h3 id="applyTitle" data-en="Apply" data-id="Lamar">Apply</h3>
        <button id="applyClose" class="btn-close" aria-label="Close" data-en="✕" data-id="✕">✕</button>
      </div>
      <form method="POST" action="/careers/apply" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="career_id" id="career_id" />
        <div class="form-grid">
          <div>
            <label data-en="Full Name" data-id="Nama Lengkap">Full Name</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="text" name="name" required data-ph-en="Your full name" data-ph-id="Nama lengkap Anda" />
          </div>
          <div>
            <label data-en="Email" data-id="Email">Email</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="email" name="email" required data-ph-en="name@company.com" data-ph-id="nama@perusahaan.com" />
          </div>
          <div>
            <label data-en="Phone (optional)" data-id="Telepon (opsional)">Phone (optional)</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="text" name="phone" data-ph-en="Phone number" data-ph-id="Nomor telepon" />
          </div>
          <div>
            <label data-en="CV (PDF/DOC, max 5MB)" data-id="CV (PDF/DOC, maks 5MB)">CV (PDF/DOC, max 5MB)</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="file" name="cv_file" accept=".pdf,.doc,.docx" />
          </div>
          <div>
            <label data-en="Message (optional)" data-id="Pesan (opsional)">Message (optional)</label>
            <textarea class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" rows="4" name="message" data-ph-en="Your message" data-ph-id="Pesan Anda"></textarea>
          </div>
        </div>
        <div class="modal-actions">
          <button type="button" id="applyCancel" class="btn-close" data-en="Cancel" data-id="Batal">Cancel</button>
          <button type="submit" class="btn-submit w-full md:w-auto" data-en="Submit Application" data-id="Kirim Lamaran">Submit Application</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const modal = document.getElementById('applyModal');
    const titleEl = document.getElementById('applyTitle');
    const idInput = document.getElementById('career_id');
    function openModal(id, title) {
      titleEl.textContent = 'Apply — ' + title;
      idInput.value = id;
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
    }
    function closeModal() {
      modal.classList.remove('show');
      document.body.style.overflow = '';
    }
    document.querySelectorAll('.apply-btn').forEach(btn => {
      btn.addEventListener('click', (e)=>{
        e.preventDefault();
        openModal(btn.dataset.id, btn.dataset.title);
      });
    });
    document.getElementById('applyClose').addEventListener('click', closeModal);
    document.getElementById('applyCancel').addEventListener('click', closeModal);
  </script>

  @include('partials.footer')
</body>
</html>