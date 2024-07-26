@extends('layouts.app')

@section('content')
 <!-- The Modal -->
  <div class="modal fade modal-lg" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Menu Links</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             <div class="row mt-15">
                <div class="col-sm-6">
                  <div class="select-style-1">
                     <label>Controller</label>
                     <div class="select-position select-sm">
                     <select class="jSelectbox" id="controllerDropdown" name="controoler">
                       <option value="">Select Controller</option> 
                     @foreach ($controllers as $controller)
                         <option value="{{ $controller }}">{{ $controller }}</option>
                     @endforeach
                     </select>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="select-style-1">
                     <label>Action</label>
                     <div class="select-position select-sm">
                     <select class="jSelectbox" id="methods" name="action">
                        <option value="">Select Action</option>  
                     </select>
                     </div>
                  </div>
               </div>
             </div>  
        </div>
      
      </div>
    </div>
  </div>
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('seomodules.update', ['seomodule' => $seomodule->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden"  name="id" value="{{ $seomodule->id }}"  />
          <!-- Page Name -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Name<span class="mandatory">*</span></label>
            <input type="text"  name="page_name" placeholder="Enter Page Name" required="true" 
             value="{{ $seomodule->page_name }}" />
            </div>   
         </div>
         <!-- Page Title -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Title<span class="mandatory">*</span></label>
            <input type="text"  name="page_title" placeholder="Enter Page Title" required="true" 
            value="{{ $seomodule->page_title }}" />
            </div>   
         </div>
        </div> 
       <div class="row mt-15"> 

                 <!-- Link -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Link <span class="mandatory">*</span></label>
            <div class="input-group">
            <input type="text" placeholder="" name='link' id="menuLinkUrl" value="{{ $menulinks->link; }}" class="form-control" required>
             <div class="input-group-append">
                <button class="btn btn-outline-secondary addAppendBtn" type="button">
                  <i class="fa fa-plus"></i> <!-- Font Awesome plus icon -->
                </button>
             </div>
            </div>
           </div>
         </div> 


         <div class="col-sm-6">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $seomodule->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $seomodule->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
       </div>

    <div class="row mt-15">           
       <!-- Page Url -->
         <div class="col-sm-12">
            <div class="input-style-1">
            <label>Page Url<span class="mandatory">*</span></label>
            <input type="text"  name="page_url" placeholder="Enter Page Url" required="true"  value="{{ $seomodule->page_url }}" />
            </div>   
         </div>
    </div>   

    <div class="row mt-15">  

         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Meta Keyword<span class="mandatory">*</span></label>
            <textarea rows="5" name="meta_keyword" placeholder="Meta Keyword">{{ $seomodule->meta_keyword }}</textarea>
            </div>   
         </div>

         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Meta Description<span class="mandatory">*</span></label>
            <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $seomodule->meta_description }}    
            </textarea>
            </div>   
         </div>

    </div> 

       
      <div class="row mt-15">
       <div class="col-sm-3">  
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection

