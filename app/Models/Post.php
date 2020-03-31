<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;
use Auth;

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

    public function getContentShortAttribute()
    {
        return Str::limit(strip_tags($this->getAttribute('content')), 100, $end='...');
    }
    public function getContentMedAttribute()
    {
        return Str::limit(strip_tags($this->getAttribute('content')), 550, $end='...');
    }

    public function getImageUrlAttribute()
    {
        $gambar = $this->getAttribute('image');
        if($gambar == null){
            return "img/no-image.jpg";
        }
        return "storage/post/".$gambar;
    }

    public function getTanggalAttribute()
    {
        return date('d F Y', strtotime($this->getAttribute('created_at')));
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

    public function scopeMyPost($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

}
