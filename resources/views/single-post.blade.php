
@extends('layouts.app')
@section('container')    

<div class="site-section">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 single-content">
          
          <p class="mb-5">
            <img src="{{ asset($article->image_url) }}" alt="Image" class="img-fluid">
          </p>  
          <h1 class="mb-4">
            {{ $article->title }}
          </h1>
          <div class="post-meta d-flex mb-5">
            <div class="bio-pic mr-3">
              <img src="{{ asset('img/person-male.png') }}" style="border:1px solid #000;" alt="Image" class="img-fluidid">
            </div>
            <div class="vcard">
              <span class="d-block"><a href="#">{{ $article->user->name }}</a> </span>
              <span class="date-read" style="">{{ $article->updated_at->diffForHumans() }} <span class="icon-star2"></span></span>
            </div>
          </div>
          {!! $article->content !!}

                <div class="pt-5">
                  <div class="section-title" id="comment">
                    <h2 class="mb-5">{{ $article->comment->count() }} Comments</h2>
                  </div>
                  <ul class="comment-list">
                   
                    @foreach ($article->comment as $item)
                    <li class="comment">
                        <div class="vcard bio">
                          <img src="{{ asset('img/person-male.png') }}" style="border:1px solid #000;" alt="Image">
                        </div>
                        <div class="comment-body">
                          <h3>{{ $item->name }}</h3>
                          <div class="meta">{{ $item->updated_at->diffForHumans() }}</div>
                          <p>
                              {{ $item->comment }}
                          </p>
                        </div>
                        @auth
                          @if($item->email == Auth::user()->email)
                          <a data-confirm="Are you sure?" data-token="{{ csrf_token() }}" data-method="DELETE" href="{{ url('comment/delete/'.$item->id) }}#comment" class="btn btn-sm btn-danger pull-right"> Delete</a>
                          @endif
                        @endauth
                      </li>
                    @endforeach
                  </ul>
                  <!-- END comment-list -->
                  
                  <div class="comment-form-wrap pt-5">
                    <div class="section-title">
                      <h2 class="mb-5">Leave a comment</h2>
                      @include('admin.layouts._flash')

                    </div>
        			        <form method="post" class="p-5 bg-light" action="{{ route('post-comment') }}#comment" >
                    @csrf
                     <input type="hidden" name="id" value="{{ $article->id }}"> 
                     @guest
                     <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" class="form-control" id="name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" class="form-control" id="email">
                      </div>
                      @endguest
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" class="form-control" id="website">
                      </div>
    
                      <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Post Comment" class="btn btn-primary py-3">
                      </div>
    
                    </form>
                  </div>
                </div>
        </div>


        <div class="col-lg-3 ml-auto">
          <div class="section-title">
            <h2>Recent Posts</h2>
          </div>
          @foreach($recent as $item)
          <div class="trend-entry d-flex">
            <div class="number align-self-start">0{{ $loop->iteration }}</div>
            <div class="trend-contents">
            <h2><a href="{{ url('blog/'.$item->slug) }}">{{ $item->title }}</a></h2>
              <div class="post-meta">
                <span class="d-block"><a href="#">{{ $item->user->name }}</a></span>
                <span class="date-read">{{ $item->updated_at->diffForHumans() }} <span class="icon-star2"></span></span>
              </div>
            </div>
          </div>
          @endforeach
          <p>
          <a href="{{ url('blog') }}" class="more">See All Post <span class="icon-keyboard_arrow_right"></span></a>
          </p>
        </div>


      </div>
      
    </div>
  </div>

  <div class="site-section subscribe bg-light">
    <div class="container">
      <form action="#" class="row align-items-center">
        <div class="col-md-5 mr-auto">
          <h2>Newsletter Subcribe</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
        </div>
        <div class="col-md-6 ml-auto">
          <div class="d-flex">
            <input type="email" class="form-control" placeholder="Enter your email">
            <button type="submit" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('js')
  <script src="{{ asset('auth/js/laravel.js') }}"></script>  
@endsection