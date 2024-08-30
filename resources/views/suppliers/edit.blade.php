@extends('layouts.app')

@section('content')
   <style>
        #imageBox {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }


   </style>
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <div class="right-mob-left">
        <a href="{{ route('suppliers.index') }}">
          <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Back</button>
        </a>
      </div>

    <!-- For Start Here -->
   <form method="POST" action="{{ route('suppliers.update', ['supplier' => $supplier->id]) }}" enctype="multipart/form-data">
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
         <h4>Basic Details:</h4>
          <!-- Id -->
         <input type="hidden"  name="id" value="{{ $supplier->id }}"  />
         <input type="hidden" name="supplier_code" value="{{ $supplier->supplier_code }}" >
         <input type="hidden" name="supplier_unique_number" value="{{ $supplier->supplier_unique_number }}" >
         <input type="hidden" name="modified_by" value="{{ $userId }}" >
         <!-- Supplier Name -->
         <div class="col-sm-4 mt-10">
            <div class="input-style-1">
            <label>Supplier Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Your Supplier Name" required="true" value="{{ $supplier->name }}" />
            </div>
         </div>
          <!-- Supplier Type -->
          <div class="col-sm-4 mt-10">
            <div class="select-style-1">
            <label> Supplier Type <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="supplier_type_id" required>
                <option value="{{ $supplierType->id }}">{{ $supplierType->name }}</option>
                  @foreach ($supplierTypes as $supplierType)
                    <option value="{{ $supplierType->id }}">{{ $supplierType->name }}</option>
                  @endforeach                 
             </select>
             </div>
            </div>
         </div>   
         <!-- Supplier Region Type -->
         <div class="col-sm-4 mt-10">
            <div class="select-style-1">
            <label> Supplier Region Type <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="supplier_region_type_id" required>
                <option value="{{ $supplierregionType->id }}">{{$supplierregionType->name}}</option>
                  @foreach ($supplierregionTypes as $supplierregionType)
                    <option value="{{ $supplierregionType->id }}">{{ $supplierregionType->name }}</option>
                  @endforeach                 
             </select>
             </div>
            </div>
         </div>  
         <hr>
         <div class="row">
            <h4>Contact Information:</h4>
            <!-- Contact No 1-->
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
                  <label>Contact No 1<span class="mandatory">*</span></label>
                  <input type="text"  name="contact_no_1" placeholder="Enter Your Contact No 1" class="numeric" required="true" value="{{ $supplier->contact_no_1 }}"/>
               </div>
            </div>
            <!-- Contact No 2 -->
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
                  <label>Contact No 2<span class="mandatory">*</span></label>
                  <input type="text"  name="contact_no_2" placeholder="Enter Your Contact No 2" class="numeric" required="true" value="{{ $supplier->contact_no_2 }}" />
               </div>
            </div>
            <!-- Fax -->
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
               <label>Fax<span class="mandatory">*</span></label>
               <input type="text"  name="fax" placeholder="Enter Your Fax" required="true" value="{{ $supplier->fax }}" />
               </div>
            </div>
            <!-- Email -->
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
               <label>Email<span class="mandatory">*</span></label>
               <input type="email"  name="email" placeholder="Enter Your Email" required="true" value="{{ $supplier->email }}" />
               </div>
            </div>
          </div>
          <hr> 
          <div class="row">
            <!-- UserName -->
            <h4>Login Details:</h4>
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
               <label>UserName<span class="mandatory">*</span></label>
               <input type="email"  name="username" placeholder="Enter Your Username" required="true"
                value="{{ $supplier->username }}"/>
               </div>
            </div>
   
         <div class="col-sm-3 col-xs-3 mt-10" style="padding-right: 0px">
            <div class="input-style-1">
               <label>Password<span class="mandatory">*</span></label>
               <input type="password" id="psw" name="password" autocomplete="off" required  placeholder="Enter your password"  value="{{ $supplier->password }}" disabled='true'>
           </div>
         </div>
         <div class="col-sm-3 col-xs-3 mt-35" style="padding-left: 0px">
            <div class="input-style-1">
               <button type="button" class="btn btn-sm btn-warning changePassword" style="border-radius: 0px; height:42px"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
           </div>
         </div>  
         </div>     
         <hr>
         <div class="row">
            <!-- Doing Business Under Name Of -->
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
               <label>Doing Business Under Name Of<span class="mandatory">*</span></label>
               <input type="text"  name="doing_business_under_name_of" placeholder="Doing Business Under Name Of" required="true" value="{{ $supplier->doing_business_under_name_of }}" />
               </div>
            </div>
           <!-- GST No. -->  
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
               <label>GST No.<span class="mandatory">*</span></label>
               <input type="text"  name="gst_no" placeholder="Enter Your GST No." required="true" value="{{ $supplier->gst_no }}" />
               </div>
            </div>
             <!-- Is Online Supplier -->
            <div class="col-sm-3 mt-10">            
               <label>Is Online Supplier</label><br>
                  <label class="radio-inline">
                  <input type="radio" name="is_online_supplier" class="radio-inline IsOnlineSupplier" value="1" {{ $supplier->is_online_supplier == 1 ? 'checked' : '' }}> Yes
               </label>
               <label class="radio-inline">
                  <input type="radio" name="is_online_supplier" class="radio-inline IsOnlineSupplier" value="0" {{ $supplier->is_online_supplier == 0 ? 'checked' : '' }}> No
               </label>         
             </div>  
            <!-- Online Supplier -->
            <div class="col-sm-3 mt-10">
               <div class="select-style-1 onlinesupplier">
               <label> Online Supplier <span class="mandatory"> *</span></label>
               <div class="select-position select-sm">
                <select class="jSelectbox" id="actionDropdown" name="onlinesuppliers[]" multiple="true" >
                  @foreach ($selectedonlineSupplier as $selectedonlineSupplier)              
                   <option value="{{ $selectedonlineSupplier->id }}" selected>{{ $selectedonlineSupplier->name }}</option>
                   @endforeach  
                     @foreach ($onlineSuppliers as $onlineSupplier)
                       <option value="{{ $onlineSupplier->id }}">{{ $onlineSupplier->name }}</option>
                     @endforeach                 
                </select>
                </div>  
               </div>
            </div>          
          </div>
         <hr>   
         <div class="row">
            <h4>Address Information:</h4>
            <div class="col-sm-9 mt-10">
               <div class="input-style-1">
               <label>Location (Only Area, City, State, Country)<span class="mandatory">*</span></label>
               <input type="text"  name="google_address" value="{{ $supplier->google_address }}" />
               </div>
            </div>
            <div class="col-sm-3 mt-10">
               <div class="input-style-1">
                  <label>Company Address <span class="mandatory">*</span></label>
                     <textarea name="company_address" rows="2">{{ $supplier->company_address }}</textarea>
               </div>
            </div>   
         </div>  
         <div class="row">
            <!-- Country Name -->
            <div class="col-sm-3">
               <div class="select-style-1">
                     <label>Country</label>
                     <div class="select-position select-sm">
                        <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                        </select>
                        </div>
                  </div>
               </div>
               <!-- State Name -->
               <div class="col-sm-3">
                  <div class="select-style-1">
                     <label>State</label>
                        <div class="select-position select-sm">
                           <select class="jSelectbox" id="StateactionDropdown" name="state_id" required>
                           <option value="{{ $state ? $state->id : '' }}">{{ $state ? $state->name : 'Select Your State' }}</option>
                              @foreach ($otherstates as $states)
                                 <option value="{{ $states->id }}">{{ $states->name }}</option>
                              @endforeach
                          </select>
                        </div>
                     </div>
                  </div>
               <!-- City Name -->
               <div class="col-sm-3">
                  <div class="select-style-1">
                     <label>City</label>
                     <div class="select-position select-sm">
                        <select class="jSelectbox" id="cityDropdown" name="city_id" required>
                         <option value="{{ $city ? $city->id : '' }}">{{ $city ? $city->name : 'Select Your City' }}</option>
                         @foreach ($othercities as $city)
                             <option value="{{ $city->id }}">{{ $city->name }}</option>
                         @endforeach
                      </select>
                      </div>
                  </div>
               </div>
              <!-- Area -->
               <div class="col-sm-3">
                  <div class="input-style-1">
                  <label>Area<span class="mandatory">*</span></label>
                  <input type="text"  name="area" placeholder="Enter Your Area" required="true" value="{{ $supplier->area }}" />
                  </div>
               </div>
              <!-- Zip Code -->
              <div class="col-sm-3">
                  <div class="input-style-1">
                  <label>Zip Code<span class="mandatory">*</span></label>
                  <input type="text" name="zipcode" class="numeric" placeholder="Enter Your Zip Code" required="true" value="{{ $supplier->zipcode }}" />
                  </div>
              </div>
         </div>
         <hr>    
         <div class="row">
            <!-- Payee Name -->
                 <div class="col-sm-3">
                     <div class="input-style-1">
                     <label>Payee Name<span class="mandatory">*</span></label>
                     <input type="text" name="payee_name" placeholder="Enter Your Payee Name" required="true" value="{{ $supplier->payee_name }}" />
                     </div>
                 </div>
            <!-- Description -->     
                 <div class="col-sm-4">
                     <div class="input-style-1">
                        <label>Description<span class="mandatory">*</span></label>
                           <textarea name="description" rows="2">{{ $supplier->description }}</textarea>
                     </div>
                 </div>      
            <!-- Description -->    
               <div class="col-sm-3">
                  <!-- Active -->
                  <label>Active</label><br>
                  <label class="radio-inline">
                  <input type="radio" name="active" class="radio-inline" value="1"  {{ $supplier->active == 1 ? 'checked' : '' }}> Yes
                  </label>
                  <label class="radio-inline">
                  <input type="radio" name="active" class="radio-inline" value="0" {{ $supplier->active == 0 ? 'checked' : '' }}> No
                  </label>
               </div>      
            </div> 
            <hr>  
            <div class="row">
               <h4>Supplier Information:</h4>
               <!-- Supplier Logo: -->
               <div class="col-sm-3 mt-10">
                  <label>Supplier Logo:</label>
                  <div id="imageBox">
                  <img id="selectedImage" src="{{ $supplier->image_file ? asset('images/supplier/image_file/' . $supplier->id . '/' . $supplier->image_file) : asset('images/no-image.png') }}" alt="Selected Image">
                  </div>
                  <input type="file" name="image_file" id="imageInput" onchange="displayImage(this)">
               </div>
               <div class="col-sm-3 mt-10">
                  <!-- Is Default Supplier -->
                  <label>Is Default Supplier</label><br>
                  <label class="radio-inline">
                  <input type="radio" name="is_default_supplier" class="radio-inline" value="1"  {{ $supplier->is_default_supplier == 1 ? 'checked' : '' }}> Yes
                  </label>
                  <label class="radio-inline">
                  <input type="radio" name="is_default_supplier" class="radio-inline" value="0"  {{ $supplier->is_default_supplier == 0 ? 'checked' : '' }}> No
                  </label>
               </div>  
               <div class="col-sm-3 mt-10">
                  <!-- Is Supplier -->
                  <label>Is Supplier</label><br>
                  <label class="radio-inline">
                  <input type="radio" name="is_supplier" class="radio-inline" value="1" {{ $supplier->is_supplier == 1 ? 'checked' : '' }}> Yes
                  </label>
                  <label class="radio-inline">
                  <input type="radio" name="is_supplier" class="radio-inline" value="0" {{ $supplier->is_supplier == 0 ? 'checked' : '' }}> No
                  </label>
               </div>         
            </div>
            <hr> 
            <div class="row">
               <h4>Access To Companies:</h4>
               <div class="col-sm-12 mt-15">
                  <table class="table table-bordered">
                      <thead>
                           <tr>
                              <th><?php echo __("Company Name");?></th>
                           <!-- <th><?php //echo __("Edit");?></th>
                           <th><?php //echo __("Delete");?></th> -->
                           <th><?php echo __("Access In Transaction");?></th>
                           <th><?php echo __("Visible In Company");?></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($companies as $key => $companyMaster)      
                        <?php
                        // Find the access entry for the current company
                        $access = $supplierAccesstoCompany->firstWhere('company_master_id', $companyMaster->id);
                        //dd($access);
                          ?>         
                        <tr>
                           <td><input type="hidden" name="SupplierAccessToCompany[{{ $key }}][company_master_id]" value="{{ $companyMaster->id }}">
                           {{ $companyMaster->name }}</td>
                           <td> <input type="checkbox" name="SupplierAccessToCompany[{{ $key }}][access_in_transaction]" value="1" {{ isset($access) && $access->access_in_transaction ? 'checked' : '' }}> </td>
                           <td> <input type="checkbox" name="SupplierAccessToCompany[{{ $key }}][is_visible_in_company]" value="1" {{ isset($access) && $access->is_visible_in_company ? 'checked' : '' }} > </td>
                        </tr>   
                        @endforeach
                     </tbody>
                  </table>   
               </div>   
            </div>                                                            
        </div>
	</div>
   <div class="row mt-15">
      <div class="col-sm-3">
       <button class="main-btn primary-btn btn-hover btn-sm" type="submit">Save</button>
       <button class="main-btn primary-btn-outline btn-hover btn-sm" type="reset">Reset</button>
       </div>
     </div>
