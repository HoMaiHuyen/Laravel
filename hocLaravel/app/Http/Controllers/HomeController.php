<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    // //Action index
    // public function index(){
    //     $title = "Study web development at unicode";
    //     $content = "Study Laravel 8.x at unicode";
    //     // $dataView = [
    //     //     'titleData' => $title,
    //     //     'contentData' => $content
    //     // ];
    //     // compact('title', 'content')
    //     return view('home')->with(['title'=> $title, 'content'=>$content]);
    //     // return View::make('home')->with(['title'=>$title, 'content' => $content]);
    //     // $contentView = view('home')->render();
    //     // $contentView = $contentView->render();
    //     // dd($contentView);
    //     // return $contentView;
    // }

    // // Action getNews()
    // public function getNews(){
    //     return 'News lists';
    // }

    // public function getCategories($id){
    //     return 'Categories:'.$id;
    // }

    // public function getProductDetail($id){
    //     return view('clients.products.detail', compact('id'));
    // }
    public $data = [];
    public function index(){
        $this->data['welcome'] = 'Study Laravel at <b>Unicode</b>';
        $this->data['content'] = '<h3>Chuong 1: Introduction to Laravel</h3>
        <p>Infomation 1</p>
        <p>Infomation 2</p>
        <p>Infomation 3</p>';

        $this->data['index'] = 1;

        $this->data['dataArr'] = [];

        $this->data['number'] = 3;
        return view('home', $this->data);
    }
}
