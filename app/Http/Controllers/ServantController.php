<?php

namespace App\Http\Controllers;

use App\Http\Requests\SrvantRequest;
use App\Models\Servant;
use Illuminate\Http\Request;

class ServantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $servants = Servant::paginate(2);
        return view('managments.servants.index',compact('servants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managments.servants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SrvantRequest $request)
    {
        $formField = $request->validated();
        Servant::create($formField);
        return redirect()->route('servants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function show(Servant $servant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function edit(Servant $servant)
    {
        return view('managments.servants.edit',compact('servant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function update(SrvantRequest $request, Servant $servant)
    {
        $formField = $request->validated();
        $servant->fill($formField)->save();
        return redirect()->route('servants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servant $servant)
    {
        $servant->delete();
        return redirect()->route('servants.index');
    }
}
