<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyTypesController extends Controller
{

    public function index()
    {
        $propertytypes = PropertyType::all();
        $pageTitle = 'Properties';
        return view('properties.index', compact('propertytypes', 'pageTitle'));
    }


    public function create()
    {
        $pageTitle = 'Add';
        $userId = Auth::id();
        return view('properties.create', compact('pageTitle', 'userId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string | max:255',
            'active' => 'boolean',
            'created_by' => 'required | integer',
            'modified_by' => 'required | integer',

        ]);

        PropertyType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);
        PropertyType::create($request->all());
        return redirect()->route('properties.create');
    }


    public function show($id)
    {
        $propertytypes = PropertyType::findOrFail($id);
        $pageTitle = 'View';
        return view('properties.show', compact('propertytypes', 'pageTitle'));
    }


    public function edit($id)
    {
        $propertytypes = PropertyType::findOrfail($id);
        $pageTitle = 'edit';
        $userId = Auth::id();

        return view('properties.edit', compact('propertytypes', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string | max:255',
            'active' => 'boolean',
        ]);

        $propertytypes = PropertyType::findOrfail($id);
        $propertytypes->update($validatedData);

        return redirect()->route('properties.index');
    }
}
