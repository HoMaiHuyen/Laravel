<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;
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
// Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth.admin');
// Route::middleware('auth.admin')->prefix('categories')->group(function () {
//     //Danh sách chuyên mục
//     Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

//     //Lấy chi tiết 1 chuyên mục (Áp dụng show form của chuyên mục)
//     Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

//     //Xử lí update chuyên mục
//     Route::post('/edit{id}', [CategoriesController::class, 'updategetCategory']);

//     //Hiển thị form add dữ liệu
//     Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

//     //Xử lí thêm chuyên mục
//     Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

//     //Xóa chuyên mục
//     Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');

//     // Hiển thị form upload
//     Route::get('/upload', [CategoriesController::class, 'getfile']);

//     //Xử lí file
//     Route::post('/upload', [CategoriesController::class, 'handlefile'])->name('categories.upload');
// });

// Route::get('product/{id}', [HomeController::class, 'getProductDetail']);

// // Admin route
// Route::middleware('auth.admin')->prefix('admin')->group(function () {
//     Route::get('/', [DashboardController::class, 'index']);
//     Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [HomeController::class, 'products'])->name('product');

Route::get('/add product', [HomeController::class, 'getAdd']);

Route::post('/add product', [HomeController::class, 'postAdd'])->name('post-add');

Route::put('/add product', [HomeController::class, 'putAdd']);


// Route::get('demo-response', function () {
//     // $response = new Response('Study develop at Unicode', 200);
//     // dd($response);
//     // return($response);

//     $response = (new Response())->cookie('unicode', 'Training PHP');
//     return $response;
// });

// Route::get('demo-response2', function(Request $request){
//     return $request->cookie('unicode');
// });

// Route::get('get-information', [HomeController::class, 'getArr']);

Route::get('demo-response', function () {
    // $contentArr = [
    //     'name'=>'Unicode', 
    //     'version'=>'Laravel 10.x',
    //     'lesson'=>'HTTP Response Laravel'
    // ];
    // return response()->json($contentArr, 404)->header('API-Key', '1234');

    // return '<h2>Welcome to Unicode</h2>';
    echo old('username');
    return view('clients.demo-test');
})->name('demo-response');

Route::post('demo-response', function (Request $request) {
    if (!empty($request->username)) {
        return back()->withInput()->with('message', 'Validate success');
    }

    return redirect(route('demo-response'))->with('message', 'Validate not success');
});


Route::get('download-image', [HomeController::class, 'downloadImage'])->name('download-image');
