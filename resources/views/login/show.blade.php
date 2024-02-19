<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100 dark:bg-gray-900">

    <form class="max-w-md bg-white p-8 rounded-lg shadow-lg" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your name</label>
            <input type="text" name="email" class="mt-1 p-2.5 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="Bonnie Green">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
            <input type="password" name="password" class="mt-1 p-2.5 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="********">
        </div>
        <div class="flex justify-between">
            <button  class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
            <a href="{{ route('clients.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Create User</a>
        </div>
    </form>

</body>
</html>
