<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dashboard</title>
</head>
<body class="antialiased bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col justify-center items-center">
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
        Logout
    </button>
</form>

        <h1 class="text-5xl font-bold text-blue-600 mb-6">Welcome to Laravel 🚀</h1>
        <p class="text-lg text-gray-600 mb-8">
            You have successfully set up your Laravel application.
        </p>
        
        <div class="flex space-x-4">
            <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                Go to Dashboard
            </a>
            <a href="https://laravel.com/docs" target="_blank" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300">
                Documentation
            </a>
        </div>
    </div>

</body>
</html>
