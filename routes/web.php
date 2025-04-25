<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Frontend\BlogController;

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

Route::get('test2',function(){
    return view('test');
});

Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');

Route::get('/single_post', function () {
    return view('frontend.pages.single_post');
})->name('single_post');

Route::get('/test', function () {
    dd(request()->route());
});

Route::get('/dashboard', function(){
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix'=>'admin','as' => 'admin.','middleware' => ['auth']],function(){
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::get('model/check_slug', [ CategoryController::class,'check_slug' ])->name('model.check_slug');
    Route::resource('categories', CategoryController::class);//->only(['index']);
    Route::resource('tags', TagController::class)->except(['show']);
    Route::resource('posts', PostController::class);
});

Route::get("/", [BlogController::class, 'index'])->name('blog.index');
Route::get("/blog/{slug}", [BlogController::class, 'show'])->name('blog.show');
require __DIR__.'/auth.php';
