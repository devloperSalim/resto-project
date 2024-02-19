<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Restaurant</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .hero {
            background-image: url('{{ asset('storage/images/resto.jpeg') }}');
            background-size: cover;
            background-position: center;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="hero h-screen flex items-center justify-center text-center text-white relative">
        <div class="overlay absolute inset-0"></div>
        <div class="relative z-10">
            <h1 class="text-5xl font-bold mb-6 text-shadow">Welcome to Your Restaurant</h1>
            <p class="text-lg mb-8 text-gray-300">Indulge in</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="p-4 rounded-lg bg-white shadow-md">
                    <i class="fas fa-utensils text-4xl text-blue-500 mb-2"></i>
                    <p class="text-lg font-semibold mb-2 text-gray-800">Delicious Cuisine</p>
                    <p class="text-gray-600">Prepared by our experienced chefs</p>
                </div>
                <div class="p-4 rounded-lg bg-white shadow-md">
                    <i class="fas fa-cocktail text-4xl text-blue-500 mb-2"></i>
                    <p class="text-lg font-semibold mb-2 text-gray-800">Signature Cocktails</p>
                    <p class="text-gray-600">Crafted by our mixologists</p>
                </div>
                <div class="p-4 rounded-lg bg-white shadow-md">
                    <i class="fas fa-glass-cheers text-4xl text-blue-500 mb-2"></i>
                    <p class="text-lg font-semibold mb-2 text-gray-800">Exceptional Service</p>
                    <p class="text-gray-600">Enjoy an elegant ambiance</p>
                </div>
            </div>
            <p class="text-lg mb-8 text-gray-300">Experience exquisite dining with us</p>
            <a href="{{ route('login.show') }}"
                class="btn-login bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded inline-flex items-center transition duration-300 ease-in-out">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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
