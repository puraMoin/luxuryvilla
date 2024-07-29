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
        $supplierstype = SupplierType::all();
        $pageTitle = 'Supplier List';
        return view('supplierstype.index', compact('supplierstype', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('supplierstype.create', compact('pageTitle'));
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

        return redirect()->route('supplierstype.index')->with('success', 'supplierstype created!');
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

        return view('supplierstype.show', compact('supplierstype', 'pageTitle'));
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

        return view('supplierstype.edit', compact('supplierstype', 'pageTitle'));
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

        return redirect()->route('supplierstype.index')->with('success', 'supplierstype updated');
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
