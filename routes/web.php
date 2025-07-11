<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Instructor\InstructorDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentDashboardController;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['auth', 'verified', 'check_role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AdminDashboardController::class, 'destroy'])
        ->name('logout');
});


Route::group(['middleware' => ['auth', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function(){
Route::get('dashboard', [InstructorDashboardController::class, 'dashboard'])->name('dashboard');
});


Route::group(['middleware' => ['auth', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function(){
Route::get('dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
});





require __DIR__.'/auth.php';
