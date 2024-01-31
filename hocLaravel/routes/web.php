<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Route::prefix('admin')->group(function(){
    Route::get('unicode', function () {
        return 'Phuong thuc get cua path /unicode';
    });

    Route::get('show_form', function () {
        return view('form');
    });
    Route::prefix('products')->group(function(){
        Route::get('/', function(){
            return 'Danh sach san pham';
        });

        Route::get('add', function(){
            return 'them san pham';
        });
        Route::get('edit', function () {
            return 'sua san pham';
        });
        Route::get('delete', function () {
            return 'xoa san pham';
        });
    });
});
 