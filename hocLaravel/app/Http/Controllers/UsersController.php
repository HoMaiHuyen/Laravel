<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Users;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
    private $users;
    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index(Request $request)
    {
        // $statement = $this->users->statementUser("SELECT * FROM users");

        $title = 'List of user';

        // $data = $this->users->learQueryBuilder();

        // $users = new Users();

        $filters = [];
        $keywords = null;
        if (!empty($request->status)) {
            $status = $request->status;
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }

        if (!empty($request->group_id)) {
            $groupID = $request->group_id;
            
            $filters[] = ['users.group_id', '=', $groupID];
        }

        if (!empty($request->keywords)) {
            $keywords= $request->keywords;

            $filters[] = $request->keywords;
        }

        //Xử lí logic
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allowSort = ['asc', 'desc'];
        if(!empty($sortType)&& in_array($sortType, $allowSort)){
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        }else{
            $sortType = 'asc';
        }
        $sortArr = [
            'sortBy'=> $sortBy,
            'sortType'=> $sortType,
        ];
        
        $usersList = $this->users->getAllUsers($filters, $keywords, $sortArr, self::_PER_PAGE);

        return view('clients.users.list', compact('title', 'usersList', 'sortType'));
    }

    public function add()
    {
        $title = 'Add users';

        $allGroups = getAllGroups();

        return view('clients.users.add', compact('title', 'allGroups'));
    }

    public function postAdd(UsersRequest $request)
    {
        
        $dataInssert = [
            'fullname'=>$request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'created_at'=>date('Y-m-d H:i:s')
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
        $allGroups = getAllGroups();
        return view('clients.users.edit', compact('title', 'userDetail', 'allGroups'));
    }

    public function postEdit(UsersRequest $request)
    {
        $id = session('id');
        if(empty($id)){
            return back()->with('msg', 'Link not exits');
        }

        $dataUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);
        return back()->with('success', 'Update successful');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Delete user successful';
                } else {
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
