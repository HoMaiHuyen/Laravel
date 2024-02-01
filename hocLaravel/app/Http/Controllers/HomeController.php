<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Action index
    public function index(){
        return 'Home' ;
    }

    // Action getNews()
    public function getNews(){
        return 'News lists';
    }

    public function getCategories($id){
        return 'Categories:'.$id;
    }
}
