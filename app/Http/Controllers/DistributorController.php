<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all distributors
        $distributors = Distributor::all();

        // return view with distributors
        return view('distributors.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distributors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            Distributor::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            return redirect()->route('distributors.index')->with('success', 'Distributor created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Distributor creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $distributor = Distributor::find($id);

        return view('distributors.show', compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $distributor = Distributor::find($id);

        return view('distributors.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            Distributor::find($id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            return redirect()->route('distributors.index')->with('success', 'Distributor updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Distributor update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Distributor::find($id)->delete();

            return redirect()->route('distributors.index')->with('success', 'Distributor deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Distributor deletion failed');
        }
    }
}
