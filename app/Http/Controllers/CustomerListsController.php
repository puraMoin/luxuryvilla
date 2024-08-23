<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerList;

class CustomerListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customers = CustomerList::all();
        $pageTitle = 'Customer List';
        $parentMenu = 'Users';
        $customers = CustomerList::paginate(20);
        return view('customerlists.index',compact('customers','pageTitle','parentMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('customerlists.create',compact('pageTitle'));
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

        $customerlist = CustomerList::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);


        return redirect()->route('customerlists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerlist = CustomerList::find($id);

        if (!$customerlist) {
            return redirect()->route('customerlists.index')->with('error', 'customerlists not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'View';
        $parentMenu = 'Customer Lists';

        // You can pass the data to a view and display it
        return view('customerlists.show', compact('customerlist','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerlist = CustomerList::findOrFail($id);

        $parentMenu = 'Blog';

        $pageTitle = "Edit";
        return view('customerlists.edit',compact('parentMenu','pageTitle','customerlist'));
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
        $customerlist = CustomerList::find($id);

        if (!$customerlist) {
            return redirect()->route('customerlists.index')->with('error', 'customerlists not found.');
         }

        $customerlist->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('customerlists.index');
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
