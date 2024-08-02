<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;




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
        $cityQuery = City::with(['country', 'state', 'timezone']);

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
        /*Controller*/
        // ,['pageTitle' => $this->pageTitle]
        $city = City::all();

        //dd($timezones);
        $countries = Country::all();
        return view('cities.create',compact('parentMenu','pageTitle','city','countries'));
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
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
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
       $state = State::where('id', $city->state_id)->first();
       $states = State::where('id', '!=', $state->id)->get();

       $parentMenu = 'Segment & Currency Setup';
    
       $pageTitle = "Edit";
       return view('cities.edit',compact('parentMenu','pageTitle','city','countries','country','state','states','timezone','timezones'));
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
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
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
}
