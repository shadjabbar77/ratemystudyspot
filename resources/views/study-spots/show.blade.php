<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $spot->building }} Reviews
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <a href="{{ route('study-spots.index') }}" class="text-blue-600 underline">
                        ← Back to Study Spots
                    </a>

                    @if(session('error'))
                        <div style="margin-top:16px; margin-bottom:16px; padding:12px; border-radius:8px; background:#fee2e2; color:#991b1b; font-size:32px; font-weight:900;">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mt-4 mb-4 p-3 rounded bg-green-100 text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    @auth
                        <div class="mt-4 mb-4">
                            <a href="{{ route('reviews.create', $spot) }}"
                               style="display:inline-block; background:#111827; color:#ffffff; padding:10px 16px; border-radius:8px; border:2px solid #000;">
                                Write a Review
                            </a>
                        </div>
                    @endauth

                    <h1 class="text-2xl font-bold mt-6 mb-2">
                        {{ $spot->building }}
                    </h1>

                    @php
                        $reviewCount = $reviews->count();
$avgRating = (float) ($reviews->avg('rating') ?? 0);

                        if ($reviewCount === 0) {
                            $starColor = '#000000'; // black
                        } elseif ($avgRating < 3) {
                            $starColor = '#dc2626'; // red
                        } elseif ($avgRating == 3) {
                            $starColor = '#facc15'; // yellow
                        } else {
                            $starColor = '#16a34a'; // green
                        }
                    @endphp

                    <p class="mb-6 text-gray-700">
                        <span style="color: {{ $starColor }}; font-size: 28px; font-weight: 900;">★</span>
                        {{ number_format($avgRating, 1) }}/5
                        ({{ $reviewCount }} reviews)
                    </p>

                    @if ($reviews->count() === 0)
                        <p>No reviews yet.</p>
                    @else
                        <div class="space-y-6">
                            @foreach($reviews as $review)
                                <div class="border rounded p-4">
                                    @php
                                        $reviewRating = (float) $review->rating;

                                        if ($reviewRating < 3) {
                                            $reviewStarColor = '#dc2626'; // red
                                        } elseif ($reviewRating == 3) {
                                            $reviewStarColor = '#facc15'; // yellow
                                        } else {
                                            $reviewStarColor = '#16a34a'; // green
                                        }
                                    @endphp

                                    <div class="font-bold">
                                        <span style="color: {{ $reviewStarColor }}; font-size: 24px; font-weight: 900;">★</span>
                                        {{ number_format($reviewRating, 1) }}/5
                                    </div>

                                    <p class="mt-2 text-gray-800">
                                        {{ $review->text }}
                                    </p>

                                    <p class="mt-2 text-sm text-gray-500">
                                        By {{ $review->user->name ?? 'Anonymous' }}
                                    </p>

                                    <div class="mt-3 flex items-center gap-4">
                                        @can('update', $review)
                                            <a href="{{ route('reviews.edit', [$spot, $review]) }}"
                                               class="text-blue-600 underline text-sm">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete', $review)
                                            <form method="POST"
                                                  action="{{ route('reviews.destroy', [$spot, $review]) }}"
                                                  onsubmit="return confirm('Delete this review?');"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 underline text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
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