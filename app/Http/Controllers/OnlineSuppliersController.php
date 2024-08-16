<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OnlineSupplier;

class OnlineSuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlinesuppliers = OnlineSupplier::all();
        $pageTitle = 'OnlineSupplier';
        return view('onlinesuppliers.index', compact('onlinesuppliers', 'pageTitle'));        
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
        return view('onlinesuppliers.create', compact('userId', 'pageTitle'));

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
            'active' => 'boolean',
            'created_by' => 'nullable | integer',
            'modified_by' => 'nullable | integer',
        ]);

        $onlinesupplier = OnlineSupplier::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),                       
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('onlinesuppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $onlinesupplier = OnlineSupplier::findOrFail($id);
        $pageTitle = 'View';
        return view('onlinesuppliers.show', compact('onlinesupplier', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onlinesupplier = OnlineSupplier::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('onlinesuppliers.edit', compact('pageTitle', 'onlinesupplier', 'userId'));

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
        $onlinesupplier = OnlineSupplier::findOrFail($id);
        $onlinesupplier->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),                       
            'created_at' => now(),
            'updated_at' => now(),
        ]);
            return redirect()->route('onlinesuppliers.index');
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
