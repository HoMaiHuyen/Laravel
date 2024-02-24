<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data = [];
    public function index(){
        $this->data['title'] = 'Home Page';
        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'Product';
        return view('clients.products', $this->data);
    }

    public function getAdd(){
        $this->data['title'] = 'Add Product';
        return view('clients.add', $this->data);
    }

    public function postAdd(Request $request){
        dd($request);
    }

    public function putAdd(Request $request){
        return 'PUT statement';
        // dd($request);
    }

    
} 
