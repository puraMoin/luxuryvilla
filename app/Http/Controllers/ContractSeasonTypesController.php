<?php

namespace App\Http\Controllers;

use App\Models\ContractSeasonType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractSeasonTypesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Contract Season Types';
        // $contractseasontypes = ContractSeasonType::all();
        $contractseasontypes = ContractSeasonType::paginate(20);
        return view('contractseasontypes.index', compact('contractseasontypes', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('contractseasontypes.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $contractseasontypes = ContractSeasonType::create([
            'title' => $request->input('title'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('contractseasontypes.index');
    }


    public function show($id)
    {
        $contractseasontypes = ContractSeasonType::findOrFail($id);
        $pageTitle = 'View';
        return view('contractseasontypes.show', compact('contractseasontypes', 'pageTitle'));
    }


    public function edit($id)
    {
        $contractseasontypes = ContractSeasonType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('contractseasontypes.edit', compact('contractseasontypes', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $contractseasontypes = ContractSeasonType::findOrFail($id);
        $contractseasontypes->update([
            'title' => $request->input('title'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('contractseasontypes.index');
    }


    public function destroy($id)
    {
        //
    }
}
