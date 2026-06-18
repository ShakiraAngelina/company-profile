<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Management — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')

  <section class="page-hero">
    <div class="page-container">
      <h1>Management</h1>
      <p>Placeholder organizational structure and key departments.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=60" alt="Dept" loading="lazy" />
          <div class="content">
            <h3>Corporate Services</h3>
            <p>Finance, HR, and administration overview.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1485827404703-89b55f0b8f31?auto=format&fit=crop&w=800&q=60" alt="Dept" loading="lazy" />
          <div class="content">
            <h3>Engineering Divisions</h3>
            <p>Coordination across environmental, infrastructure, and industrial units.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=60" alt="Dept" loading="lazy" />
          <div class="content">
            <h3>Project Delivery</h3>
            <p>PMO processes and quality assurance framework.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>