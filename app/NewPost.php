<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewPost extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
