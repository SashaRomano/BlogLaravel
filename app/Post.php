<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author_met(){
        return $this->hasOne(Post::class);
    }
}
