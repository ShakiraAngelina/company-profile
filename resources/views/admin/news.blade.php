@extends('admin.layout')

@section('title', 'Manage News')

@section('content')
  <div class="flex items-center justify-between mb-4">
    <div>
      <h1 class="text-2xl font-semibold">Manage News</h1>
      <p class="text-gray-600">Publikasi berita dan update.</p>
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
        @php($items = \App\Models\News::orderByDesc('created_at')->limit(50)->get())
        @forelse($items as $i => $n)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-sm text-gray-600">{{ $i+1 }}</td>
            <td class="px-4 py-3">{{ $n->title }}</td>
            <td class="px-4 py-3 text-sm text-gray-600">{{ optional($n->created_at)->format('Y-m-d H:i') }}</td>
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <button class="editNewsBtn p-2 rounded-lg hover:bg-gray-100" title="Edit"
                        data-id="{{ $n->id }}"
                        data-title="{{ $n->title }}"
                        data-content="{{ Str::limit($n->content, 1000, '') }}"
                        data-image="{{ $n->image }}">
                  <i data-lucide="pencil" class="w-4 h-4"></i>
                </button>
                <button class="p-2 rounded-lg hover:bg-gray-100" title="Delete"><i data-lucide="trash" class="w-4 h-4"></i></button>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">No news yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Modal: Add New News -->
  <div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Add News</h2>
        <button id="closeModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      @if(session('success'))<div class="mb-3 rounded-lg bg-green-50 text-green-700 text-sm px-3 py-2">{{ session('success') }}</div>@endif
      <form method="POST" action="/admin/news" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <label class="block">
          <span class="block text-sm font-medium">Title</span>
          <input type="text" name="title" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Content</span>
          <textarea name="content" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <div class="block">
          <span class="block text-sm font-medium">Image Source</span>
          <select id="newsImageSource" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
            <option value="url">URL</option>
            <option value="upload">Upload File</option>
          </select>
          <div id="newsImageUrlWrap" class="mt-2">
            <input type="text" name="image_url" placeholder="https://..." class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
          </div>
          <div id="newsImageFileWrap" class="mt-2 hidden">
            <input type="file" name="image_file" accept="image/*" class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
            <p class="text-xs text-gray-500 mt-1">Maks 10MB. Format: JPG, PNG, WEBP, GIF.</p>
          </div>
        </div>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="cancelModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-[#911f25]">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal: Edit News -->
  <div id="editModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Edit News</h2>
        <button id="closeEditModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      <form id="editNewsForm" method="POST" action="#" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <label class="block">
          <span class="block text-sm font-medium">Title</span>
          <input type="text" name="title" id="editTitle" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Content</span>
          <textarea name="content" id="editContent" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <div class="block">
          <span class="block text-sm font-medium">Image Source</span>
          <select id="editImageSource" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
            <option value="url">URL</option>
            <option value="upload">Upload File</option>
          </select>
          <div id="editImageUrlWrap" class="mt-2">
            <input type="text" name="image_url" id="editImageUrl" placeholder="https://..." class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
          </div>
          <div id="editImageFileWrap" class="mt-2 hidden">
            <input type="file" name="image_file" id="editImageFile" accept="image/*" class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
            <p class="text-xs text-gray-500 mt-1">Maks 10MB. Format: JPG, PNG, WEBP, GIF.</p>
          </div>
          <!-- Preview gambar -->
          <div id="editImagePreview" class="mt-2 hidden">
            <div class="rounded-xl border border-gray-200 bg-gray-50 p-2">
              <img id="editImagePreviewImg" alt="Image preview" class="w-full h-40 object-cover rounded-md" />
            </div>
          </div>
        </div>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="cancelEditModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
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

      // Toggle image source
      const srcSel = document.getElementById('newsImageSource');
      const urlWrap = document.getElementById('newsImageUrlWrap');
      const fileWrap = document.getElementById('newsImageFileWrap');
      if (srcSel) {
        srcSel.addEventListener('change', () => {
          const v = srcSel.value;
          if (v === 'upload') {
            urlWrap.classList.add('hidden');
            fileWrap.classList.remove('hidden');
          } else {
            fileWrap.classList.add('hidden');
            urlWrap.classList.remove('hidden');
          }
        });
      }

      // Edit modal handlers
      const em = document.getElementById('editModal');
      const closeEm = document.getElementById('closeEditModal');
      const cancelEm = document.getElementById('cancelEditModal');
      const editForm = document.getElementById('editNewsForm');
      const editTitle = document.getElementById('editTitle');
      const editContent = document.getElementById('editContent');
      const editImageSource = document.getElementById('editImageSource');
      const editImageUrlWrap = document.getElementById('editImageUrlWrap');
      const editImageFileWrap = document.getElementById('editImageFileWrap');
      const editImageUrl = document.getElementById('editImageUrl');
      const editImageFile = document.getElementById('editImageFile');
      const editImagePreview = document.getElementById('editImagePreview');
      const editImagePreviewImg = document.getElementById('editImagePreviewImg');
      function showEdit(){ em.classList.remove('hidden'); em.classList.add('flex'); }
      function hideEdit(){ em.classList.add('hidden'); em.classList.remove('flex'); }
      closeEm && closeEm.addEventListener('click', hideEdit);
      cancelEm && cancelEm.addEventListener('click', hideEdit);
      document.querySelectorAll('.editNewsBtn').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.id;
          const title = btn.dataset.title || '';
          const content = btn.dataset.content || '';
          const image = btn.dataset.image || '';
          editForm.action = `/admin/news/${id}/update`;
          editTitle.value = title;
          editContent.value = content;
          editImageUrl.value = image || '';
          // default use URL, but allow switching to upload
          editImageSource.value = 'url';
          editImageUrlWrap.classList.remove('hidden');
          editImageFileWrap.classList.add('hidden');
          // set preview jika ada image
          if (image) {
            editImagePreviewImg.src = image;
            editImagePreview.classList.remove('hidden');
          } else {
            editImagePreview.classList.add('hidden');
            editImagePreviewImg.removeAttribute('src');
          }
          showEdit();
        });
      });
      editImageSource && editImageSource.addEventListener('change', () => {
        const v = editImageSource.value;
        if (v === 'upload') {
          editImageUrlWrap.classList.add('hidden');
          editImageFileWrap.classList.remove('hidden');
        } else {
          editImageFileWrap.classList.add('hidden');
          editImageUrlWrap.classList.remove('hidden');
        }
      });
      // preview saat URL diubah
      editImageUrl && editImageUrl.addEventListener('input', () => {
        const val = editImageUrl.value.trim();
        if (val) {
          editImagePreviewImg.src = val;
          editImagePreview.classList.remove('hidden');
        } else {
          editImagePreview.classList.add('hidden');
          editImagePreviewImg.removeAttribute('src');
        }
      });
      // preview saat file dipilih
      editImageFile && editImageFile.addEventListener('change', () => {
        const f = editImageFile.files && editImageFile.files[0];
        if (f) {
          const url = URL.createObjectURL(f);
          editImagePreviewImg.src = url;
          editImagePreview.classList.remove('hidden');
        }
      });
    });
  </script>
@endsection