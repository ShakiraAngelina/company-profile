<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Environmental Division — Arkonin Engineering MP</title>
  <base href="/">
  @if (file_exists(public_path('build/manifest.json')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
 <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">
    <script defer src="{{ asset('assets/js/script.js') }}"></script>
  @endif
</head>
<body>
  @include('partials.nav')

  <!-- Hero -->
  <section class="landing-section theme-light">
    <div class="page-container">
      <h1 class="section-title">Environmental Solutions</h1>
      <p class="section-subtitle">Placeholder projects and capabilities in environmental engineering.</p>
    </div>
  </section>

  <!-- Cards -->
  <section class="landing-section">
    <div class="page-container">
      <div class="page-grid">
        <div class="page-card reveal">
          <img src="https://images.unsplash.com/photo-1581093588401-16af2a83d2b0?auto=format&fit=crop&w=800&q=60" alt="Waste Management" loading="lazy" />
          <div class="content">
            <h3>Waste Management</h3>
            <p>Design and optimization of waste processing facilities.</p>
          </div>
        </div>
        <div class="page-card reveal">
          <img src="https://images.unsplash.com/photo-1505483531331-399b6c0eec0e?auto=format&fit=crop&w=800&q=60" alt="Urban Drainage" loading="lazy" />
          <div class="content">
            <h3>Urban Drainage</h3>
            <p>Flood mitigation and resilient urban drainage systems.</p>
          </div>
        </div>
        <div class="page-card reveal">
          <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=800&q=60" alt="Water Quality" loading="lazy" />
          <div class="content">
            <h3>Water Quality</h3>
            <p>Monitoring and improvement of water resources.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('partials.footer')
</body>
</html>