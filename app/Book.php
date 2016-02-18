<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected  $fillable = [
        'user_id',
        'title',
        'price',
        'from',
        'location',
        'description',
        'dates'
    ];

    protected  $table = 'books';
    public $timestamps = false;

    public function books(){
        return $this->belongsTo('App\User');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag');
    }

    public function scopeOldDate($query){
        $query->where('date', '<', Carbon::now());
    }

    public function scopeCurrentDate($query){
        $query->where('date', '=', Carbon::now());
    }

}
