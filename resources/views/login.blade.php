<x-layout>
    <div class="bg-white rounded-xl shadow p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Log In</h1>

        <form method="POST" action="/login" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Log In
            </button>

            <p class="text-sm text-center text-gray-600">
                No account yet?
                <a href="/register" class="text-blue-600 hover:underline">Register</a>
            </p>
        </form>
    </div>
</x-layout>