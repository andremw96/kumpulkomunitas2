@extends('layout.layout')

@section('title', 'Calendar')
@section('content')

	{!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
	<!--	<div id='external-events'>
			<h4>Draggable Events</h4>
			<div class='fc-event'>New Event</div>
			<p>
				<img src="assets/img/trashcan.png" id="trash" alt="">
			</p>
		</div>

		<div id='calendar'></div>

		<div style='clear:both'></div>

		 <xspan class="tt">x</xspan> -->


@endsection
