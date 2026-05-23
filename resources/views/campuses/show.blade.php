<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
      {{ $campus->name }} — Study Spots
    </h2>
  </x-slot>

  <div class="py-6 max-w-4xl mx-auto space-y-4">
    <form method="GET" class="flex gap-2">
      <input
        type="text"
        name="q"
        value="{{ $q }}"
        placeholder="Search building or spot name..."
        class="border rounded px-3 py-2 w-full"
      />
      <button class="border rounded px-4 py-2">Search</button>
    </form>

    <div class="space-y-3">
      @forelse ($spots as $spot)
        <a href="/study-spots/{{ $spot->id }}" class="block border rounded p-3">
          <div class="font-semibold">
            <div class="font-semibold">
  {{ $spot->building }} — Floor {{ $spot->floor }} — {{ $spot->room_area_name }}
</div>

<div class="text-sm text-gray-600">
  Avg: {{ number_format($spot->reviews_avg_rating ?? 0, 2) }} / 5
  • Reviews: {{ $spot->reviews_count ?? 0 }}
</div>
          </div>
        </a>
      @empty
        <p>No study spots found.</p>
      @endforelse
    </div>

    <div>
      {{ $spots->links() }}
    </div>
  </div>
</x-app-layout>