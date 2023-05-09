<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;


    public function widgets()
    {
        return $this->hasMany('App\Models\Widget');
    }
}
