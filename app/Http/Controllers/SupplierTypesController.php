<?php

namespace App\Http\Controllers;

use App\Models\SupplierType;
use Illuminate\Http\Request;

class SupplierTypesController extends Controller
{

    public function index()
    {
        $supplierstype = SupplierType::all();
        $pageTitle = 'Supplier List';
        $supplierstype_pag = SupplierType::paginate(20);
        return view('suppliertypes.index', compact('supplierstype', 'pageTitle','supplierstype_pag'));
    }


    public function create()
    {
        $pageTitle = 'Add';
        return view('suppliertypes.create', compact('pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        SupplierType::create($request->all());
        $supplierstype = SupplierType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => now(),
            'modified_by' => now(),
        ]);

        return redirect()->route('suppliertypes.index')->with('success', 'Supplier type created!');
    }


    public function show($id)
    {
        $supplierstype = SupplierType::findOrFail($id);
        $pageTitle = 'View';

        return view('suppliertypes.show', compact('supplierstype', 'pageTitle'));
    }


    public function edit($id)
    {
        $supplierstype = SupplierType::findOrFail($id);
        $pageTitle = 'Edit';

        return view('suppliertypes.edit', compact('supplierstype', 'pageTitle'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        $supplierstype = SupplierType::findOrFail($id);
        $supplierstype->update($validatedData);

        return redirect()->route('suppliertypes.index');
    }

}
