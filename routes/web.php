<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaTerbobotController;
use App\Http\Controllers\PkhController;
use App\Http\Controllers\RatioCriteriaController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Auth;
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

    // PKH
    Route::get('pkh', [PkhController::class, 'index'])->name('admin.pkh');
    Route::get('pkh/create', [PkhController::class, 'create'])->name('admin.pkh.create');
    Route::post('pkh/simpan', [PkhController::class, 'store'])->name('admin.pkh.simpan');
    Route::get('pkh/edit', [PkhController::class, 'edit'])->name('admin.pkh.edit');
    Route::put('pkh/update', [PkhController::class, 'update'])->name('admin.pkh.update');
    Route::delete('pkh/delete', [PkhController::class, 'destroy'])->name('admin.pkh.delete');
    Route::post('pkh/excel', [PkhController::class, 'importExcel'])->name('admin.pkh.excel');

    // Kriteria
    Route::get('/criteria', [CriteriaController::class, 'index'])->name('admin.criteria');
    Route::put('/edit-criteria', [CriteriaController::class, 'update'])->name('admin.editCriteria');
    Route::get('/criteria/{id}', [SubkriteriaController::class, 'create'])->name('admin.subcriteria');
    Route::post('/addsubcriteria', [SubkriteriaController::class, 'store'])->name('admin.addSubCriteria');
    Route::post('/addCriteria', [CriteriaController::class, 'store'])->name('admin.addCriteria');
    Route::get('/deleteCriteria/{criteria}', [CriteriaController::class, 'destroy'])->name('admin.deleteCriteria');
    Route::get('/deleteSubCriteria/{subCriteria}', [SubkriteriaController::class, 'destroy'])->name('admin.deleteSubCriteria');

    // Ratio Kriteria
    Route::get('/ratioCriteria', [RatioCriteriaController::class, 'index'])->name('admin.ratioCriteria');
    Route::post('/ratioCriteria/save', [RatioCriteriaController::class, 'save'])->name('admin.ratioCriteria.saveEigen');
    Route::post('/addRatioCriteria', [CriteriaController::class, 'storeRatio'])->name('admin.addRatioCriteria');
    Route::post('/massRatioCriteria', [CriteriaController::class, 'massUpdate'])->name('admin.massRatioCriteria');
    Route::get('/deleteRatioCriteria/{v_id}/{h_id}', [RatioCriteriaController::class, 'destroy'])->name('admin.deleteRatioCriteria');
    // End Kriteria

    // Kriteria terbobot
    Route::get('data-kriteria', [KriteriaTerbobotController::class, 'index'])->name('admin.dataCriteria');
   
    // data sub kriteria
    // Route::get('/subkriteria/{criteria}/create', SubKriteriaController::class)->name('subkriteria.create');
});
