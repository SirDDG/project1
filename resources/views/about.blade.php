<x-layout>
    <h1>Hello! I'm {{ $name }}</h1>

    <h2>My Skills</h2>
    <ul>
        @forelse ($skills as $skill)
            <li>
                {{ $skill->name }}
                <a href="/skills/{{ $skill->id }}/edit">Edit</a>

                <form method="POST" action="/skills/{{ $skill->id }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this skill?')">Delete</button>
                </form>
            </li>
        @empty
            <p>No skills yet. Add one below!</p>
        @endforelse
    </ul>

    <h2>Add a Skill</h2>

    <form method="POST" action="/skills">
        @csrf
        <input type="text" name="name" placeholder="Type a skill">
        <button type="submit">Add</button>
    </form>

    @error('name')
        <p style="color: red;">{{ $message }}</p>
    @enderror
</x-layout>