<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Net extends Model
{
    public function show_nets()
    {
        return Net::all();
    }
}
