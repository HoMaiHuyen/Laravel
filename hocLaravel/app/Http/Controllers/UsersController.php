<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UsersController extends Controller
{
    //
    public function index(){
        $title = 'List of user';

        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');

        return view('clients.users.list', compact('title', 'users'));
    }
}
