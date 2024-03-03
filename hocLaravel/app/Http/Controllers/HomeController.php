<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public $data = [];
    public function index(){
        $this->data['title'] = 'Home Page';
        $this->data['message'] = 'Register Success';
        return view('clients.home', $this->data);
    }

    public function products(){
        $this->data['title'] = 'Product';
        return view('clients.products', $this->data);
    }

    public function getAdd(){
        $this->data['title'] = 'Add Product';
        $this->data['errorMessage'] = 'Check your data please';
        return view('clients.add', $this->data);
    }

    public function postAdd(Request $request){
        $rules=[
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer',
        ];

        // $message = [
        //     'product_name.required' => 'You must enter file :attribute',
        //     'product_name.min' => 'Product name can not least than :min characters',
        //     'product_price.min' => 'You must enter product price',
        //     'product_price.integer' => 'Price must be numbers',
        // ];

        $attributes = [
            'product_name' => 'product name',
            'product_price' => 'product price',
        ];

        $message = [
            'required' => ':attribute must enter',
            'min' => ':attribute can not least :min characters',
            'integer' => ':attribute must numbers'
        ]; 


        $validator= Validator::make($request->all(), $rules, $message);
        // $validator->validate();
        if ($validator->fails()){
            $validator->errors()->add('msg', 'Check data please');
            // return 'Validator fails';
        }else{
            // return 'Validate success';
            return redirect()->route('product')->with('msg', 'Validate success');
        }

        return back()->withErrors($validator);

        
        // $request->validate($rules, $message);

        //Xu li viec them du lieu
    }

    public function putAdd(Request $request){
        return 'PUT statement';
        // dd($request);
    }



    public function getArr(){
        $contentArr = [
            'name' => 'Laravel 10.x',
            'lesson' => 'Study Laravel',
            'academy' => 'Unicode academi',
        ];
        return $contentArr;
    }  

    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);

            // $fileName = 'image_'.uniqid().'.jpg';
             $fileName = 'image_'.uniqid().'.jpg';
            // return response()->streamDownload(function() use($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, 'image-1.jpg');

            return response()->download($image, $fileName);
        }
    }
} 
