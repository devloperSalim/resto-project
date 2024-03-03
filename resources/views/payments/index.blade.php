<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            position: relative;
        }

        .dashboard-title {
            font-size: 2.5rem;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .return-home-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #4a5568;
            transition: color 0.3s;
        }

        .return-home-icon:hover {
            color: #1a202c;
        }

        .show-all-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #4a90e2;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .show-all-btn:hover {
            background-color: #357bd8;
        }

        .current-date {
            font-size: 1.2rem;
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }

        .table-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        .table-card:hover {
            transform: translateY(-5px);
        }

        .table-info {
            padding: 20px;
            position: relative;
        }

        .table-name {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }

        .table-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f7f7f7;
        }

        .chair-icon {
            font-size: 6rem;
            /* Adjust size of chair icon */
            color: #6cb2eb;
            /* Change color of chair icon */
            transition: color 0.3s;
            cursor: pointer;
        }

        .chair-icon:hover {
            color: #4f90c7;
            /* Change hover color of chair icon */
        }

        .edit-icon {
            font-size: 1.5rem;
            /* Keep edit icon small */
            color: #333;
            transition: color 0.3s;
            cursor: pointer;
        }

        .edit-icon:hover {
            color: #111;
        }

        .nav-pills {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            margin-bottom: 20px;
        }

        .nav-item {
            margin-right: 10px;
        }

        .nav-link {
            background-color: #4a90e2;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: #357bd8;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .menu-image {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .menu-details {
            padding: 20px;
        }

        .menu-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .menu-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .menu-actions a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .menu-actions a:hover {
            color: #111;
        }

        .menu-actions .form-checkbox {
            margin-right: 5px;
        }
        /* Hide all tab contents */
        .tab-content {
            display: none;
        }

        /* Show active tab content */
        .tab-content:target {
            display: block;
        }

    </style>
</head>

<body>
    <a href="#" class="return-home-icon"><i class="fas fa-arrow-left"></i></a>
    <div class="container">
        <h1 class="dashboard-title">Dashboard</h1>
        <a href="#" class="show-all-btn">Show All</a>
        <p class="current-date">Current Date and Time: {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</p>
        <form action="{{ route('sales.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($tables as $table)
                    <div class="table-card bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="table-info p-6">
                            <h2 class="table-name">{{ $table->name }}</h2>
                            <i class="fas fa-chair chair-icon mx-auto"></i> <!-- Adjusted size of chair icon -->
                        </div>
                        <div class="table-actions bg-gray-100 px-6 py-3 flex justify-between items-center">
                            <input type="checkbox" id="{{ $table->id }}" name="table_id[]" value="{{ $table->id }}"
                                class="form-checkbox h-5 w-5 text-indigo-600">
                            <a href="#" class="edit-icon"><i class="fas fa-edit"></i></a>
                            <!-- Keep edit icon small -->
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container flex flex-col items-center justify-center">
                <ul id="pills-tabs" role="tablist" class="flex mb-8">
                    @foreach($categories as $category)
                    <li>
                        <a href="#{{ $category->slug }}"
                            id="{{ $category->slug }}-tab"
                            role="tab"
                            aria-controls="{{ $category->slug }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            class="block py-3 px-6 bg-gray-200 text-gray-700 font-semibold rounded-lg transition duration-300 hover:bg-gray-300 hover:text-gray-900"
                        >
                            {{ $category->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div>
                    @foreach($categories as $category)
                    <div id="{{ $category->slug }}" class="tab-content mb-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($category->menus as $menu)
                            <div class="table-actions bg-white p-4 flex flex-col justify-between items-center rounded-lg shadow-md">
                                <input type="checkbox" id="{{ $menu->id }}" name="menu_id[]" value="{{ $menu->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                                <img src="{{ asset('storage/' . $menu->image) }}" class="w-48 h-48 object-cover rounded-lg mb-4" alt="Menu Image">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $menu->title }}</h2>
                                <h3 class="text-xl font-semibold text-gray-800">{{ $menu->price }}:HD</h3>
                                <a href="{{ route('menus.edit',$menu->slug) }}" class="edit-icon text-gray-600 hover:text-gray-800 mt-2"><i class="fas fa-edit"></i></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            </form>
            </div>



        {{--  <script>
            function showTabContent(tabId) {
                // Hide all tab contents
                var tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(function(content) {
                    content.classList.remove('active');
                });

                // Show the selected tab content
                var selectedTabContent = document.getElementById(tabId);
                if (selectedTabContent) {
                    selectedTabContent.classList.add('active');
                }
            }
        </script>  --}}

</body>

</html>
