@extends('admin.layout')

@section('title', 'Admin Dashboard | Buat Event')

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
    <li class="active">Create Event</li>
  </ol>
</section>

<section class="content">
	<form action="{{ route('adminevent.store') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="userid" value="{{ Auth::user()->id }}">		     
	    <div class="form-group">
	        <label for="Username">Username di Forum : </label>
	        <input type="text" class="form-control" id="Username" value="{{ Auth::user()->username }}" required disabled>
	    </div>
	    <div class="form-group @if($errors->has('komunitas')) has-error has-feedback @endif">
			<label for="komunitas">Untuk Komunitas</label>
			<input type="text" class="form-control" name="komunitas" placeholder="Nama Komunitas" value="{{ old('komunitas') }}">
			@if ($errors->has('komunitas'))
				<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
					{{ $errors->first('komunitas') }}
				</p>
			@endif
		</div>
		<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="title" placeholder="Nama Event" value="{{ old('title') }}">
			@if ($errors->has('title'))
				<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
					{{ $errors->first('title') }}
				</p>
			@endif
		</div>
		<div class="form-group @if($errors->has('time')) has-error @endif">
			<label for="time">Time</label>
			<div class="input-group">
				<input type="text" class="form-control" name="time" placeholder="Select your time" value="{{ old('time') }}">
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
</section>
@endsection

@section('js')
    <script src="{{ url('assets/js') }}/daterangepicker.js"></script>
	<script type="text/javascript">
		$(function () {
			$('input[name="time"]').daterangepicker({
				"minDate": moment('<?php echo date('Y-m-d G')?>'),
				"timePicker": true,
				"timePicker24Hour": true,
				"timePickerIncrement": 15,
				"autoApply": true,
				"locale": {
					"format": "YYYY-MM-DD HH:mm:ss",
					"separator": " - ",
				}
			});
		});
	</script>
@endsection
