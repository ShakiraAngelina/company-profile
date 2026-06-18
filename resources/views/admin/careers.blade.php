@extends('admin.layout')

@section('title', 'Manage Careers')

@section('content')
  <div class="flex items-center justify-between mb-4">
    <div>
      <h1 class="text-2xl font-semibold">Manage Careers</h1>
      <p class="text-gray-600">Posisi lowongan dan status.</p>
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
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Job Title</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Created At</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @php($items = \App\Models\Career::orderByDesc('created_at')->limit(50)->get())
        @forelse($items as $i => $c)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-sm text-gray-600">{{ $i+1 }}</td>
            <td class="px-4 py-3">{{ $c->job_title }}</td>
            <td class="px-4 py-3">
              <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm {{ $c->status === 'open' ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                <i data-lucide="circle" class="w-3 h-3 {{ $c->status === 'open' ? 'text-green-600' : 'text-gray-400' }}"></i>
                {{ ucfirst($c->status) }}
              </span>
            </td>
            <td class="px-4 py-3 text-sm text-gray-600">{{ optional($c->created_at)->format('Y-m-d H:i') }}</td>
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <!-- Toggle UI (non-AJAX placeholder) -->
                <button class="px-3 py-1 rounded-xl border border-gray-300 hover:bg-gray-50 text-sm" title="Toggle Status" disabled>Toggle</button>
                <button class="p-2 rounded-lg hover:bg-gray-100 edit-career"
                        data-id="{{ $c->id }}"
                        data-title="{{ $c->job_title }}"
                        data-description="{{ $c->description }}"
                        data-requirements="{{ $c->requirements }}"
                        data-status="{{ $c->status }}"
                        title="Edit">
                  <i data-lucide="pencil" class="w-4 h-4"></i>
                </button>
                <button class="p-2 rounded-lg hover:bg-gray-100" title="Delete"><i data-lucide="trash" class="w-4 h-4"></i></button>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="px-4 py-6 text-center text-gray-500">No careers yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-8">
    <h2 class="text-xl font-semibold mb-3">Apply Job</h2>
    <p class="text-gray-600 mb-3">Daftar aplikasi yang masuk dari halaman Careers.</p>
    @php($apps = \App\Models\Application::orderByDesc('created_at')->limit(200)->get())
    @php($careerTitles = \App\Models\Career::pluck('job_title','id'))
    <div class="rounded-2xl bg-white shadow-soft overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">No</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Phone</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Job</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Message</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">CV</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($apps as $i => $a)
            <tr class="hover:bg-gray-50 align-top">
              <td class="px-4 py-3 text-sm text-gray-600">{{ $i+1 }}</td>
              <td class="px-4 py-3">{{ $a->name }}</td>
              <td class="px-4 py-3"><a href="mailto:{{ $a->email }}" class="text-primary hover:underline">{{ $a->email }}</a></td>
              <td class="px-4 py-3">{{ $a->phone ?? '-' }}</td>
              <td class="px-4 py-3">{{ $careerTitles[$a->career_id] ?? 'Unknown' }}</td>
              <td class="px-4 py-3 max-w-xs text-sm text-gray-700">{{ $a->message }}</td>
              <td class="px-4 py-3">
                @if($a->cv_file)
                  <a href="{{ url('/storage/'.$a->cv_file) }}" target="_blank" class="inline-flex items-center gap-1 text-primary hover:underline">
                    <i data-lucide="file" class="w-4 h-4"></i>
                    Download CV
                  </a>
                @else
                  <span class="text-gray-500">-</span>
                @endif
              </td>
              <td class="px-4 py-3 text-sm text-gray-600">{{ optional($a->created_at)->format('Y-m-d H:i') }}</td>
            </tr>
          @empty
            <tr><td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada aplikasi yang masuk.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal: Add New Career -->
  <div id="modal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden items-start justify-center pt-10 px-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Add Career</h2>
        <button id="closeModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      @if(session('success'))<div class="mb-3 rounded-lg bg-green-50 text-green-700 text-sm px-3 py-2">{{ session('success') }}</div>@endif
      <form method="POST" action="/admin/career" class="space-y-3">
        @csrf
        <label class="block">
          <span class="block text-sm font-medium">Job Title</span>
          <input type="text" name="job_title" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Description</span>
          <textarea name="description" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Requirements</span>
          <textarea name="requirements" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Status</span>
          <select name="status" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
          </select>
        </label>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="cancelModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-[#911f25]">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal: Edit Career -->
  <div id="editCareerModal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden items-start justify-center pt-10 px-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Edit Career</h2>
        <button id="editCareerClose" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      <form id="editCareerForm" method="POST" action="#" class="space-y-3">
        @csrf
        <label class="block">
          <span class="block text-sm font-medium">Job Title</span>
          <input type="text" name="job_title" id="editJobTitle" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40" />
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Description</span>
          <textarea name="description" id="editDescription" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Requirements</span>
          <textarea name="requirements" id="editRequirements" rows="4" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40"></textarea>
        </label>
        <label class="block">
          <span class="block text-sm font-medium">Status</span>
          <select name="status" id="editStatus" required class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-primary/40">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
          </select>
        </label>
        <div class="flex items-center justify-end gap-2 pt-2">
          <button type="button" id="editCareerCancel" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Cancel</button>
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

      // Edit Career handlers
      const editWrap = document.getElementById('editCareerModal');
      const editClose = document.getElementById('editCareerClose');
      const editCancel = document.getElementById('editCareerCancel');
      const editForm = document.getElementById('editCareerForm');
      const editJobTitle = document.getElementById('editJobTitle');
      const editDescription = document.getElementById('editDescription');
      const editRequirements = document.getElementById('editRequirements');
      const editStatus = document.getElementById('editStatus');

      function showEdit(){ editWrap.classList.remove('hidden'); editWrap.classList.add('flex'); }
      function hideEdit(){ editWrap.classList.add('hidden'); editWrap.classList.remove('flex'); }
      editClose && editClose.addEventListener('click', hideEdit);
      editCancel && editCancel.addEventListener('click', hideEdit);

      document.querySelectorAll('.edit-career').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-id');
          const title = btn.getAttribute('data-title');
          const desc = btn.getAttribute('data-description');
          const reqs = btn.getAttribute('data-requirements');
          const status = btn.getAttribute('data-status');
          editForm.setAttribute('action', `/admin/career/${id}/update`);
          editJobTitle.value = title || '';
          editDescription.value = desc || '';
          editRequirements.value = reqs || '';
          editStatus.value = status || 'open';
          showEdit();
        });
      });
    });
  </script>
@endsection