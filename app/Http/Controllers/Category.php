<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = ModelsCategory::latest()->get();
        $requestCategory = ModelsCategory::where('status', false)->get();
        return view('admin.category', compact('category', 'requestCategory')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        ModelsCategory::create([
            'name' => $request->name,
            'status' => true
        ]);


        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = ModelsCategory::findOrFail($id);

        $category->update([
            'status' => true
        ]);

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = ModelsCategory::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
