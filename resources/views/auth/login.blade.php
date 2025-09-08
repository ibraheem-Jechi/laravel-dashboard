<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Log in</h1>

        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input name="email" type="email" value="{{ old('email') }}"
                       class="w-full border rounded-lg p-2" required autofocus>
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

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm">Remember me</label>
            </div>

            <button type="submit"
                    class="w-full py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">
                Log in
            </button>
        </form>

        <p class="text-sm text-gray-600 mt-4">
            Don’t have an account?
            <a class="text-blue-600 hover:underline" href="{{ url('/register') }}">Register</a>
        </p>
    </div>

</body>
</html>
