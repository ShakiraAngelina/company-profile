@extends('admin.layout')

@section('title', 'Manage Publications')

@section('content')
  <div class="flex items-center justify-between mb-4">
    <div>
      <h1 class="text-2xl font-semibold">Manage Publications</h1>
      <p class="text-gray-600">Upload dan kelola dokumen.</p>
    </div>
    <button id="openModal" class="inline-flex items-center gap-2 rounded-xl bg-primary text-white px-4 py-2 font-semibold hover:bg-[#911f25] transition">
      <i data-lucide="plus" class="w-5 h-5"></i>
      Add New
    </button>
  </div>

  <div class="rounded-2xl bg-white shadow-soft overflow-hidden">
    <table class="min-w-full">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">No</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Created At</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @php($items = \App\Models\Publication::orderByDesc('created_at')->limit(50)->get())
        @forelse($items as $i => $p)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-sm text-gray-600">{{ $i+1 }}</td>
            <td class="px-4 py-3">{{ $p->title }}</td>
            <td class="px-4 py-3 text-sm text-gray-600">{{ optional($p->created_at)->format('Y-m-d H:i') }}</td>
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <a class="p-2 rounded-lg hover:bg-gray-100" href="{{ Str::startsWith($p->file, ['http://','https://']) ? $p->file : url('/storage/'.$p->file) }}" target="_blank" title="View"><i data-lucide="eye" class="w-4 h-4"></i></a>
                <button class="p-2 rounded-lg hover:bg-gray-100" title="Delete"><i data-lucide="trash" class="w-4 h-4"></i></button>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">No publications yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Modal: Add New Publication -->
  <div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Add Publication</h2>
        <button id="closeModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      @if(session('success'))<div class="mb-3 rounded-lg bg-green-50 text-green-700 text-sm px-3 py-2">{{ session('success') }}</div>@endif
      <form method="POST" action="/admin/publication" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <label class="block">
          <span class="block text-sm font-medium">Title</span>
          <input type="text" name="title" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <div class="block">
          <span class="block text-sm font-medium">File Source</span>
          <select id="pubFileSource" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
            <option value="url">URL</option>
            <option value="upload">Upload File</option>
          </select>
          <div id="pubFileUrlWrap" class="mt-2">
            <input type="text" name="file_url" placeholder="https://..." class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
          </div>
          <div id="pubFileUploadWrap" class="mt-2 hidden">
            <input type="file" name="file_upload" accept=".pdf,.doc,.docx" class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
            <p class="text-xs text-gray-500 mt-1">Maks 12MB. Format: PDF, DOC, DOCX.</p>
          </div>
        </div>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="cancelModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-[#911f25]">Save</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function(){
      if (window.lucide) { window.lucide.createIcons(); }
      const m = document.getElementById('modal');
      const open = document.getElementById('openModal');
      const close = document.getElementById('closeModal');
      const cancel = document.getElementById('cancelModal');
      function show(){ m.classList.remove('hidden'); m.classList.add('flex'); }
      function hide(){ m.classList.add('hidden'); m.classList.remove('flex'); }
      open && open.addEventListener('click', show);
      close && close.addEventListener('click', hide);
      cancel && cancel.addEventListener('click', hide);

      // Toggle file source
      const srcSel = document.getElementById('pubFileSource');
      const urlWrap = document.getElementById('pubFileUrlWrap');
      const uploadWrap = document.getElementById('pubFileUploadWrap');
      if (srcSel) {
        srcSel.addEventListener('change', () => {
          const v = srcSel.value;
          if (v === 'upload') {
            urlWrap.classList.add('hidden');
            uploadWrap.classList.remove('hidden');
          } else {
            uploadWrap.classList.add('hidden');
            urlWrap.classList.remove('hidden');
          }
        });
      }
    });
  </script>
@endsection