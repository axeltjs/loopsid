<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Filtering data
     * 
     * @return query
     */
    public function scopeFilter($query, $request)
    {
        return $query->where('name','LIKE','%'.$request->get('q').'%')
            ->orWhere('email','LIKE','%'.$request->get('q').'%');
    }

    /**
     * Check creds
     * 
     * @return query
     */
    public function scopeExceptMe($query)
    {
        return $query->where('id','!=',Auth::user()->id);
    }
}
