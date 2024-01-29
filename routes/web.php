<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\DashControl;

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

Route::get('/', [ItemsController::class, 'Get'])->name('welcome');

Route::get('AddtoCart/{id}', [ItemsController::class, 'AddtoCart'])->name('AddtoCart');

Route::get('/out', function(){return view('cheackout');})->name('out')->middleware('auth');

//dashboard
Route::get('/cpanel',[DashControl::class, 'Disply'])->name('cpanel');//->middleware('auth');
//item
Route::get('/additem',[DashControl::class, 'GetItemsH'])->name('itGo');
Route::post('/additem',[DashControl::class, 'SaveItemsH'])->name('additem');
//itemgroup
Route::get('/additemgroup',[DashControl::class, 'GetItemGroupH'])->name('itemgroupH');
Route::post('/additemgroup', [DashControl::class, 'SaveGroupItemsH'])->name('saveH');


//itemgroup
Route::get('/itemgroup',[ItemsController::class, 'GetItemGroup'])->name('itemgroup');
Route::post('/save', [ItemsController::class, 'SaveGroupItems'])->name('save');
Route::get('/delete/{id}', [ItemsController::class, 'del'])->name('del');
Route::get('/edit/{id}', [ItemsController::class, 'edit'])->name('edit');
Route::post('/updateG', [ItemsController::class, 'Gupdate'])->name('update1');

//item
Route::get('/items/{id}',[ItemsController::class, 'GetItems'])->name('Items');
Route::post('/saveItem', [ItemsController::class, 'SaveItems'])->name('saveItem');
Route::get('/delete2/{id}', [ItemsController::class, 'delItem'])->name('delItem');
Route::get('/edit1/{id}', [ItemsController::class, 'editItem'])->name('editItem');
Route::post('/updateI', [ItemsController::class, 'updateItem'])->name('update2');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
