<?php

namespace App\Http\Controllers;

use App\Models\AssignedDashboard;
use Illuminate\Http\Request;
use App\Models\RolesRight;
use Illuminate\Support\Facades\Auth;

class RolesRightsController extends Controller
{
    public function index()
    {
        $rolesrights = RolesRight::all();
        $pageTitle = 'Roles Rights List';
        return view('rolesrights.index', compact('rolesrights', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $assignedDashboardList = AssignedDashboard::pluck('name', 'id');
        return view('rolesrights.create', compact('pageTitle', 'userId', 'assignedDashboardList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'assigned_dashboard_id' => 'required|integer',
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
        $userId = Auth::id();

        $assignedDashboard = AssignedDashboard::where('id', $rolesright->assigned_dashboard_id)->first();
        $assignedDashboardList = AssignedDashboard::where('id', '!=', $assignedDashboard->id)->get();


        $pageTitle = "Edit";
        return view('rolesrights.edit', compact('pageTitle', 'rolesright', 'assignedDashboardList', 'assignedDashboard', 'userId'));
    }



    public function update(Request $request, $id)
    {
        $rolesright = RolesRight::findOrFail($id);
        $rolesright->update([
            'name' => $request->input('name'),
            'assigned_dashboard_id' => $request->input('assigned_dashboard_id'),
            'description' => $request->input('description'),
            'created_at' => now(),
            'updated_at' => now(),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);


        return redirect()->route('rolesrights.index');
    }
}
