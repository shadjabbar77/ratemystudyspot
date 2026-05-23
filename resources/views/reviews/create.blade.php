<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Write a Review
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
                        <div style="margin-top:16px; padding:12px; border-radius:8px; background:#fee2e2; color:#991b1b;">
                            <ul style="margin-left:18px; list-style:disc;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('reviews.store', $studySpot) }}" style="margin-top:18px;">
                        @csrf

                        <div style="margin-bottom:14px;">
                            <label style="display:block; font-weight:600; margin-bottom:6px;">Rating (0–5)</label>
                            <input
                                type="number"
                                name="rating"
                                min="0"
                                max="5"
                                value="{{ old('rating', 5) }}"
                                required
                                style="border:2px solid #000; border-radius:8px; width:100%; padding:10px;"
                            >
                        </div>

                        <div style="margin-bottom:16px;">
                            <label style="display:block; font-weight:600; margin-bottom:6px;">Review</label>
                            <textarea
                                name="text"
                                rows="5"
                                required
                                style="border:2px solid #000; border-radius:8px; width:100%; padding:10px;"
                            >{{ old('text') }}</textarea>
                        </div>

                        <button type="submit"
                                style="display:inline-block; background:#111827; color:#ffffff; padding:10px 16px; border-radius:8px; border:2px solid #000;">
                            Submit Review
                        </button>

                        <a href="{{ route('study-spots.show', $studySpot) }}"
                           style="display:inline-block; margin-left:12px; padding:10px 16px; border:2px solid #000; border-radius:8px;">
                            Cancel
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>