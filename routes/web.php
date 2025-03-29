<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/products', [ProductController::class, 'index']);

// Route::prefix('admin')->group(function () {
//     Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
// });
Route::prefix('admin')->name('admin.')->group(function (){
    //các đường dẫn trg admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //route quản lí sản sphamr
    Route::prefix('products')->name('products.')->group(function (){
        Route::get('/',[ ProductController::class, 'index'])->name('index');//vd admin.products.index
        Route::get('/{id}/show',[ ProductController::class, 'show'])->name('show');
        Route::get('/create',[ ProductController::class, 'create'])->name('create');
        Route::post('/store',[ ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit',[ ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update',[ ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy',[ ProductController::class, 'destroy'])->name('destroy');

       


    });
    Route::prefix('categories')->name('categories.')->group(function (){
        Route::get('/',[ CategorieController::class, 'index'])->name('index');
        Route::get('/create', [CategorieController::class, 'create'])->name('create');
        Route::post('/store', [CategorieController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CategorieController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CategorieController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [CategorieController::class, 'destroy'])->name('destroy');
        Route::get('/deleted', [CategorieController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [CategorieController::class, 'restore'])->name('restore'); 

       


    });
     //route quản lý banners
     Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannersController::class, 'index'])->name('index');
        Route::get('/create', [BannersController::class, 'create'])->name('create');
        Route::post('/store', [BannersController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BannersController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [BannersController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [BannersController::class, 'destroy'])->name('destroy');

    });
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [ContactsController::class, 'index'])->name('index');
        Route::get('/create', [ContactsController::class, 'create'])->name('create');
        Route::post('/store', [ContactsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ContactsController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ContactsController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ContactsController::class, 'destroy'])->name('destroy');
        Route::get('/deleted', [ContactsController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [ContactsController::class, 'restore'])->name('restore');  
    });
    //
    
    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/', [CustomersController::class, 'index'])->name('index');
        Route::get('/create', [CustomersController::class, 'create'])->name('create');
        Route::post('/store', [CustomersController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CustomersController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CustomersController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [CustomersController::class, 'destroy'])->name('destroy');
        Route::get('/deleted', [CustomersController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [CustomersController::class, 'restore'])->name('restore');  
    });
    //
   
    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/', [ReviewsController::class, 'index'])->name('index');
        Route::get('/create', [ReviewsController::class, 'create'])->name('create');
        Route::post('/store', [ReviewsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ReviewsController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ReviewsController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ReviewsController::class, 'destroy'])->name('destroy');
        Route::get('/deleted', [ReviewsController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [ReviewsController::class, 'restore'])->name('restore');  
    });
    //
    
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('index');
        Route::get('/create', [PostsController::class, 'create'])->name('create');
        Route::post('/store', [PostsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PostsController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [PostsController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [PostsController::class, 'destroy'])->name('destroy');
        Route::get('/deleted', [PostsController::class, 'deleted'])->name('deleted');
        Route::post('/{id}/restore', [PostsController::class, 'restore'])->name('restore');  
    });



});