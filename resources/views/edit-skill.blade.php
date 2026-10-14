<x-layout>
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Skill</h1>

        <form method="POST" action="/skills/{{ $skill->id }}" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ old('name', $skill->name) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @error('name')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Save
                </button>
                <a href="/about"
                   class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layout>