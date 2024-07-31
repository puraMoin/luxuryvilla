<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;

class CountriesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Countries';
        $parentMenu = 'Segment & Currency Setup';
        // Eager load the related CountryDetail model
        $countries = Country::paginate(20);
        //dd($countries);
        return view('countries.index', compact('parentMenu', 'pageTitle', 'countries'));
    }


    public function create()
    {
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Add";
        return view('countries.create', compact('parentMenu', 'pageTitle'));
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'segment_id' => 'integer',
            'passport_validity_in_yrs_adult' => 'nullable|string|max:5',
            'passport_validity_in_yrs_child' => 'nullable|string|max:5',
            'name' => 'string|max:255',
            'is_domestic_country' => 'nullable|boolean',
            'is_state_allowed' => 'nullable|boolean',
            'is_publish_on_website' => 'boolean',
            'alpha_2_code' => 'string|max:2',
            'alpha_3_code' => 'nullable|string|max:3',
            'calling_code' => 'integer',
            'mobile_number_min_length' => 'nullable|string|max:3',
            'mobile_number_max_length' => 'nullable|string|max:3',
            'mobile_number_series' => 'nullable|string|max:50',
            'page_url' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|string|max:255',
            'country_description' => 'nullable|string',
            'country_description_website' => 'nullable|string',
            'small_description' => 'nullable|string',
            'latitude' => 'nullable|string|max:45',
            'longitude' => 'nullable|string|max:45',
            'image_file' => 'nullable|string|max:150',
            'active' => 'boolean',
            'fast_facts' => 'nullable|string',
            'created_by' => 'integer',
            'modified_by' => 'integer',
        ]);

        $country = Country::create([
            // 'segment_id' => $request->input('segment_id'),
            'passport_validity_in_yrs_adult' => $request->input('passport_validity_in_yrs_adult'),
            'passport_validity_in_yrs_child' => $request->input('passport_validity_in_yrs_child'),
            'name' => $request->input('name'),
            'is_domestic_country' => $request->input('is_domestic_country'),
            'is_state_allowed' => $request->input('is_state_allowed'),
            'is_publish_on_website' => $request->input('is_publish_on_website'),
            'alpha_2_code' => $request->input('alpha_2_code'),
            'alpha_3_code' => $request->input('alpha_3_code'),
            'calling_code' => $request->input('calling_code'),
            'mobile_number_min_length' => $request->input('mobile_number_min_length'),
            'mobile_number_max_length' => $request->input('mobile_number_max_length'),
            'mobile_number_series' => $request->input('mobile_number_series'),
            'page_url' => $request->input('page_url'),
            'canonical_url' => $request->input('canonical_url'),
            'country_description' => $request->input('country_description'),
            'country_description_website' => $request->input('country_description_website'),
            'small_description' => $request->input('small_description'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'image_file' => $request->input('image_file'),
            'active' => $request->input('active'),
            'fast_facts' => $request->input('fast_facts'),
            'created_by' => $request->input('created_by'),
            // 'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('countries.index');
    }


    public function show($id)
    {
        $countries = Country::findOrFail($id);
        $pageTitle = 'View';

        return view('countries.show', compact('countries', 'pageTitle'));
    }


    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        $parentMenu = 'Super Master';

        $pageTitle = "Edit";
        $userId = Auth::id();
        return view('countries.edit', compact('parentMenu', 'pageTitle', 'countries', 'userId'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $country = Country::findOrFail($id);
        $country->update([
            'passport_validity_in_yrs_adult' => $request->input('passport_validity_in_yrs_adult'),
            'passport_validity_in_yrs_child' => $request->input('passport_validity_in_yrs_child'),
            'name' => $request->input('name'),
            'is_domestic_country' => $request->input('is_domestic_country'),
            'is_state_allowed' => $request->input('is_state_allowed'),
            'is_publish_on_website' => $request->input('is_publish_on_website'),
            'alpha_2_code' => $request->input('alpha_2_code'),
            'alpha_3_code' => $request->input('alpha_3_code'),
            'calling_code' => $request->input('calling_code'),
            'mobile_number_min_length' => $request->input('mobile_number_min_length'),
            'mobile_number_max_length' => $request->input('mobile_number_max_length'),
            'mobile_number_series' => $request->input('mobile_number_series'),
            'page_url' => $request->input('page_url'),
            'canonical_url' => $request->input('canonical_url'),
            'country_description' => $request->input('country_description'),
            'country_description_website' => $request->input('country_description_website'),
            'small_description' => $request->input('small_description'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'image_file' => $request->input('image_file'),
            'active' => $request->input('active'),
            'fast_facts' => $request->input('fast_facts'),
            'updated_at' => now(),
        ]);

        return redirect()->route('countries.index');
    }
}
