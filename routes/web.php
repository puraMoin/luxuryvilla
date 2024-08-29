<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\SegmentsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminTypesController;
use App\Http\Controllers\AgentCreditLimitForMastersController;
use App\Http\Controllers\AreaUnitsController;
use App\Http\Controllers\AssignedDashboardsController;
use App\Http\Controllers\BathroomTypesController;
use App\Http\Controllers\BedTypesController;
use App\Http\Controllers\SeoModulesController;
use App\Http\Controllers\SocialMediasController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\RolesRightsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\BlogAuthorsController;
use App\Http\Controllers\BlogTagsController;
use App\Http\Controllers\BookingStatusesController;
use App\Http\Controllers\CompanyCodeCategories;
use App\Http\Controllers\EmployeeListsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerListsController;
use App\Http\Controllers\PropertyTypesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CompanyMastersController;
use App\Http\Controllers\CostTypesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DesignationsController;
use App\Http\Controllers\MealPlansController;
use App\Http\Controllers\MealTypesController;
use App\Http\Controllers\MenuLinkController;
use App\Http\Controllers\SupplierTypesController;
use App\Http\Controllers\SupplierRegionTypesController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\FinancialYearsController;
use App\Http\Controllers\IslandMastersController;
use App\Http\Controllers\TaxesController;
use App\Http\Controllers\TaxMastersController;
use App\Http\Controllers\TaxTypesController;
use App\Http\Controllers\CompanyWebsitesController;
use App\Http\Controllers\CompanyCodeCategoriesController;
use App\Http\Controllers\CompanyCodeModulesController;
use App\Http\Controllers\CompanyRegistrationsController;
use App\Http\Controllers\CompanyTaxInformationsController;
use App\Http\Controllers\OnlineSuppliersController;
use App\Http\Controllers\WebsiteTypesController;
use App\Http\Controllers\AgentCreditTypesController;
use App\Http\Controllers\CrmEnquiryStagesController;
use App\Http\Controllers\CrmEnquiryStatusesController;
use App\Http\Controllers\AccomodationTypesController;
use App\Http\Controllers\ApartmentCategoriesController;
use App\Http\Controllers\BankDetailsController;
use App\Http\Controllers\CompanyRepresentativesController;
use App\Http\Controllers\ContractSeasonTypesController;
use App\Http\Controllers\PropertyCategoriesController;
use App\Http\Controllers\PropertyImagesController;
use App\Http\Controllers\ServiceMastersController;
use App\Http\Controllers\ServiceModuleMastersController;
use App\Http\Controllers\SupplierAccessToCompaniesController;
use App\Http\Controllers\SupplierBanksController;
use App\Http\Controllers\SupplierCancellationPoliciesController;
use App\Http\Controllers\SupplierContactsController;
use App\Http\Controllers\SupplierExtranetsController;
use App\Http\Controllers\SupplierPaymentPoliciesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TaxAccessToCompaniesController;
use App\Http\Controllers\VillaCategoriesController;
use App\Http\Middleware\CheckSession;
use App\Models\AgentCreditType;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Designation;
use App\Models\OnlineSupplier;
use App\Models\SupplierBank;
use App\Models\SupplierCancellationPolicy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Registration*/
// Route::get('/register', [AuthController::class, 'singUp'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([CheckSession::class])->group(function () {

/*MenuLinks*/
Route::prefix('menulink')->group(function () {
    Route::get('/index', [MenuLinkController::class, 'index'])->name('menulink.index');
    Route::get('/add', [MenuLinkController::class, 'add'])->name('menulink.add');
    Route::post('/store', [MenuLinkController::class, 'store'])->name('menulink.store');
    Route::get('/edit/{id}', [MenuLinkController::class, 'edit'])->name('menulink.edit');
    Route::post('/update/{id}', [MenuLinkController::class, 'update'])->name('menulink.update');
    Route::get('/view/{id}', [MenuLinkController::class, 'view'])->name('menulink.view');
});

Route::get('/get-methods-for-controller', function(Request $request) {
    $controller = $request->input('controller');
    $methods = (new MenuLinkController)->getMethodsForController($controller);

    return response()->json(['methods' => $methods]);
})->name('get.methods.for.controller');

Route::post('/get-route-name', [MenuLinkController::class, 'getRouteName'])->name('get.route.name');

Route::get('/dashboard', [DashboardsController::class, 'index'])->name('dashboards.index');


/*Segment Master*/


