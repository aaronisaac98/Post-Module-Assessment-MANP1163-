<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with =['category','author'];


    public function scopeFilter($query, array $filters)
    {

        if($filters['search'] ?? false)
        {
            $query
                ->where('title', 'like', '%'.request('search').'%')
                ->orwhere('body', 'like', '%'.request('search').'%')
                ->orwhere('excerpt', 'like', '%'.request('search').'%');
        }
    }

    //A post that is written by a user which belongs to the user
    public function Category()
    {
        return $this -> belongsTo(Category::class);
    }

    public function author()
    {
        return $this -> belongsTo(User::class,'user_id');
    }

}
