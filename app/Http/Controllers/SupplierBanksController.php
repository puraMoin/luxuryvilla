<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\Currency;
use App\Models\SupplierBank;

class SupplierBanksController extends Controller
{

    public function index()
    {
        $pageTitle = 'Supplier Banks';
        $supplierbank = SupplierBank::paginate(20);
        return view('supplierbanks.index', compact('pageTitle', 'supplierbank'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        $currency = Currency::all();
        return view('supplierbanks.create', compact('pageTitle', 'userId', 'supplier', 'currency'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'name' => 'required|string',
            'branch' => 'nullable|string',
            'location' => 'required|string',
            'address' => 'required|string',
            'contact_no_1' => 'required|string',
            'contact_no_2' => 'nullable|string',
            'fax' => 'nullable|string',
            'email' => 'required|email',
            'account_no' => 'nullable|string',
            'account_type' => 'nullable|string',
            'swift_code' => 'nullable|string',
            'currency_id' => 'required|integer',
            'ifsc_code' => 'nullable|string',
            'iban_no' => 'nullable|string',
            'active' => 'required|boolean',
            'created_by' => 'nullable|integer',
            'modified_by' => 'nullable|integer'
        ]);

        $supplierbank = SupplierBank::create([
            'supplier_id' => $request->input('supplier_id'),
            'name' => $request->input('name'),
            'branch' => $request->input('branch'),
            'location' => $request->input('location'),
            'address' => $request->input('address'),
            'contact_no_1' => $request->input('contact_no_1'),
            'contact_no_2' => $request->input('contact_no_2'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'account_no' => $request->input('account_no'),
            'account_type' => $request->input('account_type'),
            'swift_code' => $request->input('swift_code'),
            'currency_id' => $request->input('currency_id'),
            'ifsc_code' => $request->input('ifsc_code'),
            'iban_no' => $request->input('iban_no'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('supplierbanks.index');
    }


    public function show($id)
    {
        $supplierbank = SupplierBank::findOrFail($id);
        $pageTitle = 'View';
        return view('supplierbanks.show', compact('supplierbank', 'pageTitle'));
    }


    public function edit($id)
    {
        $supplierbank = SupplierBank::findOrFail($id);
        $userId = Auth::id();

        $supplier = Supplier::where('id', $supplierbank->supplier_id)->first();
        $suppliers = Supplier::where('id', '!=', $supplier->id)->get();

        $currency = Currency::where('id', $supplierbank->currency_id)->first();
        $currencies = Currency::where('id', '!=', $currency->id)->get();

        $pageTitle = "Edit";
        return view('supplierbanks.edit', compact('pageTitle', 'userId', 'supplierbank', 'supplier', 'suppliers', 'currency', 'currencies'));
    }


    public function update(Request $request, $id)
    {
        $supplierbank = SupplierBank::findOrFail($id);
        $supplierbank->update([
            'supplier_id' => $request->input('supplier_id'),
            'name' => $request->input('name'),
            'branch' => $request->input('branch'),
            'location' => $request->input('location'),
            'address' => $request->input('address'),
            'contact_no_1' => $request->input('contact_no_1'),
            'contact_no_2' => $request->input('contact_no_2'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
            'account_no' => $request->input('account_no'),
            'account_type' => $request->input('account_type'),
            'swift_code' => $request->input('swift_code'),
            'currency_id' => $request->input('currency_id'),
            'ifsc_code' => $request->input('ifsc_code'),
            'iban_no' => $request->input('iban_no'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('supplierbanks.index');
    }


    public function destroy($id)
    {
        //
    }
}
