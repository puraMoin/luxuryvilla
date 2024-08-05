<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class StatesController extends Controller
{
   
    public function index(Request $request)
    {
        $pageTitle = 'States';
        $parentMenu = 'Segment & Currency Setup';
        // Eager load the related CountryDetail model
        // $states = State::with('country');
        $statesQuery = State::with('country');

        $countries = Country::all()->where('active',true);
        $countryList = $countries->pluck('name','id');


        $stateDetail = State::all();

        /*Country List*/
        $stateList = $statesQuery->pluck('name','id');


        $selectedCountryId = $selectedStateId = '';
        /*Filter By Country Id*/
        if(!empty($request->query('country_id'))){
            $selectedCountryId = $request->query('country_id');
            $statesQuery->where('country_id', $selectedCountryId);
        }

        /*Filte By State Id*/
         if(!empty($request->query('state_id'))){
            $selectedStateId = $request->query('state_id');
            $statesQuery->where('id', $selectedStateId);
        }

        $states = $statesQuery->paginate(20);

        //dd($states);die;

        return view('states.index',compact('parentMenu','pageTitle','states','countryList','selectedCountryId','stateList','selectedStateId'));
    }

   
    public function create()
    {
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Add";
        $userId = Auth::id();
        /*Controller*/
        // ,['pageTitle' => $this->pageTitle]
        $countries = Country::all();

        return view('states.create',compact('parentMenu','pageTitle','countries','userId'));
    }

   
    public function store(Request $request)
    {

        // Validate the request data
            $request->validate([
            'country_id' => ['required'],
            'name'=>['required'],
             ]);

        $countryName = $request->input('country_id');

        $country = Country::where('name', $countryName)->first();
        if(!empty($country))
        {
            $country_id = $country->id;
        } 

        $state = State::create([
            'country_id' => $country_id,
            'name' => $request->input('name'),
            'state_code' => $request->input('state_code'),            
            'description' => $request->input('description'),    
            'page_url' => $request->input('page_url'),         
            'canonical_url' => $request->input('canonical_url'),     
            'small_description' => $request->input('small_description'), 
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'active' => $request->input('active'),
            'is_publish_on_website' => $request->input('is_publish_on_website'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('states.index');
    }

    
    public function show($id)
    {

        // Find the country by ID
        $states = State::find($id);

        if (!$states) {
            return redirect()->route('states.index')->with('error', 'State not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'States';
        $parentMenu = 'Segment & Currency Setup';

        // You can pass the data to a view and display it
        return view('states.show', compact('states','pageTitle','parentMenu'));
    }

    
    public function edit($id)
    {
        $states = State::findOrFail($id);
        $userId = Auth::id();
        $country = Country::where('id', $states->country_id)->first(); 
        $countries = Country::where('id', '!=', $country->id)->get();
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Edit";
        return view('states.edit',compact('parentMenu','pageTitle','states','countries','country','userId'));
    }

    
    public function update(Request $request, $id)
    {

       $state = State::find($id);

        if (!$state) {
            return redirect()->route('states.index')->with('error', 'State not found.');
         }

        $countryName = $request->input('country_id');

        $country = Country::where('name', $countryName)->first();
        if(!empty($country))
        {
            $country_id = $country->id;
        } 

         $state->update([
            'country_id' => $country_id,
            'name' => $request->input('name'),
            'state_code' => $request->input('state_code'),            
            'description' => $request->input('description'),    
            'page_url' => $request->input('page_url'),         
            'canonical_url' => $request->input('canonical_url'),     
            'small_description' => $request->input('small_description'), 
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'active' => $request->input('active'),
            'is_publish_on_website' => $request->input('is_publish_on_website'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('states.index');
    }


  public function getStates($countryId)
     {
            
     $states = State::where('country_id', $countryId)->get();

     return response()->json($states);
    }
}
