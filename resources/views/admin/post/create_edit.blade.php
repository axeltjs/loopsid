@extends('admin.layouts.app')

@section('content')

<div class="title-block">
    <h1 class="title"> Buat Post </h1>
    <p class="title-description"> Lembar pengisian data post</p>
</div>
<section class="section">
    <div class="row">
        <div class="col-md-12">
			@if($method == 'create')
			<form method="post" action="{{ url('post/') }}" enctype="multipart/form-data">
			@else 
            {!! Form::model($item,['url' => [url('post')."/".$item->id],'method' => 'Put', 'files' => true]) !!}			
			@endif
			<div class="card">
	                <div class="card-block">
						<div class="card-title-block">
							<h3 class="title"> Data Post </h3>
						</div>
						<section class="example">
						<hr>
							<div class="panel panel-default">
								<div class="panel-body form-horizontal tasi-form" id="form-utama">
									{{ csrf_field() }}
									@include('admin.post._form')
								</div>
							</div>
						</section>
	                </div>
				</div>
			</form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('auth/ckeditor/ckeditor.js') }}"></script>
<script>
  var konten = document.getElementById("content");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
  $( ".select2-multiple" ).select2();
</script>
@endsection