@extends('admin.layout')

@section('title', 'Admin Dashboard | List Event')

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
	<li class="active">Events List</li>	
  </ol>
</section>

<section class="content">
<a href="{{ url('/admin/adminevent/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Add new event</a>
	<div class="row">
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
						<td><a href="{{ url('admin/adminevent/' . $event->id) }}">{{ $event->title }}</a></td>
						<td>{{ $event->komunitas }}</td>
						<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
						<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
						<td>		
								<a class="btn btn-primary btn-xs" href="{{ url('admin/adminevent/' . $event->id . '/edit')}}">
								<span class="glyphicon glyphicon-edit"></span> Edit</a>
								<form action="{{ url('admin/adminevent/' . $event->id) }}" style="display:inline" method="POST">
									<input type="hidden" name="_method" value="DELETE" />
									{{ csrf_field() }}

									<button onclick="return confirm('Anda yakin akan menghapus Agenda ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
								</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

@endsection