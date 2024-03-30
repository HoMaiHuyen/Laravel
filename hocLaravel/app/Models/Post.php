<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Quy ước tên table
    /*
    Tên model: Post => table: posts
    Tên model: ProductCategory: product_categories
    */

    protected $table = 'posts';

    //Quy ước khóa chính. Mặc định Laravel sẽ lấy field ì làm khóa chính

    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public $timestamps = false;

    protected $attributes = [
        'status'=> 0,
    ];
}
