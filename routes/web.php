<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
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
Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminDashboardController::class, 'adminlogout'])->name('admin.logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('/admin/category', 'CategoryController');
    Route::resource('/admin/attributes', 'AttributesController');
    Route::resource('/admin/products', 'ProductController');
    Route::post('/get-product-details', 'ProductController@getProductDetails')->name('get-product-details');
});



require __DIR__.'/auth.php';
