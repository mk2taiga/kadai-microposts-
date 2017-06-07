<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //リレーション追加
    public function favoriters()
    {
        return $this->belongsToMany(User::class, 'post_favorite', 'post_id', 'user_id')->withTimestamps();
    }
}
