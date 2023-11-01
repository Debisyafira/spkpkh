<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaTerbobotController;
use App\Http\Controllers\PkhController;
use App\Http\Controllers\RatioCriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use App\Models\kriteria_terbobot;
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
//     return view('auth.login');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () { // buat apa ini???
Auth::routes();
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN 
// Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    // Route::get('user', [AdminController::class, 'user'])->name('admin.user');

    //PKH
    Route::get('pkh', [PkhController::class, 'index'])->name('admin.pkh');
    Route::get('pkh/create', [PkhController::class, 'create'])->name('admin.pkh.create');
    Route::post('pkh/simpan', [PkhController::class, 'store'])->name('admin.pkh.simpan');
    Route::get('pkh/edit', [PkhController::class, 'edit'])->name('admin.pkh.edit');
    Route::put('pkh/update', [PkhController::class, 'update'])->name('admin.pkh.update');
    Route::delete('pkh/delete', [PkhController::class, 'destroy'])->name('admin.pkh.delete');

    //Kriteria
    Route::get('/criteria', [CriteriaController::class, 'index'])->name('admin.criteria');
    Route::post('/addCriteria', [CriteriaController::class, 'store'])->name('admin.addCriteria');
    Route::get('/deleteCriteria/{criteria}', [CriteriaController::class, 'destroy'])->name('admin.deleteCriteria');

    //Ratio Kriteria
    Route::get('/ratioCriteria', [RatioCriteriaController::class, 'index'])->name('admin.ratioCriteria');
    Route::post('/addRatioCriteria', [CriteriaController::class, 'storeRatio'])->name('admin.addRatioCriteria');
    Route::post('/massRatioCriteria', [CriteriaController::class, 'massUpdate'])->name('admin.massRatioCriteria');
    Route::get('/deleteRatioCriteria/{v_id}/{h_id}', [RatioCriteriaController::class, 'destroy'])->name('admin.deleteRatioCriteria');
    //End Kriteria

    //Kriteria terbobot
    Route::get('kriteria_terbobot', [KriteriaTerbobotController::class, 'index'])->name('admin.kriteria_terbobot');
    Route::get('kriteria_terbobot/create', [KriteriaTerbobotController::class, 'create'])->name('admin.kriteria_terbobot.create');
    Route::post('kriteria_terbobot/simpan', [KriteriaTerbobotController::class, 'store'])->name('admin.kriteria_terbobot.simpan');
    Route::get('kriteria_terbobot/edit', [KriteriaTerbobotController::class, 'edit'])->name('admin.kriteria_terbobot.edit');
    Route::put('kriteria_terbobot/update', [KriteriaTerbobotController::class, 'update'])->name('admin.kriteria_terbobot.update');
    Route::delete('kriteria_terbobot/delete', [KriteriaTerbobotController::class, 'destroy'])->name('admin.kriteria_terbobot.delete');

    //data sub kriteria
    // Route::get('/subkriteria/{criteria}/create', SubKriteriaController::class)->name('subkriteria.create');
});
