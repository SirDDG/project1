<x-layout>
    <h1>Edit Skill</h1>

    <form method="POST" action="/skills/{{ $skill->id }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ old('name', $skill->name) }}">
        <button type="submit">Save</button>
        <a href="/about">Cancel</a>
    </form>

    @error('name')
        <p style="color: red;">{{ $message }}</p>
    @enderror
</x-layout>