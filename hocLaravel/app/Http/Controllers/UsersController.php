<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }
    public function index()
    {
        $statement = $this->users->statementUser("SELECT * FROM users");

        $title = 'List of user';

        $data = $this->users->learQueryBuilder();
        
        $users = new Users();
        $usersList = $this->users->getAllUsers();

        return view('clients.users.list', compact('title', 'usersList'));
    }

    public function add()
    {
        $title = 'Add users';
        return view('clients.users.add', compact('title'));
    }

    public function postAdd(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Link not exits');
        }
        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email'
        ], [
            'fullname.required' => 'Full name is require',
            'fullname.min' => 'Fullname at least :min characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email invalid format',
            'email.unique' => 'Email already exits'
        ]);
        $dataInssert = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInssert);
        return redirect()->route('users.index')->with('msg', 'Add user successful');
    }

    public function getEdit(Request $request, $id = 0)
    {
        $title = 'Update users';

        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                session(['id' => $id]);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('users.index')->with('msg', 'User does not exist');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Link does not exist');
        }

        return view('clients.users.edit', compact('title', 'userDetail'));
    }

    public function postEdit(Request $request)
    {
        $id = session('id');

        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $id
        ], [
            'fullname.required' => 'Họ và tên là bắt buộc',
            'fullname.min' => 'Họ và tên phải có ít nhất :min ký tự',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Định dạng email không hợp lệ',
            'email.unique' => 'Email đã tồn tại trong hệ thống'
        ]);

        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return back()->with('success', 'Update successful');
    }

    public function delete($id){
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $deleteStatus=$this->users->deleteUser($id);
                if($deleteStatus){
                    $msg = 'Delete user successful';
                }else{
                    $msg = "You can not delete user now. Try later please";
                }
            } else {
                $msg = 'User does not exist';
            }
        } else {
            $msg = 'Link does not exist';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
