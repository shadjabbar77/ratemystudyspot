<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Write a Review
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6 space-y-4">

           

                <ol class="list-decimal list-inside text-gray-800 space-y-2">
                    <li>Go to the Study Spots page</li>
                    <li>Click a building (study spot)</li>
                    <li>Click <strong>Write a Review</strong></li>
                    <li>Fill it out and submit</li>
                </ol>

                <div class="pt-2">
                    <a href="{{ route('study-spots.index') }}"
                       class="inline-block px-4 py-2 bg-gray-900 text-white rounded">
                        Go to Study Spots
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>