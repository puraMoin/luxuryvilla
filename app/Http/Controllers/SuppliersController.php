<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyMaster;
use App\Models\OnlineSupplier;
use App\Models\SupplierRegionType;
use App\Models\SupplierType;
use App\Models\SupplierOnlineSupplier;
use App\Models\SupplierAccessToCompany;
use Illuminate\Support\Str;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Suppliers List';
        $parentMenu = 'Suppliers';

        $suppliersQuery = Supplier::with(['suppliertype','supplierregiontype','country','states','city']);

        $suppliers = $suppliersQuery->paginate(20);

        return view('suppliers.index',compact('pageTitle','parentMenu','suppliers'));
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

        $supplierTypes = SupplierType::all();

        $supplierregionTypes = SupplierRegionType::all();

        $country = Country::where('id', '101')->first();
        $countryId = $country->id;        
        $states = State::where('country_id', '101')->get();

        /*For Online Supplier Multiple Dropdown Start*/
        
        $onlineSuppliers = OnlineSupplier::all()->where('active',true);

        /*For Online Supplier Multiple Dropdown End*/
        /*For Supplier Code Start*/
        $lastsupplierId = Supplier::max('id');

        $lastsupplierData = Supplier::where('id',$lastsupplierId)->first();

        $uniqueCode = $lastsupplierData->supplier_unique_number;

        $newCode =  $uniqueCode + 1;

        $supplierCode = 'S/Dr/' . $newCode;
        /*For Supplier Code End*/

        /*For Companies Start*/
        $companies = CompanyMaster::all()->where('active',true);
        /*For Companies End*/
        return view('suppliers.create',compact('pageTitle','supplierTypes','supplierregionTypes','onlineSuppliers','country','states','supplierCode','newCode','companies','userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
        //dd($request);die;
       $request->validate([
        'supplier_code'=>'required',
        'supplier_type_id'=>'required',
        'name'=>'required',
        'supplier_region_type_id'=>'required',
        'doing_business_under_name_of'=>'required',
        'gst_no'=>'required',
        'company_address'=>'required',
        'country_id'=>'required',
        'state_id'=>'required',
        'city_id'=>'required',
        'zipcode'=>'required',
        'area'=>'required',
        'is_online_supplier'=>'required',
        'contact_no_1'=>'required',
        'contact_no_2'=>'required',
        'fax'=>'required',
        'email'=>'required',
        'payee_name'=>'required',
        'description'=>'required',
        'google_address'=>'required',
        'supplier_unique_number'=>'required',
        'active'=>'required',
        'created_by'=>'required',
        'modified_by'=>'required',
        'is_supplier'=>'required',
    ]);

     $suppliertypeId = $request->input('supplier_type_id');
     $supplierregiontypeId = $request->input('supplier_region_type_id');
     $countryId = $request->input('country_id');
     $stateId = $request->input('state_id');
     $cityId = $request->input('city_id');

    $supplier = Supplier::create([
        'supplier_code'=> $request->input('supplier_code'),
        'supplier_type_id'=> $suppliertypeId,
        'name'=> $request->input('name'),
        'supplier_region_type_id'=> $supplierregiontypeId,
        'doing_business_under_name_of'=> $request->input('doing_business_under_name_of'),
        'gst_no'=> $request->input('gst_no'),
        'company_address'=> $request->input('company_address'),
        'country_id'=> $countryId,
        'state_id'=> $stateId,
        'city_id'=> $cityId,
        'zipcode'=> $request->input('zipcode'),
        'area'=> $request->input('area'),
        'is_online_supplier'=> $request->input('is_online_supplier'),
        'contact_no_1'=> $request->input('contact_no_1'),
        'contact_no_2'=> $request->input('contact_no_2'),
        'fax'=> $request->input('fax'),
        'email'=> $request->input('email'),
        'payee_name'=> $request->input('payee_name'),
        'description'=> $request->input('description'),
        'google_address'=> $request->input('google_address'),
        'supplier_unique_number'=> $request->input('supplier_unique_number'),
        'active'=> $request->input('active'),
        'created_by'=> $request->input('created_by'),
        'modified_by'=> $request->input('modified_by'),
        'is_supplier'=> $request->input('is_supplier'),
        'created_at'=> now(),
        'updated_at'=> now(),
    ]);

    //dd($supplier);
     // Handle image uploads
    if ($request->hasFile('image_file')) {

        $image = $request->file('image_file');

        $folder = 'images/supplier/image_file/'.$supplier->id;

        // Save the image directly to the public folder
        $image->move(public_path($folder), $image->getClientOriginalName());
        //dd($image1Path);

        $supplier->image_file = $image->getClientOriginalName();
       }

       $supplier->save();

       $onlineSuppliers = $request->input('onlinesuppliers');

       if(!empty($onlineSuppliers)){
        foreach ($request->input('onlinesuppliers') as $onlineSuppliersId) {
            $supplieronlinesupplier = SupplierOnlineSupplier::create([
                'supplier_id' => $supplier->id, // Assuming 'id' is the primary key of Supplier table
                'online_supplier_id' => $onlineSuppliersId,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
       }


       $supplierAccess = $request->input('SupplierAccessToCompany');

       if(!empty($supplierAccess)){
        foreach($request->input('SupplierAccessToCompany') as $supplierAccess){
            //dd($supplierAccess['access_in_transaction']);
            $accessInTransaction = isset($supplierAccess['access_in_transaction']) && $supplierAccess['access_in_transaction'] === 'on' ? 1 : 0;
            //dump($accessInTransaction);
            $isVisibleInCompany = isset($supplierAccess['is_visible_in_company']) && $supplierAccess['is_visible_in_company'] === 'on' ? 1 : 0;
            //dd($isVisibleInCompany);

            $dataToSave = [
                'supplier_id' => $supplier->id,
                'company_master_id' => isset($supplierAccess['company_master_id']) ? $supplierAccess['company_master_id'] : '',
                'access_in_transaction' => $accessInTransaction,
                'is_visible_in_company' => $isVisibleInCompany,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            SupplierAccessToCompany::create($dataToSave);
        }
       }

        return redirect()->route('suppliers.edit', ['supplier' => $supplier->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);

        //dd($user);

        if (!$supplier) {
            return redirect()->route('suppliers.index')->with('error', 'Supplier not found.');
        }
        // Retrieve additional details if needed
        $pageTitle = 'Show';
        $parentMenu = 'Supplier';

        return view('suppliers.show', compact('supplier','pageTitle','parentMenu'));
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
        $parentMenu = 'Supplier';

        $pageTitle = "Edit";

        $supplier = Supplier::findOrFail($id);

        $userId = Auth::id();

        $supplierType = SupplierType::where('id', $supplier->supplier_type_id)->first();
        $supplierTypes = SupplierType::where('id', '!=', $supplierType->id)->get();

        $supplierregionType = SupplierRegionType::where('id', $supplier->supplier_region_type_id)->first();
        $supplierregionTypes = SupplierRegionType::where('id', '!=', $supplierregionType->id)->get();

        /*For Multiple Online Suppliers Start*/
        $selectedonlineSupplier = $supplier->onlinesuppliers;

        $selectedIds = $selectedonlineSupplier->pluck('id')->toArray();

        $onlineSuppliers = OnlineSupplier::whereNotIn('id', $selectedIds)->get(); 
        /*For Multiple Online Suppliers End*/
        
        $countryId = $supplier->country_id;
        $country = Country::where('id', $countryId)->first();

        $stateId = $supplier->state_id;
        $state = State::where('id', $stateId)->first();
        $otherstates = State::all()->where('id', '!=', $stateId);


        $cityId = $supplier->city_id;
        $city = City::where('id', $cityId)->first();
        $othercities = City::all()->where('id', '!=', $cityId)->where('state_id', $stateId);

        /*For Companies Start*/
        $companies = CompanyMaster::all()->where('active',true);
        /*For Companies End*/

        /*For Supplier Access to Company Table Start*/
        $supplierAccesstoCompany = SupplierAccessToCompany::where('supplier_id', $id)->get();

        // Debug output
        //dd($supplierAccesstoCompany, $companies);
 
        /*For Supplier Access to Company Table End*/
        return view('suppliers.edit', compact('supplier','pageTitle','parentMenu','userId','supplierType','supplierTypes','supplierregionType','supplierregionTypes','selectedonlineSupplier','onlineSuppliers','country','state','otherstates','city','othercities','companies','supplierAccesstoCompany'));          
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
        //dump($request);
        $newPassword = ($request->input('password'));
        $supplier = Supplier::findOrFail($id);

        $suppliertypeId = $request->input('supplier_type_id');
        $supplierregiontypeId = $request->input('supplier_region_type_id');
        $countryId = $request->input('country_id');
        $stateId = $request->input('state_id');
        $cityId = $request->input('city_id');

        $supplier->update([
            'supplier_code'=> $request->input('supplier_code'),
            'supplier_type_id'=> $suppliertypeId,
            'name'=> $request->input('name'),
            'username'=> $request->input('username'),
            'supplier_region_type_id'=> $supplierregiontypeId,
            'doing_business_under_name_of'=> $request->input('doing_business_under_name_of'),
            'gst_no'=> $request->input('gst_no'),
            'company_address'=> $request->input('company_address'),
            'country_id'=> $countryId,
            'state_id'=> $stateId,
            'city_id'=> $cityId,
            'zipcode'=> $request->input('zipcode'),
            'area'=> $request->input('area'),
            'is_online_supplier'=> $request->input('is_online_supplier'),
            'contact_no_1'=> $request->input('contact_no_1'),
            'contact_no_2'=> $request->input('contact_no_2'),
            'fax'=> $request->input('fax'),
            'email'=> $request->input('email'),
            'payee_name'=> $request->input('payee_name'),
            'description'=> $request->input('description'),
            'google_address'=> $request->input('google_address'),
            'supplier_unique_number'=> $request->input('supplier_unique_number'),
            'active'=> $request->input('active'),
            'modified_by'=> $request->input('modified_by'),
            'is_supplier'=> $request->input('is_supplier'),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        //dump($supplier);
        
        if($newPassword != null){
            $supplier->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

             // Handle image uploads
        if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');

            $folder = 'images/supplier/image_file/'.$supplier->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());
            //dd($image1Path);

            $supplier->image_file = $image->getClientOriginalName();
        }

        $supplier->save();
        // Sync the associated Online Suppliers
	    $supplier->onlinesuppliers()->sync($request->input('onlinesuppliers')); 
        
        foreach ($request->input('SupplierAccessToCompany') as $supplierAccess) {
            //dump($supplierAccess);
            // Convert checkbox values to 1 or 0
            $accessInTransaction = isset($supplierAccess['access_in_transaction']) && $supplierAccess['access_in_transaction'] === '1' ? 1 : 0;
            //dump($accessInTransaction);
            $isVisibleInCompany = isset($supplierAccess['is_visible_in_company']) && $supplierAccess['is_visible_in_company'] === '1' ? 1 : 0;
            //dd($isVisibleInCompany);
            // Retrieve company_master_id from input
            $companyMasterId = isset($supplierAccess['company_master_id']) ? $supplierAccess['company_master_id'] : '';
        
            // Update or create the record
            SupplierAccessToCompany::updateOrCreate(
                [
                    'supplier_id' => $supplier->id,
                    'company_master_id' => $companyMasterId,
                ],
                [
                    'access_in_transaction' => $accessInTransaction,
                    'is_visible_in_company' => $isVisibleInCompany,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

      return redirect()->route('suppliers.index');

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
