<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminList;

class AdminListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminlist = AdminList::all();
        $pageTitle = 'Admin List';
        $parentMenu = 'Users'; 
        return view('adminlists.index',compact('adminlist','pageTitle','parentMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('adminlists.create',compact('pageTitle'));
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
            'name'=>['required'],   
        ]);

        $adminlist = AdminList::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);


        return redirect()->route('adminlists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adminlist = AdminList::find($id);

        if (!$adminlist) {
            return redirect()->route('adminlists.index')->with('error', 'adminlists not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'View';
        $parentMenu = 'Admin Lists';

        // You can pass the data to a view and display it
        return view('adminlists.show', compact('adminlist','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminlist = AdminList::findOrFail($id);

        $parentMenu = 'Users';
    
        $pageTitle = "Edit";
        return view('adminlists.edit',compact('parentMenu','pageTitle','adminlist'));
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
        $adminlist = AdminList::find($id);

        if (!$adminlist) {
            return redirect()->route('adminlists.index')->with('error', 'adminlists not found.');
         }

        $adminlist->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('adminlists.index');
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
