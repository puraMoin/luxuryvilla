<?php

namespace App\Http\Controllers;

use App\Models\BedType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BedTypesController extends Controller
{

    public function index()
    {
        // dd($);
        $pageTitle = 'Bed Types';
        $bedtypes = BedType::all();
        $bedtypes_pag = BedType::paginate(20);
        return view('bedtypes.index', compact('bedtypes', 'pageTitle','bedtypes_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('bedtypes.create', compact('userId', 'pageTitle'));
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

        $bedtypes = BedType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('bedtypes.index');
    }


    public function show($id)
    {
        $bedtypes = BedType::findOrFail($id);
        $pageTitle = 'View';
        return view('bedtypes.show', compact('bedtypes', 'pageTitle'));
    }


    public function edit($id)
    {
        $bedtypes = BedType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('bedtypes.edit', compact('bedtypes', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $bedtypes = BedType::findOrFail($id);
        $bedtypes->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('bedtypes.index');
    }
}
