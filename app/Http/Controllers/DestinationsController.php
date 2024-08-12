<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentMenu = 'Other Modules';
        $pageTitle = "Destinations";
        $destinations = Destination::with(['country','state','city'])->get();

        return view ('destinations.index',(compact('destinations','parentMenu','pageTitle')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add";
        $country = Country::where('id','101')->first();
        $countryId = $country->id ;
        $states = State::where('country_id','101')->get();
        return view('destinations.create',(compact('pageTitle','country','states')));
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
            'country_id'=>['required'],
            'state_id'=>['required'],
            'name'=>['required'],
            'one_line_description'=>['required'],
            'display_on_homepage'=>['required'],
            'no_of_elements_to_show'=>['required'],
            'homepage_order'=>['required'],                           
            'active'=>['required'],
            'is_top_destination'=>['required'],
        ]);

        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $destination = Destination::create([
                'country_id' => $request->input('country_id'),
                'state_id'=> $request->input('state_id'),
                'city_id'=> $request->input('city_id'),
                'name'=> $request->input('name'),
                'one_line_description'=> $request->input('one_line_description'),
                'display_on_homepage' => $request->input('display_on_homepage'),
                'no_of_elements_to_show'=> $request->input('no_of_elements_to_show'),
                'homepage_order'=> $request->input('homepage_order'),
                'description'=> $request->input('description'),
                'active'=> $request->input('active'),
                'slug'=> $request->input('slug'),
                'is_top_destination'=> $request->input('is_top_destination'),
                'created_at' => now(), // Set the created timestamp
                'updated_at' => now(),
            ]);     

            if ($request->hasFile('thumbnail_image')) {

                $image = $request->file('thumbnail_image');   
    
                $folder = 'images/destinations/thumbnail_image/'.$destination->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $destination->thumbnail_image = $image->getClientOriginalName();
                
               }
               if ($request->hasFile('cover_image')) {

                $image = $request->file('cover_image');   
    
                $folder = 'images/destinations/cover_image/'.$destination->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $destination->cover_image = $image->getClientOriginalName();
              
               }
                 
               $destination->save();

               return redirect()->route('destinations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destination = Destination::find($id);
        $pageTitle = "View";
        return view ('destinations.show',compact('pageTitle','destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);
        $pageTitle = "Destinations";
        $countryId = $destination->country_id;
        $country = Country::where('id',$countryId)->first();
        $othercountries = Country::all()->where('id','!=',$countryId);

        $stateId = $destination->state_id;
        $state = State::where('id',$stateId)->first();
        $otherstates = Country::all()->where('id','!=',$countryId);

        $cityId = $destination->city_id;
        $city = City::where('id',$cityId)->first();
        $othercities = City::all()->where('id','!=',$cityId)->where('state_id',$stateId);

        return view('destinations.edit',(compact('pageTitle','country','othercountries','state','otherstates','city','othercities','destination')));
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
        $destination = Destination::find($id);

        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $destination->update([
                'country_id' => $request->input('country_id'),
                'state_id'=> $request->input('state_id'),
                'city_id'=> $request->input('city_id'),
                'name'=> $request->input('name'),
                'one_line_description'=> $request->input('one_line_description'),
                'display_on_homepage' => $request->input('display_on_homepage'),
                'no_of_elements_to_show'=> $request->input('no_of_elements_to_show'),
                'homepage_order'=> $request->input('homepage_order'),
                'description'=> $request->input('description'),
                'active'=> $request->input('active'),
                'slug'=> $request->input('slug'),
                'is_top_destination'=> $request->input('is_top_destination'),
                'created_at' => now(), // Set the created timestamp
                'updated_at' => now(),
            ]);     

            if ($request->hasFile('thumbnail_image')) {

                $image = $request->file('thumbnail_image');   
    
                $folder = 'images/destinations/thumbnail_image/'.$destination->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $destination->thumbnail_image = $image->getClientOriginalName();
                
               }
               if ($request->hasFile('cover_image')) {

                $image = $request->file('cover_image');   
    
                $folder = 'images/destinations/cover_image/'.$destination->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $destination->cover_image = $image->getClientOriginalName();
              
               }
                 
               $destination->save();

               return redirect()->route('destinations.index');


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
