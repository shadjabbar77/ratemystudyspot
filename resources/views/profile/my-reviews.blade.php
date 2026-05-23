<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Reviews
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if($reviews->count() === 0)
                        <p class="text-gray-700">You haven’t posted any reviews yet.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($reviews as $review)
                                <div class="border rounded p-4 flex gap-4 items-start">
@if($review->studySpot && $review->studySpot->image_path)
    <img
        src="{{ asset($review->studySpot->image_path) }}"
        alt="{{ $review->studySpot->building }}"
        class="w-20 h-21 object-cover rounded shadow shrink-0"
        onerror="this.style.display='none'"
    >
@endif



<div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="font-semibold text-lg">
                                            {{ $review->studySpot?->building ?? 'Unknown Study Spot' }}
                                        </div>
                                        <div class="text-sm text-gray-600">
                                            {{ $review->created_at?->format('Y-m-d') }}
                                        </div>
                                    </div>

                                    <div class="mt-2 flex items-center gap-1">
    <span class="font-semibold mr-1">Rating:</span>

    @for($i = 1; $i <= 5; $i++)
        <span class="{{ $i <= (int) $review->rating ? 'text-yellow-500' : 'text-gray-300' }} text-xl">
            ★
        </span>
    @endfor

    <span class="ml-2 text-sm text-gray-600">
        {{ $review->rating }} / 5
    </span>
</div>

                                    @if(!empty($review->text))
                                        <div class="mt-2 text-gray-800">
                                            {{ $review->text }}
                                        </div>
                                                                        @endif
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