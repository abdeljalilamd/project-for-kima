<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\LoginOnwayController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterOnwayController;

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


// Dashbord OnWay
Route::resource('/dashboard/recruiter', RecruiterController::class)->middleware(['auth', 'verified']);
Route::resource('/dashboard/jobseeker', JobSeekerController::class)->middleware(['auth', 'verified']);
Route::resource('/dashboard/offer', OfferController::class)->middleware(['auth', 'verified']);
Route::resource('/dashboard/post', PostController::class)->middleware(['auth', 'verified']);
// End Dashboard OnWay


Route::get("/", [LoginOnwayController::class,"index"])->name("onway.index");
Route::post("/loginonway", [LoginOnwayController::class,"Login"])->name("onway.login");
Route::get("/logoutonway", [LoginOnwayController::class,"logout"])->name("onway.logout");
Route::get("/registeronway", [RegisterOnwayController::class,"index"])->name("onway.register.index");
Route::post("/registeronway", [RegisterOnwayController::class,"register"])->name("onway.register");

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/career', function () { return view('pages.career'); })->middleware(['auth', 'verified'])->name('pages.career');
Route::get('/employer', function () { return view('pages.employer'); })->middleware(['auth', 'verified'])->name('pages.employer');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin.index');

require __DIR__.'/auth.php';




