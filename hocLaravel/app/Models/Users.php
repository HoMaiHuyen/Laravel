<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getAllUsers(){
        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (fullname, email, created_at) VALUES (?, ?, ?)', $data);
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

        DB:: table('users')
        // ->select(
        //     // DB::raw('count(id) as email_count')
        //     // DB::raw("'fullname' as hoten 'email'")
            
        // )
        // ->selectRaw('email, fullname, count(id)')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->where(DB::raw('id>20'))
        // ->where('id > ?', [20])
        // ->whereRaw('id>20')
        // ->orwhereRaw('id>20')
        // ->orderByRaw('created_at DESC, updated_at ASC')
        // ->groupByRaw('email, fullname')
        // ->havingRaw('email_count', '>=', 2)
        // ->where('group_id', '=', DB::raw(
        //     'group_id',
        //     '=',
        //     function($query){
        //         $query->select('id')
        //         ->from('groupps')
        //         ->where('name', '=', 'Admin');
        //     })
        //     )
        ->select('email', DB::raw('(SELECT count(id) FROM "groupps") as group_cpunt'))
        ->get();
        $sql = DB::getQueryLog();
        dd($sql);
        //Lay ban ghi dau tien cua table (Lay thong tin chi tiet)
        $detail = DB::table($this->table)->first();
    }


}
