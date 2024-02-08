<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
    }
    //Hiển thị danh sách chuyên mục(phương thức GET)
    public function index()
    {
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
    public function addCategory()
    {
        return view('clients/categories/add');
    }

    //Thêm dữ liệu vào chuyên mục(phương thức POST)
    public function handleAddCategory()
    {
        return redirect(route('categories.add'));
        // return 'Submit thêm chuyên mục: ';
    }

    //Xóa dữ liệu(phoungw thức dalete)
    public function deleteCatregory($id)
    {
        return 'Submit xóa chuyên mục: ' .$id;
    }
}
