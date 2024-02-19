<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <form  action="{{ route('clients.store') }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-6">
            <input type="email" name="email" 
                class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-100 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-blue-500"
                placeholder="Email address" />
        </div>
        <div class="mb-6">
            <input type="password" name="password"
                class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-100 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-blue-500"
                placeholder="Password"  />
        </div>
        <div class="mb-6">
            <input type="password" name="password_confirmation" id="floating_repeat_password"
                class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-100 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-blue-500"
                placeholder="Confirm password"  />
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class="mb-6">
                <input type="text" name="name" id="floating_first_name"
                    class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-100 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-blue-500"
                    placeholder="First name" />
            </div>
            <div class="mb-6">
                <input type="text" name="city" id="floating_last_name"
                    class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-100 border-b-2 border-gray-300 appearance-none focus:outline-none focus:border-blue-500"
                    placeholder="Last name" />
            </div>
        </div>

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg text-sm w-full px-5 py-2.5">Submit</button>
    </form>
</body>

</html>
