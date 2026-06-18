@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
  <div class="mb-6">
    <h1 class="text-2xl font-semibold">Dashboard</h1>
    <p class="text-gray-600">Ringkasan cepat aktivitas konten.</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="rounded-2xl bg-white shadow-soft p-5 flex items-center gap-4">
      <div class="w-11 h-11 rounded-xl bg-primary/10 text-primary grid place-items-center">
        <i data-lucide="folder" class="w-6 h-6"></i>
      </div>
      <div>
        <div class="text-2xl font-bold">{{ $stats['projects'] ?? 0 }}</div>
        <div class="text-sm text-gray-500">Total Projects</div>
      </div>
    </div>
    <div class="rounded-2xl bg-white shadow-soft p-5 flex items-center gap-4">
      <div class="w-11 h-11 rounded-xl bg-[#0ea5e9]/10 text-[#0ea5e9] grid place-items-center">
        <i data-lucide="newspaper" class="w-6 h-6"></i>
      </div>
      <div>
        <div class="text-2xl font-bold">{{ $stats['news'] ?? 0 }}</div>
        <div class="text-sm text-gray-500">Total News</div>
      </div>
    </div>
    <div class="rounded-2xl bg-white shadow-soft p-5 flex items-center gap-4">
      <div class="w-11 h-11 rounded-xl bg-[#22c55e]/10 text-[#16a34a] grid place-items-center">
        <i data-lucide="file-text" class="w-6 h-6"></i>
      </div>
      <div>
        <div class="text-2xl font-bold">{{ $stats['publications'] ?? 0 }}</div>
        <div class="text-sm text-gray-500">Total Publications</div>
      </div>
    </div>
    <div class="rounded-2xl bg-white shadow-soft p-5 flex items-center gap-4">
      <div class="w-11 h-11 rounded-xl bg-[#f59e0b]/10 text-[#d97706] grid place-items-center">
        <i data-lucide="mail" class="w-6 h-6"></i>
      </div>
      <div>
        <div class="text-2xl font-bold">{{ $stats['messages'] ?? 0 }}</div>
        <div class="text-sm text-gray-500">Total Messages</div>
      </div>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <a href="/admin/projects" class="rounded-2xl bg-white shadow-soft p-5 hover:shadow-lg transition flex items-center gap-3">
      <i data-lucide="chevron-right" class="w-5 h-5 text-primary"></i>
      <div>
        <div class="font-semibold">Kelola Projects</div>
        <div class="text-sm text-gray-500">Tambah, edit, hapus proyek</div>
      </div>
    </a>
    <a href="/admin/news" class="rounded-2xl bg-white shadow-soft p-5 hover:shadow-lg transition flex items-center gap-3">
      <i data-lucide="chevron-right" class="w-5 h-5 text-primary"></i>
      <div>
        <div class="font-semibold">Kelola News</div>
        <div class="text-sm text-gray-500">Publikasi berita & update</div>
      </div>
    </a>
    <a href="/admin/publications" class="rounded-2xl bg-white shadow-soft p-5 hover:shadow-lg transition flex items-center gap-3">
      <i data-lucide="chevron-right" class="w-5 h-5 text-primary"></i>
      <div>
        <div class="font-semibold">Kelola Publications</div>
        <div class="text-sm text-gray-500">Upload dan kelola dokumen</div>
      </div>
    </a>
    <a href="/admin/careers" class="rounded-2xl bg-white shadow-soft p-5 hover:shadow-lg transition flex items-center gap-3">
      <i data-lucide="chevron-right" class="w-5 h-5 text-primary"></i>
      <div>
        <div class="font-semibold">Kelola Careers</div>
        <div class="text-sm text-gray-500">Status open/closed dan posting</div>
      </div>
    </a>
    <a href="/admin/messages" class="rounded-2xl bg-white shadow-soft p-5 hover:shadow-lg transition flex items-center gap-3">
      <i data-lucide="chevron-right" class="w-5 h-5 text-primary"></i>
      <div>
        <div class="font-semibold">Lihat Messages</div>
        <div class="text-sm text-gray-500">Pesan dari form Contact</div>
      </div>
    </a>
  </div>
@endsection