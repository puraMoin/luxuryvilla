<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierRegionType;

class SupplierRegionTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Supplier Region';
        $parentMenu = 'Super Master';
        // $supplierregion = SupplierRegionType::all();
        $supplierregion = SupplierRegionType::paginate(20);
        return view('supplierregiontypes.index',compact('parentMenu','pageTitle','supplierregion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('supplierregiontypes.create', compact('pageTitle'));
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
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        $admintype = SupplierRegionType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('supplierregiontypes.index')->with('success', 'supplierregiontypes created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplierregion = SupplierRegionType::find($id);

        if (!$supplierregion) {
            return redirect()->route('supplierregiontypes.index')->with('error', 'Role not found.');
        }


        $pageTitle = 'Supplier Region';
        $parentMenu = 'Super Master';

        return view('supplierregiontypes.show', compact('supplierregion','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplierregion = SupplierRegionType::findOrFail($id);
        /*dd($role);*/
        //dd($menuLinks);
        $parentMenu = 'Super Master';

        $pageTitle = "Edit";
        return view('supplierregiontypes.edit',compact('parentMenu','pageTitle','supplierregion'));
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
        $supplierregion = SupplierRegionType::find($id);

        if (!$supplierregion) {
            return redirect()->route('supplierregiontypes.index')->with('error', 'Role not found.');
         }

       // Update the role information
        $supplierregion->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    return redirect()->route('supplierregiontypes.index');
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
