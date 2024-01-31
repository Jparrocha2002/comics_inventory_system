<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\comics;
use App\Models\User;


class reviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Reviews::orderBy('created_at', 'DESC')->get();
  
        return view('reviews.index', compact('reviews'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    
    {
        $comics = comics::all();
        
        $users = User::all();

        return view('reviews.create', compact('comics','users'));
    }
      
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reviews::create($request->all());
 
        return redirect()->route('reviews')->with('success', 'Reviews added successfully');
    }
  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviews = Reviews::findOrFail($id);
  
        return view('reviews.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reviews = Reviews::findOrFail($id);

        $comics = comics::all();
        
        $users = User::all();
  
        return view('reviews.edit', compact('reviews','comics','users'));
    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reviews = Reviews::findOrFail($id);
  
        $reviews->update($request->all());
  
        return redirect()->route('reviews')->with('success', 'Reviews updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reviews = Reviews::findOrFail($id);
  
        $reviews->delete();
  
        return redirect()->route('reviews')->with('success', 'Review deleted successfully');
    }
}
