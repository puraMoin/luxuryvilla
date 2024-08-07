<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        $parentMenu = 'Other Modules';
        $pageTitle = "Department";

        return view ('departments.index',(compact('department','parentMenu','pageTitle')));
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

        return view ('departments.create',compact('pageTitle','parentMenu','userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'required|boolean',
            'created_by' => 'required',
            'modified_by' => 'required',
        ]);

        $department = Department::create([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'active'=> $request->input('active'),
            'created_by'=> $request->input('created_by'),
            'modified_by'=> $request->input('modified_by'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);   
        
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrfail('id');
        $pageTitle = "Show";

        return view('departments.show',compact('department','pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $department = Department::find('id');
        $pageTitle = "Edit";
        return view('departments.edit',compact('department','pageTitle'));
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
        $department = Department::find('id');
        $department->update([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'active'=> $request->input('active'),
            'created_by'=> $request->input('created_by'),
            'modified_by'=> $request->input('modified_by'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);   
        
        return redirect()->route('departments.index');
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
