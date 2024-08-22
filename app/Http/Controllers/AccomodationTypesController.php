<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccommodationType;
use Illuminate\Support\Facades\Auth;

class AccomodationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accomodationtypes = AccommodationType::all();
        $pageTitle = 'Accommodation Types';
        $accomodationtypes_pag = AccommodationType::paginate(20);
        return view('accomodationtypes.index', compact('accomodationtypes', 'pageTitle','accomodationtypes_pag'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('accomodationtypes.create', compact('userId', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'active' => 'boolean',
            'created_by' => 'nullable | integer',
            'modified_by' => 'nullable | integer',
        ]);

        $accomodationtype = AccommodationType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('accomodationtypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accomodationtype = AccommodationType::findOrFail($id);
        $pageTitle = 'View';
        return view('accomodationtypes.show', compact('accomodationtype', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accomodationtype = AccommodationType::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('accomodationtypes.edit', compact('pageTitle', 'accomodationtype', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accomodationtype = AccommodationType::findOrFail($id);
        $accomodationtype->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('accomodationtypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
