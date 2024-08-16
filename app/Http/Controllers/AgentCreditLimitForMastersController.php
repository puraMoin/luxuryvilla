<?php

namespace App\Http\Controllers;

use App\Models\AgentCreditLimitForMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentCreditLimitForMastersController extends Controller
{

    public function index()
    {
        $pageTitle = 'Cost Types';
        $agentcreditlimitformasters = AgentCreditLimitForMaster::all();
        return view('agentcreditlimitformasters.index', compact('agentcreditlimitformasters', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('agentcreditlimitformasters.create', compact('userId', 'pageTitle'));
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

        $costtypes = AgentCreditLimitForMaster::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('agentcreditlimitformasters.index');
    }


    public function show($id)
    {
        $agentcreditlimitformasters = AgentCreditLimitForMaster::findOrFail($id);
        $pageTitle = 'View';

        return view('agentcreditlimitformasters.show', compact('agentcreditlimitformasters', 'pageTitle'));
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }



}
