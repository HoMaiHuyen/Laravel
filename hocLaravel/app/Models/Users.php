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
        $id = 20;
        $lists = DB::table($this->table)
        ->select('fullname as hoten', 'email', 'id', 'updated_at')
            // ->where('id', 19)
            // ->where('id', 1)
            // ->where(function($query) use ($id){
            //     $query->where('id', '<', $id)->orwhere('id', '>', $id);
            // })
            // ->where('fullname', 'like', 'huế')
            // ->whereNotBetween('id', [1,3])
            // ->whereIn('id', [18,20])
            // ->whereNotIn('id', [18,20])
            // ->whereNull('updated_at')
            ->whereNotNull('updated_at')
        ->get();
        // ->toSql();
        dd($lists);
        $sql = DB::getQueryLog();
        dd($sql);
        //Lay ban ghi dau tien cua table (Lay thong tin chi tiet)
        $detail = DB::table($this->table)->first();
    }
}
