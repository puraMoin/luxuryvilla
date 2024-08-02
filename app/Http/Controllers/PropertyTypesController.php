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
        $pageTitle = 'Property List';

        return view('propertytypes.index', compact('propertytypes', 'pageTitle'));
    }

    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('propertytypes.create', compact('userId', 'pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        PropertyType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('propertytypes.index');
    }

    public function show($id)
    {
        $propertytypes = PropertyType::findOrFail($id);
        $pageTitle = 'View';

        return view('propertytypes.show', compact('propertytypes', 'pageTitle'));
    }

    public function edit($id)
    {
        $propertytypes = PropertyType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('propertytypes.edit', compact('propertytypes', 'pageTitle', 'userId'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
        ]);

        $propertytypes = PropertyType::findOrFail($id);
        $propertytypes->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('propertytypes.index');
    }
}
