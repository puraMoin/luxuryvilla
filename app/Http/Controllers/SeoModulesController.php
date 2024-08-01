<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoModule;

class SeoModulesController extends Controller
{
    
    public function index()
    {
        $pageTitle = 'Seo Modules';
        $parentMenu = 'Super Master';

        $seomodules = SeoModule::all();

        return view('seomodules.index',compact('parentMenu','pageTitle','seomodules'));
    }

    
    public function create()
    {
         $pageTitle = 'Add';
         $parentMenu = 'Super Master';
         /*Controller*/
        $controllers = $this->getControllers();
         return view('seomodules.create',compact('pageTitle','parentMenu','controllers'));
    }

    
    public function store(Request $request)
    {
     
            $request->validate([
            'page_name' => ['required'],
            'page_title' => ['required'],
            'page_url' => ['required'],
             'link' => ['required'],
             ]);

         $seoModule = SeoModule::create([
            'page_name' => $request->input('page_name'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'link' => $request->input('link'),
            'active' => $request->input('active'),
            'meta_keyword' => $request->input('meta_keyword'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('seomodules.index');
    }

    
    public function show($id)
    {
        
       
        $seomodule = SeoModule::find($id);

        if (!$seomodule) {
            return redirect()->route('seomodules.index')->with('error', 'Seo not found.');
        }

        

        $pageTitle = 'Seo Modules';
        $parentMenu = 'Super Master';

        
        return view('seomodules.show', compact('seomodule','pageTitle','parentMenu'));
    }

    
    public function edit($id)
    {
        $seomodule = SeoModule::findOrFail($id);   

        $parentMenu = 'Super Master';

        /*Controllers*/
        $controllers = $this->getControllers();
        /*Select Data As Per ID*/
        $menulinks = SeoModule::find($id);
    
        $pageTitle = "Edit";
        return view('seomodules.edit',compact('parentMenu','pageTitle','seomodule','menulinks','controllers'));
    }

    
    public function update(Request $request, $id)
    {
        $seomodule = SeoModule::find($id);
        $seomodule->update($request->all());

        $seomodule->save();

       return redirect()->route('seomodules.index');

    }

    
    public function destroy($id)
    {
        //
    }

        public function getControllers(){
        $controllerPath = app_path('Http/Controllers');
        // var_dump($controllerPath);exit;
        $controllers = [];
        foreach (glob("$controllerPath/*.php") as $file) {
            // $controllers[] = ['select Controller'];
            $controllers[] = str_replace('.php', '', basename($file));
        }

        // var_dump($controllers);exit;

        return $controllers;
    }
}
