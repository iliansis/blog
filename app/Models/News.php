<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'short_description',
        'likes',
    ];

    public function comments()
   {
        return $this->hasMany(Comment::class,'id','news_id');
   }
}
