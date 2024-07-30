<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Segment;

class SegmentsController extends Controller
{
    
    public function index()
    {
        $pageTitle = 'Segments';
        $parentMenu = 'Super Master';
        $segment = Segment::all();
        return view('segments.index', compact('parentMenu', 'pageTitle', 'segment'));
    }

   
    public function create()
    {
        $pageTitle = 'Add';
        $userId = Auth::id();
        return view('segments.create', compact('pageTitle', 'userId'));
    }

   
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

    
    public function show($id)
    {
        $segment = Segment::findOrFail($id);
        $pageTitle = 'View';

        return view('segments.show', compact('segment', 'pageTitle'));
    }

   
    public function edit($id)
    {
        $segment = Segment::findOrFail($id);
        $parentMenu = 'Super Master';

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('segments.edit', compact('parentMenu', 'pageTitle', 'segment', 'userId'));
    }

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
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        return redirect()->route('segments.index');
    }

    public function destroy($id)
    {
        //
    }
}
