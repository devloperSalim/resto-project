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
                    <i class="fas fa-th-large mr-2"></i> Modifier servnat
                </h2>
            </header>
            <!-- Form -->
            <div class="mt-8">
                <form action="{{ route('servants.update',$servant->id) }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name',$servant->name) }}" name="name" type="text" placeholder="Enter title">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            address
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('address',$servant->address) }}"  name="address" type="text" placeholder="Enter title">
                    </div>
                    <!-- You can add more form fields here -->
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="sumbit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
