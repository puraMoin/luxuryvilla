<?php

namespace App\Http\Controllers;

use App\Models\CrmEnquiryStage;
use App\Models\CrmEnquiryStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrmEnquiryStatusesController extends Controller
{

    public function index()
    {
        $parentMenu = 'CRM';
        $pageTitle = "CRM Enquiry Statuses";
        $crmenquirystatuse = CrmEnquiryStatus::all();
        return view('crmenquirystatuses.index', compact('crmenquirystatuse', 'parentMenu', 'pageTitle'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $crmenquirystageid = CrmEnquiryStatus::all();
        $crmenquirystatuse = CrmEnquiryStatus::all();
        return view('crmenquirystatuses.create', compact('crmenquirystatuse','pageTitle', 'userId', 'crmenquirystageid'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'crm_enquiry_stage_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'color_code' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
            ]);

        $crmenquirystatuse =  CrmEnquiryStatus::create([
            'crm_enquiry_stage_id' => $request->input('crm_enquiry_stage_id'),
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
            ]);

            return redirect()->route('crmenquirystatuses.index');
    }


    public function show($id)
    {
        $crmenquirystatuse = CrmEnquiryStatus::findOrFail($id);
        $parentMenu = 'CRM';
        $pageTitle = "View";
        return view('crmenquirystatuses.show', compact('pageTitle', 'parentMenu', 'crmenquirystatuse'));
    }


    public function edit($id)
    {
        $crmenquirystatuse = CrmEnquiryStatus::findOrFail($id);
        $userId = Auth::id();


        $crmenquirystage = CrmEnquiryStage::where('id', $crmenquirystatuse->crm_enquiry_stage_id)->first();
        $crmenquirystages = CrmEnquiryStage::where('id', '!=', $crmenquirystage->id)->get();

        $pageTitle = "Edit";
        return view('crmenquirystatuses.edit', compact('pageTitle', 'crmenquirystatuse', 'userId', 'crmenquirystage', 'crmenquirystages'));

    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $crmenquirystatuse = CrmEnquiryStatus::findOrFail($id);
        $request = $crmenquirystatuse->update([
            'crm_enquiry_stage_id' => $request->input('crm_enquiry_stage_id'),
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
            // 'created_by' => $request->input('created_by'),
            // 'modified_by' => $request->input('modified_by'),
            // 'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('crmenquirystatuses.index');
    }

}
