<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\SupplierContact;

class SupplierContactsController extends Controller
{

    public function index()
    {
        $pageTitle = 'Supplier Contacts';
        $suppliercontact = SupplierContact::paginate(20);
        return view('suppliercontacts.index',compact('pageTitle','suppliercontact'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        return view('suppliercontacts.create', compact('pageTitle','userId','supplier'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'name'=> 'required|string',
            'designation'=> 'required|string',
            'email'=> 'required|string',
            'mobile'=> 'required|string',
            'active'=> 'required|boolean',
            'created_by' => 'nullable|integer',
            'modified_by' => 'nullable|integer',
        ]);

        $suppliercontact = SupplierContact::create([
            'supplier_id' => $request->input('supplier_id'),
            'name' => $request->input('name'),
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
        $suppliercontact = SupplierContact::findOrFail($id);
        $pageTitle = 'View';
        return view('suppliercontacts.show', compact('suppliercontact', 'pageTitle'));
    }


    public function edit($id)
    {
        $suppliercontact = SupplierContact::findOrFail($id);
        $userId = Auth::id();

        $supplier = Supplier::where('id', $suppliercontact->supplier_id)->first();
        $suppliers = Supplier::where('id', '!=', $supplier->id)->get();

        $pageTitle = "Edit";
        return view('suppliercontacts.edit', compact('pageTitle', 'suppliercontact','supplier','suppliers', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $suppliercontact = SupplierContact::findOrFail($id);
        $suppliercontact->update([
            'supplier_id' => $request->input('supplier_id'),
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('suppliercontacts.index');
    }


    public function destroy($id)
    {
        //
    }
}
