<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');

Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/settings', 'setting')->name('admin.settings');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/index', 'index')->name('category.index');
            Route::get('/category/create', 'create')->name('category.create');
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/index', 'index')->name('subcategory.index');
            Route::get('/subcategory/create', 'create')->name('subcategory.create');
        });

        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productattribute/index', 'index')->name('attribute.index');
            Route::get('/productattribute/create', 'create')->name('attribute.create');
        });

        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/index', 'index')->name('discount.index');
            Route::get('/discount/create', 'create')->name('discount.create');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/index', 'index')->name('product.index');
        });

        Route::controller(ProductReviewController::class)->group(function () {
            Route::get('/productreviews/index', 'index')->name('reviews.index');
        });

        Route::controller(CartController::class)->group(function () {
            Route::get('/cart/index', 'index')->name('cart.index');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('/order/index', 'index')->name('order.index');
        });

        Route::get('/settings', function () { return view('admin.settings');});

    });

});

Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified', 'rolemanager:vendor'])->name('vendor.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
