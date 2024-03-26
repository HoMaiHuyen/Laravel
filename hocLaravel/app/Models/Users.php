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
        DB::enableQueryLog();
        //Lay tat ca ban ghi cua table
        // $id = 20;
        // $lists = DB::table($this->table)
        // ->select('fullname as hoten', 'email', 'id', 'updated_at', 'created_at')
        // ->whereDate('updated_at', '2022-01-21 20:00:00')
        // ->whereMonth('created_at', '3')
        // ->whereMonth('created_at', '18')
        // ->whereYear('created_at', '2024')
        // ->whereColumn('created_at', '=', 'updated_at')
        // ->get();
        // ->toSql();
        // dd($lists);

        // $list = DB:: table('users')
        // ->select('users.*', 'groupps.name as group_name')
        // ->leftJoin('groupps', 'users.group_id', '=', 'groupps.id')
        // ->get();

        $list = DB::table('users')
            // ->select('users.*', 'groupps.name as group_name')
            // ->rightJoin('groupps', 'users.group_id', '=', 'groupps.id')
            // ->orderBy('id', 'desc')
            // ->orderBy('created_at', 'desc')
            // ->orderBy('created_at', 'asc')
            // ->orderBy('id', 'desc')
            // ->inRandomOrder()

            // ->select(DB::raw('count(id) as email_count'), 'email', 'fullname')
            // ->groupBy('email')
            // ->groupBy('fullname')
            // ->having('email_count', '>=', 2)
            // ->limit(2)
            // ->offset(0)
            ->take(2)
            ->skip(2)
            ->get();

        // return ($list);

        dd($list);
        $sql = DB::getQueryLog();
        dd($sql);
        //Lay ban ghi dau tien cua table (Lay thong tin chi tiet)
        $detail = DB::table($this->table)->first();
    }
}
