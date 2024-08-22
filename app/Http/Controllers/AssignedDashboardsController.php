<?php

namespace App\Http\Controllers;

use App\Models\AssignedDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignedDashboardsController extends Controller
{

    public function index()
    {
        $assigneddashboards = AssignedDashboard::all();
        $pageTitle = 'Assigned Dashboards';
        $assigneddashboards_pag = AssignedDashboard::paginate(20);

        return view('assigneddashboards.index', compact('assigneddashboards', 'pageTitle','assigneddashboards_pag'));
    }


    public function create()
    {
        $pageTitle = 'Add';
        $userId = Auth::id();
        return view('assigneddashboards.create', compact('pageTitle','userId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',

        ]);

        AssignedDashboard::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
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
        $userId = Auth::id();

        return view('assigneddashboards.edit', compact('assigneddashboards', 'pageTitle','userId'));
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
}
