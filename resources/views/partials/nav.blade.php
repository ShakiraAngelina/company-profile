<header>
  <nav class="mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8 grid grid-cols-3 items-center gap-3 lg:flex lg:justify-between lg:items-center">
    <!-- Mobile/Tablet: Hamburger (kiri), Logo (tengah), Search (kanan) -->
    <div class="menu-icon block lg:hidden justify-self-start" aria-label="Toggle menu" role="button">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div class="logo justify-self-center lg:justify-self-start">
      <a href="/">
        <img src="assets/images/logo.png" alt="Arkonin Engineering MP Logo">
      </a>
    </div>

    <div class="nav-links hidden lg:flex lg:items-center lg:gap-6">
      <!-- Close button appears on mobile/iPad overlay -->
      <button type="button" class="close-menu lg:hidden" aria-label="Close menu">×</button>
      <div class="dropdown">
        <a href="/#about" data-en="ABOUT US" data-id="TENTANG KAMI" data-i18n-key="nav.about_us">ABOUT US</a>
        <button type="button" class="dropdown-toggle" aria-label="Toggle submenu" aria-expanded="false">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="dropdown-content">
          <a href="/#about" data-en="About Arkonin Engineering MP" data-id="Tentang Arkonin Engineering MP">About Arkonin Engineering MP</a>
          <a href="/#history" data-en="History of PT. Arkonin Engineering MP" data-id="Sejarah PT. Arkonin Engineering MP">History of PT. Arkonin Engineering MP</a>
          <a href="/#leadership" data-en="Our Leadership" data-id="Pimpinan Kami">Our Leadership</a>
          <a href="/#purpose" data-en="Our Purpose" data-id="Tujuan Kami">Our Purpose</a>
          <a href="/#management" data-en="Management" data-id="Manajemen">Management</a>
          <a href="/#clients" data-en="Clients" data-id="Klien">Clients</a>
          <a href="/#testimonials" data-en="Testimonials" data-id="Testimoni">Testimonials</a>
        </div>
      </div>

      <div class="dropdown">
        <a href="/expertise" data-en="EXPERTISE" data-id="KEAHLIAN" data-i18n-key="nav.expertise">EXPERTISE</a>
        <button type="button" class="dropdown-toggle" aria-label="Toggle submenu" aria-expanded="false">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="dropdown-content">
          <a href="/expertise#architecture" data-en="Architecture Division" data-id="Divisi Arsitektur">Architecture Division</a>
          <a href="/expertise#environmental" data-en="Environmental Division" data-id="Divisi Lingkungan">Environmental Division</a>
          <a href="/expertise#infrastructure" data-en="Infrastructure and Water Resources Division" data-id="Divisi Infrastruktur & Sumber Daya Air">Infrastructure and Water Resources Division</a>
          <a href="/expertise#community" data-en="Community Development and Settlement Division" data-id="Divisi Pengembangan Komunitas & Permukiman">Community Development and Settlement Division</a>
          <a href="/expertise#electrical" data-en="Electrical and Industrial Division" data-id="Divisi Kelistrikan & Industri">Electrical and Industrial Division</a>
        </div>
      </div>

      <div class="dropdown">
        <a href="/insights" data-en="INSIGHTS" data-id="WAWASAN" data-i18n-key="nav.insights">INSIGHTS</a>
        <button type="button" class="dropdown-toggle" aria-label="Toggle submenu" aria-expanded="false">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="dropdown-content">
          <a href="/insights#projects" data-en="Projects" data-id="Proyek">Projects</a>
          <a href="/insights#news" data-en="News & Updates" data-id="Berita & Pembaruan">News & Updates</a>
          <a href="/insights#publications" data-en="Publications" data-id="Publikasi">Publications</a>
        </div>
      </div>

      <a href="/careers" data-en="CAREERS" data-id="KARIER" data-i18n-key="nav.careers">CAREERS</a>
      <a href="/contact" data-en="CONTACT US" data-id="KONTAK" data-i18n-key="nav.contact_us">CONTACT US</a>
      

      <div class="dropdown language-selector hidden lg:block">
        <a href="#language" class="language-btn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="2" y1="12" x2="22" y2="12"></line>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
          </svg>
          <span class="current-lang">EN</span> ▾
        </a>
        <button type="button" class="dropdown-toggle" aria-label="Toggle language menu" aria-expanded="false">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="dropdown-content language-dropdown">
          <a href="#" class="lang-option" data-lang="en">English</a>
          <a href="#" class="lang-option" data-lang="id">Bahasa Indonesia</a>
        </div>
      </div>
    </div>

    <div class="search-container justify-self-end lg:justify-self-auto lg:ml-auto flex items-center gap-2">
      <button class="search-btn" aria-label="Search">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"></circle>
          <path d="m21 21-4.35-4.35"></path>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Search Bar Dropdown -->
  <div class="search-dropdown">
    <div class="search-input-wrapper">
      <input type="text" placeholder="Search by keyword" class="search-input" data-ph-en="Search by keyword" data-ph-id="Cari kata kunci" data-i18n-ph="search.placeholder" />
      <button class="close-search-dropdown">×</button>
    </div>
    <div class="search-results" aria-live="polite" aria-label="Search results"></div>
  </div>
</header>
