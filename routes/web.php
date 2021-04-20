<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\GroupPermissionsController;
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
    'prefix' => 'group_permission'
], function () {
 Route::get('/list', [GroupPermissionsController::class, 'index'])->name('group_pers.list');
 Route::get('/add', [GroupPermissionsController::class, 'addGetGroupPers']);
 Route::post('/add', [GroupPermissionsController::class, 'addPostGroupPers'])->name('group_pers.add');
 Route::get('/edit/{id}', [GroupPermissionsController::class, 'editGetGroupPers']);
 Route::post('/edit/{id}', [GroupPermissionsController::class, 'editPostGroupPers'])->name('group_pers.edit');
 Route::get('delete/{id}', [GroupPermissionsController::class, 'deleteGroupPers'])->name('group_pers.delete');

});
require __DIR__ . '/auth.php';
