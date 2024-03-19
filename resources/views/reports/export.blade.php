<h3 >Start Date: {{ $startDate }}</h3>
    <h3 >End Date: {{ $endDate }}</h3>

    <!-- Results Table -->
    <div>
        <table >
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
                    <td >{{ $key + 1 }}</td>
                    <td >
                        @foreach ($sale->menus()->where('sales_id', $sale->id)->get() as $menu)
                            <div >
                                <div >{{ $menu->title }}</div>
                                <div >{{ $menu->price }} HD</div>
                            </div>
                        @endforeach
                    </td>

                    <td >
                        @foreach ($sale->tables()->where('sales_id', $sale->id)->get() as $table)
                            <div >
                                <span>{{ $table->name }}</span>
                            </div>
                        @endforeach
                    </td>

                    <td >
                        <span >

                            {{ $sale->servant->name }}
                        </span>
                    </td>
                    <td >{{ $sale->quantity }}</td>
                    <td >{{ $sale->payment_type }}</td>
                    <td >{{ $sale->payment_status }}</td>
                    <td >{{ $sale->total_price }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        Rapport de {{ $from }} a {{ $to }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <span>Total : {{ $total }} DH</span>
        </div>
    </div>
