@extends('admin.layouts.app')
@section('css')
    <style>
    .thumbnail{
        border-radius: 5px;
        width: 100px !important;
        height: auto;
    }

    .image-modal{
        padding: 10px;
        max-width: 700px;
        max-height: 700px;
        border-radius: 5px;
    }
    .close-modal{
        font-size: 60px;
        float: right;
        background: transparent;
        border: none;
    }
    .dark{
        background: #dfeded;
    }
    </style>
@endsection
@section('content')
<div class="title-block">
    <div class="pull-left">
        <h1 class="title"> Post </h1>
        <p class="title-description"> daftar postingan </p>
    </div>
    <div class="pull-right">
        <form class="form-inline" action="{{ URL::current() }}" method="GET">
            <div class="input-group">
                {!! Form::text('q', old('q'), ['placeholder' => 'Cari ...','class' => 'form-control boxed rounded-s']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-secondary rounded-s" style="padding:9px;" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> Post List </h3>
                    </div>
					<p><a href="{{ route('post.create') }}" class="btn btn-primary"> Tambah </a></p>
                    <section class="example">
                        <div class="table-responsive">
                        @if($items->isEmpty())
                            <div class="alert alert-warning">Data tidak ditemukan</div>
                        @else 
                        <table class="table table-bordered d-xs-none">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>Tanggal Penulisan</th>
                                    <th>Thumbnail</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->content_short }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        @if(empty($item->image))
                                        -
                                        @else
                                        <img data-toggle="modal" data-target="#modal{{$item->id}}" class="image thumbnail" src="{{ asset('storage/post/' . $item->image) }}" alt="{{ $item->title }}">
                                        <div id="modal{{$item->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <button type="button" class="close-modal" data-dismiss="modal">&times;</button>
                                                <center>
                                                    <img class="image-modal" src="{{ asset('storage/post/' . $item->image) }}" alt="{{ $item->title }}">
                                                </center>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a data-confirm="Are you sure?" data-token="{{ csrf_token() }}" data-method="DELETE" href="{{ url('post/'.$item->id) }}" class="btn btn-block btn-danger"> Delete</a>
                                        <a href="{{ url('post/'.$item->id.'/edit') }}" class="btn btn-block btn-warning">Edit</a>
                                        <a class="btn btn-info btn-block" data-toggle="modal" data-target="#{{ $item->slug }}">Lihat Komentator</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        {{ $items->appends(Request::only('q'))->links() }}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($items as $comments)
<div id="{{ $comments->slug }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <h4 class="modal-title pull-left">Komentar</h4>
            @if($comments->comment->count() > 0)
            <table class="table table-bordered table-responsive" width="100%">
                @foreach($comments->comment as $comment)
                    <tr class="{{ ($loop->iteration % 2 == 0) ? 'dark' : 'white' }}">
                        <td width="20%">Name</td>
                        <td width="80%">{{ $comment->name }}</td>
                    </tr>
                    <tr class="{{ ($loop->iteration % 2 == 0) ? 'dark' : 'white' }}">
                        <td>Email</td>
                        <td>{{ $comment->email }}</td>
                    </tr>
                    <tr class="{{ ($loop->iteration % 2 == 0) ? 'dark' : 'white' }}">
                        <td>Website</td>
                        <td>{{ $comment->website }}</td>
                    </tr>
                    <tr class="{{ ($loop->iteration % 2 == 0) ? 'dark' : 'white' }}">
                        <td>Comment</td>
                        <td>{{ $comment->comment }}</td>
                    </tr>
                @endforeach
            </table>
            @else 
            <br><br>
            <span class="alert alert-info">Belum ada komentar.</span>
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
@endforeach

@endsection