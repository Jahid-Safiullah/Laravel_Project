<?php
use App\Http\Controllers\HomeController;
use App\Http\controllers\AdminController;
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

route::get('/',[HomeController::class,'index']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);

//------------------------------------------admin part----------------------------------------------

// Catagory
route::get('/view_catagory',[AdminController::class,'view_catagory']);
route::post('/add_catagory',[AdminController::class,'add_catagory']);
route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

//product
route::get('/view_product',[AdminController::class,'view_product']);
route::post('/add_product',[AdminController::class,'add_product']);
route::get('/show_product',[AdminController::class,'show_product']);
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/update_product/{id}',[AdminController::class,'update_product']);
route::post('/update_product_add_to_database_table/{id}',[AdminController::class,'update_product_add_to_database_table']);


// ----------------------------------------user part--------------------------------------------------
//product
route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('add_cart/{id}', [HomeController::class, 'add_cart']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/delete_cart_item/{id}',[HomeController::class,'delete_cart_item']);
