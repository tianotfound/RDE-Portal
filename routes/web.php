<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PictureController;

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
Route::resource('/', App\Http\Controllers\WelcomeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:super-admin|admin']], function() {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
  
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Public View
Route::resource('researchall', App\Http\Controllers\ResearchAllController::class);
Route::resource('ktmall', App\Http\Controllers\KTMAllController::class);
Route::resource('extensionall', App\Http\Controllers\ExtensionAllController::class);
// Public View


// Admin Panel Routes
Route::resource('ktm', App\Http\Controllers\KtmController::class);
Route::resource('research', App\Http\Controllers\ResearchController::class);
Route::resource('extension', App\Http\Controllers\ExtensionController::class);

Route::resource('researchprofiling', App\Http\Controllers\ResearchProfilingController::class);
Route::resource('ongoing', App\Http\Controllers\OngoingPaperCtrl::class);
Route::resource('completed', App\Http\Controllers\CompletedPaperCtrl::class);
Route::resource('presentation', App\Http\Controllers\PresentationPaperCtrl::class);
Route::resource('publication', App\Http\Controllers\PublicationPaperCtrl::class);
Route::resource('ip', App\Http\Controllers\IpPaperCtrl::class);
Route::resource('caa', App\Http\Controllers\CaaPaperCtrl::class);
// Admin Panel Routes