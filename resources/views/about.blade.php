<x-layout>
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-3xl font-bold text-gray-800">Hello! I'm {{ $name }}</h1>

        <h2 class="text-xl font-semibold text-gray-700 mt-6 mb-3">My Skills</h2>

        <ul class="space-y-2">
            @forelse ($skills as $skill)
                <li class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg px-4 py-2">
                    <div>
                        <span class="text-gray-800">{{ $skill->name }}</span>
                        <span class="text-xs text-gray-500 ml-2">by {{ $skill->user->name }}</span>
                    </div>

                    @if (auth()->id() == $skill->user_id)
                        <div class="flex items-center gap-2">
                            <a href="/skills/{{ $skill->id }}/edit"
                                class="text-sm px-3 py-1 rounded-md bg-gray-200 text-gray-800 hover:bg-gray-300">
                                Edit
                            </a>

                            <form method="POST" action="/skills/{{ $skill->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this skill?')"
                                    class="text-sm px-3 py-1 rounded-md bg-red-600 text-white hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </li>
            @empty
                <p class="text-gray-500">No skills yet. Add one below!</p>
            @endforelse
        </ul>

        @auth
            <h2 class="text-xl font-semibold text-gray-700 mt-8 mb-3">Add a Skill</h2>

            <form method="POST" action="/skills" class="flex gap-2">
                @csrf
                <input type="text" name="name" placeholder="Type a skill"
                    class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Add
                </button>
            </form>

            @error('name')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        @endauth

        @guest
            <p class="text-sm text-gray-500 mt-8">
                <a href="/login" class="text-blue-600 hover:underline">Log in</a> to add or edit skills.
            </p>
        @endguest
    </div>
</x-layout>