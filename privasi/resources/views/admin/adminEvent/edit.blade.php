@extends('admin.layout')

@section('title', 'Admin Dashboard | Edit Event')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
	<li><a href="{{ url('/admin/adminevent/calendar') }}">Calendar</a></li>
	<li><a href="{{ url('/admin/adminevent') }}">Events</a></li>
	<li class="active">Edit - {{ $event->title }}</li>	
  </ol>
</section>

<section class="content">
	<div class="col-lg-6">
		
		@if($errors)
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		@endif
		
		<form action="{{ url('admin/adminevent/' . $event->id) }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT" />
			<input type="hidden" name="updated_by" value=" {{ Auth::user()->id }} "> 
			<input type="hidden" name="userid" value="{{ $event->user_id }}">
			<div class="form-group">
		        <label for="Username">Username di Forum : </label>
		        <input type="text" class="form-control" id="Username" value="{{ $CariUsername->username }}" required disabled>
	    	</div>		
	    	<div class="form-group @if($errors->has('komunitas')) has-error has-feedback @endif">
				<label for="komunitas">Untuk Komunitas {{ $event->komunitas }}</label>
				<input type="text" class="form-control" name="komunitas" placeholder="Nama Komunitas" value="{{ $event->komunitas }}">
				@if ($errors->has('komunitas'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('komunitas') }}
					</p>
				@endif
			</div>		
			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" value="{{ $event->title }}" placeholder="E.g. My event's title">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Time</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" value="{{ $event->start_time . ' - ' . $event->end_time }}" placeholder="Select your time">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
				@if ($errors->has('time'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('time') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</section>
@endsection

@section('js')
<script src="{{ url('_asset/js') }}/daterangepicker.js"></script>
<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
@endsection