<?php

namespace App\Http\Controllers;

use App\Models\CostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostTypesController extends Controller
{
    public function index()
    {
        $pageTitle = 'Cost Types';
        // $costtypes = CostType::all();
        $costtypes = CostType::paginate(20);
        return view('costtypes.index', compact('costtypes', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('costtypes.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $costtypes = CostType::create([
            'title' => $request->input('title'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('costtypes.index');
    }


    public function show($id)
    {
        $costtypes = CostType::findOrFail($id);
        $pageTitle = 'View';
        return view('costtypes.show', compact('costtypes', 'pageTitle'));
    }


    public function edit($id)
    {
        $costtypes = CostType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('costtypes.edit', compact('costtypes', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $costtypes = CostType::findOrFail($id);
        $costtypes->update([
            'title' => $request->input('title'),
            'active' => $request->input('active'),
            'updated_at' => now(),
        ]);

        return redirect()->route('costtypes.index');
    }
}
