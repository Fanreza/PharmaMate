<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all sales

        $sales = Sale::all();

        // return view with sales

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'receipt_number' => 'required:number|unique:sales',
            'date_sale' => 'required',
            'quantity_sale' => 'required:number',
            'user_id' => 'required:exists:users,id',
        ]);

        try {
            Sale::create([
                'receipt_number' => $request->receipt_number,
                'date_sale' => $request->date_sale,
                'quantity_sale' => $request->quantity_sale,
                'user_id' => $request->user_id,
            ]);

            return redirect()->route('sales.index')->with('success', 'Sale created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::find($id);

        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = Sale::find($id);

        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'receipt_number' => 'required',
            'date_sale' => 'required',
            'quantity_sale' => 'required:number',
            'user_id' => 'required:exists:users,id',
        ]);

        try {
            $sale = Sale::find($id);

            $sale->update([
                'receipt_number' => $request->receipt_number,
                'date_sale' => $request->date_sale,
                'quantity_sale' => $request->quantity_sale,
                'user_id' => $request->user_id,
            ]);

            return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sale = Sale::find($id);

            $sale->delete();

            return redirect()->route('sales.index')->with('success', 'Sale deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
