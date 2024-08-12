<?php

namespace App\Http\Controllers;

use App\Models\TaxType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxTypesController extends Controller
{

    public function index()
    {
        $taxtypes = TaxType::all();
        $pageTitle = 'Tax Types';
        return view('taxtypes.index', compact('taxtypes', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('taxtypes.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required | string | max:255',
            'active' => 'boolean',
            'created_by' => 'nullable | integer',
            'modified_by' => 'nullable | integer',
        ]);

        $taxtypes = TaxType::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('taxtypes.index');
    }


    public function show($id)
    {
        $taxtypes = TaxType::findOrFail($id);
        $pageTitle = 'View';
        return view('taxtypes.show', compact('taxtypes', 'pageTitle'));
    }


    public function edit($id)
    {
        $taxtypes = TaxType::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('taxtypes.edit', compact('pageTitle', 'taxtypes', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $taxtypes = TaxType::findOrFail($id);
        $taxtypes->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            return redirect()->route('taxtypes.index');
    }

    
    public function destroy($id)
    {
        //
    }

}
