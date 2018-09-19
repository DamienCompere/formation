<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $fillable = [
        'post_type','title', 'description', 'start_date', 'end_date','price','nb_max','status'
    ];


    public function picture(){
        return $this->hasOne(Picture::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function scopePublished($query){
        $now = Carbon::now()->format('Y-m-d h:i:s');

        return $query->where('start_date', '>', $now);
    }




}
