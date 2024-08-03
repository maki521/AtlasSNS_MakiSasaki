<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // マスアサインメントを許可するフィールドを指定
    protected $fillable = [
        'user_id', 'post',
    ];
}
