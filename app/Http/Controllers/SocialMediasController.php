<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\CompanyWebsite;
use Illuminate\Support\Facades\Auth;

class SocialMediasController extends Controller
{
    public function index()
    {
        $pageTitle = 'Social Media';
        $parentMenu = 'Master';
        $socialmedias = SocialMedia::all();
        return view('socialmedias.index', compact('parentMenu', 'pageTitle', 'socialmedias'));
    }


    public function create()
    {
        $pageTitle = 'Create';
        $userId = Auth::id();
        $companywebsite = CompanyWebsite::all();
        return view('socialmedias.create', compact('pageTitle','userId','companywebsite'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_website_id' => 'required|integer',
            'name' => 'required|string|max:255',
            // 'image'=> 'mimes:jpeg,jpg,png,gif',
            'link' => 'required|string|max:1000',
            'order' => 'required|string|max:1000',
            'active' => 'boolean',
        ]);

        $socialmedia = SocialMedia::create([
            'company_website_id' => $request->input('company_website_id'),
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'order' => $request->input('order'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/socialmedias/image/'. $socialmedia->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $socialmedia->image = $image->getClientOriginalName();
           }

           $socialmedia->save();

        return redirect()->route('socialmedias.index');
    }

    public function show($id)
    {
        $socialmedias = SocialMedia::findOrFail($id);
        $pageTitle = 'View';
        $parentMenu = 'Master';
        return view('socialmedias.show', compact('socialmedias', 'pageTitle', 'parentMenu'));
    }

    public function edit($id)
    {
        $socialmedias = SocialMedia::findOrFail($id);
        $parentMenu = 'Master';
        $userId = Auth::id();

        $companywebsite = CompanyWebsite::where('id', $socialmedias->company_website_id)->first();
        // dd($companywebsite);
        $companywebsites = CompanyWebsite::where('id', '!=', $companywebsite->id)->get();
        // dd($companywebsites);

        $pageTitle = "Edit";
        return view('socialmedias.edit', compact('parentMenu', 'pageTitle', 'socialmedias','companywebsite','companywebsites'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $socialmedias = SocialMedia::find($id);
        $socialmedias->update([
            'company_website_id' => $request->input('company_website_id'),
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'order' => $request->input('order'),
            'active' => $request->input('active'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/socialmedias/image/' . $socialmedias->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $socialmedias->image = $image->getClientOriginalName();
        }

        $socialmedias->save();

        return redirect()->route('socialmedias.index');
    }

    public function destroy($id)
    {
        //
    }
}
