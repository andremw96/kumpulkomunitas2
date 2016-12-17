@extends('layout.layout')

@section('title', 'Detail Event')

@section('content')

<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/calendar') }}">Calendar</a></li>
			<li><a href="{{ url('/events') }}">Events List</a></li>
			<li class="active">{{ $event->title }}</li>
		</ol>
	</div>
</div>

<div class="container">
	<div class="col-lg-12">
		<h2>{{ $event->title }} - {{ $event->komunitas }} <small>made by {{ $CariUsername->username }}</small></h2>
		<hr>
	</div>
</div>

<div class="container">
	<div class="col-lg-6">
		
		<p>Time: <br>
		{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
		</p>
		
		<p>Duration: <br>
		{{ $duration }}
		</p>
		
		<p>						
			@if (Auth::guest()) 	
	
			@elseif ((Auth::id() == $event->user_id) or (Auth::user()->HakAkses === 'Admin'))	
				<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
					<input type="hidden" name="_method" value="DELETE" />
					{{ csrf_field() }}
					<button onclick="return confirm('Anda yakin akan menghapus Agenda ini ?');" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</form>
				<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit')}}">
					<span class="glyphicon glyphicon-edit"></span> Edit</a> 
			@endif
			
		</p>
		
	</div>
</div>
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