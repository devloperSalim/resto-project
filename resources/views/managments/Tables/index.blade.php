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
    <header class="bg-white p-4 shadow-md">
        <h1 class="text-3xl font-bold">Salim</h1>
    </header>

    <!-- Main Content -->
    <main class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-gray-800 h-screen text-white">
            <!-- Sidebar content here -->
            Sidebar Content
        </aside>

        <!-- Main Content -->
        <section class="w-3/4 p-8">
            <!-- Content here -->
            <header class="bg-white p-4 flex justify-between items-center shadow-md">
                <h1 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-table mr-2"></i>
                    Tables
                </h1>
                <a href="{{ route('tables.create') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-plus-circle text-2xl"></i>
                </a>
            </header>

            <div class="p-4">
                <!-- Table content here -->
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">Id</th>
                            <th class="border border-gray-200 px-4 py-2">name</th>
                            <th class="border border-gray-200 px-4 py-2">status</th>
                            <th class="border border-gray-200 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $key => $table)
                        <tr>
                            <td class="border border-gray-200 px-4 py-2">{{ $key +1 }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $table->name }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                @if($table->status == 1)
                                    <span class="text-green-500">Oui</span>
                                @else
                                    <span class="text-red-500">Non</span>
                                @endif
                            </td>
                            <td class="border border-gray-200 px-4 py-2 flex space-x-2">
                                <a href="{{ route('tables.edit',$table->slug) }}" class="text-green-500 hover:text-green-700 flex items-center">
                                    <i class="fas fa-edit"></i>
                                    <span class="ml-1">Edit</span>
                                </a>
                                <button onclick="openDeleteModal('{{ $table->slug }}')" class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash-alt"></i>
                                    <span class="ml-1">Delete</span>
                                </button>
                                <!-- Delete Confirmation Modal -->
                                <div id="deleteModal{{ $table->slug }}" class="fixed z-50 inset-0 overflow-y-auto hidden">
                                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>
                                        <!-- Modal container -->
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                        <!-- Exclamation icon -->
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
                                                <form id="deleteForm{{ $table->slug }}" method="POST" action="{{ route('categories.destroy', $table->slug) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                                <!-- Cancel button -->
                                                <button onclick="closeDeleteModal('{{ $table->slug }}')" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
