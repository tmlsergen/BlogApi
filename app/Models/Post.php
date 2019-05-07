<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
