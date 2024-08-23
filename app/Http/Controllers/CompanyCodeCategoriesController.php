<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyCodeCategory;
use Illuminate\Support\Facades\Auth;

class CompanyCodeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Company Code Category";
        // $companycodecategories = CompanyCodeCategory::all();
        $companycodecategories = CompanyCodeCategory::paginate(20);

        return view('companycodecategories.index', compact('companycodecategories', 'parentMenu', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();

        return view('companycodecategories.create', compact('pageTitle', 'userId'));
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
            'active' => 'boolean',
             ]);

         $companycodecategory = CompanyCodeCategory::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         return redirect()->route('companycodecategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companycodecategory = CompanyCodeCategory::find($id);

        if (!$companycodecategory) {
            return redirect()->route('companycodecategories.index')->with('error', 'companycodecategories not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'Show';
        $parentMenu = 'Other Modules';

        // You can pass the data to a view and display it
        return view('companycodecategories.show', compact('companycodecategory','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companycodecategory = CompanyCodeCategory::findOrFail($id);
        /*dd($role);*/
        //dd($menuLinks);
        $parentMenu = 'Other Modules';
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('companycodecategories.edit',compact('parentMenu','pageTitle','companycodecategory','userId'));
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
        $companycodecategory = CompanyCodeCategory::find($id);

        if (!$companycodecategory) {
            return redirect()->route('companycodecategories.index')->with('error', 'companycodecategories not found.');
         }

       // Update the role information
        $companycodecategory->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

    return redirect()->route('companycodecategories.index');
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
