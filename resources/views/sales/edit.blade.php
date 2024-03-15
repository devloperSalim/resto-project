<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Chef Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #444;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
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

        .table-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            margin-bottom: 20px;
            text-align: center;
        }

        .table-card:hover {
            transform: translateY(-5px);
        }

        .table-info {
            padding: 20px;
        }

        .table-name {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .table-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            background-color: #f7f7f7;
        }

        .chair-icon {
            font-size: 3rem;
            color: #6cb2eb;
            transition: color 0.3s;
            cursor: pointer;
        }

        .chair-icon:hover {
            color: #4f90c7;
        }

        .restaurant-info {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }

        /* Form Styling */
        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        button {
            background-color: #6cb2eb;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4f90c7;
        }
    </style>
</head>

<body>
    <a href="{{ route('payments') }}" class="return-home-link"><i class="fas fa-arrow-left"></i> Back to Payments</a>
    <div class="container">
        <form action="{{ route('sales.update',$sales->id) }}" method="post">
            @csrf
            @method('put')

            <!-- Table selection section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($tables as $table)
                    <div class="table-card rounded-lg shadow-md">
                        <div class="table-info p-6">
                            <h2 class="table-name">{{ $table->name }}</h2>
                            <i class="fas fa-chair chair-icon"></i>
                        </div>
                        <div class="table-actions bg-gray-100 px-6 py-3">
                            <input type="checkbox" id="{{ $table->id }}" name="table_id[]" value="{{ $table->id }}" checked class="form-checkbox h-5 w-5 text-indigo-600">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Menu items selection section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
                @foreach($menus as $menu)
                    <div class="table-card rounded-lg shadow-md">
                        <div class="table-info p-6">
                            <img src="{{ asset('storage/' . $menu->image) }}" class="w-full h-auto mb-4" alt="Menu Image">
                            <h2 class="table-name">{{ $menu->title }}</h2>
                            <h3 class="restaurant-info">{{ $menu->price }} HD</h3>
                        </div>
                        <div class="table-actions bg-gray-100 px-6 py-3">
                            <input type="checkbox" id="{{ $menu->id }}" name="menu_id[]" value="{{ $menu->id }}" checked class="form-checkbox h-5 w-5 text-indigo-600">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Other input fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                <div>
                    <label for="servant_id">Select Servant</label>
                    <select name="servant_id" id="servant_id">
                        @foreach ($servants as $servant)
                            <option value="{{ $servant->id }}" {{ $servant->id === $sales->servant_id ? 'selected' : '' }}>{{ $servant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" id="quantity" value="{{ old('quantity',$sales->quantity) }}">
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="total_price" class="block text-gray-700">Total Price</label>
                <input type="text" name="total_price" id="total_price" value="{{ old('total_price',$sales->total_price) }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="total_received" class="block text-gray-700">Total Received</label>
                <input type="text" name="total_received" id="total_received" value="{{ old('total_received',$sales->total_received) }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <label for="change" class="block text-gray-700">Change</label>
                <input type="text" name="change" id="change" value="{{ old('change',$sales->change) }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <select name="payment_type" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
                    <option value="" disabled selected>Payment Type</option>
                    <option {{ $sales->payment_type === 'cash' ? 'selected' : '' }}>Cash</option>
                    <option {{ $sales->payment_type === 'card' ? 'selected' : '' }}>Credit Card</option>
                </select>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 mx-auto p-4">
                <select name="payment_status" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400">
                    <option value="" disabled selected>Payment Status</option>
                    <option {{ $sales->payment_status === 'paid'?'selected':''}}>Paid</option>
                    <option {{ $sales->payment_status === 'unpaid'?'selected':''}}>Unpaid</option>
                </select>
            </div>

            <!-- Submit button -->
            <div class="text-center mt-8">
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
</body>

</html>
