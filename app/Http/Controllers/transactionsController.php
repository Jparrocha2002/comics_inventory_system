<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\User;
use App\Models\comics;

class transactionsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::orderBy('created_at', 'DESC')->get();
  
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comics = comics::all();
        
        $users = User::all();

        return view('transactions.create', compact('comics', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create the transaction
        $transactions = Transactions::create($request->all());

        // Update the quantity of comics if it's a purchase
        if ($request->transaction_type === 'Borrow') 
        {
            $comics = comics::where('title', $request->comic_name)->firstOrFail();
            $comics->update([
                'available' => $comics->available - $request->quantity
            ]);
        } 

        if ($request->transaction_type === 'Return') {

            $comics = comics::where('title', $request->comic_name)->firstOrFail();
            $comics->update([
                'available' => $comics->available + $request->quantity
            ]);
        }
        
        
        return redirect()->route('transactions')->with('success', 'Transaction created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transactions = Transactions::findOrFail($id);

        return view('transactions.show', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transactions = Transactions::findOrFail($id);

        $comics = comics::all();
        
        $users = User::all();

        return view('transactions.edit', compact('transactions','comics','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transactions = Transactions::findOrFail($id);

        $transactions->update($request->all());

        if ($request->transaction_type === 'Borrow') 
        {
            $comics = comics::where('title', $request->comic_name)->firstOrFail();
            $comics->update([
                'available' => $comics->available - $request->quantity
            ]);
        } 

        if ($request->transaction_type === 'Return') {

            $comics = comics::where('title', $request->comic_name)->firstOrFail();
            $comics->update([
                'available' => $comics->available + $request->quantity
            ]);
        }

        return redirect()->route('transactions')->with('success', 'Transaction updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transactions = Transactions::findOrFail($id);
  
        $transactions->delete();
  
        return redirect()->route('transactions')->with('success', 'Transactions deleted successfully');
    }
}
