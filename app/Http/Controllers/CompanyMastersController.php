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
        $request->validate([
            'name'=>['required'],
            'alias'=>['required'],
            'registration_no'=>['required'],
            'vat_no'=>['required'],
            'business_registration_name'=>['required'],
            'tin_no'=>['required'],
            'currency_id'=>['required'],
            'country_id' => ['required'],
            'state_id'=>['required'],
            'city_id'=>['required'],
            'zipcode'=>['required'],
            'phone_calling_code_1'=>['required'],
            'contact_no_1'=>['required'],
            'email'=>['required'],
            'active'=>['required'],
            'created_by'=>['required'],
            'modified_by'=>['required'],
        ]);

        $currencyId = $request->input('currency_id');
        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $companymaster = CompanyMaster::create([
                'name' => $request->input('name'),
                'alias'=> $request->input('alias'),
                'registration_no'=> $request->input('registration_no'),
                'vat_no'=> $request->input('tin_no'),
                'business_registration_name'=> $request->input('business_registration_name'),
                'tin_no' => $request->input('tin_no'),
                'currency_id'=> $currencyId,
                'incorporate_name'=> $request->input('incorporate_name'),
                'website'=> $request->input('website'),
                'address'=> $request->input('address'),
                'country_id'=>  $countryId,
                'state_id'=> $stateId,
                'city_id'=> $cityId,
                'zipcode'=> $request->input('zipcode'),   
                'area'=> $request->input('area'),    
                'phone_calling_code_1'=> $request->input('phone_calling_code_1'),         
                'contact_no_1'=> $request->input('contact_no_1'),           
                'phone_calling_code_2'=> $request->input('phone_calling_code_2'),    
                'contact_no_2'=> $request->input('contact_no_2'),
                'email'=> $request->input('email'),
                'fax'=> $request->input('fax'),
                'note'=> $request->input('note'),
                'active'=> $request->input('active'),
                'facebook_link'=> $request->input('facebook_link'),          
                'twitter_link'=> $request->input('twitter_link'),       
                'google_address'=> $request->input('google_address'), 
                'created_by' => $request->input('created_by'), 
                'modified_by'=> $request->input('modified_by'),
                'created_at' => now(), // Set the created timestamp
                'updated_at' => now(),
            ]);     

            if ($request->hasFile('image_file')) {

                $image = $request->file('image_file');   
    
                $folder = 'images/companymasters/image_file/'.$companymaster->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $companymaster->image_file = $image->getClientOriginalName();
                
               }
               if ($request->hasFile('header_image_file')) {

                $image = $request->file('header_image_file');   
    
                $folder = 'images/companymasters/header_image_file/'.$companymaster->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $companymaster->header_image_file = $image->getClientOriginalName();
              
               }
               
               if ($request->hasFile('footer_image_file')) {

                $image = $request->file('footer_image_file');   
    
                $folder = 'images/companymasters/footer_image_file/'.$companymaster->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $companymaster->footer_image_file = $image->getClientOriginalName();
                
               }    
               $companymaster->save();

               return redirect()->route('companymasters.index');

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
        $othercities = City::all()->where('id','!=',$cityId)->where('state_id',$stateId);

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('companymasters.edit',compact('companymaster','pageTitle','userId','currency','othercurrencies','country','othercountries','state','otherstates','city','othercities'));

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
        $companymaster = CompanyMaster::find($id);
        //dd($companymaster);
        $currencyId = $request->input('currency_id');
        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $companymaster->update([
                'name' => $request->input('name'),
                'alias'=> $request->input('alias'),
                'registration_no'=> $request->input('registration_no'),
                'vat_no'=> $request->input('tin_no'),
                'business_registration_name'=> $request->input('business_registration_name'),
                'tin_no' => $request->input('tin_no'),
                'currency_id'=> $currencyId,
                'incorporate_name'=> $request->input('incorporate_name'),
                'website'=> $request->input('website'),
                'address'=> $request->input('address'),
                'country_id'=>  $countryId,
                'state_id'=> $stateId,
                'city_id'=> $cityId,
                'zipcode'=> $request->input('zipcode'),   
                'area'=> $request->input('area'),    
                'phone_calling_code_1'=> $request->input('phone_calling_code_1'),         
                'contact_no_1'=> $request->input('contact_no_1'),           
                'phone_calling_code_2'=> $request->input('phone_calling_code_2'),    
                'contact_no_2'=> $request->input('contact_no_2'),
                'email'=> $request->input('email'),
                'fax'=> $request->input('fax'),
                'note'=> $request->input('note'),
                'active'=> $request->input('active'),
                'facebook_link'=> $request->input('facebook_link'),          
                'twitter_link'=> $request->input('twitter_link'),       
                'google_address'=> $request->input('google_address'), 
                'modified_by'=> $request->input('modified_by'),
                'created_at' => now(), // Set the created timestamp
                'updated_at' => now(),
            ]);     

            if ($request->hasFile('image_file')) {

                $image = $request->file('image_file');   
    
                $folder = 'images/companymasters/image_file/'.$companymaster->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $companymaster->image_file = $image->getClientOriginalName();
                
               }
               if ($request->hasFile('header_image_file')) {

                $image = $request->file('header_image_file');   
    
                $folder = 'images/companymasters/header_image_file/'.$companymaster->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $companymaster->header_image_file = $image->getClientOriginalName();
              
               }
               
               if ($request->hasFile('footer_image_file')) {

                $image = $request->file('footer_image_file');   
    
                $folder = 'images/companymasters/footer_image_file/'.$companymaster->id;
    
                // Save the image directly to the public folder
                $image->move(public_path($folder), $image->getClientOriginalName());   
                //dd($image1Path);        
                $companymaster->footer_image_file = $image->getClientOriginalName();
                
               }    
               $companymaster->save();

               return redirect()->route('companymasters.index');

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
