<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Auth;


class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //dd($request);
        $pageTitle = 'City';
        $parentMenu = 'Segment & Currency Setup';
        // Eager load the related CountryDetail model
        $cityQuery = City::where('country_id','101')->with(['country', 'state']);


        //dd($cityQuery);
        /*Country List*/
        $countries = Country::all()->where('active',true);
        $countryList = $countries->pluck('name','id');

        /*States List*/
        $states = State::all()->where('active',true);
        $stateList = $states->pluck('name','id');

        /*City List*/
        //dd($cityList);

        /*City Status*/
        $cityStatus = ['Active'=>'true','Inactive'=>'false'];

        $statusValue = $activeConditions = $selectedCountryId = $selectedStateId = '';

        if(!empty($request->query('active'))){
            $statusValue = $request->query('active');
            if($statusValue == 'true'){
                $cityQuery->where('active', true);
            }else{
               $cityQuery->where('active', false);
            }
        }

        /*Filter By Country Id*/
        if(!empty($request->query('country_id'))){
            $selectedCountryId = $request->query('country_id');
            $cityQuery->where('country_id', $selectedCountryId);
        }

        /*Filte By State Id*/
         if(!empty($request->query('state_id'))){
            $selectedStateId = $request->query('state_id');
            $cityQuery->where('state_id', $selectedStateId);
        }

         /*Filter By Id*/

        $searchId = $request->query('id');
        if ($searchId) {
            $cityQuery->where('name', 'LIKE', '%' . $searchId . '%');
        }


        $cities = $cityQuery->paginate(20);

        // dd($cities);

        return view('cities.index',compact('parentMenu','pageTitle','countryList','stateList','searchId',
            'selectedCountryId','selectedStateId','statusValue','cityStatus','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Add";
        $city = City::all();
        $countries = Country::all();
        $userId = Auth::id();
        return view('cities.create',compact('parentMenu','pageTitle','city','countries','userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
          $request->validate([
            'country_id' => ['required'],
            'state_id'=>['required'],
             ]);

          $countryId = $request->input('country_id');
          $stateId = $request->input('state_id');

          $country = Country::find($countryId);
          $state = State::find($stateId);


        if(!empty($country))
        {
            $country_id = $country->id;
        }
        if(!empty($state))
        {
            $state_id = $state->id;
        }


        $city = City::create([
            'country_id' => $country_id,
            'state_id'=> $state_id,
            'name' => $request->input('name'),
            'city_code' => $request->input('city_code'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'country_code' => $request->input('country_code'),
            'country_name' => $request->input('country_name'),
            'description' => $request->input('description'),
            'small_description' => $request->input('small_description'),
            'fast_facts' => $request->input('fast_facts'),
            'active' => $request->input('active'),
            'is_publish_on_website' => $request->input('is_publish_on_website'),
            'created_by' => $request->input('created_by'),
            'modified_by'=> $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
               // Find the country by ID
        $city = City::find($id);

        if (!$city) {
            return redirect()->route('city.index')->with('error', 'State not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'City';
        $parentMenu = 'Segment & Currency Setup';

        // You can pass the data to a view and display it
        return view('cities.show', compact('city','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $city = City::findOrFail($id);
       $country = Country::where('id', $city->country_id)->first();
       $countries = Country::where('id', '!=', $country->id)->get();

       $countryId = $city->country_id;
       $stateId = (!empty($city->state_id)) ? $city->state_id : '';

       $states = State::where('country_id',$city->country_id)->get();

    //    if(!empty($city->state_id)){
    //     $state = State::where('id', $city->state_id)->first();
    //     $states = State::where('id', '!=', $state->id)->get();
    //    } else {
    //     $state =  $states = '';
    //    }

       $parentMenu = 'Segment & Currency Setup';

       $pageTitle = "Edit";
       $userId = Auth::id();
       return view('cities.edit',compact('parentMenu','pageTitle','city','countries','country','states','stateId','userId'));
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
        //dd($request);
        $city = City::find($id);

        if (!$city) {
            return redirect()->route('cities.index')->with('error', 'State not found.');
         }

          $countryId = $request->input('country_id');
          $stateId = $request->input('state_id');

          $country = Country::find($countryId);
          $state = State::find($stateId);


        if(!empty($country))
        {
            $country_id = $country->id;
        }
        if(!empty($state))
        {
            $state_id = $state->id;
        }

        $city->update([
            'country_id' => $country_id,
            'state_id'=> $state_id,
            'name' => $request->input('name'),
            'city_code' => $request->input('city_code'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'country_code' => $request->input('country_code'),
            'country_name' => $request->input('country_name'),
            'description' => $request->input('description'),
            'small_description' => $request->input('small_description'),
            'fast_facts' => $request->input('fast_facts'),
            'active' => $request->input('active'),
            'is_publish_on_website' => $request->input('is_publish_on_website'),
            'modified_by'=> $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('cities.index');
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

    public function getCities($stateId)
    {
        $cities = "";
        if($stateId){
            $cities = City::where('state_id',$stateId)->get();
        }

        return response()->json($cities);

    }
}
