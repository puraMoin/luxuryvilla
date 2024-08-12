<?php

namespace App\Http\Controllers;

use App\Models\WebsiteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteTypesController extends Controller
{

    public function index()
    {
        $websitetypes = WebsiteType::all();
        $pageTitle = 'Property List';

        return view('websitetypes.index', compact('websitetypes', 'pageTitle'));
    }

    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('websitetypes.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active'=> 'boolean',
            'created_by' => 'nullable|integer',
            'modified_by' => 'nullable|integer',
        ]);

        WebsiteType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('websitetypes.index');
    }


    public function show($id)
    {
        $websitetypes = WebsiteType::findOrFail($id);
        $pageTitle = 'View';
        return view('websitetypes.show', compact('websitetypes', 'pageTitle'));
    }


    public function edit($id)
    {
        $websitetypes = WebsiteType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('websitetypes.edit', compact('websitetypes', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $websitetypes = WebsiteType::findOrFail($id);
        $websitetypes->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('websitetypes.index');
    }


}
