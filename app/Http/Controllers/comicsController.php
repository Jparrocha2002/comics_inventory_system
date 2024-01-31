<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\comics;
use App\Models\category;

 
class comicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = comics::orderBy('created_at', 'DESC')->get();
        $comics = comics::simplePaginate(10);
  
        return view('comics.index', compact('comics'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();

        return view('comics.create', compact('categories'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        comics::create($request->all());
 
        return redirect()->route('comics')->with('success', 'Comics added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comics = comics::findOrFail($id);
  
        return view('comics.show', compact('comics'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comics = comics::findOrFail($id);

        $categories = category::all();
  
        return view('comics.edit', compact('comics','categories'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comics = comics::findOrFail($id);
  
        $comics->update($request->all());
  
        return redirect()->route('comics')->with('success', 'Comics updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comics = comics::findOrFail($id);
  
        $comics->delete();
  
        return redirect()->route('comics')->with('success', 'Comics deleted successfully');
    }
}