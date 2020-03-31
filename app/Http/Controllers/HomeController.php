<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class HomeController extends Controller
{
    use TraitSession;
    /**
     * Show the main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider = Post::take(3)->orderBy('id','desc')->get();
        $data = [
            'slider' => $slider
        ];

        return view('index')->with($data);
    }


    /**
     * Show the blog page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog(Request $request)
    {
        $blog = Post::filter($request)->orderBy('updated_at','desc')->paginate(15);
        $data = [
            'posts' => $blog
        ];
        return view('blog')->with($data);
    }

    public function single($slug)
    {
        $article = Post::where('slug', $slug)->first();
        $recent = Post::inRandomOrder()->limit(5)->get();
        $data = [
            'article' => $article,
            'recent' => $recent
        ];

        return view('single-post')->with($data);
    }

    public function postComment(CommentRequest $request)
    {
        $post = Post::findOrFail($request->get('id')); //make sure the post is exist
        if(Auth::check()){
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;
        }else{
            $name = $request->get('name');
            $email = $request->get('email');
        }
        
        $website = $request->get('website');
        $comment = $request->get('comment');

        Comment::create([
            'post_id' => $post->id,
            'name' => $name,
            'email' => $email,
            'website' => $website,
            'comment' => $comment,
        ]);

        $this->message('Your comment has been successfully added!');
        
        return redirect()->back();
    }

    public function deleteComment($id)
    {
        Comment::find($id)->delete();
        $this->message('Your comment has been successfully deleted!');

        return redirect()->back();
    }
}
