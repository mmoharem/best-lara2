<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    protected $fillable = [
        'tag'
    ];

    public function poats() {
        return $this->belongsToMany('App\Post');
    } 
}
