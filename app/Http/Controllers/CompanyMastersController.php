<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CompanyMaster;
use App\Models\Currency;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class CompanyMastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Company Master";
        $companymasters = CompanyMaster::with(['currency','country','state','city'])->get();

        return view ('companymasters.index',(compact('companymasters','parentMenu','pageTitle')));
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
        $currencies = Currency::all();
        $country = Country::where('id','101')->first();
        $countryId = $country->id ;
        $states = State::where('country_id','101')->get();

        return view ('companymasters.create',compact('pageTitle','parentMenu','userId','currencies','country','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companymaster = CompanyMaster::find($id);
        $parentMenu = 'Other Modules';
        $pageTitle = "View";
        return view ('companymasters.show',compact('pageTitle','parentMenu','companymaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companymaster = CompanyMaster::find($id);

        $currencyId = $companymaster->currency_id;
        $currency = Currency::where('id',$currencyId)->first();
        $othercurrencies = Currency::all()->where('id','!=',$currencyId);

        $countryId = $companymaster->country_id;
        $country = Country::where('id',$countryId)->first();
        $othercountries = Country::all()->where('id','!=',$countryId);

        $stateId = $companymaster->state_id;
        $state = State::where('id',$stateId)->first();
        $otherstates = Country::all()->where('id','!=',$countryId);

        $cityId = $companymaster->city_id;
        $city = City::where('id',$cityId)->first();
        $othercities = City::all()->where('id','!=',$cityId);

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('companymasters.edit',compact('companymaster','pageTitle','userId','currency','othercurrencies','country','othercountries','city','othercities'));

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
        //
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
