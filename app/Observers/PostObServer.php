<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\Comment;

class PostObServer
{
 
    /**
     * Handle the post "deleting" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        return Comment::where('post_id', $post->id)->delete();
    }

}
