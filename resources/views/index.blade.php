
@extends('layouts.app')
@section('container')    
          <div class="site-section py-0">
            <div class="owl-carousel hero-slide owl-style">
              @foreach($slider as $item)
              <div class="site-section">
                <div class="container">
                  <div class="half-post-entry d-block d-lg-flex bg-light">
                    <div class="img-bg" style="background-image: url('{{ asset($item->image_url) }}')"></div>
                    <div class="contents">
                      <h2><a href="{{ url('blog/'.$item->slug) }}">{{ $item->title }}</a></h2>
                      <p class="mb-3">
                        {!! $item->content_med !!}
                      </p>
                      
                      <div class="post-meta">
                        <span class="d-block"><a href="#">{{ $item->user->name }}</a> </span>
                        <span class="date-read">{{ $item->updated_at->diffForHumans() }}</span>
                      </div>
      
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
      
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