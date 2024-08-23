@extends('layouts.app')

@section('content')
<section class="section">
<div class="container-fluid">
<!-- BreathCrum -->
@include('partials.breadcrumb')
<!-- ========== Middle Content-wrapper start ========== -->
<!-- Add New Button -->
</div>
<style>
.sidebar {
height: 100vh;
/* Full-height sidebar */
background-color: #f8f9fa !important;
/* White background */
border-right: 1px solid #dee2e6;
/* Light border on the right */
box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
/* Subtle shadow for a box effect */
position: sticky;
/* Keeps the sidebar fixed in place when scrolling */
/* border: 1px dotted black; */
border-radius: 10px;

}

.sidebar ul {
padding-left: 0;
/* Remove default padding */
margin-left: 0;
/* Remove default margin */
list-style: none;
/* Remove default list styling */
}

.sidebar ul li {
border-bottom: 1px dotted #ef7f1a;
/* Dotted border with specified color */
padding: 0;
/* Padding for spacing inside the border */
margin: 0;
/* Remove default margin */
width: 100%;
/* Ensure list items take full width */
}

.content {
padding: 20px;
/* Padding for the content area */
}

.container-fluid {
padding-left: 0;
/* Remove default container padding */
}

.table td {
border: 1px solid #dee2e6;
/* Light border around each cell */
background-color: #ffffff;
/* White background for cells */

box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
/* Subtle shadow for a box effect */
text-align: left;
/* Align text to the left */
padding: 5px;
/* Adjust as needed */
vertical-align: middle;

}

.table td {
font-size: 13px;
line-height: 1.5;
}
</style>
<div class="container-fluid">
<div class="card-style mt-20">
<!-- <div class="create_update">Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
<!-- Search Panel -->
<div class="row">
<div class="col-sm-2">
   <nav id="sidebar" class="sidebar">
         <ul class="nav">
            <li class="nav-item-2 ">
               <a class="nav-link active" data-bs-toggle="tab" href="#tab1"> <button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Company</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab2"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Contacts</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab3"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Segments</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab4"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Contracts</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab5"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Products</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab6"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Contract <br>
                        Setup</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab7"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Setup <br>
                        Masters</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab8"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">Website <br>
                        (CMS)</button></a>
            </li>
            <li class="nav-item-2">
               <a class="nav-link" data-bs-toggle="tab" href="#tab9"><button
                        class="main-btn primary-btn-outline btn-hover btn-xs">CRM</button></a>
            </li>
         </ul>
   </nav>
</div>
<div class="col-sm-9">
   <div class="tab-content mt-10">
         <!-- Tab 1 -->
         <div id="tab1" class="tab-pane fade show active">
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
               <tbody>
                     <tr>
                        <td width="25%" class=""><a href=""
                                 type="button">Company</a>&nbsp;</td>
                        <td width="25%" class=""><a href=""
                                 type="button">Employee</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Company Website</a>&nbsp;
                        </td>
                        <td width="25%"><a href="" type="button">Financial Year</a>&nbsp;
                        </td>
                     </tr>
                     <tr>
                        <td width="25%"><a href="" type="button">ROE Setup</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Exchange Rate
                                 Markup</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Designation</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Department</a>&nbsp;</td>
                     </tr>
                     <tr>
                        <td width="25%"><a href="" type="button">Tax Setup</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Tax Type</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Tax Service</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Tax Tour Service
                                 Type</a>&nbsp;</td>
                     </tr>
                     <tr>
                        <td width="25%"><a href="" type="button">Company Code
                                 Setup</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Company Text
                                 Setup</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Company Code
                                 Category</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Company Code
                                 Module</a>&nbsp;</td>
                     </tr>
                     <tr>
                        <td width="25%"><a href="" type="button">Roles &amp;
                                 Rights</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Permissions
                                 Setup</a>&nbsp;</td>
                        <td width="25%"><a href="" type="button">Permissions
                                 Master</a>&nbsp;</td>
                        <td width="25%">&nbsp;</td>
                     </tr>
               </tbody>
            </table>
         </div>
         <!-- Tab 2 -->
         <div id="tab2" class="tab-pane fade">
            <div class="table-responsive">
               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Agent</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Agent</a></td>
                           <td width="25%"><a href="" type="button">Agent Type</a>&nbsp;
                           </td>
                           <td width="25%"><a href="" type="button">Agent Credit
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Agent Credit Limit
                                    For</a>&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Corporate</h6>
                                 </th>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Corporate</a>&nbsp;
                           </td>
                           <td width="25%"><a href="" type="button">Corporate
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Corporate Credit
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Corporate Credit
                                    Limit For</a>&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Supplier</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Supplier</a>&nbsp;
                           </td>
                           <td width="25%"><a href="" type="button">Supplier
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Supplier Region
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Online
                                    Supplier</a>&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Driver</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Driver</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Driver
                                    Grade</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Driver Licence
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Driver Class Of
                                    Licence</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Driver
                                    Status</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Driver Professional
                                    Skill</a>&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6><a href="#" type="button">Cook</a>
                                    <h6>
                           </td>
                        </tr>
                        <!-- <tr>
