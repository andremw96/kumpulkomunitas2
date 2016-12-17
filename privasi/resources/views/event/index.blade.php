@extends('layout.layout')

@section('title', 'Calendar')

@section('content')
	<div class="container">
		<div clss="col-lg-12">
			<ol class="breadcrumb">
				<li>You are here: <a href="{{ url('/') }}">Home</a></li>
				<li class="active">Calendar</li>		
			</ol>
		</div>
		@if ((Auth::guest()) or (Auth::user()->HakAkses === 'User'))		
			<a href="{{ url('events') }}" type="submit" button type="button" class="btn btn-primary pull-left">Events List</a>	
		@elseif (Auth::user()->HakAkses === 'Admin')
			<a href="{{ url('events/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Add new event</a>
			<a href="{{ url('events') }}" type="submit" button type="button" class="btn btn-primary pull-left">Events List</a>	
		@endif
	</div>

	<hr>

	<div class="container">
		<div class="col-lg-12">
			<div id='calendar'></div>
		</div>		
	</div>
	
@endsection

@section('js')
	<script src={{asset('assets/js/fullcalendar.min.js')}}></script>
	<script type="text/javascript">
		$(document).ready(function() {
		
		var base_url = '{{ url('/') }}';

		$('#calendar').fullCalendar({
			weekends: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},

			eventLimit: true, // allow "more" link when too many events
			events: {
				url: base_url + '/api',
				error: function() {
					alert("cannot load json");
				}
			}
		});
	});
	</script>
@endsection