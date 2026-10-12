<x-layout>
    <h1>Hello! I'm {{ $name }}</h1>

    <h2>My Skills</h2>
    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>
</x-layout>