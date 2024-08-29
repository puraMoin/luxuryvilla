<?php

namespace App\Http\Controllers;

use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyCategoriesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Property Categories';
        $propertycategory = PropertyCategory::paginate(20);
        return view('propertycategories.index', compact('propertycategory', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('propertycategories.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $propertycategory = PropertyCategory::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('propertycategories.index');
    }


    public function show($id)
    {
        $propertycategory = PropertyCategory::findOrFail($id);
        $pageTitle = 'View';
        return view('propertycategories.show', compact('propertycategory', 'pageTitle'));
    }


    public function edit($id)
    {
        $propertycategory = PropertyCategory::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('propertycategories.edit', compact('propertycategory', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $propertycategory = PropertyCategory::findOrFail($id);
        $propertycategory->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('propertycategories.index');
    }


    public function destroy($id)
    {
        //
    }
}
