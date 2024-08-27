<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaster;
use App\Models\Supplier;
use App\Models\SupplierAccessToCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierAccessToCompaniesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Supplier Access to Companies';
        $supplieraccesstocompanies = SupplierAccessToCompany::paginate(20);
        return view('supplieraccesstocompanies.index',compact('pageTitle','supplieraccesstocompanies'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        $companymaster = CompanyMaster::all();
        return view('supplieraccesstocompanies.create', compact('pageTitle','userId','supplier','companymaster'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'company_master_id'=> 'required|integer',
            'is_visible_in_company'=> 'required|boolean',
            'edit'=> 'required|boolean',
            'delete'=> 'required|boolean',
            'access_in_transaction'=> 'required|boolean',
        ]);

        $supplieraccesstocompanies = SupplierAccessToCompany::create([
            'supplier_id' => $request->input('supplier_id'),
            'company_master_id' => $request->input('company_master_id'),
            'is_visible_in_company' => $request->input('is_visible_in_company'),
            'edit' => $request->input('edit'),
            'delete' => $request->input('delete'),
            'access_in_transaction' => $request->input('access_in_transaction'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('supplieraccesstocompanies.index');
    }


    public function show($id)
    {
        $supplieraccesstocompanies = SupplierAccessToCompany::findOrFail($id);
        $pageTitle = 'View';
        return view('supplieraccesstocompanies.show', compact('supplieraccesstocompanies', 'pageTitle'));
    }


    public function edit($id)
    {
        $supplieraccesstocompanies = SupplierAccessToCompany::findOrFail($id);
        $userId = Auth::id();

        $supplier = Supplier::where('id', $supplieraccesstocompanies->supplier_id)->first();
        $suppliers = Supplier::where('id', '!=', $supplier->id)->get();

        $companymaster = CompanyMaster::where('id', $supplieraccesstocompanies->company_master_id)->first();
        $companymasters = CompanyMaster::where('id', '!=', $companymaster->id)->get();

        $pageTitle = "Edit";
        return view('supplieraccesstocompanies.edit', compact('pageTitle', 'supplieraccesstocompanies','companymaster','companymasters','supplier','suppliers', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $supplieraccesstocompanies = SupplierAccessToCompany::findOrFail($id);
        $supplieraccesstocompanies->update([
            'supplier_id' => $request->input('supplier_id'),
            'company_master_id' => $request->input('company_master_id'),
            'is_visible_in_company' => $request->input('is_visible_in_company'),
            'edit' => $request->input('edit'),
            'delete' => $request->input('delete'),
            'access_in_transaction' => $request->input('access_in_transaction'),
            'updated_at' => now(),
        ]);
            return redirect()->route('supplieraccesstocompanies.index');
    }


    public function destroy($id)
    {
        //
    }
}
