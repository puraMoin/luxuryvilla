<?php

namespace App\Http\Controllers;

use App\Models\SupplierType;
use Illuminate\Http\Request;

class SupplierTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplierstype = SupplierType::all(); // Change to plural form
        $pageTitle = 'Supplier List';
        return view('suppliertypes.index', compact('supplierstype', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('suppliertypes.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        SupplierType::create($request->all());

        return redirect()->route('suppliertypes.index')->with('success', 'Supplier type created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplierstype = SupplierType::findOrFail($id);
        $pageTitle = 'View';

        return view('suppliertypes.show', compact('supplierstype', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplierstype = SupplierType::findOrFail($id);
        $pageTitle = 'Edit';

        return view('suppliertypes.edit', compact('supplierstype', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        $supplierstype = SupplierType::findOrFail($id);
        $supplierstype->update($validatedData);

        return redirect()->route('suppliertypes.index')->with('success', 'Supplier type updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
