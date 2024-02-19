
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Restaurant</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .hero {
            background-image: url('{{ asset('storage/images/resto.jpeg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="hero h-screen flex items-center justify-center text-center text-white">
        <div>
            <h1 class="text-4xl font-bold mb-4">Welcome to Your Restaurant</h1>
            <p class="text-lg mb-6">Experience exquisite dining with us</p>
            <a href="{{ route('login.show') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded inline-flex items-center transition duration-300 ease-in-out">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7"></path>
                </svg>
                Go to Login
            </a>
        </div>
    </div>
</body>

</html>
