<?php

namespace App\Http\Controllers;

use App\Models\Taxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxesController extends Controller
{

    public function index()
    {
        $taxes = Taxes::all();
        $pageTitle = 'Taxes';
        $taxes_pag = Taxes::paginate(20);
        return view('taxes.index', compact('taxes', 'pageTitle','taxes_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('taxes.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'value_in_percent' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by'=> 'nullable | integer',
            'modified_by'=> 'nullable | integer',
        ]);

        $taxes = Taxes::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'value_in_percent' => $request->input('value_in_percent'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('taxes.index');
    }


    public function show($id)
    {
        $taxes = Taxes::findOrFail($id);
        $pageTitle = 'View';

        return view('taxes.show', compact('taxes', 'pageTitle'));
    }


    public function edit($id)
    {
        $taxes = Taxes::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('taxes.edit', compact('pageTitle', 'taxes', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $taxes = Taxes::findOrFail($id);
        $taxes->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'value_in_percent' => $request->input('value_in_percent'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            return redirect()->route('taxes.index');
    }


    public function destroy($id)
    {
        //
    }
}
