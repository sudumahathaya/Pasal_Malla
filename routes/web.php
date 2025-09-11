<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/bundles', [BundleController::class, 'index'])->name('bundles.index');
Route::get('/bundles/{bundle}', [BundleController::class, 'show'])->name('bundles.show');

Route::view('/cart', 'cart.index')->name('cart.index');
Route::view('/checkout', 'checkout.index')->name('checkout.index');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/delivery', 'delivery')->name('delivery');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
<<<<<<< HEAD

=======
    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
    // Protected Admin Routes
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard-stats', [AdminDashboardController::class, 'getStats'])->name('dashboard.stats');
        Route::resource('products', AdminProductController::class);
        Route::resource('bundles', App\Http\Controllers\Admin\BundleController::class);
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show']);
        Route::put('/orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::put('/orders/{order}/payment-status', [App\Http\Controllers\Admin\OrderController::class, 'updatePaymentStatus'])->name('orders.update-payment-status');
        Route::get('/customers', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{email}', [App\Http\Controllers\Admin\CustomerController::class, 'show'])->name('customers.show');
        Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/sales', [App\Http\Controllers\Admin\ReportController::class, 'sales'])->name('reports.sales');
        Route::get('/reports/products', [App\Http\Controllers\Admin\ReportController::class, 'products'])->name('reports.products');
        Route::get('/reports/customers', [App\Http\Controllers\Admin\ReportController::class, 'customers'])->name('reports.customers');
        Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
        Route::put('/settings/profile', [App\Http\Controllers\Admin\SettingsController::class, 'updateProfile'])->name('settings.profile');
        Route::put('/settings/password', [App\Http\Controllers\Admin\SettingsController::class, 'updatePassword'])->name('settings.password');
        Route::post('/settings/create-admin', [App\Http\Controllers\Admin\SettingsController::class, 'createAdmin'])->name('settings.create-admin');
        Route::post('/settings/toggle-admin/{admin}', [App\Http\Controllers\Admin\SettingsController::class, 'toggleAdminStatus'])->name('settings.toggle-admin');
        Route::delete('/settings/delete-admin/{admin}', [App\Http\Controllers\Admin\SettingsController::class, 'deleteAdmin'])->name('settings.delete-admin');
    });
});
