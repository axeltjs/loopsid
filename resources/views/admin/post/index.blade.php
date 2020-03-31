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

@endsection