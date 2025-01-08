<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\AffiliateAuthController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\AdminAffiliateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\IndexAdminController;
use App\Http\Controllers\JenisCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexUserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\PrivacyPolicyController;

// Halaman utama, yang akan diarahkan ke login pertama kali
Route::get('/', function () {
    return redirect()->route('user.index');
});

// Halaman login
Route::get('adminlogin', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('adminlogin', [AdminLoginController::class, 'login'])->name('login.submit');

// Halaman register
Route::get('admin/register', [AdminRegisterController::class, 'showRegisterForm'])->name('auth.register');
Route::post('admin/register', [AdminRegisterController::class, 'register'])->name('register.submit');

// logout
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Route untuk dashboard admin
Route::middleware('auth:admin')->group(function () {

    Route::get('admin/index', [IndexAdminController::class, 'index'])->name('admin.indexadmin');
    Route::get('/api/monthly-earnings', [IndexAdminController::class, 'getMonthlyEarnings']);
    Route::get('/notifications', [IndexAdminController::class, 'yourFunctionName'])->name('notifications');

    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
        Route::get('/cetak', [AdminController::class, 'cetak'])->name('admin.cetak');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index'); // Customer index route
        Route::get('/cetak', [CustomerController::class, 'cetak'])->name('customer.cetak'); // PDF print route
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [JenisCategoryController::class, 'index'])->name('kategori.index');
        Route::get('/create', [JenisCategoryController::class, 'create'])->name('kategori.create');
        Route::post('/store', [JenisCategoryController::class, 'store'])->name('kategori.store');
        Route::get('/edit/{id}', [JenisCategoryController::class, 'edit'])->name('kategori.edit');
        Route::put('/update/{id}', [JenisCategoryController::class, 'update'])->name('kategori.update');
        Route::delete('/delete/{id}', [JenisCategoryController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/cetak', [JenisCategoryController::class, 'cetak'])->name('kategori.cetak');
    });

    Route::prefix('produk')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('produk.index');
        Route::get('/create', [ProductController::class, 'create'])->name('produk.create');
        Route::post('/store', [ProductController::class, 'store'])->name('produk.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('produk.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('produk.update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');
        Route::get('/cetak', [ProductController::class, 'cetak'])->name('produk.cetak');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/cetak', [OrderController::class, 'cetak'])->name('order.cetak');
        Route::get('/order/cetak/{id}', [OrderController::class, 'cetak2'])->name('order.cetakShow');
    });

    Route::prefix('shipping')->group(function () {
        Route::get('/', [ShippingController::class, 'index'])->name('shipping.index');
        Route::get('/create', [ShippingController::class, 'create'])->name('shipping.create');
        Route::post('/store', [ShippingController::class, 'store'])->name('shipping.store');
        Route::get('/edit/{id}', [ShippingController::class, 'edit'])->name('shipping.edit');
        Route::put('/update/{id}', [ShippingController::class, 'update'])->name('shipping.update');
        Route::delete('/delete/{id}', [ShippingController::class, 'destroy'])->name('shipping.destroy');
        Route::get('/cetak', [ShippingController::class, 'cetak'])->name('shipping.cetak');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('/admin/affiliates', [AdminAffiliateController::class, 'index'])->name('affiliates.index');
        Route::get('/admin/affiliates/create', [AdminAffiliateController::class, 'create'])->name('affiliates.create');
        Route::post('/admin/affiliates/store', [AdminAffiliateController::class, 'store'])->name('affiliates.store');
        Route::get('/admin/affiliates/{id}/edit', [AdminAffiliateController::class, 'edit'])->name('affiliates.edit');
        Route::put('/admin/affiliates/{id}', [AdminAffiliateController::class, 'update'])->name('affiliates.update');
        Route::delete('/admin/affiliates/{id}', [AdminAffiliateController::class, 'destroy'])->name('affiliates.destroy');
    });
    Route::prefix('admin/discounts')->middleware('auth:admin')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('admin.discounts.index');
        Route::get('/create', [DiscountController::class, 'create'])->name('admin.discounts.create');
        Route::post('/store', [DiscountController::class, 'store'])->name('admin.discounts.store');
        Route::get('/{id}/edit', [DiscountController::class, 'edit'])->name('admin.discounts.edit');
        Route::put('/{id}', [DiscountController::class, 'update'])->name('admin.discounts.update');
        Route::delete('/{id}', [DiscountController::class, 'destroy'])->name('admin.discounts.destroy');
    });
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan/generate', [LaporanController::class, 'generate'])->name('laporan.generate');


});

// ---------------------------------USER------------------------------- //
Route::get('/indexuser', [IndexUserController::class, 'index'])->name('user.index');

// Menemapilkan Afiiliate
Route::get('/affiliate', action: [AffiliateController::class, 'index']);
// Route untuk affiliate
Route::get('/promotions', [AffiliateAuthController::class, 'showPromotions'])->name('affiliate.promotions');

Route::get('/dashboard', [AffiliateAuthController::class, 'dashboard'])
    ->name('affiliate.dashboard')
    ->middleware('affiliate');
Route::prefix('affiliate')->group(function () {
    Route::get('/register', [AffiliateAuthController::class, 'showRegisterForm'])->name('affiliate.register');
    Route::post('/register', [AffiliateAuthController::class, 'register']);
    Route::get('/login', [AffiliateAuthController::class, 'showLoginForm'])->name('affiliate.login');
    Route::post('/login', [AffiliateAuthController::class, 'login']);
    Route::post('/logout', [AffiliateAuthController::class, 'logout'])->name('affiliate.logout');
    Route::get('/dashboard', [AffiliateAuthController::class, 'dashboard'])->name('affiliate.dashboard');
});

Route::get('/faq', [FAQController::class, 'index']);

Route::get('/privacy', [PrivacyPolicyController::class, 'index']);

Route::get('/shop', [ShopController::class, 'index']);

// Menampilkan detail produk
Route::get('/shop/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/about', [AboutController::class, 'index']);

// Rute untuk login
Route::get('user/login', [PenggunaController::class, 'showLogin'])->name('user.login');
Route::post('user/login', [PenggunaController::class, 'login']);

// Rute untuk registrasi
Route::get('user/register', [PenggunaController::class, 'showRegister'])->name('user.register');
Route::post('user/register', [PenggunaController::class, 'register']);

// Rute untuk logout
Route::post('user/logout', [PenggunaController::class, 'logout'])->name('user.logout');

// Rute untuk halaman keranjang yang hanya bisa diakses oleh pengguna yang login
Route::get('user/keranjang', [PenggunaController::class, 'keranjang'])->middleware('auth');

Route::get('user/', function () {
    return view('login'); // Halaman utama
});

Route::middleware('auth')->group(function () {
    Route::post('/cart/apply-discount', [CartController::class, 'applyDiscount'])->name('cart.apply.discount');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    // Route::post('/cart/update-item', [CartController::class, 'updateItem'])->name('cart.update');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete-item', [CartController::class, 'deleteItem'])->name('cart.delete');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('user.logout');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('user.transactions');
    Route::post('/transactions/{id}/complete', [TransactionController::class, 'completeOrder'])->name('user.completeOrder');
    Route::get('/transactions/ajax/{id}', [TransactionController::class, 'ajaxTransaction'])->name('transactions.ajax');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
    // Route::get('/indexuser', [CheckoutController::class, 'index'])->name('indexuser');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('user.editProfile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('user.updateProfile');
});


