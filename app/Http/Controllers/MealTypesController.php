<?php

namespace App\Http\Controllers;

use App\Models\MealType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealTypesController extends Controller
{

    public function index()
    {
        // dd($meal);
        $pageTitle = 'Meal Types';
        $meal = MealType::all();
        $meal_pag = MealType::paginate(20);
        return view('mealtypes.index', compact('meal', 'pageTitle','meal_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('mealtypes.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer'
        ]);

        $meal = MealType::create([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
        ]);
        return redirect()->route('mealtypes.index');
    }


    public function show($id)
    {
        $meal = MealType::findOrFail($id);
        $pageTitle = 'View';

        return view('mealtypes.show', compact('meal', 'pageTitle'));
    }


    public function edit($id)
    {
        $meal = MealType::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('mealtypes.edit', compact('meal', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $meal = MealType::findOrFail($id);
        $meal->update([
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('mealtypes.index');
    }

}
