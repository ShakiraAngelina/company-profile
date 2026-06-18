<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Purpose — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')

  <section class="page-hero">
    <div class="page-container">
      <h1>Our Purpose</h1>
      <p>Placeholder content describing the purpose and impact.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Purpose" />
          <div class="content">
            <h3>Sustainability</h3>
            <p>Commitment to sustainable engineering solutions.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Purpose" />
          <div class="content">
            <h3>Community</h3>
            <p>Positive impact on communities across Indonesia.</p>
          </div>
        </div>
        <div class="page-card">
          <img src="assets/images/placeholder.svg" alt="Purpose" />
          <div class="content">
            <h3>Innovation</h3>
            <p>Driving innovation to solve infrastructure challenges.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>