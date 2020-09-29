<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // $fillableはモデルを利用してデータを作成する際に複数代入を許可するための設定
    protected $fillable = [
        'title',
        'body',
    ];

    public function comments() 
    {
        return $this->hasMany('App\Models\Comment');
    }
}
