<?php

namespace App\Http\Controllers;

use App\Models\CrmEnquiryStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrmEnquiryStagesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Cost Types';
        $crmenquirystage = CrmEnquiryStage::all();
        return view('crmenquirystages.index', compact('crmenquirystage', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('crmenquirystages.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'color_code' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by' => 'nullable | integer',
            'modified_by' => 'nullable | integer',
        ]);

        $crmenquirystage = CrmEnquiryStage::create([
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('crmenquirystages.index');
    }


    public function show($id)
    {
        $crmenquirystage = CrmEnquiryStage::findOrFail($id);
        $pageTitle = 'View';
        return view('crmenquirystages.show', compact('crmenquirystage', 'pageTitle'));
    }


    public function edit($id)
    {
        $crmenquirystage = CrmEnquiryStage::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('crmenquirystages.edit', compact('crmenquirystage', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $crmenquirystage = CrmEnquiryStage::findOrFail($id);
        $crmenquirystage->update([
            'name' => $request->input('name'),
            'color_code' => $request->input('color_code'),
            'active' => $request->input('active'),
            'updated_at' => now(),
        ]);

        return redirect()->route('crmenquirystages.index');
    }

}
