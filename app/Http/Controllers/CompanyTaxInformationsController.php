<?php

namespace App\Http\Controllers;

use App\Models\CompanyTaxInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompanyTaxInformationsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Company Tax Informations';
        $companytextinformation = CompanyTaxInformation::all();
        $companytextinformation_pag = CompanyTaxInformation::paginate(20);
        return view('companytaxinformations.index', compact('companytextinformation', 'pageTitle','companytextinformation_pag'));
    }

    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('companytaxinformations.create', compact('userId', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $companytextinformation = CompanyTaxInformation::create([
            'name' => $request->input('name'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('companytaxinformations.index');
    }

    public function show($id)
    {
        $companytextinformation = CompanyTaxInformation::findOrFail($id);
        $pageTitle = 'View';
        return view('companytaxinformations.show', compact('companytextinformation', 'pageTitle'));
    }

    public function edit($id)
    {
        $companytextinformation = CompanyTaxInformation::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('companytaxinformations.edit', compact('companytextinformation', 'pageTitle', 'userId'));
    }

    public function update(Request $request, $id)
    {
        $companytextinformation = CompanyTaxInformation::findOrFail($id);
        $companytextinformation->update([
            'name' => $request->input('name'),
            'updated_at' => now(),
        ]);

        return redirect()->route('companytaxinformations.index');
    }

}
