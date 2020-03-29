<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }


    /**
     * Show the blog page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog()
    {
        return view('index');
    }
}
