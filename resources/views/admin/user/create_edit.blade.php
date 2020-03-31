@extends('admin.layouts.app')

@section('content')

<div class="title-block">
    <h1 class="title"> Buat User </h1>
    <p class="title-description"> Lembar pengisian data user</p>
</div>
<section class="section">
    <div class="row">
        <div class="col-md-12">
			@if($method == 'create')
			<form method="post" action="{{ url('user/') }}">
			@else 
            {!! Form::model($item,['url' => [url('user')."/".$item->id],'method' => 'Put']) !!}			
			@endif
			<div class="card">
	                <div class="card-block">
						<div class="card-title-block">
							<h3 class="title"> Data User </h3>
						</div>
						<section class="example">
						<hr>
							<div class="panel panel-default">
								<div class="panel-body form-horizontal tasi-form" id="form-utama">
									{{ csrf_field() }}
									@include('admin.user._form')
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
	<script src="{{ asset('auth/js/passwordChecker.js') }}"></script>
@endsection