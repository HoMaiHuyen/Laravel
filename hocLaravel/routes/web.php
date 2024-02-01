<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     $html = '<h1>Hoc Lap Trinh</h1>';
//     return $html;
// });
// Route::get('unicode', function () {
//     return view('form');
// });
// Route::get('unicode', function () {
//     return 'Phuong thuc get cua path /unicode';
// });

// Route::post('/unicode', function () {
//     return 'Phuong thuc Post cua path /unicode';
// });

// Route::put('unicode', function(){
//     return "Phuong thuc Put cua path /unicode";
// });

// Route::delete('unicode', function () {
//     return "Phuong thuc Delete cua path /unicode";
// });

// Route::patch('unicode', function () {
//     return "Phuong thuc Patch cua path /unicode";
// });

// Route::match(['get', 'post'], 'unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('unicode', function(Request $request){
//     return $request->method();
// });
// Route::get('show_form', function(){
//     return view('form');
// });

// Route::redirect('unicode', 'show_form',404);

// Route::view('show_form', 'form');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/tin-tuc', 'HomeController@getNews')->name('news');
Route::get('/Categories/{id}', [HomeController::class, 'getCategories']);



Route::prefix('admin')->group(function () {
    Route::get('tin-tuc/{id?}/{slug?}.html', function ($id = null, $slug = null) {
        $content = 'Phuong thuc get cua path /unicode voi tham so:';
        $content .= 'id=' . $id . '</br>';
        $content .= 'slug=' . $slug . '</br>';
        return $content;
    })->where('id', '\d+')->where('slug', '.+')->name('admin.tintuc');

    Route::get('show_form', function () {
        return view('form');
    })->name('admin.show_form');

    Route::prefix('products')->middleware('checkpermssion')->group(function () {
        Route::get('/', function () {
            return 'Danh sach san pham';
        });

        Route::get('add', function () {
            return 'them san pham';
        })->name('admin.products.add');

        Route::get('edit', function () {
            return 'sua san pham';
        });
        Route::get('delete', function () {
            return 'xoa san pham';
        });
    });
});
