<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Report</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: #2d3748;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        .table th {
            background-color: #4a5568;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }
        .table td {
            color: #2d3748;
        }
        .back-button {
            background-color: #1a202c;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #2d3748;
        }
        .date-header {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .table-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #4a5568;
            color: #ffffff;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
        }
        /* Button Styles */
        .export-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .export-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="flex items-center justify-between mb-4">
        <button onclick="window.history.back()" class="back-button flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back
        </button>
        <h1 class="text-3xl font-bold">Restaurant Report</h1>
    </div>

    <!-- Date Range Form -->
    <form action="{{ route('reports.generate') }}" method="POST" class="mb-8">
        @csrf
        <div class="flex space-x-4 mb-4">
            <div class="w-1/2">
                <label for="from" class="block text-gray-600">From:</label>
                <input type="date" id="from" name="from" class="form-input">
            </div>
            <div class="w-1/2">
                <label for="to" class="block text-gray-600">To:</label>
                <input type="date" id="to" name="to" class="form-input">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Search</button>
    </form>

    {{-- export fichier exel --}}
    <form action="{{ route('reports.export') }}" method="POST" class="mb-8">
        @csrf
        <div class="flex space-x-4 mb-4">
            <div class="w-1/2">
                <input type="hidden" id="from"  name="from" class="form-input">
            </div>
            <div class="w-1/2">
                <input type="hidden" id="to"  name="to" class="form-input">
            </div>
        </div>
        <button class="export-button ml-4">Export to Excel</button>
    </form>


    <!-- Start and End Dates -->
    @isset($total)
    <h3 class="date-header">Start Date: {{ $startDate }}</h3>
    <h3 class="date-header">End Date: {{ $endDate }}</h3>

    <!-- Results Table -->
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Menu</th>
                    <th>Tables</th>
                    <th>Servant</th>
                    <th>Quantity</th>
                    <th>Type of Payment</th>
                    <th>Status of payment</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $key => $sale)
                <tr>
                    <td class="border border-gray-200 px-4 py-2">{{ $key + 1 }}</td>
                    <td class="border border-gray-200 px-4 py-2">
                        @foreach ($sale->menus()->where('sales_id', $sale->id)->get() as $menu)
                            <div class="flex flex-col items-center">
                                @if ($menu->image)
                                    <img src="{{ asset('storage/' . $menu->image) }}" class="w-10 h-10 object-cover rounded-full" alt="Menu Image">
                                @else
                                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                                <div class="text-gray-800 font-semibold">{{ $menu->title }}</div>
                                <div class="text-gray-600">{{ $menu->price }} HD</div>
                            </div>
                        @endforeach
                    </td>

                    <td class="border border-gray-200 px-4 py-2">
                        @foreach ($sale->tables()->where('sales_id', $sale->id)->get() as $table)
                            <div class="flex items-center">
                                <i class="fas fa-chair mr-2 text-gray-500"></i>
                                <span>{{ $table->name }}</span>
                            </div>
                        @endforeach
                    </td>

                    <td class="border border-gray-200 px-4 py-2">
                        <span class="flex items-center">
                            <i class="fas fa-user mr-1 text-gray-500"></i>
                            {{ $sale->servant->name }}
                        </span>
                    </td>
                    <td class="border border-gray-200 px-4 py-2">{{ $sale->quantity }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $sale->payment_type }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $sale->payment_status }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ $sale->total_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right mt-4">
            <span class="text-lg font-bold text-red-600">Total : {{ $total }} DH</span>
        </div>
    </div>
    @endisset
</div>

</body>
</html>
