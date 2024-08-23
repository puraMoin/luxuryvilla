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
                     <li class="nav-item-2">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab1"> <button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Company</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Contacts</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab3"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Segments</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab4"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Contracts</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab5"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Products</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab6"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Contract <br>
                                 Setup</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab7"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Setup <br>
                                 Masters</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab8"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">Website <br>
                                 (CMS)</button></a>
                     </li>
                     <li class="nav-item-2">
                        <a class="nav-link" href="#tab9"><button
                                 class="main-btn primary-btn-outline btn-hover btn-xs">CRM</button></a>
                     </li>
                  </ul>
            </nav>
         </div>
         <div class="col-sm-9">
            <div class="tab-content mt-10">
                  <!-- Tab 1 -->
                  <div id="tab1" class="tab-pane fade">
                     <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
                        <tbody>
                              <tr>
                                 <td width="25%" class=""><a
                                          href=""
                                          type="button" >Company</a>&nbsp;</td>
                                 <td width="25%" class=""><a
                                          href=""
                                          type="button">Employee</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Company Website</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Financial Year</a>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td width="25%"><a
                                          href=""
                                          type="button">ROE Setup</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Exchange Rate Markup</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Designation</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Department</a>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Tax Setup</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Tax Type</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Tax Service</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Tax Tour Service Type</a>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Company Code Setup</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Company Text Setup</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Company Code Category</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Company Code Module</a>&nbsp;</td>
                              </tr>
                              <tr>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Roles &amp; Rights</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Permissions Setup</a>&nbsp;</td>
                                 <td width="25%"><a
                                          href=""
                                          type="button">Permissions Master</a>&nbsp;</td>
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
<tr><td colspan="4"><h6>Agent</h6></td></tr>
<tr>
    <td width="25%"><a href="" type="button">Agent</a></td>
    <td width="25%"><a href="" type="button">Agent Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Agent Credit Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Agent Credit Limit For</a>&nbsp;</td>
</tr>
</tbody>
</table>

                        <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
<tbody>
<tr><td colspan="4"><h6>Corporate</h6></th></tr>
<tr>
    <td width="25%"><a href="" type="button">Corporate</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Corporate Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Corporate Credit Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Corporate Credit Limit For</a>&nbsp;</td>
</tr>
</tbody>
</table>

                        <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
<tbody>
<tr><td colspan="4"><h6>Supplier</h6></td></tr>
<tr>
    <td width="25%"><a href="" type="button">Supplier</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Supplier Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Supplier Region Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Online Supplier</a>&nbsp;</td>
</tr>
</tbody>
</table>

<table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
<tbody>
<tr><td colspan="4"><h6>Driver</h6></td></tr>
<tr>
    <td width="25%"><a href="" type="button">Driver</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Driver Grade</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Driver Licence Type</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Driver Class Of Licence</a>&nbsp;</td>
</tr>
<tr>
    <td width="25%"><a href="" type="button">Driver Status</a>&nbsp;</td>
    <td width="25%"><a href="" type="button">Driver Professional Skill</a>&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
</tr>
</tbody>
</table>

<table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
<tbody>
<tr><td colspan="4"><h6><a href="#" type="button">Cook</a><h6></td></tr>
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
<tr><td colspan="4"><h6>Guide</h6></td></tr>
<tr>
<td width="25%"><a href="" type="button">Guide</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Guide Speciality</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Guide Tour Type</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Guide Expense</a>&nbsp;</td>
</tr>
<tr>
<td width="25%"><a href="" type="button">Guide Own Detail</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Guide Pax Type</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Guide Staff Type</a>&nbsp;</td>
<td width="25%">&nbsp;</td>
</tr>
</tbody>
</table>

                <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
<tbody>
<tr><td colspan="4"><h6>Airport</h6></td></tr>
<tr>
<td width="25%"><a href="" type="button">Airport Representative</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Airport</a>&nbsp;</td>
<td width="25%">&nbsp;</td>
<td width="25%">&nbsp;</td>
</tr>
</tbody>
</table>
                                            <table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed">
<tbody>
<tr><td colspan="4"><h6>Customer</h6></td></tr>
<tr>
<td width="25%"><a href="" type="button">Customer</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Category</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Source</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Community Group</a>&nbsp;</td>
</tr>
<tr>
<td width="25%"><a href="" type="button">Customer Address Type</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Industry</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Profession</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Relation Master</a>&nbsp;</td>
</tr>
<tr>
<td width="25%"><a href="" type="button">Customer Communication Mode</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Seat Preference</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Service</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Feedback Type</a>&nbsp;</td>
</tr>
<tr>
<td width="25%"><a href="" type="button">Customer Feedback Purpose</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Charactristic Question</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Dealing Question</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Customer Feedback Question</a>&nbsp;</td>
</tr>
<tr>
<td width="25%"><a href="" type="button">Input Type</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Marital Status</a>&nbsp;</td>
<td width="25%"><a href="" type="button">DND Mode</a>&nbsp;</td>
<td width="25%"><a href="" type="button">Visa Type</a>&nbsp;</td>
</tr>
</tbody>
</table>
            </div>
                  </div>
                  <!-- Add more tabs similarly -->
            </div>
         </div>
      </div>

</div>

</div>
</section>
@endsection
