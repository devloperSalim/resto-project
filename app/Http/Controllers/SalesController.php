<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|array',
            'menu_id' => 'required|array',
            'quantity' => 'required|numeric',
            'total_price' => 'required|numeric',
            'total_received' => 'required|numeric',
            'change' => 'required|numeric',
            'payment_type' => 'required',
            'payment_status' => 'required',
        ]);

        // dd($request->all());
        $sale= new Sales();
        $sale->servant_id = $request->servant_id;
        $sale->quantity = $request->servant_id;
        $sale->total_price = $request->total_price;
        $sale->total_received = $request->total_received;
        $sale->change = $request->change;
        $sale->payment_type = $request->payment_type;
        $sale->payment_status = $request->payment_status;
        $sale->save();
        $sale->menus()->sync($request->menu_id);
        $sale->tables()->sync($request->table_id);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
