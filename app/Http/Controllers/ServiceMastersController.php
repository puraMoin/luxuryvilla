<?php

namespace App\Http\Controllers;

use App\Models\ServiceMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceMastersController extends Controller
{

    public function index()
    {
        $pageTitle = 'Service Master';
        $servicemasters = ServiceMaster::all();
        $servicemasters_pag = ServiceMaster::paginate(20);
        return view('servicemasters.index', compact('servicemasters', 'pageTitle','servicemasters_pag'));
    }


    public function create()
    {
        $userId = Auth::id();
        $pageTitle = 'Create';
        return view('servicemasters.create', compact('userId', 'pageTitle'));
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $servicemasters = ServiceMaster::findOrFail($id);
        $pageTitle = 'View';
        return view('servicemasters.show', compact('servicemasters', 'pageTitle'));
    }


    public function edit($id)
    {
        $servicemasters = ServiceMaster::findOrFail($id);
        $pageTitle = 'Edit';
        $userId = Auth::id();
        return view('servicemasters.edit', compact('servicemasters', 'pageTitle', 'userId'));
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        //
    }
}
