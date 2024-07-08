<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[HomeController::class,'home']); // controller name and method name


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);   // check if user is login and is admin

Route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']); 

// add new category 
Route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']); 

// delete category
// best practice is to Use DELETE method for deleting a category
Route::delete('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

// edit category
Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

// update category
Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

// add new product
Route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

// upload product
Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

//view product
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

// delete product
// Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']); // b/c does not use <form> tag hence use GET method
Route::delete('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

// update product
Route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

// Edit product
Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);

// search product
Route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);