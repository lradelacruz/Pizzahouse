<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::get('pizzas', 'App\Http\Controllers\PizzaController@index')->name('pizzaHome');
Route::get('pizzas/{$id}', 'App\Http\Controllers\PizzaController@show');

//create
Route::get('create', 'App\Http\Controllers\PizzaController@create');
Route::post('pizzas', 'App\Http\Controllers\PizzaController@store');

//update
Route::get('pizzas/edit/{id}', 'App\Http\Controllers\PizzaController@editPizza');
Route::get('pizzas/editPizza/{id}', 'App\Http\Controllers\PizzaController@editPizza');
Route::post('pizzas/editPizza/{id}', 'App\Http\Controllers\PizzaController@editPizzaSave');

//delete
Route::delete('pizzas/delete/{id}', 'App\Http\Controllers\PizzaController@deletePizza');

//inventory
Route::get('inventory', 'App\Http\Controllers\InventoryController@index')->name('inventory');

//update
Route::get('inventory/update/{id}', 'App\Http\Controllers\InventoryController@updateInventory');
Route::post('inventory/update/{id}', 'App\Http\Controllers\InventoryController@updateInventorySave');

Route::get('orders', 'App\Http\Controllers\OrdersController@index');
Route::get('orders/{id}', 'App\Http\Controllers\OrdersController@show');

Route::get('takeOrder', 'App\Http\Controllers\OrdersController@takeOrder')->name('takeOrder');
Route::post('orders', 'App\Http\Controllers\OrdersController@storeOrder')->name('storeOrder');

Route::get('contactUs', 'App\Http\Controllers\ContactUsController@index');
Route::get('/contactUs', 'App\Http\Controllers\ContactUsController@show')->name('showContact');
Route::post('/contactUs', 'App\Http\Controllers\ContactUsController@submit')->name('submitContact');
// Route::get('/pizzas', function() {
//    $name = request('name');
//	return view('pizzas', compact('name'));
// });

//	Route::get('/inventory', function () {
//    return view('inventory');
//	});

//	Route::get('/orders', function () {
//    return view('orders');
//	});

//	Route::get('/orders/{id}', function ($id) {
//    return view('orders', compact('id'));
//	});

//Route::get('/contactUs', function () {
//    return view('contactUs');
//	});

//	Route::get('/tryjson', function () {
//	return [
//		'name' => 'supreme',
//		'base' => 'classic'
//	];
//	});

//	Route::get('/basics', function () {
//    $pizzas = [
//        ['type' => 'hawaiian', 'base' => 'cheesy crust', 'price' => 500],
//        ['type' => 'supreme', 'base' => 'cheesy crust', 'price' => 300],
//        ['type' => 'veggies', 'base' => 'thin', 'price' => 400]
//    ];
//    return view('basics', compact('pizzas'));
// });

//	Route::get('/dashboard', function () {
//    return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Routes for logging
Route::middleware(['web'])->group(function () {
    Route::get('/logs', 'App\Http\Controllers\LogsController@index')->name('logs');
    Route::delete('/logs/clear', 'App\Http\Controllers\LogsController@clearLogs')->name('clearLogs');
    Route::post('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
