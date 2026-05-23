<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Review
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <a href="{{ route('study-spots.show', $studySpot) }}" class="text-blue-600 underline">
                        ← Back
                    </a>

                    @if ($errors->any())
                        <div class="mt-4 p-3 rounded bg-red-100 text-red-800">
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('reviews.update', [$studySpot, $review]) }}" class="mt-6 space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium mb-1">Rating (0–5)</label>
                            <input
                                type="number"
                                name="rating"
                                min="0"
                                max="5"
                                value="{{ old('rating', $review->rating) }}"
                                style="border:2px solid #000; border-radius:8px; width:100%; padding:10px;"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Review</label>
                            <textarea
                                name="text"
                                rows="5"
                                style="border:2px solid #000; border-radius:8px; width:100%; padding:10px;"
                                required
                            >{{ old('text', $review->text) }}</textarea>
                        </div>

                        <div style="margin-top:16px;">
                            <button type="submit"
                                    style="display:inline-block; background:#111827; color:white; padding:10px 16px; border-radius:8px; border:2px solid #000;">
                                UPDATE (SUBMIT)
                            </button>

                            <a href="{{ route('study-spots.show', $studySpot) }}"
                               style="display:inline-block; margin-left:12px; padding:10px 16px; border:2px solid #000; border-radius:8px;">
                                CANCEL
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>