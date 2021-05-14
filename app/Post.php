<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[ 
        'title',
        'excerpt',
        'body',
        'featured_image',
        'post_by_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'post_by_id');
    }
}