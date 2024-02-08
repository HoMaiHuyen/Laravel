<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Products list';
    }

    /**
     * Show the form for creating a new resource(GET method)
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage(POST method)
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource(GET method)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource(GET method)
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage(PUT, PATCH)
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
