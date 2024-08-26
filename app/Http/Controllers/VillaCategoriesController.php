<?php

namespace App\Http\Controllers;

use App\Models\VillaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillaCategoriesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Villa Categories';
        $villacategories = VillaCategory::paginate(20);
        return view('villacategories.index', compact('villacategories', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('villacategories.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $villacategories = VillaCategory::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('villacategories.index');
    }


    public function show($id)
    {
        $villacategories = VillaCategory::findOrFail($id);
        $pageTitle = 'View';
        return view('villacategories.show', compact('villacategories', 'pageTitle'));
    }


    public function edit($id)
    {
        $villacategories = VillaCategory::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('villacategories.edit', compact('villacategories', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $villacategories = VillaCategory::findOrFail($id);
        $villacategories->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('villacategories.index');
    }


    public function destroy($id)
    {
        //
    }
}
