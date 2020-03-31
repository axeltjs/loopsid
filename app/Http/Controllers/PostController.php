<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Auth;

class PostController extends Controller
{
    use TraitUpload;
    use TraitSession;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Post::myPost()->filter($request)->paginate(10);
        $view = [
            'items' => $data,
        ];
        return view('admin.post.index')->with($view);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'method' => 'create',
        ];

        return view('admin.post.create_edit')->with($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $nama_file = $this->photoUploaded($request, 'post');
        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $nama_file
        ]);
        $this->message('The post has been successfully created!');
        return redirect('post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view = [
            'method' => 'edit',
            'item' => Post::myPost()->findOrFail($id)
        ];

        return view('admin.post.create_edit')->with($view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $item = Post::findOrFail($id);
        $nama_file = $this->photoUploaded($request, 'post', $item->file);

        $data = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ];

        if (isset($nama_file)) {
            $data['image'] = $nama_file;
        }

        $item = $item->update($data);

        $this->message('The post has been successfully updated!');

        return redirect('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
      
        $this->deletePhoto('gallery', $data->file);
        $data = $data->delete();

        $this->message('The post has been successfully deleted!');

        return redirect()->back();
    }
}
