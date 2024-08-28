<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\SupplierExtranet;

class SupplierExtranetsController extends Controller
{

    public function index()
    {
        $pageTitle = 'Supplier Extranets';
        $supplierextranet = SupplierExtranet::paginate(20);
        return view('supplierextranets.index', compact('pageTitle', 'supplierextranet'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        return view('supplierextranets.create', compact('pageTitle', 'userId', 'supplier'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'branch' => 'nullable|string',
            'name' => 'required|string',
            'department' => 'nullable|string',
            'designation' => 'required|string',
            'email' => 'required|string',
            'mobile' => 'required|string',
            'active' => 'required|boolean',
            'created_by' => 'nullable|integer',
            'modified_by' => 'nullable|integer',
        ]);

        $suppliercontact = SupplierExtranet::create([
            'supplier_id' => $request->input('supplier_id'),
            'branch' => $request->input('branch'),
            'name' => $request->input('name'),
            'department' => $request->input('department'),
            'designation' => $request->input('designation'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('suppliercontacts.index');
    }


    public function show($id)
    {
        $supplierextranet = SupplierExtranet::findOrFail($id);
        $pageTitle = 'View';
        return view('supplierextranets.show', compact('supplierextranet', 'pageTitle'));
    }


    public function edit($id)
    {
        $supplierextranet = SupplierExtranet::findOrFail($id);
        $userId = Auth::id();

        $supplier = Supplier::where('id', $supplierextranet->supplier_id)->first();
        $suppliers = Supplier::where('id', '!=', $supplier->id)->get();

        $pageTitle = "Edit";
        return view('supplierextranets.edit', compact('pageTitle', 'userId', 'supplierextranet', 'supplier', 'suppliers'));
    }


    public function update(Request $request, $id)
    {
        $supplierextranet = SupplierExtranet::findOrFail($id);
        $supplierextranet->update([
            'supplier_id' => $request->input('supplier_id'),
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('supplierextranets.index');
    }


    public function destroy($id)
    {
        //
    }
}
