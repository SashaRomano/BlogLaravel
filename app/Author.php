<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function new_posts(){
        return $this->hasMany(Post::class);
    }
}
