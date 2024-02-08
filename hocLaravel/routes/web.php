<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
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

// client Routes
Route::get('/', function(){
    return '<h1 style="text-align: center;">UNICODE HOME PAGE</h1>';
})->name('home');
Route::prefix('categories')->group(function () {
    //Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    //Lấy chi tiết 1 chuyên mục (Áp dụng show form của chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Xử lí update chuyên mục
    Route::post('/edit{id}', [CategoriesController::class, 'updategetCategory']);

    //Hiển thị form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    //Xử lí thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xóa chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});

// Admin route
Route::middleware('auth.admin')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
        Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});