<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolesRight;
use Illuminate\Support\Facades\Auth;

class RolesRightsController extends Controller
{
    public function index()
    {
        $rolesrights = RolesRight::all();
        $pageTitle = 'RolesRights List';
        return view('rolesrights.index', compact('rolesrights', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        return view('rolesrights.create', compact('pageTitle', 'userId'));
    }

    public function store(Request $request)
    {   
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'assigned_dashboard_id' => 'required|integer',
            'description' => 'required|string',
            'active' => 'required|boolean',
            'created_by' => 'nullable|integer',
            'modified_by' => 'nullable|integer',
        ]);

        RolesRight::create([
            'name' => $request->input('name'),
            'assigned_dashboard_id' => $request->input('assigned_dashboard_id'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('rolesrights.index');
    }

    public function show($id)
    {
        $rolesright = RolesRight::findOrFail($id);
        $pageTitle = 'View';

        return view('rolesrights.show', compact('rolesright', 'pageTitle'));
    }

    public function edit($id)
    {
        $rolesright = RolesRight::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();

        return view('rolesrights.edit', compact('rolesright', 'pageTitle', 'userId'));
    }

    public function update(Request $request, $id)
    {
        $rolesright = RolesRight::findOrFail($id);
        $rolesright->update([
            'name' => $request->input('name'),
            'assigned_dashboard_id' => $request->input('assigned_dashboard_id'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()->route('rolesrights.index');
    }
}
