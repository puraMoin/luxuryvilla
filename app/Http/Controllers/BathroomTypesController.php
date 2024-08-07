<?php

namespace App\Http\Controllers;

use App\Models\BathRoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BathroomTypesController extends Controller
{

    public function index()
    {
        // dd($);
        $pageTitle = 'Bathroom Types';
        $bathroomtype = BathRoomType::all();
        return view('bathroomtypes.index', compact('bathroomtype', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('bathroomtypes.create', compact('userId', 'pageTitle'));
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

        $bathroomtype = BathRoomType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('bathroomtypes.index');
    }


    public function show($id)
    {
        $bathroomtype = BathRoomType::findOrFail($id);
        $pageTitle = 'View';

        return view('bathroomtypes.show', compact('bathroomtype', 'pageTitle'));
    }


    public function edit($id)
    {
        $bathroomtype = BathRoomType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('bathroomtypes.edit', compact('bathroomtype', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $bathroomtype = BathRoomType::findOrFail($id);
        $bathroomtype->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('bathroomtypes.index');
    }
}
