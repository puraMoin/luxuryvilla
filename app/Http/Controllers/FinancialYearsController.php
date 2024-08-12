<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialYearsController extends Controller
{

    public function index()
    {
        $pageTitle = 'Financial Years';
        $financialyears = FinancialYear::all();
        return view('financialyears.index', compact('financialyears', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('financialyears.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_current_year' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'active' => 'required|boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $financialyears = FinancialYear::create([
            'name' => $request->input('name'),
            'is_current_year' => $request->input('is_current_year'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('financialyears.index');
    }


    public function show($id)
    {
        $financialyears = FinancialYear::with('createdBy','modifiedBy')->findOrFail($id);
        $pageTitle = 'View';

        return view('financialyears.show', compact('financialyears', 'pageTitle'));
    }


    public function edit($id)
    {
        $financialyears = FinancialYear::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('financialyears.edit', compact('financialyears', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $financialyears = FinancialYear::findOrFail($id);
        $financialyears->update([
            'name' => $request->input('name'),
            'is_current_year' => $request->input('is_current_year'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('financialyears.index');
    }

}
