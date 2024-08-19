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
        $pageTitle = "CRM Enquiry Status";
        $crmenquirystatuses = CrmEnquiryStatus::all();
        return view('crmenquirystatuses.index', compact('crmenquirystatuses', 'parentMenu', 'pageTitle'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $enquirystage = CrmEnquiryStage::all();
        $crmenquirystatuses = CrmEnquiryStatus::all();
        return view('crmenquirystatuses.create', compact('crmenquirystatuses','pageTitle', 'userId', 'enquirystage'));
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

        $crmenquirystatuses =  CrmEnquiryStatus::create([
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
        $crmenquirystatuses = CrmEnquiryStatus::findOrFail($id);
        $parentMenu = 'CRM';
        $pageTitle = "View";
        return view('crmenquirystatuses.show', compact('pageTitle', 'parentMenu', 'crmenquirystatuses'));
    }


    public function edit($id)
    {
        $crmenquirystatuses = CrmEnquiryStatus::findOrFail($id);
        $userId = Auth::id();

        $enquirystage = CrmEnquiryStage::where('id', $crmenquirystatuses->crm_enquiry_stage_id)->first();
        $enquirystages = CrmEnquiryStage::where('id', '!=', $enquirystage->id)->get();

        $pageTitle = "Edit";
        return view('crmenquirystatuses.edit', compact('pageTitle', 'crmenquirystatuses', 'userId', 'enquirystage', 'enquirystages'));

    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $crmenquirystatuses = CrmEnquiryStatus::findOrFail($id);
        $request = $crmenquirystatuses->update([
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
