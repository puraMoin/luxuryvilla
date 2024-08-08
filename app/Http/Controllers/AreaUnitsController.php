<?php

namespace App\Http\Controllers;

use App\Models\AreaUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaUnitsController extends Controller
{
    
    public function index()
    {
        $areaunits = AreaUnit::all();
        $pageTitle = 'Area Units';
        return view('areaunits.index', compact('areaunits', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('areaunits.create', compact('userId', 'pageTitle'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        AreaUnit::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('areaunits.index');
    }

    
    public function show($id)
    {
        $areaunits = AreaUnit::findOrFail($id);
        $pageTitle = 'View';

        return view('areaunits.show', compact('areaunits', 'pageTitle'));
    }

   
    public function edit($id)
    {
        $areaunits = AreaUnit::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('areaunits.edit', compact('areaunits', 'pageTitle', 'userId'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
        ]);

        $areaunits = AreaUnit::findOrFail($id);
        $areaunits->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
            // 'created_by' => $request->input('created_by'),
            // 'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('areaunits.index');
    }

   
    public function destroy($id)
    {
        //
    }
}
