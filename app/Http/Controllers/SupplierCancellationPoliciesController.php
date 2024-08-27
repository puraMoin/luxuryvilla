<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\SupplierCancellationPolicy;

class SupplierCancellationPoliciesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Supplier Access to Companies';
        $suppliercancellationpolicy = SupplierCancellationPolicy::paginate(20);
        return view('suppliercancelationpolicies.index',compact('pageTitle','suppliercancellationpolicy'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        return view('suppliercancelationpolicies.create', compact('pageTitle','userId','supplier'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'cancelation_policy'=> 'required|integer',
            'payment_days'=> 'required|string',
            'payment_percent'=> 'required|string',
            'active'=> 'required|boolean',
            'created_by' => 'nullable|integer',
            'modified_by' => 'nullable integer',
        ]);

        $suppliercancellationpolicy = SupplierCancellationPolicy::create([
            'supplier_id' => $request->input('supplier_id'),
            'cancelation_policy' => $request->input('cancelation_policy'),
            'payment_days' => $request->input('payment_days'),
            'payment_percent' => $request->input('payment_percent'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('suppliercancelationpolicies.index');
    }


    public function show($id)
    {
        $suppliercancellationpolicy = SupplierCancellationPolicy::findOrFail($id);
        $pageTitle = 'View';
        return view('suppliercancelationpolicies.show', compact('suppliercancellationpolicy', 'pageTitle'));
    }


    public function edit($id)
    {
        $suppliercancellationpolicy = SupplierCancellationPolicy::findOrFail($id);
        $userId = Auth::id();

        $supplier = Supplier::where('id', $suppliercancellationpolicy->supplier_id)->first();
        $suppliers = Supplier::where('id', '!=', $supplier->id)->get();

        $pageTitle = "Edit";
        return view('suppliercancelationpolicies.edit', compact('pageTitle', 'suppliercancellationpolicy','supplier','suppliers', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $suppliercancellationpolicy = SupplierCancellationPolicy::findOrFail($id);
        $suppliercancellationpolicy->update([
            'supplier_id' => $request->input('supplier_id'),
            'cancelation_policy' => $request->input('cancelation_policy'),
            'payment_days' => $request->input('payment_days'),
            'payment_percent' => $request->input('payment_percent'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
            return redirect()->route('suppliercancelationpolicies.index');
    }

    public function destroy($id)
    {
        //
    }
}
