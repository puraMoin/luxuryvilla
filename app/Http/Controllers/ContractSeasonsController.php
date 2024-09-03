<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractSeason;
use App\Models\ContractSeasonType;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractSeasonsController extends Controller
{

    public function index()
    {
        $pageTitle = "Contract Seasons";
        $contractseasons = ContractSeason::paginate(20);

        return view('contractseasons.index', compact('contractseasons', 'pageTitle'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $contract = Contract::all();
        $contractseasontype = ContractSeasonType::all();
        $property = Property::all();
        return view('contractseasons.create', compact('pageTitle', 'userId', 'contractseasontype', 'property', 'contract'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'contract_id' => 'required|integer',
            'villa_master_id' => 'required|integer',
            'contract_season_type_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'tax_value' => 'required|numeric',
            'is_overall_text' => 'nullable|boolean',
            'service_charge' => 'required|numeric',
            'min_night_stay' => 'required|integer',
            'default_b2b_markup' => 'required|numeric',
            'default_b2b_markup_is_percentage' => 'nullable|boolean',
            'default_b2c_markup' => 'required|numeric',
            'default_b2c_markup_is_percentage' => 'nullable|boolean',
            'commission_value' => 'required|numeric',
            'comission_is_percentage' => 'nullable|boolean',
            'cost_type_id' => 'required|integer',
            'cost' => 'required|numeric',
            'allotment' => 'required|integer',
            'release_days' => 'required|integer',
            'active' => 'nullable|boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
            'deposit_amount' => 'required|numeric',
            'deposit_amount_is_percentage' => 'nullable|boolean',
            'final_date_of_payment' => 'required|date',
            'amount_days' => 'required|integer',
        ]);

        ContractSeason::create([
            'user_id' => $request->input('user_id'),
            'contract_id' => $request->input('contract_id'),
            'villa_master_id' => $request->input('villa_master_id'),
            'contract_season_type_id' => $request->input('contract_season_type_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'tax_value' => $request->input('tax_value'),
            'is_overall_text' => $request->input('is_overall_text'),
            'service_charge' => $request->input('service_charge'),
            'min_night_stay' => $request->input('min_night_stay'),
            'default_b2b_markup' => $request->input('default_b2b_markup'),
            'default_b2b_markup_is_percentage' => $request->input('default_b2b_markup_is_percentage'),
            'default_b2c_markup' => $request->input('default_b2c_markup'),
            'default_b2c_markup_is_percentage' => $request->input('default_b2c_markup_is_percentage'),
            'commission_value' => $request->input('commission_value'),
            'comission_is_percentage' => $request->input('comission_is_percentage'),
            'cost_type_id' => $request->input('cost_type_id'),
            'cost' => $request->input('cost'),
            'allotment' => $request->input('allotment'),
            'release_days' => $request->input('release_days'),
            'active' => $request->input('active'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
            'deposit_amount' => $request->input('deposit_amount'),
            'deposit_amount_is_percentage' => $request->input('deposit_amount_is_percentage'),
            'final_date_of_payment' => $request->input('final_date_of_payment'),
            'amount_days' => $request->input('amount_days'),
            'created_at'=> now(),
            'updated_at'=> now(),

        ]);

        return redirect()->route('contractseasons.index');
    }


    public function show($id)
    {
        $contractseasontype = ContractSeason::findOrFail($id);
        $pageTitle = "View";
        return view('contractseasons.show', compact('pageTitle', 'contractseasontype'));
    }


    public function edit($id)
    {
        $contractseasons = ContractSeason::findOrFail($id);
        $userId = Auth::id();

        $contract = Property::where('id', $contractseasons->contract_id)->first();
        $contracts = Property::where('id', '!=', $contract->id)->get();

        $property = Property::where('id', $contractseasons->property_id)->first();
        $properties = Property::where('id', '!=', $property->id)->get();

        $contractseasontype = Property::where('id', $contractseasons->property_id)->first();
        $contractseasontypes = Property::where('id', '!=', $contractseasontype->id)->get();

        $costtype = Property::where('id', $contractseasons->property_id)->first();
        $costtypes = Property::where('id', '!=', $costtype->id)->get();

        $pageTitle = "Edit";

        return view('contracts.edit', compact('contracts','contract', 'userId', 'contractseasontype', 'contractseasontypes','costtypes','costtype', 'property', 'properties', 'pageTitle'));
    }


    public function update(Request $request, $id)
    {
        $contractseasons = Contract::findOrFail($id);
        $contractseasons = $contractseasons->update([
            'user_id' => $request->input('user_id'),
            'contract_id' => $request->input('contract_id'),
            'villa_master_id' => $request->input('villa_master_id'),
            'contract_season_type_id' => $request->input('contract_season_type_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'tax_value' => $request->input('tax_value'),
            'is_overall_text' => $request->input('is_overall_text'),
            'service_charge' => $request->input('service_charge'),
            'min_night_stay' => $request->input('min_night_stay'),
            'default_b2b_markup' => $request->input('default_b2b_markup'),
            'default_b2b_markup_is_percentage' => $request->input('default_b2b_markup_is_percentage'),
            'default_b2c_markup' => $request->input('default_b2c_markup'),
            'default_b2c_markup_is_percentage' => $request->input('default_b2c_markup_is_percentage'),
            'commission_value' => $request->input('commission_value'),
            'comission_is_percentage' => $request->input('comission_is_percentage'),
            'cost_type_id' => $request->input('cost_type_id'),
            'cost' => $request->input('cost'),
            'allotment' => $request->input('allotment'),
            'release_days' => $request->input('release_days'),
            'active' => $request->input('active'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
            'deposit_amount' => $request->input('deposit_amount'),
            'deposit_amount_is_percentage' => $request->input('deposit_amount_is_percentage'),
            'final_date_of_payment' => $request->input('final_date_of_payment'),
            'amount_days' => $request->input('amount_days'),
            'updated_at' => now(),
        ]);

        return redirect()->route('contractseasons.index');
    }


    public function destroy($id)
    {
        //
    }
}
