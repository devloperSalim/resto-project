<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    {{--   Include Tailwind CSS   --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{--   Include Font Awesome   --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col h-screen">
    {{--   Header --}}
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

    {{--  Main Content --}}
    <main class="flex flex-1">
        {{--   Sidebar   --}}
        <aside class="bg-gray-900 text-gray-100 w-64 flex flex-col items-center justify-between overflow-y-auto">
            {{--   Logo --}}
            <div class="p-6 text-center">
                <h1 class="text-3xl font-bold mb-2">Welcome</h1>
                <div class="flex items-center justify-center">
                    <i class="fas fa-handshake text-4xl mr-2"></i>
                    <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-6 py-3 rounded-lg font-semibold transition-colors">Get Started</a>
                </div>
            </div>
            {{--   Navigation Links   --}}
            <nav class="flex flex-col items-center w-full">
                <!-- Tables -->
                <a href="{{ route('tables.index') }}" class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Tables</span>
                    <i class="fas fa-table"></i>
                </a>

                {{--   Categories   --}}
                <a href="{{ route('categories.index') }}" class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Categories</span>
                    <i class="fas fa-list"></i>
                </a>

                {{--  Servants   --}}
                <a href="{{ route('servants.index') }}" class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Servants</span>
                    <i class="fas fa-user-tie"></i>
                </a>

                {{--   Menu  --}}
                <a href="" class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
                    <span>Menu</span>
                    <i class="fas fa-utensils"></i>
                </a>
                {{--  sales  --}}
                <a href="" class="py-4 px-6 w-full flex items-center justify-between hover:bg-gray-800 transition-colors">
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
                <h1 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-utensils"></i> Menus
                </h1>
                <a href="{{ route('menus.create') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-plus-circle text-2xl"></i>
                </a>
            </header>

            <!-- Table content here -->
            <!-- Table content here -->
<div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="border border-gray-200 px-4 py-2">Id</th>
                <th class="border border-gray-200 px-4 py-2">Title</th>
                <th class="border border-gray-200 px-4 py-2">Image</th>
                <th class="border border-gray-200 px-4 py-2">Category</th>
                <th class="border border-gray-200 px-4 py-2">Description</th>
                <th class="border border-gray-200 px-4 py-2">Price</th>
                <th class="border border-gray-200 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $key => $menu)
            <tr>
                <td class="border border-gray-200 px-4 py-2">{{ $key +1 }}</td>
                <td class="border border-gray-200 px-4 py-2">{{ $menu->title }}</td>
                <td class="border border-gray-200 px-4 py-2">
                    @if($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" class="w-16 h-16 object-cover rounded-full" alt="Menu Image">
                    @else
                        <span>No Image Available</span>
                    @endif
                </td>
                <td class="border border-gray-200 px-4 py-2">{{ $menu->Category->title }}</td>
                <td class="border border-gray-200 px-4 py-2">{{ Str::limit($menu->description, 60, '...') }}</td>
                <td class="border border-gray-200 px-4 py-2">${{ $menu->price }}
                    <i class="fas fa-dollar-sign"></i>
                </td>
                <td class="border border-gray-200 px-4 py-2 flex space-x-2">
                    <!-- Edit Button -->
                    <a href="{{ route('menus.edit', $menu->slug) }}" class="text-green-500 hover:text-green-700 flex items-center">
                        <i class="fas fa-edit"></i>
                        <span class="ml-1">Edit</span>
                    </a>
                    <!-- Delete Button -->
                    <button onclick="openDeleteModal('{{ $menu->slug }}')" class="text-red-500 hover:text-red-700 flex items-center">
                        <i class="fas fa-trash-alt"></i>
                        <span class="ml-1">Delete</span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
            <div class="mt-4">
                {{ $menus->links() }}
            </div>
        </section>
    </main>

    <script>
        // Function to show the delete modal
        function openDeleteModal(slug) {
            document.getElementById('deleteModal' + slug).classList.remove('hidden');
        }

        // Function to close the delete modal
        function closeDeleteModal(slug) {
            document.getElementById('deleteModal' + slug).classList.add('hidden');
        }
    </script>
</body>

</html>
