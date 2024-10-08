<?php

namespace App\Http\Controllers;

use App\Models\EmployeeList;
use Illuminate\Http\Request;

class EmployeeListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employeelists = EmployeeList::all();
        $pageTitle = 'Employee List';
        $employeelists = EmployeeList::paginate(20);
        return view('employeelists.index', compact('employeelists', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('employeelists.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'string|max:255',
            'username' => 'string|max:255',
            'email' => 'email|max:255|unique:employee_lists',
            'contact' => 'string|max:15',
            'active' => 'boolean',
        ]);

        EmployeeList::create($request->all());

        return redirect()->route('employeelists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeelists = EmployeeList::findOrFail($id);
        $pageTitle = 'View';

        return view('employeelists.show', compact('employeelists', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeelists = EmployeeList::findOrFail($id);
        $pageTitle = 'Edit';

        return view('employeelists.edit', compact('employeelists', 'pageTitle'));
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
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'username' => 'string|max:255',
            'email' => 'email|max:255|unique:employee_lists,email,' . $id,
            'contact' => 'string|max:15',
            'active' => 'boolean',
        ]);

        $employeelists = EmployeeList::findOrFail($id);
        $employeelists->update($validatedData);

        return redirect()->route('employeelists.index');
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
