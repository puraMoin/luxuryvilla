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
        $companywebsite = CompanyWebsite::all();
        $companywebsite_pag = CompanyWebsite::paginate(20);
        return view('companywebsites.index', compact('companywebsite', 'parentMenu', 'pageTitle','companywebsite_pag'));
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
        //dd($request->all());
        $request->validate([
        'company_master_id' => 'required|integer',
        'website_type_id' => 'required|integer',
        'country_id' => 'required|integer',
        'name' => 'required|string|max:255',
        'link' => 'required|string|max:1000',
        'active' => 'boolean',
        'created_by' => 'required|integer',
        'modified_by' => 'required|integer',
        ]);

        CompanyWebsite::create([
            'company_master_id' => $request->input('company_master_id'),
            'website_type_id' => $request->input('website_type_id'),
            'country_id' => $request->input('country_id'),
            'name' => $request->input('name'),
            'link' => $request->input('link'),
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

        $companywebsite = CompanyWebsite::findOrFail($id);
        // dd($companywebsite);
        $parentMenu = 'Other Modules';
        $pageTitle = "View";
        return view('companywebsites.show', compact('pageTitle', 'parentMenu', 'companywebsite'));
    }

    public function edit($id)
    {
        $companywebsite = CompanyWebsite::findOrFail($id);
        $userId = Auth::id();

        $companymaster = CompanyMaster::where('id', $companywebsite->company_master_id)->first();
        $companymasters = CompanyMaster::where('id', '!=', $companymaster->id)->get();

        $websitetype = WebsiteType::where('id', $companywebsite->website_type_id)->first();
        $websitetypes = WebsiteType::where('id', '!=', $websitetype->id)->get();

        $country = Country::where('id', $companywebsite->country_id)->first();
        $countries = Country::where('id', '!=', $country->id)->get();

        $pageTitle = "Edit";

        return view('companywebsites.edit', compact('pageTitle', 'companywebsite', 'companymaster', 'companymasters', 'websitetype', 'websitetypes', 'country', 'countries', 'userId'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $companywebsite = CompanyWebsite::findOrFail($id);
        $request = $companywebsite->update([
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
