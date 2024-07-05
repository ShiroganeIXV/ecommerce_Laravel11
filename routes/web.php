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