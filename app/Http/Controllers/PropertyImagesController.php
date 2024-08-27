<?php

namespace App\Http\Controllers;

use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyImagesController extends Controller
{

    public function index()
    {
        $pageTitle = 'Property Images';
        $propertyimages = PropertyImage::paginate(20);
        return view('propertyimages.index', compact('propertyimages', 'pageTitle'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('propertyimages.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {
        // dd($request); // working all files are visible
        $request->validate([
            'name' => 'required|string|max:255',
            'is_cover_image' => 'required|string|max:255',
            'display_order' => 'required|string|max:255',
            'active' => 'boolean',
            'image_file' => 'nullable|image',
            'created_by'=> 'nullable | integer',
            'modified_by'=> 'nullable | integer',
        ]);

        $propertyimages = PropertyImage::create([
            'name' => $request->input('name'),
            'is_cover_image' => $request->input('is_cover_image'),
            'display_order' => $request->input('display_order'),
            'active' => $request->input('active'),
            'image_file' => $request->input('image_file'),
            'created_by' => $request->input('created_by'),
            'modified_by' => $request->input('modified_by'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/propertyimages/image_file/' . $propertyimages->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $propertyimages->image_file = $image->getClientOriginalName();
        }
        $propertyimages->save();

        return redirect()->route('propertyimages.index');
    }


    public function show($id)
    {
        $propertyimages = PropertyImage::findOrFail($id);
        $pageTitle = 'View';
        return view('propertyimages.show', compact('propertyimages', 'pageTitle'));
    }


    public function edit($id)
    {
        $propertyimages = PropertyImage::findOrFail($id);
        $userId = Auth::id();
        $pageTitle = "Edit";
        return view('propertyimages.edit', compact('pageTitle', 'propertyimages', 'userId'));
    }


    public function update(Request $request, $id)
    {
        $propertyimages = PropertyImage::findOrFail($id);
        $propertyimages->update([
            'name' => $request->input('name'),
            'is_cover_image' => $request->input('is_cover_image'),
            'display_order' => $request->input('display_order'),
            'active' => $request->input('active'),
            'modified_by' => $request->input('modified_by'),
            'updated_at' => now(),
        ]);

    // Handle Image Upload
    if ($request->hasFile('image_file')) {
        $image = $request->file('image_file');
        $folder = 'images/propertyimages/image_file/' . $propertyimages->id;
        $image->move(public_path($folder), $image->getClientOriginalName());

        // Update the image_file field with the image name
        $propertyimages->image_file = $image->getClientOriginalName();
    }
    $propertyimages->save();

        return redirect()->route('propertyimages.index');
    }


    public function destroy($id)
    {
        //
    }
}
