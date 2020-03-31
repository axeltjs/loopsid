<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'name',
        'email',
        'website',
        'comment',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');        
    }
    
}
