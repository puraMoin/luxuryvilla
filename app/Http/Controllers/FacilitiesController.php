<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Facility List';
        $parentMenu = 'Suppliers';

        $facilities = Facility::paginate(20);

        return view('facilities.index',compact('pageTitle','parentMenu','facilities'));
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

        return view ('facilities.create',compact('pageTitle','parentMenu'));
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
            'name' => 'required|string|max:255',
            'description'=>'required',
            'active' => 'required|boolean',
        ]);

        $facility = Facility::create([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'active'=> $request->input('active'),
            'created_by'=> $request->input('created_by'),
            'modified_by'=> $request->input('modified_by'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);


        if ($request->hasFile('icon_image')) {

            $image = $request->file('icon_image');

            $folder = 'images/facility/icon_image/'.$facility->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());
            //dd($image1Path);
            $facility->icon_image = $image->getClientOriginalName();

           }

           $facility->save();

        return redirect()->route('facilities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = Facility::findOrfail($id);
        $pageTitle = "Show";

        return view('facilities.show',compact('facility','pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::find($id);
        $pageTitle = "Edit";
        return view('facilities.edit',compact('facility','pageTitle'));
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
        $facility = Facility::find($id);
        $facility->update([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'active'=> $request->input('active'),
            'modified_by'=> $request->input('modified_by'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);


         if ($request->hasFile('icon_image')) {

            $image = $request->file('icon_image');

            $folder = 'images/facility/icon_image/'.$facility->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());
            //dd($image1Path);
            $facility->icon_image = $image->getClientOriginalName();

           }

           $facility->save();

        return redirect()->route('facilities.index');
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
