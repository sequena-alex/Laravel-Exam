<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::post('/settings/edit/save', [App\Http\Controllers\HomeController::class, 'saveSettings']);


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/newsletters', [App\Http\Controllers\HomeController::class, 'newsletters'])->name('newsletters');


Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies');
Route::get('/companies/all/datatable',  [App\Http\Controllers\CompaniesController::class, 'getDataTablesCompanies'])->name('ajax.datatables');
Route::get('/companies/edit/show/{id}', [App\Http\Controllers\CompaniesController::class, 'getCompany']);
Route::post('/companies/edit/save', [App\Http\Controllers\CompaniesController::class, 'saveEditCompany']);
Route::get('/companies/delete/{id}', [App\Http\Controllers\CompaniesController::class, 'deleteCompany']);
