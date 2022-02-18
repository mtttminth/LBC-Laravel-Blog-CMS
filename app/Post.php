<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Example of Mutators and Accessors

    // Mutator
    // public function setPostImgaeAttribute($value)
    // {
    //     $this->attributes['post_imgae'] = asset($value);
    // }

    public function getPostImageAttribute($value)
    {
        return asset($value);
    }
}