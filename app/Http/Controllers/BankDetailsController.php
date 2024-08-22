<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use Illuminate\Http\Request;
use App\Models\CompanyMaster;
use App\Models\Currency;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class BankDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Bank Details";
        $bankdetails = BankDetail::with(['companymaster','currency', 'country', 'state', 'city'])->get();
        $bankdetails_pag = BankDetail::paginate(20);
        return view('bankdetails.index', (compact('bankdetails', 'parentMenu', 'pageTitle','bankdetails_pag')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Add";
        $userId = Auth::id();
        $companymaster = CompanyMaster::all();
        $currencies = Currency::all();
        $country = Country::where('id', '101')->first();
        $countryId = $country->id;
        $states = State::where('country_id', '101')->get();

        return view('bankdetails.create', compact('pageTitle', 'parentMenu', 'userId', 'currencies', 'country', 'states','companymaster'));
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
            'name' => 'required',
            'company_master_id'=>'required',
            'alias' => 'required',
            'sort_code' => 'required',
            'address' => 'required',
            'currency_id' => 'required',
            'swift_code' => 'required',
            'iban_no' => 'required',
            'ifsc_code'=>'required',
            'bank_contact' =>'required',
            'connecting_bank_name'=>'required',
            'connecting_bank_ifsc_code'=>'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'active' => 'required',
            'created_by' => 'required',
            'modified_by' => 'required',
        ]);

        $companymasterId = $request->input('company_master_id');
        $currencyId = $request->input('currency_id');
        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $bankdetail = BankDetail::create([
            'company_master_id' => $companymasterId,
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'sort_code' => $request->input('sort_code'),
            'address' => $request->input('address'),
            'account_no' => $request->input('account_no'),
            'currency_id' => $currencyId,
            'swift_code' => $request->input('swift_code'),
            'iban_no' => $request->input('iban_no'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_contact' => $request->input('bank_contact'),
            'connecting_bank_name' => $request->input('connecting_bank_name'),
            'connecting_bank_ifsc_code' => $request->input('connecting_bank_ifsc_code'),
            'google_address' => $request->input('google_address'),
            'country_id' =>  $countryId,
            'state_id' => $stateId,
            'city_id' => $cityId,
            'active' => $request->input('active'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('bankdetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankdetail = BankDetail::find($id);
        $parentMenu = 'Other Modules';
        $pageTitle = "View";
        return view('bankdetails.show', compact('pageTitle', 'parentMenu', 'bankdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankdetail = BankDetail::find($id);
        //dd($bankdetail);
        $companymasterId = $bankdetail->company_master_id;
        $companymaster = CompanyMaster::where('id', $companymasterId)->first();
        $othercompanymasters = CompanyMaster::all()->where('id', '!=', $companymasterId);

        $currencyId = $bankdetail->currency_id;
        $currency = Currency::where('id', $currencyId)->first();
        $othercurrencies = Currency::all()->where('id', '!=', $currencyId);

        $countryId = $bankdetail->country_id;
        $country = Country::where('id', $countryId)->first();

        $stateId = $bankdetail->state_id;
        $state = State::where('id', $stateId)->first();
        $otherstates = State::all()->where('id', '!=', $stateId);

        $cityId = $bankdetail->city_id;
        $city = City::where('id', $cityId)->first();
        $othercities = City::all()->where('id', '!=', $cityId)->where('state_id', $stateId);

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('bankdetails.edit', compact('bankdetail', 'pageTitle', 'userId', 'companymaster','othercompanymasters','currency', 'othercurrencies', 'country', 'state', 'otherstates', 'city', 'othercities'));
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
        $bankdetail = BankDetail::find($id);

        $companymasterId = $request->input('company_master_id');
        $currencyId = $request->input('currency_id');
        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $bankdetail->update([
            'company_master_id' => $companymasterId,
            'name' => $request->input('name'),
            'alias' => $request->input('alias'),
            'sort_code' => $request->input('sort_code'),
            'address' => $request->input('address'),
            'account_no' => $request->input('account_no'),
            'currency_id' => $currencyId,
            'swift_code' => $request->input('swift_code'),
            'iban_no' => $request->input('iban_no'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_contact' => $request->input('bank_contact'),
            'connecting_bank_name' => $request->input('connecting_bank_name'),
            'connecting_bank_ifsc_code' => $request->input('connecting_bank_ifsc_code'),
            'google_address' => $request->input('google_address'),
            'country_id' =>  $countryId,
            'state_id' => $stateId,
            'city_id' => $cityId,
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('bankdetails.index');
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
