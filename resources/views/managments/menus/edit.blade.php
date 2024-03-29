<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    <!-- Header -->
    <header class="bg-gray-900 text-white py-4 px-6 shadow-md flex items-center justify-between">
        <!-- Logo -->
        <div>
            <img src="{{ asset('storage/images/logo.png') }}" alt="Salim Resto Logo" class="h-12">
        </div>

        <!-- Reservation Number -->
        <div class="text-right">
            <p class="text-sm text-gray-400">For Reservations, call</p>
            <p class="text-lg font-semibold text-yellow-400">123-456-7890</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-1">
        <!-- Sidebar -->
        <aside class="bg-gray-900 text-gray-100 w-64 flex flex-col items-center justify-between overflow-y-auto">
            <!-- Logo -->
            <div class="p-6 text-center">
                <h1 class="text-3xl font-bold mb-2">Welcome</h1>
                <div class="flex items-center justify-center">
                    <i class="fas fa-handshake text-4xl mr-2"></i>
                    <a href="#"
                        class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-6 py-3 rounded-lg font-semibold transition-colors">Get
                        Started</a>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex flex-col items-center w-full">
                <!-- Tables -->
                <a href="{{ route('tables.index') }}"
                    class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Tables</span>
                    <i class="fas fa-table"></i>
                </a>

                <!-- Categories -->
                <a href="{{ route('categories.index') }}"
                    class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Categories</span>
                    <i class="fas fa-list"></i>
                </a>

                <!-- Servants -->
                <a href="{{ route('servants.index') }}"
                    class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Servants</span>
                    <i class="fas fa-user-tie"></i>
                </a>

                <!-- Menu -->
                <a href="{{ route('menus.index') }}"
                    class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Menu</span>
                    <i class="fas fa-utensils"></i>
                </a>

                <!-- Sales -->
                <a href="{{ route('sales.index') }}"
                    class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Sales</span>
                    <i class="fas fa-chart-line"></i>
                </a>
            </nav>

            <!-- Footer -->
            <div class="py-6">
                <p class="text-xs">© 2024 Salim Restaurant</p>
            </div>
        </aside>

        <!-- Main Content -->
        <section class="w-3/4 p-8">
            <!-- Content here -->
            <header class="bg-white p-4 flex justify-between items-center shadow-md">
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-utensils"></i>
                    Modifier Menu
                </h2>
            </header>

            <!-- Form -->
            <div class="mt-8">
                <form action="{{ route('menus.update', $menu->slug) }}" method="POST" enctype="multipart/form-data"
                    class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('title', $menu->title) }}" name="title" type="text"
                            placeholder="Enter title">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Description
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="description" placeholder="Enter description">{{ old('$menu->description', $menu->description) }}</textarea>
                    </div>


                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input type="file" name="image" id="image" class="appearance-none block w-full bg-white text-gray-700 border border-gray-300 rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                        @error('image')
                        {{ $message }}
                    @enderror

                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                            Price
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-700">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="price" type="number" value="{{ old('price', $menu->price) }}"
                                placeholder="Enter price">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                            Category
                        </label>
                        <select name="category_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"
                                    {{ $categorie->id == old('category_id', $menu->category_id) ? 'selected' : '' }}>
                                    {{ $categorie->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- You can add more form fields here -->

                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
