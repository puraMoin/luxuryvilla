<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierPaymentPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierPaymentPoliciesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Supplier Payment Policies';
        $supplierpaymentpolicy = SupplierPaymentPolicy::paginate(20);
        return view('supplierpaymentpolicies.index',compact('pageTitle','supplierpaymentpolicy'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        return view('supplierpaymentpolicies.create', compact('pageTitle','userId','supplier'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'payment_policy'=> 'required|integer',
            'payment_days'=> 'required|string',
            'payment_percent'=> 'required|string',
            'is_before_service'=> 'required|boolean',
            'active'=> 'required|boolean',
            'created_by'=> 'required|integer',
            'modified_by'=> 'required|integer',
        ]);

        $supplierpaymentpolicy = SupplierPaymentPolicy::create([
            'supplier_id' => $request->input('supplier_id'),
            'payment_policy' => $request->input('payment_policy'),
            'payment_days' => $request->input('payment_days'),
            'payment_percent' => $request->input('payment_percent'),
            'is_before_service' => $request->input('is_before_service'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('supplierpaymentpolicies.index');
    }


    public function show($id)
    {
        $supplierpaymentpolicy = SupplierPaymentPolicy::findOrFail($id);
        $pageTitle = 'View';
        return view('supplierpaymentpolicies.show', compact('supplierpaymentpolicy', 'pageTitle'));
    }


    public function edit($id)
    {
        $supplierpaymentpolicy = SupplierPaymentPolicy::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('supplierpaymentpolicies.edit', compact('pageTitle', 'supplierpaymentpolicy', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $supplierpaymentpolicy = SupplierPaymentPolicy::findOrFail($id);
        $supplierpaymentpolicy->update([
            'supplier_id' => $request->input('supplier_id'),
            'payment_policy' => $request->input('payment_policy'),
            'payment_days' => $request->input('payment_days'),
            'payment_percent' => $request->input('payment_percent'),
            'is_before_service' => $request->input('is_before_service'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
            return redirect()->route('supplierpaymentpolicies.index');
    }

    public function destroy($id)
    {
        //
    }
}
