<?php

namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use App\Models\CompanyMaster;
use App\Models\CompanyTextInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyRegistrationsController extends Controller
{

    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Company Registrations";
        $companyregistrations = CompanyRegistration::all();
        // $companymaster = CompanyMaster::all();
        // $companytextinformation = CompanyTextInformation::all();
        return view('companyregistrations.index', compact('companyregistrations', 'parentMenu', 'pageTitle'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $companyregistrations = CompanyRegistration::all();
        $companymaster = CompanyMaster::all();
        $companytextinformation = CompanyTextInformation::all();
        return view('companyregistrations.create', compact('companytextinformation', 'companymaster', 'pageTitle', 'userId', 'companyregistrations'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'company_master_id' => 'required|integer',
            'company_text_information_id' => 'required|integer',
            'registration_body' => 'required|nullable',
            'registration_number' => 'required|nullable',
            'registration_expiry_date' => 'required|date',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        CompanyRegistration::create([
            'company_master_id' => $request->input('company_master_id'),
            'company_text_information_id' => $request->input('company_text_information_id'),
            'registration_body' => $request->input('registration_body'),
            'registration_number' => $request->input('registration_number'),
            'registration_expiry_date' => $request->input('registration_expiry_date'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('companyregistrations.index');
    }


    public function show($id)
    {
        $companyregistrations = CompanyRegistration::find($id);
        $parentMenu = 'Other Modules';
        $pageTitle = "View";
        return view('companyregistrations.show', compact('pageTitle', 'parentMenu', 'companyregistrations'));
    }


    public function edit($id)
    {
        $companyregistrations = CompanyRegistration::findOrFail($id);
        $userId = Auth::id();
        $companymaster = CompanyMaster::where('id', $companyregistrations->company_master_id)->first();
        $companymasters = CompanyMaster::where('id', '!=', $companymaster->id)->get();
        $companytextinformation = CompanyTextInformation::where('id', $companyregistrations->company_text_information_id)->first();
        $companytextinformations = CompanyTextInformation::where('id', '!=', $companytextinformation->id)->get();
        $pageTitle = "Edit";
        return view('companyregistrations.edit', compact('pageTitle', 'companyregistrations', 'companymaster', 'companymasters', 'companytextinformation', 'companytextinformations', 'userId'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $companyregistrations = CompanyRegistration::findOrFail($id);
        $request = $companyregistrations->update([
            'company_master_id' => $request->input('company_master_id'),
            'company_text_information_id' => $request->input('company_text_information_id'),
            'registration_body' => $request->input('registration_body'),
            'registration_number' => $request->input('registration_number'),
            'registration_expiry_date' => $request->input('registration_expiry_date'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('companyregistrations.index');
    }
}
