<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUsers($filters = [], $keywords=null, $sortByArr = null, $perPage = null){
        DB::enableQueryLog();
        // $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        $users = DB::table($this->table)
        ->select('users.*', 'groupps.name as group_name')
        ->join('groupps', 'users.group_id', '=', 'groupps.id');

        $orderBy = 'users.created_at';
        $orderType = 'desc';
        if(!empty($sortByArr)&& is_array($sortByArr)){
            if (!empty($sortByArr['sortBy'])&& !empty($sortByArr['sortType'])){
                $orderBy = trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
            }
        }
        $users = $users->orderBy($orderBy, $orderType);
        

        if(!empty($filters)){
            $users = $users->when(count($filters) > 0, function ($query) use ($filters) {
                foreach ($filters as $filter) {
                    $query->where($filter[0], $filter[1], $filter[2]);
                }
            });

        }

        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->orWhere('fullname', 'like', '%' . $keyword . '%');
                    $query->orWhere('email', 'like', '%' . $keyword . '%');
                }
            });
        }

        // $users = $users->get();
        if (!empty($perPage)) {
            $users = $users->paginate($perPage)->appends(request()->query());
        } else {
            $users = $users->get();
        }
        
        return $users;


    }

    public function addUser($data)
    {
        // DB::insert('INSERT INTO users (fullname, email, created_at) VALUES (?, ?, ?)', $data);
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data = array_merge($data, [$id]);

        return DB::update('UPDATE ' . $this->table . ' SET fullname=?, email=?, updated_at=? WHERE id = ?', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }

    public function statementUser($sql){
        return DB::statement($sql);
    }

    public function learQueryBuilder(){


        // return ($list);
        DB::enableQueryLog();
        // $status = DB::table('users')->insert([
        //     'fullname' => 'Hồ Mai Huyền',
        //     'email' => 'huyen@gmail.com',
        //     'group_id' => 1,
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);

        // dd($status);

        // $lastId = DB::getPdo()->lastInsertId();

        // $lastId = DB::table('users')->insertGetId([
        //     'fullname' => 'Hồ Mai Huyền',
        //     'email' => 'huyen@gmail.com',
        //     'group_id' => 1,
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);

        // dd($lastId);

        // $status = DB::table('users')
        // ->where('id', 29)
        // ->update([
        //     'fullname' => 'Hồ Mai Huyền',
        //     'email' => 'huyen@gmail.com',
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // dd($status);

        // $status = DB::table('users')
        // ->where('id', 9)
        // ->delete();

        //Đếm số bản ghi
        // $list = DB::table('users')->where('id', '>', 20)->count();

        // $list = DB::table('users')->where('id', '>', 20)->get();
        // $count = count($list);
        // dd($count);

        $results = DB::table('users')
            ->select('email', DB::raw('(SELECT count(id) FROM groupps) as group_count'))
            ->get();

        $sql = DB::getQueryLog();
        dd($sql);
        

        $detail = DB::table($this->table)->first();
        }
}
