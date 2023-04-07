<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:medicine-list|medicine-create|medicine-edit|medicine-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:medicine-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:medicine-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:medicine-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all medicines
        $medicines = Medicine::all();

        // return view with medicines
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $this->validate($request, [
            'code' => 'required|unique:medicines',
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'unit' => 'required',
            'group' => 'nullable',
            'packaging' => 'nullable',
            'price' => 'required:numeric',
            'quantity' => 'required:numeric',
        ]);

        

        try {
            Medicine::create([
                'code' => $request->code,
                'name' => $request->name,
                'brand' => $request->brand,
                'type' => $request->type,
                'unit' => $request->unit,
                'group' => $request->group,
                'packaging' => $request->packaging,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);

            return redirect()->route('medicines.index')->with('success', 'Medicine created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medicine::find($id);

        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicine = Medicine::find($id);
        

        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medicine = Medicine::find($id);

        $this->validate($request, [
            'code' => 'required|unique:medicines',
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'unit' => 'required',
            'group' => 'nullable',
            'packaging' => 'nullable',
            'price' => 'required:numeric',
            'quantity' => 'required:numeric',
        ]);

        try {
            $medicine->update([
                'code' => $request->code,
                'name' => $request->name,
                'brand' => $request->brand,
                'type' => $request->type,
                'unit' => $request->unit,
                'group' => $request->group,
                'packaging' => $request->packaging,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);

            return redirect()->route('medicines.index')->with('success', 'Medicine created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medicine::find($id);

        try {
            $medicine->delete();

            return redirect()->route('medicines.index')
                ->with('success', 'medicine deleted successfully');
        } catch (\Exception $e) {
            dd($e);

            return redirect()->back()
                ->with('error', 'medicine deleted failed');
        }
    }
}
