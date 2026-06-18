<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>News & Updates — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')
  <section class="page-hero">
    <div class="page-container">
      <h1>News & Updates</h1>
      <p>Placeholder articles and announcements.</p>
    </div>
  </section>
  <section class="page-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card"><img src="assets/images/placeholder.svg" alt="News" /><div class="content"><h3>Q3 Results</h3><p>Summary of quarterly results.</p></div></div>
        <div class="page-card"><img src="assets/images/placeholder.svg" alt="News" /><div class="content"><h3>New Contracts</h3><p>Engineering services awarded across regions.</p></div></div>
        <div class="page-card"><img src="assets/images/placeholder.svg" alt="News" /><div class="content"><h3>Community Program</h3><p>Initiatives supporting local communities.</p></div></div>
      </div>
    </div>
  </section>
  <script src="assets/js/script.js"></script>
</body>
</html>