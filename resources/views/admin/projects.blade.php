@extends('admin.layout')

@section('title', 'Manage Projects')

@section('content')
  <div class="flex items-center justify-between mb-4">
    <div>
      <h1 class="text-2xl font-semibold">Manage Projects</h1>
      <p class="text-gray-600">Tambah dan kelola proyek.</p>
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
        @php($items = \App\Models\Project::orderByDesc('created_at')->limit(50)->get())
        @forelse($items as $i => $p)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-sm text-gray-600">{{ $i+1 }}</td>
            <td class="px-4 py-3">{{ $p->title }}</td>
            <td class="px-4 py-3 text-sm text-gray-600">{{ optional($p->created_at)->format('Y-m-d H:i') }}</td>
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <button
                  class="p-2 rounded-lg hover:bg-gray-100 editProjectBtn"
                  title="Edit"
                  data-id="{{ $p->id }}"
                  data-title="{{ $p->title }}"
                  data-description="{{ $p->description }}"
                  data-image="{{ $p->image }}"
                  data-category="{{ $p->category }}"
                ><i data-lucide="pencil" class="w-4 h-4"></i></button>
                <button class="p-2 rounded-lg hover:bg-gray-100" title="Delete"><i data-lucide="trash" class="w-4 h-4"></i></button>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">No projects yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Modal: Add New Project -->
  <div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Add Project</h2>
        <button id="closeModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      @if(session('success'))<div class="mb-3 rounded-lg bg-green-50 text-green-700 text-sm px-3 py-2">{{ session('success') }}</div>@endif
      <form method="POST" action="/admin/project" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <label class="block">
          <span class="block text-sm font-medium">Title</span>
          <input type="text" name="title" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Description</span>
          <textarea name="description" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
          <div class="block">
            <span class="block text-sm font-medium">Image Source</span>
            <select id="projectImageSource" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
              <option value="url">URL</option>
              <option value="upload">Upload File</option>
            </select>
            <div id="projectImageUrlWrap" class="mt-2">
              <input type="text" name="image_url" placeholder="https://..." class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
            </div>
            <div id="projectImageFileWrap" class="mt-2 hidden">
              <input type="file" name="image_file" accept="image/*" class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
              <p class="text-xs text-gray-500 mt-1">Maks 5MB. Format: JPG, PNG, WEBP, GIF.</p>
            </div>
          </div>
          <label class="block">
            <span class="block text-sm font-medium">Category</span>
            <input type="text" name="category" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
          </label>
        </div>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="cancelModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-[#911f25]">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal: Edit Project -->
  <div id="editProjectModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Edit Project</h2>
        <button id="editCloseModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      @if(session('success'))<div class="mb-3 rounded-lg bg-green-50 text-green-700 text-sm px-3 py-2">{{ session('success') }}</div>@endif
      <form id="editProjectForm" method="POST" action="#" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <input type="hidden" name="_method" value="POST" />
        <label class="block">
          <span class="block text-sm font-medium">Title</span>
          <input id="editTitle" type="text" name="title" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Description</span>
          <textarea id="editDescription" name="description" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
          <div class="block">
            <span class="block text-sm font-medium">Image Source</span>
            <select id="editProjectImageSource" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
              <option value="url">URL</option>
              <option value="upload">Upload File</option>
            </select>
            <div id="editProjectImageUrlWrap" class="mt-2">
              <input id="editImageUrl" type="text" name="image_url" placeholder="https://..." class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
              <p class="text-xs text-gray-500 mt-1">Kosongkan untuk mempertahankan gambar lama.</p>
            </div>
            <div id="editProjectImageFileWrap" class="mt-2 hidden">
              <input id="editImageFile" type="file" name="image_file" accept="image/*" class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
              <p class="text-xs text-gray-500 mt-1">Maks 5MB. Format: JPG, PNG, WEBP, GIF.</p>
            </div>
            <!-- Preview gambar -->
            <div id="editProjectImagePreview" class="mt-2 hidden">
              <div class="rounded-xl border border-gray-200 bg-gray-50 p-2">
                <img id="editProjectImagePreviewImg" alt="Image preview" class="w-full h-40 object-cover rounded-md" />
              </div>
            </div>
          </div>
          <label class="block">
            <span class="block text-sm font-medium">Category</span>
            <input id="editCategory" type="text" name="category" class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
          </label>
        </div>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="editCancelModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-[#911f25]">Save Changes</button>
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
      const srcSel = document.getElementById('projectImageSource');
      const urlWrap = document.getElementById('projectImageUrlWrap');
      const fileWrap = document.getElementById('projectImageFileWrap');
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

      // Edit modal controls
      const em = document.getElementById('editProjectModal');
      const eclose = document.getElementById('editCloseModal');
      const ecancel = document.getElementById('editCancelModal');
      function eshow(){ em.classList.remove('hidden'); em.classList.add('flex'); }
      function ehide(){ em.classList.add('hidden'); em.classList.remove('flex'); }
      eclose && eclose.addEventListener('click', ehide);
      ecancel && ecancel.addEventListener('click', ehide);

      const editBtns = document.querySelectorAll('.editProjectBtn');
      const editForm = document.getElementById('editProjectForm');
      const editTitle = document.getElementById('editTitle');
      const editDesc = document.getElementById('editDescription');
      const editCat = document.getElementById('editCategory');
      const esrcSel = document.getElementById('editProjectImageSource');
      const eurlWrap = document.getElementById('editProjectImageUrlWrap');
      const efileWrap = document.getElementById('editProjectImageFileWrap');
      const eimgUrl = document.getElementById('editImageUrl');
      const eimgFile = document.getElementById('editImageFile');
      const epreview = document.getElementById('editProjectImagePreview');
      const epreviewImg = document.getElementById('editProjectImagePreviewImg');

      editBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-id');
          const title = btn.getAttribute('data-title') || '';
          const description = btn.getAttribute('data-description') || '';
          const image = btn.getAttribute('data-image') || '';
          const category = btn.getAttribute('data-category') || '';

          editForm.action = `/admin/project/${id}/update`;
          editTitle.value = title;
          editDesc.value = description;
          editCat.value = category;

          // Default to URL mode and prefill with current image (can be storage URL)
          esrcSel.value = 'url';
          eimgUrl.value = image || '';
          efileWrap.classList.add('hidden');
          eurlWrap.classList.remove('hidden');

          // set preview jika ada image
          if (image) {
            epreviewImg.src = image;
            epreview.classList.remove('hidden');
          } else {
            epreview.classList.add('hidden');
            epreviewImg.removeAttribute('src');
          }

          eshow();
        });
      });

      // Toggle image source in edit modal
      if (esrcSel) {
        esrcSel.addEventListener('change', () => {
          const v = esrcSel.value;
          if (v === 'upload') {
            eurlWrap.classList.add('hidden');
            efileWrap.classList.remove('hidden');
          } else {
            efileWrap.classList.add('hidden');
            eurlWrap.classList.remove('hidden');
          }
        });
      }

      // preview saat URL diubah
      eimgUrl && eimgUrl.addEventListener('input', () => {
        const val = eimgUrl.value.trim();
        if (val) {
          epreviewImg.src = val;
          epreview.classList.remove('hidden');
        } else {
          epreview.classList.add('hidden');
          epreviewImg.removeAttribute('src');
        }
      });
      // preview saat file dipilih
      eimgFile && eimgFile.addEventListener('change', () => {
        const f = eimgFile.files && eimgFile.files[0];
        if (f) {
          const url = URL.createObjectURL(f);
          epreviewImg.src = url;
          epreview.classList.remove('hidden');
        }
      });
    });
  </script>
@endsection