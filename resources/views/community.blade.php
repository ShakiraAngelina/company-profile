<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Community Development — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')
  <section class="page-hero">
    <div class="page-container">
      <h1>Community Development</h1>
      <p>Placeholder social infrastructure and settlement planning projects.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1560185127-6a4e8577cfe2?auto=format&fit=crop&w=1200&q=60" alt="Affordable Housing Project — Arkonin Engineering MP" />
          <div class="content">
            <h3>Affordable Housing</h3>
            <p>Designs supporting inclusive and livable communities.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=60" alt="Public Space Design — Arkonin Engineering MP" />
          <div class="content">
            <h3>Public Spaces</h3>
            <p>Parks, plazas, and community facilities planning.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1581093588401-16af2a83d2b0?auto=format&fit=crop&w=1200&q=60" alt="Community Sanitation — Arkonin Engineering MP" />
          <div class="content">
            <h3>Sanitation</h3>
            <p>Community-level water and sanitation improvements.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>