<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealPlansController extends Controller
{

    public function index()
    {
        // dd($meal);
        $pageTitle = 'Meal Plans';
        $meal = MealPlan::all();
        $meal_pag = MealPlan::paginate(20);
        return view('mealplans.index', compact('meal', 'pageTitle','meal_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('mealplans.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $meal = MealPlan::create([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('mealplans.index');
    }


    public function show($id)
    {
        $meal = MealPlan::findOrFail($id);
        $pageTitle = 'View';

        return view('mealplans.show', compact('meal', 'pageTitle'));
    }


    public function edit($id)
    {
        $meal = MealPlan::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('mealplans.edit', compact('meal', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $meal = MealPlan::findOrFail($id);
        $meal->update([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('mealplans.index');
    }
}
