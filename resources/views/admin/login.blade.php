<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login — Arkonin</title>
  <base href="/">
  <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: { primary: '#A9252B', secondary: '#2E2E2E', accent: '#F5F5F5' },
          fontFamily: { inter: ['Inter','system-ui','sans-serif'], poppins: ['Poppins','Inter','system-ui','sans-serif'] },
          boxShadow: { soft: '0 8px 24px rgba(0,0,0,0.08)' }
        }
      }
    }
  </script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="font-inter min-h-screen bg-gradient-to-br from-accent via-white to-primary/10 flex items-center justify-center p-6">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-soft p-6 animate-[fadeIn_.5s_ease-in-out]">
    <div class="flex items-center gap-3 mb-4">
      <div class="w-10 h-10 rounded-md bg-primary/90 grid place-items-center text-white font-poppins font-semibold">A</div>
      <div>
        <div class="font-poppins font-semibold">Admin Portal</div>
        <div class="text-sm text-gray-500">Arkonin Engineering MP</div>
      </div>
    </div>
    <h1 class="text-lg font-semibold mb-3">Masuk ke Admin</h1>
    @if ($errors->any())
      <div class="mb-3 rounded-lg bg-red-50 text-red-600 text-sm px-3 py-2">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="/admin/login" class="space-y-3">
      @csrf
      <label class="block">
        <span class="block text-sm font-medium">Email</span>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary/40" />
      </label>
      <label class="block">
        <span class="block text-sm font-medium">Password</span>
        <div class="mt-1 relative">
          <input type="password" id="password" name="password" required class="w-full rounded-xl border border-gray-300 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-primary/40" />
          <button type="button" id="togglePassword" class="absolute inset-y-0 right-2 p-2 text-gray-500 hover:text-gray-700" aria-label="Show password">
            <i data-lucide="eye" class="w-5 h-5"></i>
          </button>
        </div>
      </label>
      <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-primary text-white px-4 py-2 font-semibold hover:bg-[#911f25] transition">
        <i data-lucide="log-in" class="w-5 h-5"></i>
        <span>Login</span>
      </button>
    </form>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded',()=>{
      if(window.lucide){ window.lucide.createIcons(); }
      const btn = document.getElementById('togglePassword');
      const input = document.getElementById('password');
      if(btn && input){
        btn.addEventListener('click',()=>{
          const isText = input.type === 'text';
          input.type = isText ? 'password' : 'text';
          // switch icon
          btn.innerHTML = '';
          const icon = document.createElement('i');
          icon.setAttribute('data-lucide', isText ? 'eye' : 'eye-off');
          icon.className = 'w-5 h-5';
          btn.appendChild(icon);
          if(window.lucide){ window.lucide.createIcons(); }
        });
      }
    });
  </script>
</body>
</html>