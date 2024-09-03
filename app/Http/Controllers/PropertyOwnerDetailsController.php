<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyOwnerDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Country;
use App\Models\State;

class PropertyOwnerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Contact Details';
        $parentMenu = 'Property';

        $propertyOwnerDetailQuery = PropertyOwnerDetail::with(['properties','country','states','city']);

        $propertyOwnerDetails = $propertyOwnerDetailQuery->paginate(20);

        return view('propertyownerdetails.index',compact('pageTitle','parentMenu','propertyOwnerDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        $userId = Auth::id();
        $properties = Property::all();

        $country = Country::where('id', '101')->first();
        $countryId = $country->id;
        $states = State::where('country_id', '101')->get();

       return view('propertyownerdetails.create',compact('pageTitle','properties','country','states','userId'));

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
        $propertyOwnerDetail = PropertyOwnerDetail::find($id);

        if (!$propertyOwnerDetail) {
            return redirect()->route('propertyownerdetails.index')->with('error', 'propertyOwnerDetail not found.');
        }
        // Retrieve additional details if needed
        $pageTitle = 'Show';
        $parentMenu = 'Property';

        return view('propertyownerdetails.show', compact('propertyOwnerDetail','pageTitle','parentMenu'));
        // You can pass the data to a view and display it
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
