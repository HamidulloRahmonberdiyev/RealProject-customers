<?php

use App\Http\Controllers\AdminAddressController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminFilterController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth', 'role'])->group(function () {

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('search', [AdminSearchController::class, 'search'])->name('customers.search');

Route::get('filter', [AdminFilterController::class, 'address_filter'])->name('filter');

Route::get('customers/active', [AdminFilterController::class, 'customers_active'])->name('customers.active');
Route::get('customers/passive', [AdminFilterController::class, 'customers_passive'])->name('customers.passive');
Route::get('customers/noactive', [AdminFilterController::class, 'customers_noactive'])->name('customers.noactive');

Route::resource('addresses', AdminAddressController::class);

Route::resource('customers', AdminCustomerController::class);

Route::resource('users', AdminUserController::class);

Route::resource('roles', AdminRoleController::class);

});


