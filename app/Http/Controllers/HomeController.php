<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{

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
    public function blog()
    {
        return view('blog');
    }

    public function single($slug)
    {
        $item = Post::where('slug', $slug)->first();
        $data = [
            'item' => $item
        ];

        return view('single-post')->with($data);
    }
}
