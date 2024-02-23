<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request)
    {
        /* 
        Nếu là trang danh sách chuyên mục =>hiển thị ra dòng chữ: 'XIn chào unicode'
        */
        if($request->is('categories')){
            echo '<h3>Xin chào unicode</h3>';
        }
    }
    //Hiển thị danh sách chuyên mục(phương thức GET)
    public function index(Request $request)
    {
        // if (isset($_GET['id'])){
        //     echo $_GET['id'];
        // }

        // $path = $request->path();
        // echo $path;
        // $url = $request->url();

        // $fullUrl = $request->fullUrl();
        // echo $fullUrl;
        // $allData = $request->all();
        // dd($allData);
        // $method = $request->method();
        // echo $method;
        $ip = $request->ip();
        // echo 'IP là:' . $ip;
        // if ($request->isMethod('GET')){
        //     echo 'Phuong thuc GET';
        // }

        // $server = $request->server();
        // dd($server['REQUEST_URI']);

        // $header = $request->header('user-agent');
        // dd($header);

        // $id = $request->input('id.1.email');
        // dd($id);

        // $id = $request->id;
        // $name = $request->name;
        // dd($name);

        $name = request('name', 'Unicode');
        dd($name);

        // $input = $request->input();
        // dd($input);
        return view('clients/categories/list');

    }
    // Lấy ra 1 chuyên mục theo id(phương thức GET)
    public function getCategory($id)
    {
        return 'Chi tiết chuyên mục:' . $id;
    }

    //Cập nhật 1 chuyên mục(phương thức POST)
    public function updateCategory($id)
    {
        return 'Submit sửa chuyên mục: ' .$id;
    }

    //SHow form thêm dữ liệu(phương thức GET)
    public function addCategory(Request $request)
    {
        $path = $request->path();
        echo $path;
        return view('clients/categories/add');
    }

    //Thêm dữ liệu vào chuyên mục(phương thức POST)
    public function handleAddCategory(Request $request)
    {
        $allData = $request->all();
        dd($allData);
        // return redirect(route('categories.add'));
        // return 'Submit thêm chuyên mục: ';
        // print_r($_POST);
    }

    //Xóa dữ liệu(phoungw thức dalete)
    public function deleteCatregory($id)
    {
        return 'Submit xóa chuyên mục: ' .$id;
    }
}
