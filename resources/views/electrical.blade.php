<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Electrical & Industrial — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')
  <section class="page-hero">
    <div class="page-container">
      <h1>Industrial Innovation</h1>
      <p>Placeholder for electrical systems and industrial engineering.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Power" />
          <div class="content">
            <h3>Power Systems</h3>
            <p>Design, safety, and reliability for electrical networks.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Automation" />
          <div class="content">
            <h3>Automation</h3>
            <p>Industrial controls and process optimization.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Manufacturing" />
          <div class="content">
            <h3>Manufacturing Facilities</h3>
            <p>Layouts and utilities for efficient production lines.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>