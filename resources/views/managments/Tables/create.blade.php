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
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-th-large mr-2"></i> Ajouter table
                </h2>
                <a href="{{ route('tables.create') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-plus-circle text-2xl"></i>
                </a>
            </header>
            <!-- Form -->
            <div class="mt-8">
                <form action="{{ route('tables.store') }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">name</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Enter title">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="status">
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </section>
    </main>
</body>

</html>
