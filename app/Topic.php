<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
//    private $table = 'topics';

    public function posts(){
        return $this->hasMany(Post::class)->where('state',1);
    }
}
