<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaster;
use App\Models\CompanyWebsite;
use App\Models\Country;
use App\Models\WebsiteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyWebsitesController extends Controller
{
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Company Websites";
        $companywebsites = CompanyWebsite::all();
        return view('companywebsites.index', compact('companywebsites', 'parentMenu', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $companymaster = CompanyMaster::all();
        $websitetype = WebsiteType::all();
        $country = Country::all();
        return view('companywebsites.create', compact('pageTitle', 'userId', 'companymaster', 'websitetype', 'country'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'link' => 'required|string|max:255',
            'company_master_id' => 'required|integer',
            'website_type_id' => 'required|integer',
            'country_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        CompanyWebsite::create([
            'link' => $request->input('link'),
            'company_master_id' => $request->input('company_master_id'),
            'website_type_id' => $request->input('website_type_id'),
            'country_id' => $request->input('country_id'),
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('companywebsites.index');
    }

    public function show($id)
    {

        $companywebsites = CompanyWebsite::findOrFail($id);
        // dd($companywebsites);
        $parentMenu = 'Other Modules';
        $pageTitle = "View";
        return view('companywebsites.show', compact('pageTitle', 'parentMenu', 'companywebsites'));
    }

    public function edit($id)
    {
        $companywebsite = CompanyWebsite::findOrFail($id);
        $userId = Auth::id();

        $cm = CompanyMaster::where('id', $companywebsite->company_master_id)->first();
        $companymasters = CompanyMaster::where('id', '!=', $cm->id)->get();

        $websitetype = WebsiteType::where('id', $companywebsite->website_type_id)->first();
        $websitetypes = WebsiteType::where('id', '!=', $websitetype->id)->get();

        $country = Country::where('id', $companywebsite->country_id)->first();
        $countries = Country::where('id', '!=', $country->id)->get();

        $pageTitle = "Edit";

        return view('companywebsites.edit', compact('pageTitle', 'companywebsite', 'cm', 'companymasters', 'websitetype', 'websitetypes', 'country', 'countries', 'userId'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $companywebsites = CompanyWebsite::findOrFail($id);
        $request = $companywebsites->update([
            'link' => $request->input('link'),
            'company_master_id' => $request->input('company_master_id'),
            'website_type_id' => $request->input('website_type_id'),
            'country_id' => $request->input('country_id'),
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('companywebsites.index');
    }
}
