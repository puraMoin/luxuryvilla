<?php

namespace App\Http\Controllers;

use App\Models\CompanyCodeCategory;
use Illuminate\Http\Request;
use App\Models\CompanyCodeModule;
use Illuminate\Support\Facades\Auth;

class CompanyCodeModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Company Code Modules";
        $companycodemodules = CompanyCodeModule::with(['companycodecategories'])->get();
        //dd($companycodemodules);
        $companycodemodules_pag = CompanyCodeModule::paginate(20);
        return view('companycodemodules.index', compact('companycodemodules', 'parentMenu', 'pageTitle','companycodemodules_pag'));
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

        $companycodeCategory = CompanyCodeCategory::all();

        return view('companycodemodules.create', compact('pageTitle', 'userId','companycodeCategory'));
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

        $companycodeCategoryId = $request->input('company_code_category_id');

        $companycodeCategory = CompanyCodeCategory::find($companycodeCategoryId);

        if(!empty($companycodeCategory))
        {
          $companycodeCategoryId = $companycodeCategory->id;
        }

         $companycodemodule = CompanyCodeModule::create([
            'name' => $request->input('name'),
            'company_code_category_id'=> $companycodeCategoryId,
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         return redirect()->route('companycodemodules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companycodemodule = CompanyCodeModule::find($id);

        if (!$companycodemodule) {
            return redirect()->route('companycodemodules.index')->with('error', 'companycodemodules not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'Show';
        $parentMenu = 'Other Modules';

        // You can pass the data to a view and display it
        return view('companycodemodules.show', compact('companycodemodule','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companycodemodule = CompanyCodeModule::find($id);

        $companycodeCategory = CompanyCodeCategory::where('id', $companycodemodule->company_code_category_id)->first();
        $companycodeCategories = CompanyCodeCategory::where('id', '!=', $companycodeCategory->id)->get();

        $userId = Auth::id();
        $pageTitle = 'Edit';
        $parentMenu = 'Other Modules';

                // You can pass the data to a view and display it
        return view('companycodemodules.edit', compact('companycodemodule','pageTitle','parentMenu','companycodeCategory','companycodeCategories','userId'));
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
        $companycodemodule = CompanyCodeModule::find($id);

        if(!$companycodemodule) {
            return redirect()->route('companycodemodules.index')->with('error', 'companycodemodules not found.');
        }

        $companycodeCategoryId = $request->input('company_code_category_id');

        $companycodeCategory = CompanyCodeCategory::find($companycodeCategoryId);

        if(!empty($companycodeCategory))
        {
          $companycodeCategoryId = $companycodeCategory->id;
        }

        $companycodemodule->update([
            'name' => $request->input('name'),
            'company_code_category_id'=> $companycodeCategoryId,
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         return redirect()->route('companycodemodules.index');

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
