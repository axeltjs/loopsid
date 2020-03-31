@extends('admin.layouts.app')

@section('content')

<div class="title-block">
    <h1 class="title"> Update Profile </h1>
    <p class="title-description"> Lembar pengisian data pribadi</p>
</div>
<section class="section">
    <div class="row">
        <div class="col-md-12">
			<form method="post" action="{{ url('profile/') }}">
			<div class="card">
	                <div class="card-block">
						<div class="card-title-block">
							<h3 class="title"> Data Profile </h3>
						</div>
						<section class="example">
						<hr>
							<div class="panel panel-default">
								<div class="panel-body form-horizontal tasi-form" id="form-utama">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('name', Auth::user()->name, ['class'=>'form-control','id' => 'name','autofocus', 'tabindex' => '1']) !!}
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        {!! Form::label('email', 'Email', ['class'=>'col-md-2 control-label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::email('email', Auth::user()->email, ['class'=>'form-control','id' => 'email', 'tabindex' => '3']) !!}
                                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                        {!! Form::label('new_password', 'Password', ['class'=>'col-md-2 control-label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::password('new_password', ['class'=>'form-control','id' => 'new_password', 'tabindex' => '4']) !!}
                                            {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                                            <p class="help-block warning-pass">Password tidak cocok</p>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new_password2') ? ' has-error' : '' }}">
                                        {!! Form::label('new_password2', 'Re Enter Password', ['class'=>'col-md-4 control-label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::password('new_password2', ['class'=>'form-control','id' => 'new_password2', 'tabindex' => '5']) !!}
                                            {!! $errors->first('new_password2', '<p class="help-block">:message</p>') !!}
                                            <p class="help-block warning-pass">Password tidak cocok</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        {!! Form::label('password', 'Current Password', ['class'=>'col-md-4 control-label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::password('password', ['class'=>'form-control','id' => 'password', 'tabindex' => '3']) !!}
                                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                                <small>Wajib diisi</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-2">
                                            {!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-simpan', 'tabindex' => '7']) !!}
                                        </div>
                                    </div>


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