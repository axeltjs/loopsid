<?php

namespace App\Observers;

use App\Models\User;
use App\Model\Post;
use App\Model\Comment;

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
        User::where('id', $user->id)->update(['name' => $user->email]);
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
