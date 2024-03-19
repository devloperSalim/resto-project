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

<body class="bg-gray-100">
    <header class="bg-white p-4 flex justify-between items-center shadow-md">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Logout</a>
    </header>
    <div class="flex flex-col items-center mt-8">
        <div class="flex justify-center space-x-12">
            <a href="{{ route('categories.index') }}" class="text-center">
                <div class="bg-white rounded-full p-8 shadow-lg">
                    <i class="fas fa-cogs text-5xl text-blue-500"></i>
                </div>
                <p class="mt-4 text-xl">Management</p>
            </a>
            <a href="{{ route('sales.index') }}" class="text-center">
                <div class="bg-white rounded-full p-8 shadow-lg">
                    <i class="fas fa-credit-card text-5xl text-green-500"></i>
                </div>
                <p class="mt-4 text-xl">Sales</p>
            </a>
            <a href="{{ route('reports.index') }}" class="text-center">
                <div class="bg-white rounded-full p-8 shadow-lg">
                    <i class="fas fa-file-alt text-5xl text-yellow-500"></i>
                </div>
                <p class="mt-4 text-xl">Reports</p>
            </a>
        </div>
    </div>
</body>

</html>
