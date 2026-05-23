<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Reviews
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($reviews->isEmpty())
                    <p>You haven’t posted any reviews yet.</p>
                @else
                    <ul class="space-y-4">
                        @foreach($reviews as $review)
                            <li class="border-b pb-4">
    @if ($review->studySpot && $review->studySpot->image_path)
        <img
            src="{{ asset($review->studySpot->image_path) }}"
            alt="{{ $review->studySpot->building }}"
            style="width: 180px; height: 180px; object-fit: cover; border-radius: 12px; margin-bottom: 12px;"
        >
    @else
        <div style="width: 180px; height: 180px; border-radius: 12px; margin-bottom: 12px; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #6b7280; font-size: 12px;">
            No image
        </div>
    @endif

    <div class="font-semibold mb-1">
        <a class="text-blue-600 underline" href="{{ route('study-spots.show', $review->studySpot) }}">
            {{ $review->studySpot->building ?? 'Unknown building' }}
        </a>
    </div>

    <div class="text-sm text-gray-600">
        Rating: {{ $review->rating ?? 'N/A' }}
    </div>

    <div class="mt-2">
        {{ $review->text ?? '' }}
    </div>
</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>