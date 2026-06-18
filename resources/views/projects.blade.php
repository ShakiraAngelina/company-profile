<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Projects — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')
  <section class="page-hero">
    <div class="page-container">
      <h1 data-en="Projects" data-id="Proyek">Projects</h1>
      <p data-en="Placeholder gallery of featured projects." data-id="Galeri sementara proyek unggulan.">Placeholder gallery of featured projects.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card"><img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=1200&q=60" alt="Urban Development — Arkonin Engineering MP" /><div class="content"><h3 data-en="Urban Development" data-id="Pengembangan Perkotaan">Urban Development</h3><p data-en="Sample description of a project." data-id="Contoh deskripsi proyek.">Sample description of a project.</p></div></div>
        <div class="page-card"><img src="https://images.unsplash.com/photo-1566810752887-6f1a36df4cf0?auto=format&fit=crop&w=1200&q=60" alt="Water Treatment — Arkonin Engineering MP" /><div class="content"><h3 data-en="Water Treatment" data-id="Pengolahan Air">Water Treatment</h3><p data-en="Sample description of a project." data-id="Contoh deskripsi proyek.">Sample description of a project.</p></div></div>
        <div class="page-card"><img src="https://images.unsplash.com/photo-1581092570491-10067fd5d7cc?auto=format&fit=crop&w=1200&q=60" alt="Industrial Complex — Arkonin Engineering MP" /><div class="content"><h3 data-en="Industrial Complex" data-id="Kompleks Industri">Industrial Complex</h3><p data-en="Sample description of a project." data-id="Contoh deskripsi proyek.">Sample description of a project.</p></div></div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>