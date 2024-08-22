<?php

namespace App\Http\Controllers;

use App\Models\AgentCreditLimitForMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentCreditLimitForMastersController extends Controller
{

    public function index()
    {
        $pageTitle = 'Agent Credit Limit For Master';
        $agentcreditlimitformasters = AgentCreditLimitForMaster::all();
        $agentcreditlimitformasters_pag = AgentCreditLimitForMaster::paginate(20);
        return view('agentcreditlimitformasters.index', compact('agentcreditlimitformasters', 'pageTitle','agentcreditlimitformasters_pag'));
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
        $agentcreditlimitformasters = AgentCreditLimitForMaster::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('agentcreditlimitformasters.edit', compact('agentcreditlimitformasters', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $agentcreditlimitformasters = AgentCreditLimitForMaster::findOrFail($id);
        $agentcreditlimitformasters->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'updated_at' => now(),
        ]);
        return redirect()->route('agentcreditlimitformasters.index');
    }
}
