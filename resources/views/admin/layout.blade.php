<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin Portal') — Arkonin</title>
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
          colors: {
            primary: '#A9252B',
            secondary: '#2E2E2E',
            accent: '#F5F5F5'
          },
          fontFamily: {
            inter: ['Inter','system-ui','sans-serif'],
            poppins: ['Poppins','Inter','system-ui','sans-serif']
          },
          boxShadow: {
            soft: '0 8px 24px rgba(0,0,0,0.08)'
          }
        }
      }
    }
  </script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="font-inter bg-accent min-h-screen text-[#1f2937]">
  <div x-data="{ sidebarOpen: false }" class="min-h-screen">
    <!-- Sidebar -->
    <aside id="adminSidebar" class="fixed inset-y-0 left-0 w-72 bg-secondary text-white shadow-soft transition-transform duration-300 will-change-transform" style="transform: translateX(0)">
      <div class="h-20 flex items-center px-5 border-b border-white/10">
        <div class="w-10 h-10 rounded-md bg-primary/90 grid place-items-center mr-3">A</div>
        <div>
          <div class="font-poppins font-semibold leading-tight">Admin Portal</div>
          <div class="text-sm text-white/70">Arkonin Engineering MP</div>
        </div>
      </div>
      <nav class="mt-4 px-3 space-y-1">
        <a href="/admin/dashboard" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
          <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
          <span>Dashboard</span>
        </a>
        <a href="/admin/projects" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
          <i data-lucide="folder" class="w-5 h-5"></i>
          <span>Projects</span>
        </a>
        <a href="/admin/news" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
          <i data-lucide="newspaper" class="w-5 h-5"></i>
          <span>News</span>
        </a>
        <a href="/admin/publications" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
          <i data-lucide="file-text" class="w-5 h-5"></i>
          <span>Publications</span>
        </a>
        <a href="/admin/careers" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
          <i data-lucide="briefcase" class="w-5 h-5"></i>
          <span>Careers</span>
        </a>
        <a href="/admin/messages" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
          <i data-lucide="mail" class="w-5 h-5"></i>
          <span>Messages</span>
        </a>
        <form method="POST" action="/admin/logout" class="pt-2 border-t border-white/10">@csrf
          <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/10 transition">
            <i data-lucide="log-out" class="w-5 h-5"></i>
            <span>Logout</span>
          </button>
        </form>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="pl-0 lg:pl-72">
      <!-- Topbar -->
      <div class="h-20 bg-white shadow-soft flex items-center justify-between px-6 sticky top-0 z-10">
        <div class="flex items-center gap-3">
          <button id="sidebarToggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
            <i data-lucide="menu" class="w-6 h-6"></i>
          </button>
          <div>
            <div class="text-sm text-gray-500">Welcome, Admin</div>
            <div id="todayDate" class="font-medium"></div>
          </div>
        </div>
        <div class="flex items-center gap-4">
          @php($unread = \App\Models\Notification::whereNull('read_at')->count())
          <div class="relative" id="notifWrap">
            <button class="p-2 rounded-lg hover:bg-gray-100 relative" aria-label="Notifications" id="notifToggle">
              <i data-lucide="bell" class="w-5 h-5"></i>
              @if($unread > 0)
                <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 rounded-full bg-red-600 text-white text-xs">{{ $unread }}</span>
              @endif
            </button>
            <div id="notifDropdown" class="hidden absolute right-0 mt-2 w-96 max-w-[24rem] bg-white rounded-xl shadow-soft border border-gray-200 overflow-hidden">
              <div class="flex items-center justify-between px-3 py-2 border-b">
                <div class="font-semibold">Notifikasi</div>
                <form method="POST" action="/admin/notifications/read-all">@csrf
                  <button class="text-sm text-primary hover:underline" type="submit">Tandai semua dibaca</button>
                </form>
              </div>
              <div class="max-h-80 overflow-y-auto" id="notifList">
                @php($items = \App\Models\Notification::orderByDesc('created_at')->limit(20)->get())
                @forelse($items as $n)
                  <a href="/admin/notifications/open/{{ $n->id }}" class="block px-3 py-2 border-b last:border-0 hover:bg-gray-50 {{ $n->read_at ? '' : 'bg-red-50/40' }}">
                    <div class="text-sm font-medium">{{ $n->title }}</div>
                    @if($n->body)<div class="text-sm text-gray-600">{{ $n->body }}</div>@endif
                    <div class="text-xs text-gray-400">{{ optional($n->created_at)->format('Y-m-d H:i') }}</div>
                  </a>
                @empty
                  <div class="px-3 py-4 text-sm text-gray-500">Tidak ada notifikasi.</div>
                @endforelse
              </div>
            </div>
          </div>
          <div class="w-9 h-9 rounded-full bg-primary/10 grid place-items-center text-primary font-semibold">AD</div>
        </div>
      </div>

      <!-- Page content -->
      <div class="p-6">
        @yield('content')
      </div>
    </main>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Render icons
      if (window.lucide) { window.lucide.createIcons(); }

      // Date
      const e = document.getElementById('todayDate');
      if (e) {
        const d = new Date();
        const fmt = d.toLocaleDateString(undefined, { weekday:'long', year:'numeric', month:'long', day:'numeric' });
        e.textContent = fmt;
      }

      // Sidebar responsive toggle (basic)
      const sb = document.getElementById('adminSidebar');
      const t = document.getElementById('sidebarToggle');
      function updateForWidth() {
        if (window.innerWidth < 1024) {
          sb.style.transform = 'translateX(-100%)';
        } else {
          sb.style.transform = 'translateX(0)';
        }
      }
      updateForWidth();
      window.addEventListener('resize', updateForWidth);
      if (t) {
        t.addEventListener('click', function(){
          const hidden = sb.style.transform.includes('-100%');
          sb.style.transform = hidden ? 'translateX(0)' : 'translateX(-100%)';
        });
      }

      // Notifications dropdown toggle
      const toggle = document.getElementById('notifToggle');
      const dd = document.getElementById('notifDropdown');
      if (toggle && dd) {
        toggle.addEventListener('click', function(e){
          e.stopPropagation();
          dd.classList.toggle('hidden');
        });
        document.addEventListener('click', function(){ dd.classList.add('hidden'); });
      }
    });
  </script>
</body>
</html>