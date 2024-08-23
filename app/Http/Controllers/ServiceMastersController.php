<?php

namespace App\Http\Controllers;

use App\Models\ServiceMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceMastersController extends Controller
{

    public function index()
    {
        $pageTitle = 'Service Master';
        $servicemasters = ServiceMaster::all();
        $servicemasters_pag = ServiceMaster::paginate(20);
        return view('servicemasters.index', compact('servicemasters', 'pageTitle','servicemasters_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('servicemasters.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'boolean',
            'created_by' => 'required|integer',
            'modified_by' => 'required|integer',
        ]);

        $servicemasters = ServiceMaster::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);
        return redirect()->route('servicemasters.index');
    }


    public function show($id)
    {
        $servicemasters = ServiceMaster::findOrFail($id);
        $pageTitle = 'View';
        return view('servicemasters.show', compact('servicemasters', 'pageTitle'));
    }


    public function edit($id)
    {
        $servicemasters = ServiceMaster::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('servicemasters.edit', compact('servicemasters', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $servicemasters = ServiceMaster::findOrFail($id);
        $servicemasters->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('servicemasters.index');
    }


    public function destroy($id)
    {
        //
    }
}
