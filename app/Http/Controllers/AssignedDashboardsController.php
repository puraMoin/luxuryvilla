<?php

namespace App\Http\Controllers;

use App\Models\AssignedDashboard;
use Illuminate\Http\Request;

class AssignedDashboardsController extends Controller
{
    
    public function index()
    {
        $assigneddashboards = AssignedDashboard::all(); 
        $pageTitle = 'Assigned Dashboards';
        return view('assigneddashboards.index', compact('assigneddashboards', 'pageTitle'));
    }

   
    public function create()
    {
        $pageTitle = 'Add';
        return view('assigneddashboards.create', compact('pageTitle'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        AssignedDashboard::create($request->all());
        return redirect()->route('assigneddashboards.index');
    }

    
    public function show($id)
    {
        $assigneddashboards = AssignedDashboard::findOrFail($id);
        $pageTitle = 'View';

        return view('assigneddashboards.show', compact('assigneddashboards', 'pageTitle'));
    }

    
    public function edit($id)
    {
        $assigneddashboards = AssignedDashboard::findOrFail($id);
        $pageTitle = 'Edit';

        return view('assigneddashboards.edit', compact('assigneddashboards', 'pageTitle'));
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        $assigneddashboards = AssignedDashboard::findOrFail($id);
        $assigneddashboards->update($validatedData);

        return redirect()->route('assigneddashboards.index');
    }

   
    public function destroy($id)
    {
        //
    }
}
