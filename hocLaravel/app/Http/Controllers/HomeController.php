<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //Action index
    public function index(){
        $title = "Study web development at unicode";
        $content = "Study Laravel 8.x at unicode";
        // $dataView = [
        //     'titleData' => $title,
        //     'contentData' => $content
        // ];
        // compact('title', 'content')
        return view('home')->with(['title'=> $title, 'content'=>$content]);
        // return View::make('home')->with(['title'=>$title, 'content' => $content]);
        // $contentView = view('home')->render();
        // $contentView = $contentView->render();
        // dd($contentView);
        // return $contentView;
    }

    // Action getNews()
    public function getNews(){
        return 'News lists';
    }

    public function getCategories($id){
        return 'Categories:'.$id;
    }

    public function getProductDetail($id){
        return view('clients.products.detail', compact('id'));
    }
}
