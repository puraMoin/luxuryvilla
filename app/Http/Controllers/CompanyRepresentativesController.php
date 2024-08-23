<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyMaster;
use App\Models\CompanyRepresentative;
use Illuminate\Support\Facades\Auth;

class CompanyRepresentativesController extends Controller
{
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Company Representatives";
        // $companyrepresentatives = CompanyRepresentative::all();
        $companyrepresentatives = CompanyRepresentative::paginate(20);
        return view('companyrepresentatives.index', compact('companyrepresentatives', 'parentMenu', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $companyrepresentatives = CompanyRepresentative::all();
        $companymaster = CompanyMaster::all();
        return view('companyrepresentatives.create', compact('companymaster', 'companyrepresentatives', 'pageTitle', 'userId'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'company_master_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'contact_1' => 'nullable|string',
            'email_1' => 'nullable|email',
            'contact_2' => 'nullable|string',
            'email_2' => 'nullable|email',
            'fax' => 'nullable|string',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        CompanyRepresentative::create([
            'company_master_id' => $request->input('company_master_id'),
            'name' => $request->input('name'),
            'contact_1' => $request->input('contact_1'),
            'email_1' => $request->input('email_1'),
            'contact_2' => $request->input('contact_2'),
            'email_2' => $request->input('email_2'),
            'fax' => $request->input('fax'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('companyrepresentatives.index');
    }

    public function show($id)
    {
        $companyrepresentatives = CompanyRepresentative::find($id);
        $parentMenu = 'Other Modules';
        $pageTitle = "View";
        return view('companyrepresentatives.show', compact('pageTitle', 'parentMenu', 'companyrepresentatives'));
    }

    public function edit($id)
    {
        $companyrepresentatives = CompanyRepresentative::findOrFail($id);
        $userId = Auth::id();

        $companymaster = CompanyMaster::where('id', $companyrepresentatives->company_master_id)->first();
        $companymasters = CompanyMaster::where('id', '!=', $companymaster->id)->get();

        $pageTitle = "Edit";
        return view('companyrepresentatives.edit', compact('pageTitle', 'companyrepresentatives', 'companymaster', 'companymasters', 'userId'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $companyrepresentatives = CompanyRepresentative::findOrFail($id);
        $request = $companyrepresentatives->update([
            'company_master_id' => $request->input('company_master_id'),
            'name' => $request->input('name'),
            'contact_1' => $request->input('contact_1'),
            'email_1' => $request->input('email_1'),
            'contact_2' => $request->input('contact_2'),
            'email_2' => $request->input('email_2'),
            'fax' => $request->input('fax'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);

        return redirect()->route('companyrepresentatives.index');
    }

    public function destroy($id)
    {
        //
    }
}
