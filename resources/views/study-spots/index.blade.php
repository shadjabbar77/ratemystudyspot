<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Study Spots
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">


                    @if (session('status'))
                        <div class="mb-4 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('study-spots.index') }}" class="mb-6">
                        <label class="block text-sm font-medium mb-2">Search study spot</label>

                        <div class="flex gap-2">
                            <input
                                name="q"
                                type="text"
                                value="{{ $q ?? '' }}"
                                class="border rounded px-3 py-2 w-full"
                                placeholder="Type a building name..."
                            />

                            <button class="px-4 py-2 bg-black text-white rounded" type="submit">
                                Search
                            </button>
                        </div>

                        @if(($q ?? '') !== '')
                            <div class="mt-2 text-sm">
                                Showing results for: <strong>{{ $q }}</strong>
                                <a class="text-blue-600 underline ml-2" href="{{ route('study-spots.index') }}">
                                    Clear
                                </a>
                            </div>
                        @endif
                    </form>

                   @auth
    <div class="mb-6">
        
    </div>
@endauth

                    @if ($spots->count() === 0)
                        <p>No study spots found.</p>
                    @else
                       <div class="space-y-4">
                            @foreach ($spots as $spot)
    @php
        $reviewCount = (int) ($spot->reviews_count ?? 0);
        $avgRating = (float) ($spot->reviews_avg_rating ?? 0);

        if ($reviewCount === 0) {
            $starColor = '#000000';
        } elseif ($avgRating < 3) {
            $starColor = '#dc2626';
        } elseif ($avgRating == 3) {
            $starColor = '#facc15';
        } else {
            $starColor = '#16a34a';
        }
    @endphp

    <div class="border rounded-xl p-5 shadow-sm bg-white hover:bg-gray-50 mb-4">

        @if ($spot->image_path)
           <img
    src="{{ asset($spot->image_path) }}"
    alt="{{ $spot->building }}"
   style="width: 180px; height: 180px; object-fit: cover; border-radius: 12px; margin-bottom: 12px;"
>
        @else
            <div style="width: 180px; height: 180px; border-radius: 12px; margin-bottom: 12px; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #6b7280; font-size: 12px;">
    No image
</div>
        @endif

        <div class="flex items-center justify-between">
            <span>
                <span style="font-size:20px;font-weight:900;">
                    <a href="{{ route('study-spots.show', $spot) }}" class="text-blue-600 underline">
                        {{ $spot->building }}
                    </a>
                </span>

                <span class="text-base font-normal">
                    — <span style="color: {{ $starColor }}; font-size: 28px; font-weight: 900;">★</span>
                    {{ number_format($avgRating, 1) }}/5
                    ({{ $reviewCount }} reviews)
                </span>
            </span>

            @auth
    <span class="flex gap-3">
        <a class="text-blue-600 underline" href="{{ route('reviews.create', $spot) }}">
            Write a Review
        </a>

        @can('update', $spot)
            <a class="text-blue-600 underline" href="{{ route('study-spots.edit', $spot) }}">
                Edit
            </a>
        @endcan

        @can('delete', $spot)
            {{-- keep empty for now --}}
        @endcan
    </span>
@endauth
        </div>
    </div>
@endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>