</form>
</section>
@endsection

<script>
    function displayIcon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#selectedIcon').attr('src', e.target.result);
                $('#iconImage').text(input.files[0].name);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
       // Change event for the country dropdown
       $('#StateactionDropdown').on('change', function () {
           var stateId = $(this).val();
           var baseUrl = "{{ url('/') }}";
           if (stateId) {
               // Make an AJAX request to get the states based on the selected country
               $.ajax({
                   type: 'GET',
                   datatype : 'json',
                   url: baseUrl + '/get-cities/' + stateId, // Replace with the actual route to get states
                   success: function (data) {                      
                       // Add the defualt select box by clearing all values
                       $('#cityDropdown').closest('.select-position').replaceWith(`
                           <div class="select-position select-sm">
                              <select id="cityDropdown" class="jSelectbox" name="city_id" required>
                                    <option value="">Select</option>
                              </select>
                           </div>
                        `);
                        // Adding New Data to the Dropdown 
                        $('#cityDropdown').html(data);
                   }
               });
            } else {
               // If no country is selected, clear the state dropdown
               $('#cityDropdown').empty();
           }
       });
   });
</script>
<script>
   
   $(document).ready(function() {
     
   var value = $('.IsOnlineSupplier').val();  
   //alert(value); 
   if(value == 1){
             $('.onlinesupplier').show();
           }else{
             $('.onlinesupplier').hide();
           }

       $('.IsOnlineSupplier').change(function() {
           var value = $(this).val();
           if(value == 1){
             $('.onlinesupplier').show();
           }else{
             $('.onlinesupplier').hide();
           }
       });
   });
</script>  
<script>
   $(document).ready(function() {
      $('.changePassword').click(function(){
         $('#psw').prop('disabled',false);
         $('#psw').val('');
      });
   });
</script>
