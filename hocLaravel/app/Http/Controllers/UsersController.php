<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Users;
class UsersController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }
    public function index(){
        $title = 'List of user';

        $users = new Users();
        $usersList = $this->users->getAllUsers();

        return view('clients.users.list', compact('title', 'usersList'));
    }

    public function add(){
        $title = 'Add users';
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request){
        $request->validate([
            'fullname'=>'required|min:5',
            'email' => 'required|email|unique:users'
        ],[
            'fullname.required'=>'Full name is require',
            'fullname.min'=> 'Fullname at least :min characters',
            'email.required'=>'Email is required',
            'email.email'=>'Email invalid format',
            'email.unique'=>'Email already exits'
        ]);
        $dataInssert = [
           $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInssert);
        return redirect()->route('users.index')->with('msg', 'Add user successful');
    }
}
