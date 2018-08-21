<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function picture(){
        return $this->belongsTo(Picture::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