<td width="25%">&nbsp;</td>
<td width="25%">&nbsp;</td>
<td width="25%">&nbsp;</td>
<td width="25%">&nbsp;</td>
</tr> -->
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Guide</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Guide</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Guide
                                    Speciality</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Guide Tour
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Guide
                                    Expense</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Guide Own
                                    Detail</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Guide Pax
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Guide Staff
                                    Type</a>&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Airport</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Airport
                                    Representative</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Airport</a>&nbsp;
                           </td>
                           <td width="25%">&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>
               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Customer</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Customer</a>&nbsp;
                           </td>
                           <td width="25%"><a href="" type="button">Customer
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer
                                    Source</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer Community
                                    Group</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Customer Address
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer
                                    Industry</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer
                                    Profession</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer Relation
                                    Master</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Customer
                                    Communication Mode</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer Seat
                                    Preference</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer
                                    Service</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer Feedback
                                    Type</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Customer Feedback
                                    Purpose</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer
                                    Charactristic Question</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer Dealing
                                    Question</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">Customer Feedback
                                    Question</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="" type="button">Input Type</a>&nbsp;
                           </td>
                           <td width="25%"><a href="" type="button">Marital
                                    Status</a>&nbsp;</td>
                           <td width="25%"><a href="" type="button">DND Mode</a>&nbsp;
                           </td>
                           <td width="25%"><a href="" type="button">Visa Type</a>&nbsp;
                           </td>
                        </tr>
                     </tbody>
               </table>
            </div>
         </div>
         <!-- Tab 2 End -->
         <!-- Tab 3 Start -->
         <div id="tab3" class="tab-pane fade">
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
               <tbody>
                     <tr>
                        <td width="25%" class="">
                           <a href="#" type="button">Segment</a>&nbsp;
                        </td>
                        <td width="25%" class="">
                           <a href="#" type="button">Country</a>&nbsp;
                        </td>
                        <td width="25%">
                           <a href="#" type="button">State</a>&nbsp;
                        </td>
                        <td width="25%">
                           <a href="#" type="button">City</a>&nbsp;
                        </td>
                     </tr>
                     <tr>
                        <td width="25%">
                           <a href="#" type="button">Market Type</a>&nbsp;
                        </td>
                     </tr>
               </tbody>
            </table>
         </div>
         <!-- Tab 3 End -->
         <!-- Tab 4 End -->
         <div id="tab4" class="tab-pane fade">
            <div class="table-responsive">

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Hotel</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Hotel</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Hotel
                                    Contract</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Hotel Offer</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Hotel
                                    Package</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Hotel
                                    Representative</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Hotel
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Accommodation
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Hotel Image
                                    Category</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Hotel
                                    Amenity</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Hotel Amenity
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Hotel Amenity
                                    Sub-category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Camp Type</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Hotel Key
                                    Feature</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Room Type</a>&nbsp;
                           </td>
                           <td width="25%">&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>
               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Attraction</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Attraction</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Attraction
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Attraction Pax
                                    Range</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Attraction Vehicle
                                    Type</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Attraction
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Attraction Age
                                    Setup</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Attraction Product
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Rate Type</a>&nbsp;
                           </td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th colspan="4">Restaurant</th>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Restaurant</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Restaurant Cuisine
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Restaurant Menu
                                    Range</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Meal Type</a>&nbsp;
                           </td>
                        </tr>
                     </tbody>
               </table>


               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Vehicle Setup</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Vehicle
                                    Setup</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Vehicle
                                    Model</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Vehicle Warranty
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Vehicle Ownership
                                    Type</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Vehicle
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Vehicle
                                    Status</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Vehicle
                                    Feature</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Vehicle
                                    Make</a>&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Cruise Setup</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Cruise Line</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Cruise
                                    Master</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Cruise Deck</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Cruise
                                    Cabin</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Cruise
                                    Class</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Cruise Port</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Cruise
                                    Offer</a>&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>


               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Property / Villa Master</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Property</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Property
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Bed Type</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Bathroom
                                    Type</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Property
                                    Contracts</a>&nbsp;</td>

                           <td width="25%"><a href="#" type="button">Property
                                    Offers</a>&nbsp;</td>

                           <td width="25%"><a href="#" type="button">Featured
                                    Properties</a>&nbsp;</td>

                           <td width="25%"><a href="#" type="button">Home Page
                                    Banner</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Property
                                    Destination</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Accommodation
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Property
                                    Comments</a>&nbsp;</td>
                        </tr>
                     </tbody>
               </table>
            </div>
         </div>
         <!-- Tab 4 End -->
         <!-- Tab 5 Start -->
         <div id="tab5" class="tab-pane fade">
            <div class="table-responsive">
               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td colspan="4">
                                 <h6>Group Product</h6>
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Group
                                    Product</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Over Night Transport
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Brochure Itinerary
                                    Inclusion</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Itinerary Category
                                    Types </a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Itinerary
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Brochure
                                    type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Brochure Package
                                    Flavour Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Brochure Package
                                    Flavour</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Group Product
                                    Vehicle</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Product Tour
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Pickup Dropoff
                                    Location</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Product Payment
                                    Policy</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Group Product
                                    Inclusion</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Product
                                    Exclusion</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Product Tagging
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Product Tagging
                                    Sub Category</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Group Product
                                    Cancellation Policy</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Products Term
                                    &amp; Conditions</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Group Product
                                    Important Note</a>&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>

               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th colspan="4">FIT Product</th>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">FIT Product</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">FIT Package
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product Tour
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product Payment
                                    Policy Master</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">FIT Product Agent
                                    Level</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product
                                    Inclusion</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product
                                    Exclusion</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product Inc. Exc.
                                    Tag</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">FIT Product Tagging
                                    Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product Tagging
                                    Sub Category</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Tag</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">FIT Product
                                    Cancellation Policy</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">FIT Product Terms
                                    &amp; Conditions</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product Important
                                    Note</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product PAX
                                    Range</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product
                                    Package</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">FIT Product
                                    Meal</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">FIT Product Cost
                                    Group</a>&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>
            </div>
         </div>
         <!-- Tab 5 End -->
         <!-- Tab 6 Start -->
         <div id="tab6" class="tab-pane fade">
            <div class="table-responsive">
               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td width="25%"><a href="#" type="button">Airlines</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Airline
                                    Meal</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Airline
                                    Class</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Airstrip</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Border</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Junction</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Railway</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Railway
                                    Station</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Pass Master</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Mileage
                                    Master</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Departure
                                    Location</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Day Master</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Flight Type</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Train Class</a>&nbsp;
                           </td>
                           <td width="25%">&nbsp;</td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                     </tbody>
               </table>
            </div>
         </div>
         <!-- Tab 6 End -->
         <!-- Tab 7 Start -->
         <div id="tab7" class="tab-pane fade">
            <div class="table-responsive">
               <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <td width="25%"><a href="#" type="button">PAX Range</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Sharing Type
                                    Setup</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Service</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Enquiry
                                    Mode</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Lost Reason</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Travel Type</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Itinerary
                                    Type</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Itinerary Category
                                    Type</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%">
                              <a href="#" type="button">Relationship</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Currency</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Passenger Type</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Tour Meal Preference</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%">
                              <a href="#"  type="button">Leave Reason</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Leave Type</a>&nbsp;
                           </td>
                           <td width="25%">                             
                              <a href="#" type="button">Distance Unit</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Fuel Unit</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#"  type="button">Time Unit</a>&nbsp;</td>
                           <td width="25%">
                              <a href="#" type="button">Transport Service Type</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Tour File Type</a>&nbsp;
                           </td>
                           <td width="25%">
                              <a href="#" type="button">Activity</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Change
                                    Reason</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Month</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Language
                                    Skill</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Fuel Type</a>&nbsp;
                           </td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Assigned
                                    Dashboard</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Module</a>&nbsp;</td>
                           <td width="25%"><a href="#" type="button">Facility</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Property
                                    Type</a>&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Area Unit</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Weekday</a>&nbsp;
                           </td>
                           <td width="25%"><a href="#" type="button">Enquiry Source</a>
                           </td>
                           <td width="25%"><a href="#" type="button">Menu Links</a></td>
                           <td width="25%">&nbsp;</td>
                        </tr>
                        <tr>
                           <td width="25%"><a href="#" type="button">Cost Type</a></td>
                           <td width="25%"><a href="#" type="button">Contract Session</a>
                           </td>
                           <td width="25%"><a href="#" type="button">NearBy
                                    Properties</a>&nbsp;</td>
                        </tr>
                     </tbody>
               </table>
            </div>
         </div>
         <!-- Tab 7 End -->
         <!-- Tab 8 Start -->
      <div id="tab8" class="tab-pane fade">         
         <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                <tbody>
                    <tr><td colspan="4"><h6>Homepage</h6></td></tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Banner</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Tour Page Banner</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Top Menu</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Theme Menu</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Top Deals</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Primary Node</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Top Tour Package</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Contact Us Branch</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">FAQs</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Testimonials</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Header Deals</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Footer Flight Link</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Href Alternate Link</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Footer Hotel Link</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Banner Module</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Domestic Tour Package Master</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">URL Redirection</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Brochure Master</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Career Master</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Partner Master</a>&nbsp;</td>
                    </tr>
                    <tr><td colspan="4"><h6>Homepage Related Masters</h6></td></tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Website Type</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Destination Tag</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Robot Meta Tag</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Hidden Tag</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Recent Article</a>&nbsp;
                        </td><td width="25%"><a href="#" type="button">Previous Node</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Theme Tag</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Theme Master</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Tour Type</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Header Name</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Redirection Type</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Featured Group Collection</a>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="25%"><a href="#" type="button">Featured FIT Collection</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Amazing Holiday Package</a>&nbsp;</td>
                        <td width="25%"><a href="#" type="button">Selling Destination</a>&nbsp;</td>
                        <td width="25%">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>      
      </div>    
        <!-- Tab 8 End --> 
        <!-- Tab 9 Start --> 
      <div id="tab9" class="tab-pane fade">          
        <div class="table-responsive">
         <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
             <tbody>
                 <tr><td colspan="4"><h6>C R M</h6></td></tr>
                 <tr>
                     <td width="25%"><a href="#" type="button">Enquiry Stage</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">Enquiry Status</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">CRM Region</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">User Level</a>&nbsp;</td>
                 </tr>
                 <tr>
                     <td width="25%"><a href="#" type="button">Business Market</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">Enquiry Category</a>&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                 </tr>
             </tbody>
         </table>

         <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
             <tbody>
                 <tr><td colspan="4"><h6>CRM Followup</h6></td></tr>
                 <tr>
                     <td width="25%"><a href="#" type="button">Next Followup Type</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">Followup Type</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">Followup Purpose</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">Followup Pre-Defined Message</a>&nbsp;</td>
                 </tr>
                 <tr>
                     <td width="25%"><a href="#" type="button">Followup Meeting Type</a>&nbsp;</td>
                     <td width="25%"><a href="#" type="button">Followup Meeting Place</a>&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                 </tr>
             </tbody>
         </table>

         <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
             <tbody>
                 <tr><td colspan="4"><h6>Received Enquiries</h6></td></tr>
                 <tr>
                    <!--  <td width="25%">&nbsp;</td> -->
                     <!-- <td width="25%">&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                     <td width="25%">&nbsp;</td> -->
                     <td><a href="#" type="button">All Enquiries</a>&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                     <td width="25%">&nbsp;</td>
                 </tr>
               </tbody>
         </table>
         </div> 
      </div>    
     <!-- Tab 9 End -->        
   </div>
</div>

</div>

</div>
</section>
@endsection
