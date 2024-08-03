<?php

use App\Http\Controllers\WmsController;
use App\Http\Controllers\TokensController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SideMenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//public

//admin

//wms
Route::controller(WmsController::class)->prefix('wms')->group(function () {
    Route::get('/', 'index')->name("wms dashboard");
    Route::get('/stock_insert', 'stock_insert')->name("stock_insert");
    Route::get('/stock_query', 'stock_query')->name("stock_query");
    Route::get('/order_query', 'order_query')->name("order_query");
    Route::get('/stock_update', 'stock_update')->name("stock_update");
    Route::get('/inventory_query', 'inventory_query')->name("inventory_query");
    Route::get('/report_stock', 'report_stock')->name("report_stock");
    Route::get('/addressing', 'addressing')->name("addressing");
});

//side menu
Route::controller(SideMenuController::class)->prefix("sidemenu")->group(function () {
    Route::post('/insert', 'store')->name("insert");
    Route::post('/delete', 'delete')->name("delete");
    Route::post('/update', 'update')->name("update");
    Route::post('/all', 'all')->name("all");
});

//api
Route::controller(TokensController::class)->prefix("token")->group(function () {
    Route::get('/get_crsf', 'get_crsf_token');
});
require __DIR__ . '/auth.php';
