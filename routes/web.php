<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HostController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HostMiddleware;
use App\Http\Controllers\subscriptionController;
use App\Http\Controllers\clientViews;

use App\Http\Middleware\AdminMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[clientViews::class,'home']);



Route::post('/subscription', [subscriptionController::class,'sub']);

Route::get('/pricing',[clientViews::class, 'pricing']);

Route::get('/aboutus', [clientViews::class, 'aboutus']);

Route::get('/contactus',function(){
    return view('contactus');
});

Route::prefix('services')->group(function () {
    Route::get('{service}/{solution}', [clientViews::class, 'solution']);
});


Route::get('/login', function () {
    return view('ADMIN.Login');
});
Route::get('/Hostlogin', function () {
    return view('company.Login');
});
Route::get('/alphaMenu', function () {
    return view('company.alphamenu');
});
Route::post('System-login', [GeneralController::class, 'Login'])->name('login.System');

Route::post('custom-login', [AdminController::class, 'Login'])->name('login.custom');
//Host Routes
Route::middleware([HostMiddleware::class])->prefix('DashboardHost')->group(function () {
    Route::get('/Profile',[HostController::class,'profile'])->name('Profile');
    Route::get('/',[HostController::class,'index'])->name('Dashboard-Host');
    Route::get('/Data',[HostController::class,'index_data'])->name('index-data');
    Route::post('/DataDate',[HostController::class,'Data_Date'])->name('Data-Date');
    Route::post('/DataDate/Download',[HostController::class,'Data_Date_Download'])->name('Data-Date-Download');

    Route::get('/Ad/{id}',[HostController::class,'index_ad'])->name('index-ad');
    Route::get('/TotalAds',[HostController::class,'index_total_ads'])->name('index-total-ads');
    Route::post('/EditHostAd/{id}',[HostController::class,'update'])->name('Edit-Host-Ad');
    Route::get('/Profile/change-password',[HostController::class,'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password-u', [HostController::class,'changePassword'])->name('password.update');

});
Route::post('/logout', [HostController::class,'logout'])->name('logout');

//user routes

Route::get('/theJourney/{type}/{resturant}/',[ClientController::class,'index'])->name('CompanyForm');
Route::get('/dataForm/{type}/{resturant}/',[ClientController::class,'index_new'])->name('CompanyForm');
Route::get('/dataForm/dark/{type}/{resturant}/',[ClientController::class,'index_new_dark'])->name('CompanyFormDark');

Route::get('/theJourney/{type}/{resturant}/advert/{id}',[ClientController::class,'show'])->name('ResturantAd');
Route::post('costumerdata',[ClientController::class,'store'])->withoutMiddleware(['csrf'])->name('costumer-data');
Route::get('/theJourney/code',[ClientController::class,'show_code'])->name('ShowCode');
Route::post('costumerdata_new',[ClientController::class,'store_new'])->withoutMiddleware(['csrf'])->name('costumer-data-new');

Route::get('/code/{CompanyId}',[ClientController::class,'show_code_id'])->name('ShowCodeId');
Route::get('/code-dark/{CompanyId}',[ClientController::class,'show_code_id_dark'])->name('ShowCodeIdDark');

//admin

Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function(){
    Route::get('services',[AdminController::class,'services']);
    Route::post('addservice', [AdminController::class,'addservice'])->name('addservice');
    Route::get('slides',[AdminController::class,'slides']);
    Route::post('addslide', [AdminController::class,'addslide']);
    Route::get('editslide/{id}', [AdminController::class, 'editslide']);
    Route::put('updateslide/{id}', [AdminController::class, 'updateslide'])->name('updateslide');
    Route::get('home', [AdminController::class,'home']);
    Route::put('edithome', [AdminController::class,'edithome']);
    Route::post('addcustomer', [AdminController::class, 'addcustomer']);
    Route::post('deletecustomer/{id}', [AdminController::class, 'deletecustomer'])->name('deletecustomer');
    Route::get('editservice/{id}', [AdminController::class, 'editservice']);
    Route::put('updateservice/{id}', [AdminController::class, 'updateservice']);
    Route::post('deleteservice/{id}', [AdminController::class, 'deleteservice'])->name('deleteservice');
    Route::get('solutions', [AdminController::class, 'solutions']);
    Route::post('addsolution', [AdminController::class, 'addsolution']);
    Route::get('editsolution/{service}/{solution}', [AdminController::class, 'editsolution']);
    Route::post('updatesolution/{service}/{solution}', [AdminController::class, 'updatesolution'])->name('updatesolution');
    Route::get('aboutus', [AdminController::class, 'aboutus']);
    Route::put('editabout', [AdminController::class, 'editabout']);
    Route::get('pricing', [AdminController::class, 'pricing']);
    Route::post('addplan', [AdminController::class, 'addplan']);
    Route::get('editplan/{id}', [AdminController::class, 'editplan']);
    Route::put('updateplan/{id}', [AdminController::class, 'updateplan']);
    Route::post('deleteplan/{id}', [AdminController::class, 'deleteplan']);



});

Route::middleware([AdminMiddleware::class])->group(function(){


    Route::get('/Dashboard',[AdminController::class,'index'])->name('Dashboard');
    Route::get('/Dashboard/AddCompany',[AdminController::class,'companyform'])->name('AddCompany');
Route::post('addcompany',[CompanyController::class,'store'])->name('Add-Company');
Route::get('/Dashboard/Companies',[CompanyController::class,'ShowAll'])->name('Companies');
Route::get('/Dashboard/Companies/data/{id}',[CompanyController::class,'showData'])->name('CompanyData');
Route::get('/Dashboard/Companies/data/{id}/export',[CompanyController::class,'export'])->name('exportData');
Route::get('/Dashboard/EditCompany/{id}',[CompanyController::class,'ShowEdit'])->name('EditCompany');
Route::put('editcompany/{id}',[CompanyController::class,'update'])->name('Edit-Company');
Route::post('deletecompany/{id}', [CompanyController::class, 'destroy'])->name('Delete-Company');

});
