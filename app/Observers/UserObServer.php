<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserObServer
{
     /**
     * Handle the user "updating" event.
     *
     * @param  \App\User  $post
     * @return void
     */
    public function updating(User $user)
    {
        if($user->name != $user->getOriginal('name')){
            return Comment::where('email', $user->getOriginal('email'))->update([
                'email' => $user->email,
                'name' => $user->name
            ]);
        }
    }
    
   /**
     * Handle the user "deleting" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        return Post::where('user_id', $user->id)->delete();
    }
}
