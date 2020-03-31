@extends('admin.layouts.app')

@section('content')
<div class="title-block">
    <div class="pull-left">
        <h1 class="title"> User </h1>
        <p class="title-description"> daftar pengguna </p>
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
                        <h3 class="title"> User List </h3>
                    </div>
					<p><a href="{{ route('user.create') }}" class="btn btn-primary"> Tambah </a></p>
                    <section class="example">
                        <div class="table-responsive">
                        @if($items->isEmpty())
                            <div class="alert alert-warning">Data tidak ditemukan</div>
                        @else 
                        <table class="table table-bordered d-md-none d-lg-none d-xl-none">
                            @foreach($items as $item)
                                @if(fmod($loop->iteration, 2) == 0)
                                    <tbody style="background: #ecf0f1;">
                                @else 
                                    <tbody style="background: #fff;">
                                @endif        
                                    <tr> 
                                        <th>Nama</th>       
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>       
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <a data-confirm="Are you sure?" data-token="{{ csrf_token() }}" data-method="DELETE" href="{{ url('user/'.$item->id) }}" class="btn btn-block btn-danger"> Delete</a>
                                            <a href="{{ url('user/'.$item->id.'/edit') }}" class="btn btn-block btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <table class="table table-bordered d-xs-none">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a data-confirm="Are you sure?" data-token="{{ csrf_token() }}" data-method="DELETE" href="{{ url('user/'.$item->id) }}" class="btn btn-block btn-danger"> Delete</a>
                                        <a href="{{ url('user/'.$item->id.'/edit') }}" class="btn btn-block btn-warning">Edit</a>
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