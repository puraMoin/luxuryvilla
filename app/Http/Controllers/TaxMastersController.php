<?php

namespace App\Http\Controllers;

use App\Models\TaxMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxMastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $taxmasters = TaxMaster::all();
        $pageTitle = 'Tax Masters';
        $taxmasters = TaxMaster::paginate(20);
        return view('taxmasters.index', compact('taxmasters', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('taxmasters.create', compact('userId', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'alias' => 'required | string | max:5',
            'is_vat' => 'boolean',
            'is_municipality_tax'=>'boolean',
            'active' => 'boolean',
            'created_by' => 'nullable | integer',
            'modified_by' => 'nullable | integer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $taxmasters = TaxMaster::create([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'is_vat' => $request->input('is_vat'),
            'active' => $request->input('active'),
            'is_municipality_tax' => $request->input('is_municipality_tax'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        return redirect()->route('taxmasters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxmaster = TaxMaster::findOrFail($id);
        $pageTitle = 'View';
        return view('taxmasters.show', compact('taxmaster', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxmaster = TaxMaster::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('taxmasters.edit', compact('pageTitle', 'taxmaster', 'userId'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $taxmaster = TaxMaster::findOrFail($id);
        $taxmaster->update([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'is_vat' => $request->input('is_vat'),
            'active' => $request->input('active'),
            'is_municipality_tax' => $request->input('is_municipality_tax'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            return redirect()->route('taxmasters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
