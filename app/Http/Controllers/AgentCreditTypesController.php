<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentCreditType;
use Illuminate\Support\Facades\Auth;

class AgentCreditTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Agent Credit Types';
        $parentMenu = 'Agents';
        $agentcredittypes = AgentCreditType::all();
        $agentcredittypes_pag = AgentCreditType::paginate(20);

        return view('agentcredittypes.index',compact('parentMenu','pageTitle','agentcredittypes','agentcredittypes_pag'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "AgentCreditType";
        $parentMenu = 'Create';

        $userId = Auth::id();

        return view('agentcredittypes.create',compact('parentMenu','pageTitle','userId'));
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
            'name' => ['required']
             ]);

         $agentcredittype = AgentCreditType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         return redirect()->route('agentcredittypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agentcredittype = AgentCreditType::find($id);

        if (!$agentcredittype) {
            return redirect()->route('agentcredittypes.index')->with('error', 'agentcredittypes not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'Show';
        $parentMenu = 'Agents';

        // You can pass the data to a view and display it
        return view('agentcredittypes.show', compact('agentcredittype','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agentcredittype = AgentCreditType::findOrFail($id);
        /*dd($role);*/
        //dd($menuLinks);
        $parentMenu = 'Agents';

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('agentcredittypes.edit',compact('parentMenu','pageTitle','agentcredittype','userId'));
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
        $agentcredittype = AgentCreditType::find($id);

        if (!$agentcredittype) {
            return redirect()->route('agentcredittypes.index')->with('error', 'agentcredittypes not found.');
         }

       // Update the role information
        $agentcredittype->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    return redirect()->route('agentcredittypes.index');
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
