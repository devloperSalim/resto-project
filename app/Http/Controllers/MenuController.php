<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\MenuReuest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
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
        $menus =Menu::paginate(3);
        return view('managments.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('managments.menus.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuReuest $request)
    {
        $formField=$request->validated();
        // dd($formField);
        if ($request->hasFile('image')) {
            $formField['image'] = $request->file('image')->store('images/menus', 'public');
        }
        $title = $request->input('title'); // Retrieve title from request
        $formField['slug'] = Str::slug($title); // Generate slug from the title

        Menu::create($formField);
        return to_route('menus.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories=Category::all();
        return view('managments.menus.edit',compact('categories','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */

public function update(Request $request, Menu $menu)
{
    // $formField = $request->validated();

    $formField = $request->validate([
        'title' => 'required|min:5|unique:menus,title,'.$menu->id,
        'description' => 'required|min:5',
        'image' => 'image|mimes:png,jpg,jpeg|max:10250',
        'price' => 'required|numeric',
        'category_id' => 'required|numeric'
    ]);
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/menus', 'public');
        // Delete old image if it exists
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }
        $formField['image'] = $imagePath;
    }

    $title = $request->title;
    $formField['slug'] = Str::slug($title);

    $menu->fill($formField)->save();

    return redirect()->route('menus.index');
    // ->with('success', 'Menu item updated successfully.')
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return to_route('menus.index');
    }
}
