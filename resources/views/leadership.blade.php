<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leadership — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')

  <section class="page-hero">
    <div class="page-container">
      <h1>Our Leadership</h1>
      <p>Placeholder bios and roles for executive team.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=800&q=60" alt="Leader" loading="lazy" />
          <div class="content">
            <h3>President Director</h3>
            <p>Short bio and responsibilities.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=800&q=60" alt="Leader" loading="lazy" />
          <div class="content">
            <h3>Technical Director</h3>
            <p>Short bio and responsibilities.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1552055564-4b8a4a38c6f8?auto=format&fit=crop&w=800&q=60" alt="Leader" loading="lazy" />
          <div class="content">
            <h3>Operations Director</h3>
            <p>Short bio and responsibilities.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>