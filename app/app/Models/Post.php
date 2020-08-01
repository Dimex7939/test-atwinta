<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
	protected $fillable = ['title', 'paste', 'exp_time', 'access', 'link', 'name', 'anon', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
