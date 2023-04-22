<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('ADMIN.Login');
});
Route::post('custom-login', [AdminController::class, 'Login'])->name('login.custom');
Route::get('/Dashboard',[AdminController::class,'index'])->name('Dashboard');
Route::get('/Dashboard/AddCompany',[AdminController::class,'companyform'])->name('AddCompany');
Route::post('addcompany',[CompanyController::class,'store'])->name('Add-Company');
Route::get('/Dashboard/Companies',[CompanyController::class,'ShowAll'])->name('Companies');
Route::get('/Dashboard/Companies/data/{id}',[CompanyController::class,'showData'])->name('CompanyData');
Route::get('/Dashboard/Companies/data/{id}/export',[CompanyController::class,'export'])->name('exportData');
Route::get('/Dashboard/EditCompany/{id}',[CompanyController::class,'ShowEdit'])->name('EditCompany');
Route::put('editcompany/{id}',[CompanyController::class,'update'])->name('Edit-Company');
Route::post('deletecompany/{id}', [CompanyController::class, 'destroy'])->name('Delete-Company');

//user routes

Route::get('/theJourney/{type}/{resturant}/',[ClientController::class,'index'])->name('CompanyForm');

Route::get('/theJourney/{type}/{resturant}/advert/{id}',[ClientController::class,'show'])->name('ResturantAd');
Route::post('costumerdata',[ClientController::class,'store'])->withoutMiddleware(['csrf'])->name('costumer-data');
Route::get('/theJourney/code',[ClientController::class,'show_code'])->name('ShowCode');
