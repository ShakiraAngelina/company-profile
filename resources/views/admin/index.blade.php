<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Input — Arkonin</title>
  <base href="/">
 <link rel="stylesheet" href="assets/CSS/style.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    :root{ --brand:#A9252B; --muted:#6b7280; }
    .admin-wrap{ max-width:1100px; margin:24px auto; padding:0 20px; }
    .admin-grid{ display:grid; grid-template-columns:1fr; gap:22px; }
    .admin-card{ background:#fff; border-radius:14px; box-shadow:0 8px 22px rgba(0,0,0,.06); padding:18px; }
    .admin-card h2{ margin:0 0 10px; font-size:20px; }
    .form-row{ display:grid; grid-template-columns:1fr 1fr; gap:12px; }
    .form-row .full{ grid-column:1/-1; }
    .admin-card input, .admin-card select, .admin-card textarea{ border:1.5px solid #e5e7eb; border-radius:10px; padding:10px 12px; }
    .admin-card button{ background:var(--brand); color:#fff; border:none; border-radius:10px; padding:10px 14px; font-weight:600; }
    .note{ color:var(--muted); font-size:13px; }
    .success{ background:#ecfdf5; color:#065f46; padding:10px 12px; border-radius:10px; margin-bottom:10px; }
  </style>
</head>
<body>
  @include('partials.nav')
  <div class="admin-wrap">
    @if(session('success'))
      <div class="success">{{ session('success') }}</div>
    @endif
    <div class="admin-grid">
      <div class="admin-card">
        <h2>Tambah News</h2>
        <form method="POST" action="/admin/news">
          @csrf
          <div class="form-row">
            <input type="text" name="title" placeholder="Title" required>
            <input type="date" name="date" required>
            <input class="full" type="text" name="summary" placeholder="Summary (optional)">
            <input class="full" type="url" name="image_url" placeholder="Image URL (optional)">
            <textarea class="full" name="content" rows="5" placeholder="Content" required></textarea>
          </div>
          <button type="submit">Save News</button>
        </form>
      </div>

      <div class="admin-card">
        <h2>Tambah Project</h2>
        <form method="POST" action="/admin/project">
          @csrf
          <div class="form-row">
            <input type="text" name="title" placeholder="Project Title" required>
            <input type="text" name="category" placeholder="Category">
            <input class="full" type="url" name="image_url" placeholder="Image URL (optional)">
            <textarea class="full" name="description" rows="5" placeholder="Description" required></textarea>
          </div>
          <button type="submit">Save Project</button>
        </form>
      </div>

      <div class="admin-card">
        <h2>Tambah Publication</h2>
        <form method="POST" action="/admin/publication">
          @csrf
          <div class="form-row">
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="authors" placeholder="Authors">
            <input type="date" name="date">
            <input class="full" type="url" name="link" placeholder="External Link (optional)">
            <textarea class="full" name="abstract" rows="5" placeholder="Abstract (optional)"></textarea>
          </div>
          <button type="submit">Save Publication</button>
        </form>
      </div>

      <div class="admin-card">
        <h2>Open Job Announcement</h2>
        <p class="note">Admin dapat mengubah status open/closed.</p>
        <form method="POST" action="/admin/job">
          @csrf
          <div class="form-row">
            <input type="text" name="title" placeholder="Job Title" required>
            <input type="text" name="department" placeholder="Department">
            <input type="text" name="location" placeholder="Location">
            <select name="status" required>
              <option value="open">Open</option>
              <option value="closed">Closed</option>
            </select>
            <textarea class="full" name="description" rows="5" placeholder="Description"></textarea>
          </div>
          <button type="submit">Save Job</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>