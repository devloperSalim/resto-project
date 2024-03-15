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

        .return-home-link {
            display: inline-block;
            color: #6cb2eb;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .return-home-link:hover {
            color: #4f90c7;
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

        .sale-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-bottom: 20px;
    width: 250px; /* Adjust the width as needed */
}

.sale-details {
    width: 100%;
}

.title {
    font-size: 20px;
    margin-bottom: 5px;
    text-align: center;
}

.menu-image {
    border-radius: 50%;
    margin-right: 5px;
}

.menu-info {
    display: flex;
    align-items: center;
}

.menu-title {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 3px;
}

.menu-price {
    font-size: 12px;
    color: #888;
}

.sale-actions {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    margin-top: 5px;
}

.action-btn {
    padding: 5px 10px;
    margin-left: 5px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 12px;
    cursor: pointer;
}

.modify-btn {
    background-color: #ffc107;
}

.print-btn {
    background-color: #28a745;
}
.restaurant-info {
    font-size: 14px;
    color: #555;
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
    <a href="{{ route('menus.index') }}" class="return-home-link"><i class="fas fa-arrow-left"></i> Back to </a>
    <div class="container">
        <h1 class="dashboard-title">Dashboard</h1>
        <a href="#" class="show-all-btn">Show All</a>
        <p class="current-date">Current Date and Time: {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</p>
        <form action="{{ route('sales.store') }}" method="post">
            @csrf

            <!-- Table selection section -->
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
                            <a href="{{ route('tables.edit',$table->slug) }}" class="edit-icon"><i class="fas fa-edit"></i></a>
                            <!-- Keep edit icon small -->
                        </div>


                        {{-- fiche --}}
                        <hr>
                        @foreach ($table->sales as $sale)
                            @if ($sale->created_at >= Carbon\Carbon::today())
                                <div class="sale-card" id="{{ $sale->id }}">
                                    <div class="sale-details">
                                        <h2 class="title">Sale Details</h2>
                                        <ul>
                                            @foreach ($sale->menus()->where('sales_id', $sale->id)->get() as $menu)
                                                <li>
                                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->title }}" class="menu-image" width="100" height="100">
                                                    <div class="menu-info">
                                                        <strong class="menu-title">{{ $menu->title }}</strong>
                                                        <span class="menu-price">{{ $menu->price }} HD</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li><strong>Servant:</strong> {{ $sale->servant->name }}</li>
                                            <li><strong>Quantity:</strong> {{ $sale->quantity }}</li>
                                            <li><strong>Total Price:</strong> {{ $sale->total_price }}</li>
                                            <li><strong>Total Received:</strong> {{ $sale->total_received }}</li>
                                            <li><strong>Change:</strong> {{ $sale->change }}</li>
                                            <li><strong>Payment Type:</strong> {{ $sale->payment_type === 'cash' ? 'Cash' : 'Credit Card' }}</li>
                                            <li><strong>Payment Status:</strong> {{ $sale->payment_status }}</li>
                                            <hr>
                                            <li class="restaurant-info">Salim Resto</li>
                                            <li class="restaurant-info">rue de lmdyoriya</li>
                                            <li class="restaurant-info">0123456789</li>

                                        </ul>
                                    </div>
                                    <div class="sale-actions">
                                        <a href="{{ route('sales.edit',$sale->id) }}"  class="action-btn modify-btn">Modify</a>
                                        <button onclick="printContent('{{ $sale->id }}')" class="action-btn print-btn">Print</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                @endforeach
            </div>

            <!-- Category and menu selection section -->
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

            <!-- Other input fields for quantity, total_price, total_received, change, payment_type, and payment_status -->
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="servant_id" class="block text-gray-700">Select Servant</label>
                <select name="servant_id" id="servant_id" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
                    @foreach ($servants as $servant)
                        <option value="{{ $servant->id }}">{{ $servant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="quantity" class="block text-gray-700">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="total_price" class="block text-gray-700">Total Price</label>
                <input type="text" name="total_price" id="total_price" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="total_received" class="block text-gray-700">Total Received</label>
                <input type="text" name="total_received" id="total_received" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="change" class="block text-gray-700">Change</label>
                <input type="text" name="change" id="change" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <select name="payment_type" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
                    <option value="" disabled selected>Payment Type</option>
                    <option value="cash">Cash</option>
                    <option value="card">Credit Card</option>
                </select>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <select name="payment_status" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
                    <option value="" disabled selected>Payment Status</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
            </div>

            <!-- Submit button -->
            <div class="text-center p-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
            </div>
        </form>

            </div>

            <script>
                function printContent(elId) {
                    const pageContent = document.body.innerHTML;
                    const contentToPrint = document.getElementById(elId).innerHTML;
                    const printWindow = window.open('', '_blank');
                    printWindow.document.write('<html><head><title>Print</title>');
                    printWindow.document.write('<style>@media print { img { max-width: 100%; } }</style>'); // Ensure images fit on page
                    printWindow.document.write('</head><body>');
                    printWindow.document.write(contentToPrint);
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();
                    // Wait for images to load before printing
                    printWindow.onload = function() {
                        printWindow.print();
                        printWindow.document.body.innerHTML = pageContent;
                    };
                }
            </script>


</body>

</html>
