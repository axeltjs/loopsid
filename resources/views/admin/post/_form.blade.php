<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	{!! Form::label('title', 'Judul', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::text('title', null, ['class'=>'form-control','id' => 'title','autofocus', 'tabindex' => '1']) !!}
		{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
	{!! Form::label('content', 'Konten', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::textarea('content', null, ['class'=>'form-control','id' => 'content','autofocus', 'tabindex' => '1']) !!}
		{!! $errors->first('content', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	{!! Form::label('image', 'File/Gambar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-10">
		{!! Form::file('image', null, ['class' => 'form-control']) !!}
		{!! $errors->first('image', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-10 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-simpan', 'tabindex' => '7']) !!}
	</div>
</div>

