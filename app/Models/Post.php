<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id');        
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');        
    }

    /**
     * Filtering data
     * 
     * @return query
     */
    public function scopeFilter($query, $request)
    {
        return $query->where('title','LIKE','%'.$request->get('q').'%');
    }

}
