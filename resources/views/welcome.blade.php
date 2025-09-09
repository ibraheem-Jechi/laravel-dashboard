<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dashboard</title>
</head>
<body class="antialiased bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col items-center py-10">

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}" class="mb-6">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Logout
            </button>
        </form>

        <h1 class="text-4xl font-bold text-blue-600 mb-6">Welcome to Laravel 🚀</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Product Form --}}
        <div class="w-full max-w-lg bg-white p-6 rounded-xl shadow mb-10">
            <h2 class="text-2xl font-bold mb-4">Add New Product</h2>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Title</label>
                    <input type="text" name="title" class="w-full border rounded-lg p-2" required>
                    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" class="w-full border rounded-lg p-2"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">Price</label>
                    <input type="number" name="price" step="0.01" class="w-full border rounded-lg p-2" required>
                    @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Image</label>
                    <input type="file" name="img" class="w-full border rounded-lg p-2">
                    @error('img') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Add Product
                </button>
            </form>
        </div>

        {{-- Products Table --}}
        <div class="w-full max-w-4xl bg-white p-6 rounded-xl shadow">
            <h2 class="text-2xl font-bold mb-4">Products List</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-2 border">Image</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Description</th>
                        <th class="p-2 border">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border">
                                @if($product->img)
                                    <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->title }}" class="h-16 w-16 object-cover rounded">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="p-2 border">{{ $product->title }}</td>
                            <td class="p-2 border">{{ $product->description }}</td>
                            <td class="p-2 border font-semibold text-green-600">${{ $product->price }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
