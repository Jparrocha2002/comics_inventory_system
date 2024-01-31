<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::orderBy('created_at', 'DESC')->get();
  
        return view('categories.index', compact('categories'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        category::create($request->all());
 
        return redirect()->route('categories')->with('success', 'Category added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = category::findOrFail($id);
  
        return view('categories.show', compact('categories'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = category::findOrFail($id);
  
        return view('categories.edit', compact('categories'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = category::findOrFail($id);
  
        $categories->update($request->all());
  
        return redirect()->route('categories')->with('success', 'Category updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = category::findOrFail($id);
  
        $categories->delete();
  
        return redirect()->route('categories')->with('success', 'Category deleted successfully');
    }
}
