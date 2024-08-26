<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaster;
use App\Models\TaxMaster;
use App\Models\TaxAccessToCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxAccessToCompaniesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Tax Access to Companies';
        $taxaccesstocompanies = TaxAccessToCompany::paginate(20);
        return view('taxaccesstocompanies.index', compact('taxaccesstocompanies', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $taxmaster = TaxMaster::all();
        $companymasters = CompanyMaster::all();
        $pageTitle = 'Create';
        return view('taxaccesstocompanies.create', compact('taxmaster','companymasters','userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'tax_master_id' => 'required|integer',
            'company_master_id' => 'required|integer',
            'is_visible_in_company' => 'required|boolean',
            'edit' => 'required|boolean',
            'delete' => 'required|boolean',
            'access_in_transaction' => 'required|boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $taxaccesstocompanies = TaxAccessToCompany::create([
            'tax_master_id' => $request->input('tax_master_id'),
            'company_master_id' => $request->input('company_master_id'),
            'is_visible_in_company' => $request->input('is_visible_in_company'),
            'edit' => $request->input('edit'),
            'delete' => $request->input('delete'),
            'access_in_transaction' => $request->input('access_in_transaction'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('taxaccesstocompanies.index');
    }


    public function show($id)
    {
        $taxaccesstocompanies = TaxAccessToCompany::findOrFail($id);
        $pageTitle = 'View';
        $userId = Auth::id();
        return view('taxaccesstocompanies.show', compact('taxaccesstocompanies', 'pageTitle'));
    }


    public function edit($id)

    {
        $taxaccesstocompanies = TaxAccessToCompany::findOrFail($id);
        $userId = Auth::id();

        $companymaster = CompanyMaster::where('id', $taxaccesstocompanies->company_master_id)->first();
        $companymasters = CompanyMaster::where('id', '!=', $companymaster->id)->get();

        $taxmaster = TaxMaster::where('id', $taxaccesstocompanies->tax_master_id)->first();
        $taxmasters = TaxMaster::where('id', '!=', $taxmaster->id)->get();

        $pageTitle = "Edit";
        return view('taxaccesstocompanies.edit', compact('userId','pageTitle', 'taxaccesstocompanies','companymaster','companymasters','taxmaster','taxmasters'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $taxaccesstocompanies = TaxAccessToCompany::findOrFail($id);
        $taxaccesstocompanies->update([
            'tax_master_id' => $request->input('tax_master_id'),
            'company_master_id' => $request->input('company_master_id'),
            'is_visible_in_company' => $request->input('is_visible_in_company'),
            'edit' => $request->input('edit'),
            'delete' => $request->input('delete'),
            'access_in_transaction' => $request->input('access_in_transaction'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('taxaccesstocompanies.index');
    }


    public function destroy($id)
    {
        //
    }
}
