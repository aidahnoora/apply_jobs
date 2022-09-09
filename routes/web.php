<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/job', [App\Http\Controllers\JobController::class, 'index'])->name('job');
    Route::get('/job/add', [App\Http\Controllers\JobController::class, 'create'])->name('job/add');
    Route::post('/job/save', [App\Http\Controllers\JobController::class, 'store'])->name('job/save');
    Route::get('/job/edit/{id}', [App\Http\Controllers\JobController::class, 'edit'])->name('job/edit');
    Route::put('/job/update/{id}', [App\Http\Controllers\JobController::class, 'update'])->name('job/update');
    Route::get('/job/delete/{id}', [App\Http\Controllers\JobController::class, 'destroy'])->name('job/delete');

    Route::get('/skill', [App\Http\Controllers\SkillController::class, 'index'])->name('skill');
    Route::get('/skill/add', [App\Http\Controllers\SkillController::class, 'create'])->name('skill/add');
    Route::post('/skill/save', [App\Http\Controllers\SkillController::class, 'store'])->name('skill/save');
    Route::get('/skill/edit/{id}', [App\Http\Controllers\SkillController::class, 'edit'])->name('skill/edit');
    Route::put('/skill/update/{id}', [App\Http\Controllers\SkillController::class, 'update'])->name('skill/update');
    Route::get('/skill/delete/{id}', [App\Http\Controllers\SkillController::class, 'destroy'])->name('skill/delete');

    Route::get('/candidate', [App\Http\Controllers\CandidateController::class, 'index'])->name('candidate');
    Route::get('/candidate/add', [App\Http\Controllers\CandidateController::class, 'create'])->name('candidate/add');
    Route::post('/candidate/save', [App\Http\Controllers\CandidateController::class, 'store'])->name('candidate/save');
    Route::get('/candidate/edit/{id}', [App\Http\Controllers\CandidateController::class, 'edit'])->name('candidate/edit');
    Route::put('/candidate/update/{id}', [App\Http\Controllers\CandidateController::class, 'update'])->name('candidate/update');
    Route::get('/candidate/delete/{id}', [App\Http\Controllers\CandidateController::class, 'destroy'])->name('candidate/delete');
});

Route::get('/', [App\Http\Controllers\RegisterController::class, 'create']);
Route::post('/apply/save', [App\Http\Controllers\RegisterController::class, 'store'])->name('apply/save');
