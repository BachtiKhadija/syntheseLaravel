<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseCategoryController;
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

Route::get('courses',[CourseController::class,'index'])->name('courses.index');
Route::get('courses/add',[CourseController::class,'create'])->name('courses.create');
Route::post('courses',[CourseController::class,'store'])->name('courses.store');
Route::get('courses/{id}',[CourseController::class,'edit'])->name('courses.edit');
Route::delete('courses',[CourseController::class,'destroy'])->name('courses.destroy');
Route::get('/courses/{course}/categories', [CourseCategoryController::class, 'edit'])
    ->name('courses.categories.edit');

Route::post('/courses/{course}/categories', [CourseCategoryController::class, 'update'])
    ->name('courses.categories.update');



require __DIR__.'/auth.php';
