<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceModuleMaster;

class ServiceModuleMastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Service Module Masters';
        $servicemodulemasters = ServiceModuleMaster::paginate(20);
        return view('servicemodulemasters.index', compact('servicemodulemasters', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create';
        return view('servicemodulemasters.create', compact('pageTitle'));
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
            'name' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $servicemodulemasters = ServiceModuleMaster::create([
            'title' => $request->input('title'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('servicemodulemasters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicemodulemaster = ServiceModuleMaster::findOrFail($id);
        $pageTitle = 'View';
        return view('servicemodulemasters.show', compact('servicemodulemaster', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicemodulemaster = ServiceModuleMaster::findOrFail($id);
        $pageTitle = 'Edit';
        return view('servicemodulemasters.edit', compact('servicemodulemaster', 'pageTitle'));
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
        //
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
