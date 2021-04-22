<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\GroupPermissionsController;
use App\Http\Controllers\UserPermissionsController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('backend.layouts.app');
})->middleware(['auth'])->name('dashboard');

// Route::get('/groupsadd', function () {
//     return view('groupsadd');
// })->middleware(['auth']);

// Route::post('/groupsadd', [GroupsController::class, 'groupsAdd'])->middleware(['auth'])->name('groups.add');
// Route::get('/groupsedit/{id}', [GroupsController::class, 'getgroupsEdit'])->middleware(['auth'])->name('groups.edit');
// Route::post('/groupsedit/{id}', [GroupsController::class, 'postgroupsEdit'])->middleware(['auth'])->name('groups.edit');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'group'

], function () {
    Route::get('/list', [GroupsController::class, 'index'])->name('group.list');
    Route::get('/add', [GroupsController::class, 'addGetGroup']);
    Route::post('/add', [GroupsController::class, 'addPostGroup'])->name('group.add');
    Route::get('/edit/{id}', [GroupsController::class, 'editGetGroup']);
    Route::post('/edit/{id}', [GroupsController::class, 'editPostGroup'])->name('group.edit');
    Route::get('delete/{id}', [GroupsController::class, 'deleteGroup'])->name('group.delete');

});
Route::group([
    'middleware' => 'auth',
    'prefix' => 'users'

], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.list');
    Route::get('/add', [UserController::class, 'addGetUser']);
    Route::post('/add', [UserController::class, 'addPostUser'])->name('user.add');
    Route::get('/edit/{id}', [UserController::class, 'editGetUser']);
    Route::post('/edit/{id}', [UserController::class, 'editPostUser'])->name('user.edit');
    Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');

});
Route::group([
    'middleware' => 'auth',
    'prefix' => 'group_permission'
], function () {
 Route::get('/', [GroupPermissionsController::class, 'index'])->name('group_pers.list');
 Route::get('/add', [GroupPermissionsController::class, 'addGetGroupPers']);
 Route::post('/add', [GroupPermissionsController::class, 'addPostGroupPers'])->name('group_pers.add');
 Route::get('/edit/{id}', [GroupPermissionsController::class, 'editGetGroupPers']);
 Route::post('/edit/{id}', [GroupPermissionsController::class, 'editPostGroupPers'])->name('group_pers.edit');
 Route::get('delete/{id}', [GroupPermissionsController::class, 'deleteGroupPers'])->name('group_pers.delete');

});
Route::group([
    'middleware' => 'auth',
    'prefix' => 'user_permission'
], function () {
 Route::get('/', [UserPermissionsController::class, 'index'])->name('user_pers.list');
 Route::get('/add', [UserPermissionsController::class, 'addGetUserPers']);
 Route::post('/add', [UserPermissionsController::class, 'addPostUserPers'])->name('user_pers.add');
 Route::get('/edit/{id}', [UserPermissionsController::class, 'editGetUserPers']);
 Route::post('/edit/{id}', [UserPermissionsController::class, 'editPostUserPers'])->name('user_pers.edit');
 Route::get('delete/{id}', [UserPermissionsController::class, 'deleteUserPers'])->name('user_pers.delete');

});
Route::group([
    'middleware' => 'auth',
    'prefix' => 'admins'
], function () {
 Route::get('/', [AdminsController::class, 'index'])->name('admins.list');
 Route::get('/add', [AdminsController::class, 'addGetAdmins']);
 Route::post('/add', [AdminsController::class, 'addPostAdmins'])->name('admins.add');
 Route::get('/edit/{id}', [AdminsController::class, 'editGetAdmins']);
 Route::post('/edit/{id}', [AdminsController::class, 'editPostAdmins'])->name('admins.edit');
 Route::get('delete/{id}', [AdminsController::class, 'deleteAdmins'])->name('admins.delete');

});
require __DIR__ . '/auth.php';
