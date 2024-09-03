<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\CostType;
use App\Models\Currency;
use App\Models\Property;
use App\Models\Supplier;
use App\Models\Taxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractsController extends Controller
{

    public function index()
    {
        $pageTitle = "Contracts";
        $contracts = Contract::paginate(20);

        return view('contracts.index', compact('contracts', 'pageTitle'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $supplier = Supplier::all();
        $property = Property::all();
        $currency = Currency::all();
        $costtype = CostType::all();
        $tax = Taxes::all();
        return view('contracts.create', compact('pageTitle', 'userId', 'supplier', 'property', 'currency', 'costtype', 'tax',));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'property_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'cost_type_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'terms_and_conditions' => 'nullable|string',
            'service_charge_value' => 'required|numeric',
            'service_charge_percentage' => 'nullable|boolean',
            'active' => 'nullable|boolean',
            'its_villa' => 'nullable|boolean',
            'its_apartment' => 'nullable|boolean',
        ]);

        Contract::create([
            'user_id' => $request->input('user_id'),
            'supplier_id' => $request->input('supplier_id'),
            'property_id' => $request->input('property_id'),
            'currency_id' => $request->input('currency_id'),
            'cost_type_id' => $request->input('cost_type_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'terms_and_conditions' => $request->input('terms_and_conditions'),
            'service_charge_value' => $request->input('service_charge_value'),
            'service_charge_percentage' => $request->input('service_charge_percentage'),
            'active' => $request->input('active'),
            'its_villa' => $request->input('its_villa'),
            'its_apartment' => $request->input('its_apartment'),
        ]);

        return redirect()->route('contracts.index');
    }



    public function show($id)
    {
        $contracts = Contract::findOrFail($id);
        $pageTitle = "View";
        return view('contracts.show', compact('pageTitle', 'contracts'));
    }


    public function edit($id)
    {
        $contracts = Contract::findOrFail($id);
        $userId = Auth::id();

        $supplier = Supplier::where('id', $contracts->supplier_id)->first();
        $suppliers = Supplier::where('id', '!=', $supplier->id)->get();

        $property = Property::where('id', $contracts->property_id)->first();
        $properties = Property::where('id', '!=', $property->id)->get();

        $currency = Currency::where('id', $contracts->currency_id)->first();
        $currencies = Currency::where('id', '!=', $currency->id)->get();

        $costtype = CostType::where('id', $contracts->cost_type_id)->first();
        $costtypes = CostType::where('id', '!=', $costtype->id)->get();

        $tax = Taxes::where('id', $contracts->tax_id)->first();
        $taxes = Taxes::where('id', '!=', $tax->id)->get();

        $pageTitle = "Edit";

        return view('contracts.edit', compact('contracts', 'userId', 'supplier', 'suppliers', 'property', 'properties', 'currency', 'currencies', 'costtype', 'costtypes', 'tax', 'taxes', 'pageTitle'));
    }


    public function update(Request $request, $id)
    {
        $contracts = Contract::findOrFail($id);
        $contracts = $contracts->update([
            'user_id' => $request->input('user_id'),
            'supplier_id' => $request->input('supplier_id'),
            'property_id' => $request->input('property_id'),
            'currency_id' => $request->input('currency_id'),
            'cost_type_id' => $request->input('cost_type_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'terms_and_conditions' => $request->input('terms_and_conditions'),
            'service_charge_value' => $request->input('service_charge_value'),
            'active' => $request->input('active'),
            'its_villa' => $request->input('its_villa'),
            'its_apartment' => $request->input('its_apartment'),
            'updated_at' => now(),
        ]);

        return redirect()->route('contracts.index');
    }


    public function destroy($id)
    {
        //
    }
}
