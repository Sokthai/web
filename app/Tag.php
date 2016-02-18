<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected  $fillable = [
        'name'
    ];


    public function Books(){
        return $this->hasMany('App\Book');
    }
}
