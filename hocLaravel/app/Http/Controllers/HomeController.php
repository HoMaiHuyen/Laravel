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
} 
