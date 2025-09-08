<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Create an account</h1>

        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Name</label>
                <input name="name" type="text" value="{{ old('name') }}"
                       class="w-full border rounded-lg p-2" required autofocus>
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input name="email" type="email" value="{{ old('email') }}"
                       class="w-full border rounded-lg p-2" required>
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input name="password" type="password"
                       class="w-full border rounded-lg p-2" required>
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Confirm Password</label>
                <input name="password_confirmation" type="password"
                       class="w-full border rounded-lg p-2" required>
            </div>

            <button type="submit"
                    class="w-full py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">
                Register
            </button>
        </form>

        <p class="text-sm text-gray-600 mt-4">
            Already have an account?
            <a class="text-blue-600 hover:underline" href="{{ url('/login') }}">Log in</a>
        </p>
    </div>

</body>
</html>
