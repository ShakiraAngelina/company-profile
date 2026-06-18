<article class="overflow-hidden rounded-xl border bg-white shadow-sm">
  @if(!empty($img))
    <img class="w-full h-48 md:h-56 lg:h-64 object-cover" src="{{ $img }}" alt="{{ $alt ?? '' }}" loading="lazy" />
  @endif
  <div class="p-4 md:p-6">
    @if(!empty($title))
      <h3 class="text-lg md:text-xl font-medium text-gray-900 truncate">{{ $title }}</h3>
    @endif
    @if(!empty($desc))
      <p class="mt-1 text-sm md:text-base text-gray-600 text-wrap">{{ $desc }}</p>
    @endif
  </div>
</article>