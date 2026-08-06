<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HearingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::resource('hearings', HearingController::class)
    ->middleware('auth');


Route::resource('clients', ClientController::class)
    ->middleware('auth');


Route::resource('lawyers', LawyerController::class)
    ->middleware('auth');


Route::resource('cases', LegalCaseController::class)
    ->middleware('auth');


Route::resource('documents', DocumentController::class)
    ->middleware('auth');


Route::middleware('auth')->group(function () {

    Route::get('/profile', 
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch('/profile', 
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::delete('/profile', 
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


Route::middleware(['auth','role:admin'])->group(function(){

    Route::resource('users', UserController::class);


    Route::get('/audit-logs',
        [AuditLogController::class,'index']
    )->name('audit.index');

});


Route::middleware('auth')->group(function(){

    Route::get('/notifications',
        [NotificationController::class,'index']
    )->name('notifications.index');


    Route::get('/notifications/{id}/read',
        [NotificationController::class,'read']
    )->name('notifications.read');


    Route::get('/notifications/read-all',
        [NotificationController::class,'readAll']
    )->name('notifications.readAll');

});


Route::get('/reports/case/{id}/pdf',
    [ReportController::class, 'casePdf']
)
->middleware('auth')
->name('reports.case.pdf');

Route::get('/check-mbstring', function () {
    return response()->json([
        'mbstring_loaded' => extension_loaded('mbstring'),
        'iconv_loaded' => extension_loaded('iconv'),
        'php_ini_loaded_file' => php_ini_loaded_file(),
        'php_ini_scanned_files' => php_ini_scanned_files(),
        'loaded_extensions' => get_loaded_extensions(),
        'extension_dir' => ini_get('extension_dir'),
    ]);
});

require __DIR__.'/auth.php';