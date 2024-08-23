<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\Auth;

class DesignationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $designations = Designation::all();
        $parentMenu = 'Other Modules';
        $pageTitle = "Designation";
        $designations = Designation::paginate(20);

        return view ('designations.index',(compact('designations','parentMenu','pageTitle')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Add";
        $userId = Auth::id();

        return view ('designations.create',compact('pageTitle','parentMenu','userId'));
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
            'active' => 'required|boolean',
            'created_by' => 'required',
            'modified_by' => 'required',
        ]);

        $designation = Designation::create([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'active'=> $request->input('active'),
            'created_by'=> $request->input('created_by'),
            'modified_by'=> $request->input('modified_by'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        return redirect()->route('designations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $designation = Designation::findOrfail($id);
        $pageTitle = "Show";

        return view('designations.show',compact('designation','pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::id();
        $designation = Designation::find($id);
        $pageTitle = "Edit";
        return view('designations.edit',compact('designation','pageTitle','userId'));
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
        $designation = Designation::find($id);
        $designation->update([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'active'=> $request->input('active'),
            'modified_by'=> $request->input('modified_by'),
            'updated_at'=>now(),
        ]);

        return redirect()->route('designations.index');
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
