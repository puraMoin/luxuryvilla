<?php

namespace App\Http\Controllers;

use App\Models\IslandMasters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IslandMastersController extends Controller
{

    public function index()
    {
        // dd($);
        $pageTitle = 'Island Master';
        // $islandmaster = IslandMasters::all();
        $islandmaster = IslandMasters::paginate(20);
        return view('islandmasters.index', compact('islandmaster', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('islandmasters.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer'
        ]);

        $meal = IslandMasters::create([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('islandmasters.index');
    }


    public function show($id)
    {
        $islandmaster = IslandMasters::findOrFail($id);
        $pageTitle = 'View';

        return view('islandmasters.show', compact('islandmaster', 'pageTitle'));
    }


    public function edit($id)
    {
        $islandmaster = IslandMasters::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('islandmasters.edit', compact('islandmaster', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $islandmaster = IslandMasters::findOrFail($id);
        $islandmaster->update([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'modified_by' => now(),
            'created_by' => now(),
        ]);
        return redirect()->route('islandmasters.index');
    }
}
