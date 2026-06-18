<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infrastructure & Water Resources — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')
  <section class="page-hero" style="background-image: linear-gradient(135deg, rgba(0,61,92,0.85) 0%, rgba(0,31,63,0.6) 100%), url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=60'); background-size: cover; background-position: center;">
    <div class="page-container">
      <h1>Infrastructure Excellence</h1>
      <p>Transport, bridges, and water resource projects across Indonesia.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Roads" />
          <div class="content">
            <h3>Transport & Roads</h3>
            <p>Planning and design of road networks and corridors.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Bridges" />
          <div class="content">
            <h3>Bridges</h3>
            <p>Structural engineering for safe and durable crossings.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1516306064204-1bbd6a225693?auto=format&fit=crop&w=1200&q=60" alt="Water Resources Infrastructure — Arkonin Engineering MP" />
          <div class="content">
            <h3>Water Resources</h3>
            <p>Dams, canals, and distribution systems optimization.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>