<?php

namespace App\Http\Controllers;

use App\Models\CompanyTextInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompanyTextInformationsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Company Text Informations';
        $companytextinformation = CompanyTextInformation::all();
        return view('companytextinformations.index', compact('companytextinformation', 'pageTitle'));
    }

    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('companytextinformations.create', compact('userId', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $companytextinformation = CompanyTextInformation::create([
            'name' => $request->input('name'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('companytextinformations.index');
    }

    public function show($id)
    {
        $companytextinformation = CompanyTextInformation::findOrFail($id);
        $pageTitle = 'View';
        return view('companytextinformations.show', compact('companytextinformation', 'pageTitle'));
    }

    public function edit($id)
    {
        $companytextinformation = CompanyTextInformation::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('companytextinformations.edit', compact('companytextinformation', 'pageTitle', 'userId'));
    }

    public function update(Request $request, $id)
    {
        $companytextinformation = CompanyTextInformation::findOrFail($id);
        $companytextinformation->update([
            'name' => $request->input('name'),
            'updated_at' => now(),
        ]);

        return redirect()->route('companytextinformations.index');
    }

}
