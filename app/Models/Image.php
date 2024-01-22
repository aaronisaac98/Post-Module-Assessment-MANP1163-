<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $with =['category','author'];


    public function Category()
    {
        return $this -> belongsTo(Category::class);
    }

    public function author()
    {
        return $this -> belongsTo(User::class,'user_id');
    }

    public function posts()
    {
        return $this ->hasMany(Post::class);
    }





}
