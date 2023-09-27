<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculateController;

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
    return redirect()->route('calculate');
});

Route::group(['prefix' => '/delivery'], function() {
    Route::get('/calculate', [CalculateController::class, "show"])->name("calculate");
    Route::post('/calculate', [CalculateController::class,"calculate"])->name("calculate");
});