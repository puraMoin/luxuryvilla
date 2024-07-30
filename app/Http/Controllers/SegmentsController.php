<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Segment;

class SegmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Segments';
        $parentMenu = 'Super Master';

        $segment = Segment::all();

        return view('segments.index', compact('parentMenu', 'pageTitle', 'segment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        $userId = Auth::id();
        return view('segments.create', compact('pageTitle', 'userId'));
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
            'name' => 'string|max:255',
            'active' => 'boolean',
        ]);

        $segment = Segment::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('segments.index')->with('success', 'segment created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $segment = Segment::findOrFail($id);
        $pageTitle = 'View';

        return view('segments.show', compact('segment', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $segment = Segment::findOrFail($id);
        /*dd($role);*/
        //dd($menuLinks);
        $parentMenu = 'Super Master';

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('segments.edit', compact('parentMenu', 'pageTitle', 'segment', 'userId'));
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
        $segment = Segment::find($id);

        if (!$segment) {
            return redirect()->route('segments.index')->with('error', 'segments not found.');
        }

        // Update the role information
        $segment->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('segments.index');
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
