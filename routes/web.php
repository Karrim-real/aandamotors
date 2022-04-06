<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//User Route
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/{prodID}', [FrontendController::class, 'show']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::get('/logout', [AuthController::class, 'logoutDestroy']);


//Administraor Routes
Route::get('/dashboard', [BackendController::class, 'index']);
Route::get('/products', [BackendController::class, 'index']);

Route::get('/add-product', [BackendController::class, 'store']);
Route::post('/add-product', [BackendController::class, 'insertProduct']);

Route::get('/edit-product/{prodID}', [BackendController::class, 'edit']);
Route::post('/edit-product/{prodID}', [BackendController::class, 'updateProduct']);

Route::get('/delete-product/{prodID}', [BackendController::class, 'deleteProduct']);


Route::get('/brands', [BrandController::class, 'index']);

Route::get('/add-brand', [BrandController::class, 'index']);
Route::post('/add-brand', [BrandController::class, 'index']);

Route::get('/edit-brand/{prodID}', [BrandController::class, 'index']);
Route::post('/edit-brand/{prodID}', [BrandController::class, 'index']);

Route::get('/delete-band/{prodID}', [BrandController::class, 'deleteBrand']);

