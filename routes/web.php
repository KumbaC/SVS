<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TypeCoinController;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::resource('cajas', BoxController::class)
->parameters(['cajas' => 'box'])
->names('boxes');

Route::resource('clientes', ClientController::class)
->parameters(['clientes' => 'client'])
->names('clients');

Route::resource('inventarios', InventoryController::class)
->parameters(['inventarios' => 'inventory'])
->names('inventories');

Route::resource('cargos', PositionController::class)
->parameters(['cargos' => 'position'])
->names('positions');

Route::resource('ventas', SaleController::class)
->parameters(['ventas' => 'sale'])
->names('sales');

Route::resource('tipos-monedas', TypeCoinController::class) 
->parameters(['tipos-monedas' => 'typeCoin'])
->names('typecoins');











Route::get('/about', function () {
    return view('about');
})->name('about');
