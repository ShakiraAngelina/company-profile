@extends('admin.layout')

@section('title', 'Messages')

@section('content')
  <div class="mb-4">
    <h1 class="text-2xl font-semibold">Messages</h1>
    <p class="text-gray-600">Daftar pesan dari form Contact.</p>
  </div>

  <div class="rounded-2xl bg-white shadow-soft overflow-hidden">
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">No</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Subject</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @php($messages = \App\Models\Message::orderByDesc('created_at')->limit(50)->get())
          @forelse($messages as $i => $m)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 text-sm text-gray-600">{{ $i+1 }}</td>
              <td class="px-4 py-3">{{ $m->name }}</td>
              <td class="px-4 py-3 text-sm text-gray-600">{{ $m->email }}</td>
              <td class="px-4 py-3">{{ $m->subject }}</td>
              <td class="px-4 py-3 text-sm text-gray-600">{{ optional($m->created_at)->format('Y-m-d H:i') }}</td>
              <td class="px-4 py-3">
                <div class="flex items-center gap-2">
                  <button class="p-2 rounded-lg hover:bg-gray-100 view-btn" data-id="msg-{{ $m->id }}" title="View"><i data-lucide="eye" class="w-4 h-4"></i></button>
                  <button class="p-2 rounded-lg hover:bg-gray-100" title="Delete"><i data-lucide="trash" class="w-4 h-4"></i></button>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="px-4 py-6 text-center text-gray-500">No messages yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Hidden message templates -->
  @foreach($messages as $m)
    <template id="msg-{{ $m->id }}">
      <div class="space-y-2">
        <div class="text-sm text-gray-500">From</div>
        <div class="font-medium">{{ $m->name }} — {{ $m->email }}</div>
        <div class="text-sm text-gray-500">Subject</div>
        <div class="font-medium">{{ $m->subject }}</div>
        <div class="text-sm text-gray-500">Message</div>
        <div class="whitespace-pre-line">{{ $m->message }}</div>
      </div>
    </template>
  @endforeach

  <!-- Modal: View Message -->
  <div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-soft p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-lg font-semibold">Message Detail</h2>
        <button id="closeModal" class="p-2 rounded-lg hover:bg-gray-100"><i data-lucide="x" class="w-5 h-5"></i></button>
      </div>
      <div id="modalBody" class="space-y-2"></div>
      <div class="flex items-center justify-end gap-2 pt-4">
        <button type="button" id="cancelModal" class="px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50">Close</button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function(){
      if (window.lucide) { window.lucide.createIcons(); }
      const m = document.getElementById('modal');
      const close = document.getElementById('closeModal');
      const cancel = document.getElementById('cancelModal');
      const body = document.getElementById('modalBody');
      function show(){ m.classList.remove('hidden'); m.classList.add('flex'); }
      function hide(){ m.classList.add('hidden'); m.classList.remove('flex'); body.innerHTML=''; }
      document.querySelectorAll('.view-btn').forEach(btn=>{
        btn.addEventListener('click', ()=>{
          const id = btn.getAttribute('data-id');
          const tpl = document.getElementById(id);
          if (tpl) { body.innerHTML = tpl.innerHTML; show(); }
        });
      });
      close && close.addEventListener('click', hide);
      cancel && cancel.addEventListener('click', hide);
    });
  </script>
@endsection