/*Countries Master*/

  Route::resource('countries', CountriesController::class);
  Route::resource('states', StatesController::class);
  Route::resource('cities', CitiesController::class);
  Route::resource('users', UsersController::class);

  Route::get('/users/create/{usertype}', [UsersController::class, 'create'])->name('users.create');
  // Route to show the change password form
  Route::get('/changepassword', [UsersController::class,'showChangePasswordForm'])->name('users.changepassword');

  Route::post('/changepassword', [UsersController::class,'changePassword'])->name('users.update-password');

  Route::get('/menulink/masterlinks', [MenuLinkController::class, 'masterlink'])->name('menulink.masterlinks');
 /*Route::post('/store-password', [UsersController::class, 'changePassword'])->name('store-password');*/

  Route::resource('admintypes', AdminTypesController::class);
  Route::resource('seomodules', SeoModulesController::class);
  Route::resource('socialmedias', SocialMediasController::class);
  Route::resource('contacts', ContactsController::class);
  Route::resource('blogs', BlogsController::class);
  Route::resource('blogcategories', BlogCategoriesController::class);
  Route::resource('blogauthors', BlogAuthorsController::class);
  Route::resource('blogtags', BlogTagsController::class);


  Route::resource('employeelists', EmployeeListsController::class);

  Route::resource('customerlists', CustomerListsController::class);
  Route::resource('suppliertypes', SupplierTypesController::class);
  Route::resource('supplierregiontypes', SupplierRegionTypesController::class);
  Route::resource('segments', SegmentsController::class);
  Route::resource('currency', CurrencyController::class);
  Route::resource('countries', CountriesController::class);
  Route::resource('roles', RolesController::class);
  Route::resource('assigneddashboards', AssignedDashboardsController::class);
  Route::resource('propertytypes',PropertyTypesController::class);
  Route::resource('mealtypes',MealTypesController::class);
  Route::resource('mealplans',MealPlansController::class);
  Route::resource('bathroomtypes',BathroomTypesController::class);
  Route::resource('bedtypes',BedTypesController::class);
  Route::resource('costtypes',CostTypesController::class);
  Route::resource('departments',DepartmentsController::class);
  Route::resource('designations',DesignationsController::class);
  Route::resource('areaunits',AreaUnitsController::class);
  Route::resource('bookingstatuses',BookingStatusesController::class);
  Route::resource('destinations', DestinationsController::class);
  Route::resource('islandmasters', IslandMastersController::class);
  Route::resource('financialyears', FinancialYearsController::class);
  Route::resource('taxes', TaxesController::class);
  Route::resource('taxtypes', TaxTypesController::class);
  Route::resource('taxmasters', TaxMastersController::class);
  Route::resource('websitetypes', WebsiteTypesController::class);
  Route::resource('companycodecategories', CompanyCodeCategoriesController::class);
  Route::resource('companycodemodules', CompanyCodeModulesController::class);
  Route::resource('companytaxinformations', CompanyTaxInformationsController::class);
  Route::resource('companyregistrations', CompanyRegistrationsController::class);
  Route::resource('agentcredittypes', AgentCreditTypesController::class);
  Route::resource('agentcreditlimitformasters', AgentCreditLimitForMastersController::class);
  Route::resource('onlinesuppliers', OnlineSuppliersController::class);
  Route::resource('companywebsites', CompanyWebsitesController::class);
  Route::resource('crmenquirystages', CrmEnquiryStagesController::class);
  Route::resource('crmenquirystatuses', CrmEnquiryStatusesController::class);
  Route::resource('accomodationtypes', AccomodationTypesController::class);
  Route::resource('bankdetails', BankDetailsController::class);
  Route::resource('companyrepresentatives', CompanyRepresentativesController::class);
  Route::resource('apartmentcategories', ApartmentCategoriesController::class);
  Route::resource('servicemasters', ServiceMastersController::class);
  Route::resource('contractseasontypes', ContractSeasonTypesController::class);
  Route::resource('servicemodulemasters', ServiceModuleMastersController::class);
  Route::resource('propertycategories', PropertyCategoriesController::class);
  Route::resource('taxaccesstocompanies', TaxAccessToCompaniesController::class);
  Route::resource('propertyimages', PropertyImagesController::class);
  Route::resource('supplierpaymentpolicies', SupplierPaymentPoliciesController::class);
  Route::resource('supplieraccesstocompanies', SupplierAccessToCompaniesController::class);
  Route::resource('suppliercancellationpolicies', SupplierCancellationPoliciesController::class);
  Route::resource('suppliercontacts', SupplierContactsController::class);
  Route::resource('supplierbanks', SupplierBanksController::class);
  Route::resource('supplierextranets', SupplierExtranetsController::class);

  Route::get('/get-states/{countryId}', [StatesController::class, 'getStates']);
  Route::get('/get-cities/{stateId}', [CitiesController::class, 'getCities']);
  Route::get('/get-countrydata/{countryId}', [CountriesController::class, 'getCountryData']);
  Route::resource('rolesrights', RolesRightsController::class);
  Route::resource('companymasters', CompanyMastersController::class);
  Route::resource('suppliers', SuppliersController::class);

  /*Setup Route To Image Upload*/
  //Route::post('/posts/image_upload', 'PostController@uploadImage')->name('posts.image.upload');


});



Route::get('/', function () {return view('auth.login');});

