<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    
    public function index()
    {
        $pageTitle = 'Currency';
        $parentMenu = 'Super Master';
        $currency = Currency::all();
        return view('currency.index', compact('parentMenu', 'pageTitle', 'currency'));
    }

    
    public function create()
    {
        $pageTitle = 'Add';
        $userId = Auth::id();  
        return view('currency.create', compact('pageTitle', 'userId'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'iso_code' => 'string|max:10',  
            'iso_code_num' => 'string|max:10',  
            'conversion_rate' => 'numeric',
            'sign' => 'string',
            'blank' => 'boolean',
            'format' => 'boolean',
            'decimals' => 'boolean',
            'display_on_frontend' => 'boolean',
            'active' => 'boolean',
            'created_by' => 'required|integer', 
            'modified_by' => 'required|integer', 
        ]);
    
        $currency = Currency::create([
            'name' => $request->input('name'),
            'iso_code' => $request->input('iso_code'),
            'iso_code_num' => $request->input('iso_code_num'),
            'sign' => $request->input('sign'),
            'blank' => $request->input('blank'),
            'format' => $request->input('format'),
            'decimals' => $request->input('decimals'),
            'conversion_rate' => $request->input('conversion_rate'),
            'display_on_frontend' => $request->input('display_on_frontend'),
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('currency.index')->with('success', 'Currency created!');
    }

    
    public function show($id)
    {
        $currency = Currency::findOrFail($id);
        $pageTitle = 'View';

        return view('currency.show', compact('currency', 'pageTitle'));
    }

    
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        $parentMenu = 'Super Master';

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('currency.edit', compact('parentMenu', 'pageTitle', 'currency', 'userId'));
    }

   
    public function update(Request $request, $id)
    {
        // dd($request);exit;
        // $request->validate([
        //     'name' => 'string|max:255',
        //     'active' => 'boolean',
        // ]);
    
        $currency = Currency::findOrFail($id);
        $currency->update([
            'name' => $request->input('name'),
            'iso_code' => $request->input('iso_code'),
            'iso_code_num' => $request->input('iso_code_num'),
            'sign' => $request->input('sign'),
            'blank' => $request->input('blank'),
            'format' => $request->input('format'),
            'decimals' => $request->input('decimals'),
            'conversion_rate' => $request->input('conversion_rate'),
            'display_on_frontend' => $request->input('display_on_frontend'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), 
            'updated_at' => now(),
        ]);
    
        return redirect()->route('currency.index');
    }

    public function destroy($id)
    {
        //
    }
}
