<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryDashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaptopRentController;
use App\Http\Controllers\RentLogsController;
use App\Http\Controllers\RetrunLaptopController;
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
    return view('welcome');
})->middleware('auth');


Route::controller(AuthController::class)->middleware(['guest'])->group(function () {

    Route::get('/auth','index')->name('login');
    Route::post('/auth/register', 'register');
    // Route::get('/logout','logout');
    Route::get('/auth/login','login');
    Route::post('/auth/login','login');
});



Route::controller(DashboardController::class)->middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'index')->middleware('auth');
    // melihat semua users
    Route::get('/dashboard/user-list', 'user_list');
    // menampilkan form untuk membuat user
    Route::get('/dashboard/user-add','create');
    // menambah data users
    Route::post('/dashboard/user-add/submit','store');
    // delete data users
    Route::get('/dashboard/user-list/delete/{id}','destroy');
    // LogOut
    Route::get('/logout','logout');
    // Veiw category list
    Route::get('/dashboard/category', 'viewCategory');
    // View Rent Logs
    // Route::get('/dashboard/rental-laptop', 'viewRental');

});
// Route::get('/dashboard/tester',[RentLogsController::class, 'index']);


Route::controller(LaptopRentController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/rent','index');
    Route::post('/dashboard/rent','store');
});

Route::get('/dashboard/rentlogs', [RentLogsController::class,'index']);

Route::get('/dashboard/rent/kembali/{slug}/{id}' ,[RetrunLaptopController::class, 'updateStatus']);
