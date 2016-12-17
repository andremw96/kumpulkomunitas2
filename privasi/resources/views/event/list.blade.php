@extends('layout.layout')

@section('title', 'Daftar Event')

@section('content')
<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/calendar') }}">Calendar</a></li>
			<li class="active">Events List</li>		
		</ol>
	</div>

	@if (Auth::guest())		
	
	@elseif (Auth::user()->HakAkses === 'Admin')
		<a href="{{ url('events/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Add new event</a>
	@endif
</div>		

<div class="container">
	<div class="col-lg-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Event's Title</th>
					<th>Komunitas</th>
					<th>Start</th>
					<th>End</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;?>
				@foreach($events as $event)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td><a href="{{ url('events/' . $event->id) }}">{{ $event->title }}</a></td>
					<td>{{ $event->komunitas }}</td>
					<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
					<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
					<td>
						@if (Auth::guest()) 	
	
						@elseif ((Auth::id() == $event->user_id) or (Auth::user()->HakAkses === 'Admin'))		
							<a class="btn btn-primary btn-xs" href="{{ url('events/' . $event->id . '/edit')}}">
							<span class="glyphicon glyphicon-edit"></span> Edit</a>
							<form action="{{ url('events/' . $event->id) }}" style="display:inline" method="POST">
								<input type="hidden" name="_method" value="DELETE" />
								{{ csrf_field() }}

								<button onclick="return confirm('Anda yakin akan menghapus Agenda ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
							</form>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection