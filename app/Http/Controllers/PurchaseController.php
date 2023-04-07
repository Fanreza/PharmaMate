<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:purchase-list|purchase-create|purchase-edit|purchase-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:purchase-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:purchase-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:purchase-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  get all purchases
        $purchases = Purchase::all();

        //  return view with purchases
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distributors = Distributor::all();

        return view('purchases.create', compact('distributors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'distributor_id' => 'required:exists:distributors,id',
            'user_id' => 'required:exists:users,id',
            'receipt_number' => 'required',
            'date_buy' => 'required:datetime',
            'quantity_buy' => 'required:numeric',
        ]);

        try {
            $purchase = Purchase::create([
                'distributor_id' => $request->distributor_id,
                'user_id' => $request->user_id,
                'receipt_number' => $request->receipt_number,
                'date_buy' => $request->date_buy,
                'quantity_buy' => $request->quantity_buy,
            ]);

            return redirect()->route('purchases.index')->with('success', 'Pembelian berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Pembelian gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchase::findOrFail($id);

        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $purchase = Purchase::findOrFail($id);
        $distributors = Distributor::all();

        return view('purchases.edit', compact('purchase', 'distributors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'distributor_id' => 'required:exists:distributors,id',
            'user_id' => 'required:exists:users,id',
            'receipt_number' => 'required',
            'date_buy' => 'required:datetime',
            'quantity_buy' => 'required:numeric',
        ]);

        try {
            $purchase = Purchase::findOrFail($id);
            $purchase->update([
                'distributor_id' => $request->distributor_id,
                'user_id' => $request->user_id,
                'receipt_number' => $request->receipt_number,
                'date_buy' => $request->date_buy,
                'quantity_buy' => $request->quantity_buy,
            ]);

            return redirect()->route('purchases.index')->with('success', 'Pembelian berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Pembelian gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $purchase = Purchase::findOrFail($id);
            $purchase->delete();

            return redirect()->route('purchases.index')->with('success', 'Pembelian berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Pembelian gagal dihapus');
        }
    }
}
