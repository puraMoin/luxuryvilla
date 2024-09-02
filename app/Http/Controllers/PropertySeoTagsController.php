<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertySeoTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertySeoTagsController extends Controller
{

    public function index()
    {
        $pageTitle = 'Property Seo Tags';
        $propertyseotag = PropertySeoTag::paginate(20);
        return view('propertyseotags.index', compact('propertyseotag', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        $property = Property::all();
        return view('propertyseotags.create', compact('userId', 'pageTitle','property'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|integer',
            'name'=> 'required|string',
            'description'=> 'required|string',
            'keywords'=> 'required|string',
            'active'=> 'required|boolean',
            'created_by'=> 'nullable|integer',
            'modified_by'=> 'nullable|integer',
        ]);

        $propertyseotag = PropertySeoTag::create([
            'property_id' => $request->input('property_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'keywords' => $request->input('keywords'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('propertyseotags.index');
    }


    public function show($id)
    {
        $propertyseotag = PropertySeoTag::findOrFail($id);
        $pageTitle = 'View';
        return view('propertyseotags.show', compact('propertyseotag', 'pageTitle'));
    }


    public function edit($id)
    {
        $propertyseotag = PropertySeoTag::findOrFail($id);
        $userId = Auth::id();

        $property = Property::where('id', $propertyseotag->supplier_id)->first();
        $properties = Property::where('id', '!=', $property->id)->get();

        $pageTitle = "Edit";
        return view('propertyseotags.edit', compact('pageTitle','property','properties','propertyseotag','supplier','suppliers', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $propertyseotag = Property::findOrFail($id);
        $propertyseotag->update([
            'property_id' => $request->input('property_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'keywords' => $request->input('keywords'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
            return redirect()->route('propertyseotags.index');
    }


    public function destroy($id)
    {
        //
    }
}
