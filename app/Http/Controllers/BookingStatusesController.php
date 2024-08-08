<?php

namespace App\Http\Controllers;

use App\Models\BookingStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingStatusesController extends Controller
{
    
    public function index()
    {
        $bookingstatuses = BookingStatuses::all();
        $pageTitle = 'Booking Statuses';
        return view('bookingstatuses.index', compact('bookingstatuses', 'pageTitle'));
    }

    
    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('bookingstatuses.create', compact('userId', 'pageTitle'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'icon' => 'nullable|string|max:150',
            'paid' => 'required|string|max:255',
            'invoice' => 'required|string|max:255',
            'email_template'=> 'required|string|max:255',
            'active'=> 'boolean',
            
        ]);

        $bookingstatuses = BookingStatuses::create([
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'icon' => $request->input('icon'),
            'paid' => $request->input('paid'),
            'invoice' => $request->input('invoice'),
            'email_template' => $request->input('email_template'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('icon')) {

            $image = $request->file('icon');   

            $folder = 'images/country/icon/'.$bookingstatuses->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $bookingstatuses->image_file = $image->getClientOriginalName();
           }

           $bookingstatuses->save();

        return redirect()->route('bookingstatuses.index');

    }

    
    public function show($id)
    {
        $bookingstatuses = BookingStatuses::findOrFail($id);
        $pageTitle = 'View';

        return view('bookingstatuses.show', compact('bookingstatuses', 'pageTitle'));
    }

    
    public function edit($id)
    {
        $bookingstatuses = BookingStatuses::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('bookingstatuses.edit', compact('bookingstatuses', 'pageTitle', 'userId'));
    }

   
    public function update(Request $request, $id)
    {
        $bookingstatuses = BookingStatuses::findOrFail($id);
        $bookingstatuses->update([
            
        ]);
    }

}
