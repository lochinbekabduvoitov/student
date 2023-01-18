<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

// All  User Managament

Route::prefix('users')->group(function(){

    Route::get('view',[UserController::class, 'UserView'])->name('users.view');
    Route::get('add',[UserController::class, 'UserAdd'])->name('users.add');
    Route::get('edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    Route::get('delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
    Route::post('store',[UserController::class, 'UserStore'])->name('users.store');
    Route::post('update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
});




// All  User Managament

Route::prefix('profile')->group(function(){

    Route::get('view',[ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('edit',[ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('store',[ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('password/view',[ProfileController::class, 'ProfilePasswordView'])->name('profile.password');

});



// All  User Managament

Route::prefix('setup')->group(function(){

    Route::get('student/class/view',[StudentClassController::class, 'ViewStudent'])->name('student.class.view');


});
