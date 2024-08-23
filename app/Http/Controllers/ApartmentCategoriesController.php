<?php

namespace App\Http\Controllers;

use App\Models\ApartmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentCategoriesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Apartment Categories';
        $apartmentcategories = ApartmentCategory::all();
        $apartmentcategories_pag = ApartmentCategory::paginate(20);
        return view('apartmentcategories.index', compact('apartmentcategories', 'pageTitle','apartmentcategories_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('apartmentcategories.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $apartmentcategories = ApartmentCategory::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('apartmentcategories.index');
    }


    public function show($id)
    {
        $apartmentcategories = ApartmentCategory::findOrFail($id);
        $pageTitle = 'View';
        return view('apartmentcategories.show', compact('apartmentcategories', 'pageTitle'));
    }

    
    public function edit($id)
    {
        $apartmentcategories = ApartmentCategory::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('apartmentcategories.edit', compact('apartmentcategories', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $apartmentcategories = ApartmentCategory::findOrFail($id);
        $apartmentcategories->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('apartmentcategories.index');
    }


    public function destroy($id)
    {
        //
    }
}
