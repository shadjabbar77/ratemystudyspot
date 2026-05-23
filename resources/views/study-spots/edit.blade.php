<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Study Spot
        </h2>
    </x-slot>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Study Spot
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('study-spots.update', $studySpot) }}">
                        @csrf
                        @method('PUT')

                        <label class="block text-sm font-medium mb-2">Building name</label>

                        <input
                            name="building"
                            type="text"
                            value="{{ old('building', $studySpot->building) }}"
                            class="border rounded px-3 py-2 w-full"
                            required
                        />

                        @error('building')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <button class="mt-4 px-4 py-2 bg-black text-white rounded" type="submit">
                            Save changes
                        </button>

                        <a class="ml-4 underline text-blue-600" href="{{ route('study-spots.index') }}">
                            Cancel
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('study-spots.update', $studySpot) }}">
                        @csrf
                        @method('PUT')

                        <label class="block text-sm font-medium mb-2">Building</label>
                        <input
                            name="building"
                            type="text"
                            class="border rounded px-3 py-2 w-full"
                            value="{{ old('building', $studySpot->building) }}"
                            required
                        />

                        @error('building')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        <div class="mt-4 flex gap-3">
                            <button class="px-4 py-2 bg-black text-white rounded" type="submit">
                                Save
                            </button>

                            <a class="px-4 py-2 border rounded" href="{{ route('study-spots.index') }}">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>