<?php

namespace App\Http\Controllers;

use App\Models\BookingStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingStatusesController extends Controller
{
    public function index()
    {
        // $bookingstatuses = BookingStatuses::all();
        $pageTitle = 'Booking Status';
        $bookingstatuses = BookingStatuses::paginate(20);
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
            'icon' => 'nullable|image|max:2048',
            'paid' => 'required|string|max:255',
            'invoice' => 'required|string|max:255',
            'email_template' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $bookingstatuses = BookingStatuses::create([
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'paid' => $request->input('paid'),
            'invoice' => $request->input('invoice'),
            'email_template' => $request->input('email_template'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $folder = 'images/bookingstatuses/icon/' . $bookingstatuses->id;
            $icon->move(public_path($folder), $icon->getClientOriginalName());
            $bookingstatuses->icon = $icon->getClientOriginalName();
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
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'paid' => 'required|string|max:255',
            'invoice' => 'required|string|max:255',
            'email_template' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $bookingstatuses->update([
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'paid' => $request->input('paid'),
            'invoice' => $request->input('invoice'),
            'email_template' => $request->input('email_template'),
            'active' => $request->input('active'),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $folder = 'images/bookingstatuses/icon/' . $bookingstatuses->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $bookingstatuses->icon = $image->getClientOriginalName();
        }

        $bookingstatuses->save();

        return redirect()->route('bookingstatuses.index');
    }
}
