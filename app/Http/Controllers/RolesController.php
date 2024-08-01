<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $pageTitle = 'Roles List';
        $role = Role::all();
        return view('roles.index', compact('role', 'pageTitle'));
    }

    public function create()
    {
        // $pageTitle = 'Add';
        // $userId = Auth::id();
        // return view('roles.create', compact('pageTitle', 'userId'));
        $pageTitle = 'Create';
        return view('roles.create', compact('pageTitle'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'full_view' => 'required|in:0,1',
        'full_add' => 'required|in:0,1',
        'full_edit' => 'required|in:0,1',
        'full_delete' => 'required|in:0,1',
        'super_config' => 'required|in:0,1',
        'config' => 'required|in:0,1',
        'active' => 'required|in:0,1',
    ]);

    
    Role::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'full_view' => $request->input('full_view'),
        'full_add' => $request->input('full_add'),
        'full_edit' => $request->input('full_edit'),
        'full_delete' => $request->input('full_delete'),
        'super_config' => $request->input('super_config'),
        'config' => $request->input('config'),
        'active' => $request->input('active'),
        'created_by' => auth()->id(), 
        'modified_by' => auth()->id(), 
    ]);

    
    return redirect()->route('roles.index');
}


    public function show($id)
    {
        $role = Role::findOrFail($id);
        $pageTitle = 'View';

        return view('roles.show', compact('role', 'pageTitle'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('roles.edit', compact('role', 'pageTitle', 'userId'));
    }

    public function update(Request $request, Role $role)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'full_view' => 'required|in:0,1',
        'full_add' => 'required|in:0,1',
        'full_edit' => 'required|in:0,1',
        'full_delete' => 'required|in:0,1',
        'super_config' => 'required|in:0,1',
        'config' => 'required|in:0,1',
        'active' => 'required|in:0,1',
    ]);

    $role->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'full_view' => $request->input('full_view'),
        'full_add' => $request->input('full_add'),
        'full_edit' => $request->input('full_edit'),
        'full_delete' => $request->input('full_delete'),
        'super_config' => $request->input('super_config'),
        'config' => $request->input('config'),
        'active' => $request->input('active'),
        'modified_by' => auth()->id(), 
    ]);

    return redirect()->route('roles.index');
}
}
