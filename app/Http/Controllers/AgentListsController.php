<?php

namespace App\Http\Controllers;

use App\Models\AgentList;
use Illuminate\Http\Request;

class AgentListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agentlists = AgentList::all();
        $pageTitle = 'Agent Lists';
        return view('agentlists.index', compact('agentlists', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Agent';
        return view('agentlists.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'string|max:255',
            'username' => 'string|max:255',
            'email' => 'email|max:255|unique:agent_lists',
            'contact' => 'string|max:15',
            'active' => 'boolean',
        ]);

        AgentList::create($request->all());

        return redirect()->route('agentlists.index')->with('success', 'Agent created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agentList = AgentList::findOrFail($id);
        $pageTitle = 'Agent Details';

        return view('agentlists.show', compact('agentList', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agentList = AgentList::findOrFail($id);
        $pageTitle = 'Edit Agent';

        return view('agentlists.edit', compact('agentList', 'pageTitle'));
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
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'username' => 'string|max:255',
            'email' => 'email|max:255|unique:agent_lists,email,' . $id,
            'contact' => 'string|max:15',
            'active' => 'boolean',
        ]);

        $agentList = AgentList::findOrFail($id);
        $agentList->update($validatedData);

        return redirect()->route('agentlists.index')->with('success', 'Agent updated');
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
