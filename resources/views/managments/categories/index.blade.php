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
                    <i class="fas fa-th-large mr-2"></i> Categories
                </h1>
                <a href="{{ route('categories.create') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-plus-circle text-2xl"></i>
                </a>
            </header>

            <div class="p-4">
                <!-- Table content here -->
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">Id</th>
                            <th class="border border-gray-200 px-4 py-2">Title</th>
                            <th class="border border-gray-200 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td class="border border-gray-200 px-4 py-2">{{ $key +1 }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $category->title }}</td>
                            <td class="border border-gray-200 px-4 py-2 flex space-x-2">
                                <a href="{{ route('categories.edit',$category->slug) }}" class="text-green-500 hover:text-green-700 flex items-center">
                                    <i class="fas fa-edit"></i>
                                    <span class="ml-1">Edit</span>
                                </a>
                                <button onclick="openDeleteModal('{{ $category->slug }}')" class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash-alt"></i>
                                    <span class="ml-1">Delete</span>
                                </button>
                                <!-- Delete Confirmation Modal -->
                                <div id="deleteModal{{ $category->slug }}" class="fixed z-50 inset-0 overflow-y-auto hidden">
                                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>
                                        {{--   Modal container  --}}
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                        {{--   Exclamation icon --}}
                                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm0 4a1 1 0 100-2 1 1 0 000 2z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Delete Category</h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">Are you sure you want to delete this category?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <!-- Delete button -->
                                                <form id="deleteForm{{ $category->slug }}" method="POST" action="{{ route('categories.destroy', $category->slug) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                                <!-- Cancel button -->
                                                <button onclick="closeDeleteModal('{{ $category->slug }}')" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $categories->links() }}
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
