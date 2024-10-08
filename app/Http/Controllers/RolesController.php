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
        // $roles = Role::all();
        $roles = Role::paginate(20);
        // dd($roles);
        return view('roles.index', compact('roles', 'pageTitle'));
    }

    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('roles.create', compact('userId', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'full_view' => 'required|boolean',
            'full_add' => 'required|boolean',
            'full_edit' => 'required|boolean',
            'full_delete' => 'required|boolean',
            'super_config' => 'required|boolean',
            'config' => 'required|boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'full_view' => $request->input('full_view'),
            'full_add' => $request->input('full_add'),
            'full_edit' => $request->input('full_edit'),
            'full_delete' => $request->input('full_delete'),
            'super_config' => $request->input('super_config'),
            'config' => $request->input('config'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
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

    public function update(Request $request, $id)
    {
        //  dd($request);
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'full_view' => $request->input('full_view'),
            'full_add' => $request->input('full_add'),
            'full_edit' => $request->input('full_edit'),
            'full_delete' => $request->input('full_delete'),
            'super_config' => $request->input('super_config'),
            'config' => $request->input('config'),
            // 'created_at' => now(),
            'updated_at' => now(),
            // 'created_by' => $request->input('created_by'),
            // 'modified_by' => $request->input('modified_by'),
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        //
    }
}
