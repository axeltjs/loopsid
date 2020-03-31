
@extends('layouts.app')
@section('container')    
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <div class="section-title">
            <h2>All Post</h2>
          </div>

        @foreach($posts as $post)
          <div class="post-entry-2 d-flex">
            <div class="thumbnail order-md-2" style="background-image: url('{{ asset($post->image_url) }}')"></div>
            <div class="contents order-md-1 pl-0">
              <h2><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h2>
            <p class="mb-3">{{ $post->content_med  }}</p>
              <div class="post-meta">
                <span class="d-block"><a>{{ $post->user->name }}</a> </span>
                <span class="date-read">{{ $post->updated_at->diffForHumans() }}  <span class="icon-star2"></span></span>
              </div>
            </div>
          </div>
          <hr>
          @endforeach

          {{ $posts->appends(Request::only('q'))->links() }}

        </div>
        </div>
    </div>
</div>
@endsection