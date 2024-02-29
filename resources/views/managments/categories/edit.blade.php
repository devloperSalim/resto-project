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
      {{--   Header --}}
      <header class="bg-gray-900 text-white py-4 px-6 shadow-md flex items-center justify-between">
        <!-- Logo -->
        <div>
            <img src="{{ asset('storage/images/logo.png') }}" alt="Salim Resto Logo" class="h-12">
        </div>

        {{--   Reservation Number   --}}
        <div class="text-right">
            <p class="text-sm text-gray-400">For Reservations, call</p>
            <p class="text-lg font-semibold text-yellow-400">123-456-7890</p>
        </div>
    </header>

    {{--   Main Content  --}}
    <main class="flex flex-1">
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
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-th-large mr-2"></i> Update category
                </h2>
                <a href="{{ route('categories.create') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-plus-circle text-2xl"></i>
                </a>
            </header>
            <!-- Form -->
            <div class="mt-8">
                <form action="{{ route('categories.update',$category->slug) }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title',$category->title) }}" name="title" type="text" placeholder="Enter title">
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
