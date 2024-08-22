<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\RolesRight;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class UsersController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        // Show change password form
    public function showChangePasswordForm()
    {
        $pageTitle = 'Users';
        return view('users.changepassword',compact('pageTitle'));
    }
    // Handle change password form submission
    public function changePassword(Request $request)
    {
        //dd($request);
        // Validate the form data
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.']);
        }

        // Compare new password and confirm password
        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['confirm_password' => 'The new password and confirm password do not match.']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->route('users.index');
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roleId = null)
    {
        $pageTitle = 'Admin List';
        $parentMenu = 'Super Master';

        if($roleId == 4){
            $conditions = '4';		
            $title = "Agent List";
            $usertype = '4';	
          }elseif($roleId == 3){
            $conditions = '3';		
             $title = "Employee List";
             $usertype = '3';	
          }elseif($roleId == 2){
              $conditions = '2';
              $title = "User List";
              $usertype = '2';
          }else{
              $conditions = '1';
              $title = "Admin List";
              $usertype = '1';
          }

        $usersQuery = User::with(['roles','companymaster','country','states','city'])->where('role_id',$conditions);

        $users = $usersQuery->paginate(20);
       
        //dd($users);die;

        return view('users.index',compact('users','pageTitle','parentMenu','usertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($roleId = null){
        $pageTitle = 'Add';
        $rolesRights = RolesRight::all()->where('active',true);

        $country = Country::where('id', '101')->first();
        $countryId = $country->id;
        $states = State::where('country_id', '101')->get();

        if($roleId == 4){
            $conditions = '4';	
            $title = "Agent List";
            $userType = '4';
            $alias = 'AGT';	
          }elseif($roleId == 3){
            $conditions = '3';		
             $title = "Employee List";
             $userType = '3';
             $alias = 'EMP';	
          }elseif($roleId == 2){
              $conditions = '2';	
              $title = "User List";
              $userType = '2';
              $alias = 'USR';
          }else{
              $conditions = '1';	
              $title = "Admin List";
              $userType = '1';
              $alias = 'ADM';
          }

	     /*Unique Code Generator*/
          $date = date('Ymd');
          $userData = User::all()->where('role_id',$conditions)->max('id');
          $uniqueId = $userData + 1;
          //$userData = $this->User->find('all',['conditions'=>$conditions,'contain'=>false,'fields'=>['MAX(User.id)']]);

          $userCode = $alias.'/'.$date.'/'.$uniqueId;

          //dd($userCode);
        return view('users.create',compact('pageTitle','rolesRights','country','states','userCode','userType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);die;     
       $request->validate([
            'role_id'=>'required',
            'user_code'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'contact_no'=>'required',
            'mobile_no'=>'required',
            'google_address'=>'required',
            'country_id'=>'required',            
            'state_id'=>'required',   
            'city_id'=>'required',   
            'area'=>'required',  
            'zipcode'=>'required',  
            'address'=>'required',  
            'active'=>'required',  
        ]);

         $roleId = $request->input('role_id');
         $countryId = $request->input('country_id');
         $stateId = $request->input('state_id');
         $cityId = $request->input('city_id');

         $firstName = $request->input('first_name');
         $lastName = $request->input('last_name');
         $fullName = $firstName . ' ' . $lastName;

        $users = User::create([
            'role_id' => $roleId,
            'user_code'=> $request->input('user_code'),
            'first_name'=> $firstName,
            'last_name'=> $lastName,  
            'name' => $fullName,
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'mobile_no' => $request->input('mobile_no'),
            'google_address' => $request->input('google_address'),
            'country_id' => $request->input('country_id'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'area' => $request->input('area'),
            'zipcode' => $request->input('zipcode'),
            'address' => $request->input('address'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/users/image_file/'.$users->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $users->image_file = $image->getClientOriginalName();
           }

           $users->save();

        return redirect()->route('users.edit', ['user' => $users->id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        //dd($user);

        if (!$user) {
            return redirect()->route('states.index')->with('error', 'State not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Users';
        $parentMenu = 'Super Master';

        // You can pass the data to a view and display it
        return view('users.show', compact('user','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentMenu = 'Super Master';
   
        $pageTitle = "Edit";

        $user = User::findOrFail($id);
        //dd($user);
        $otherGender = $user->gender == 'Male' ? 'Female' : 'Male';

        $role = RolesRight::where('id', $user->role_id)->first(); 
        $roles = RolesRight::where('id', '!=', $role->id)->get();

        $countryId = $user->country_id;
        $country = Country::where('id', $countryId)->first();

        $stateId = $user->state_id;
        $state = State::where('id', $stateId)->first();
        $otherstates = State::all()->where('id', '!=', $stateId);

        $cityId = $user->city_id;
        $city = City::where('id', $cityId)->first();
        $othercities = City::all()->where('id', '!=', $cityId)->where('state_id', $stateId);

        return view('users.edit',compact('parentMenu','pageTitle','user','role','roles','otherGender','country','state','otherstates','city','othercities'));
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
         $newPassword = ($request->input('password'));
         $user = User::find($id);

         $roleId = $request->input('role_id');
         $countryId = $request->input('country_id');
         $stateId = $request->input('state_id');
         $cityId = $request->input('city_id');

         $firstName = $request->input('first_name');
         $lastName = $request->input('last_name');
         $fullName = $firstName . ' ' . $lastName;

        $user->update([
            'role_id' => $request->input('role_id'),
            'user_code'=> $request->input('user_code'),
            'name' => $request->input('name'),
            'first_name'=> $firstName,
            'last_name'=> $lastName,  
            'name' => $fullName,
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'mobile_no' => $request->input('mobile_no'),
            'google_address' => $request->input('google_address'),
            'country_id' => $countryId,
            'state_id' =>  $stateId,
            'city_id' => $cityId,
            'area' => $request->input('area'),
            'zipcode' => $request->input('zipcode'),
            'address' => $request->input('address'),
            'active' => $request->input('active'),
            'username' => $request->input('username'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        if($newPassword != null){
            $user->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

         // Handle image uploads
         // Handle image uploads
         if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/users/image_file/'.$user->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $user->image_file = $image->getClientOriginalName();
           }

           $user->save();

        return redirect()->route('users.index');
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
