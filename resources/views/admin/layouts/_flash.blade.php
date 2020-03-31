@if($errors->isNotEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Kesalahan!</strong>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li class="">{{ $error }}</li>
            @endforeach
        </ul>

	</div>
@endif
@if (session()->has('flash_notification.message'))
	<div class="col-md-12">
		<div class="alert alert-{{ session()->get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{!! session()->get('flash_notification.message') !!}
		</div>
	</div>
@endif