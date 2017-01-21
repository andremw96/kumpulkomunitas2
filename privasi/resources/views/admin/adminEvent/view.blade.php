@extends('admin.layout')

@section('title', 'Admin Dashboard | Detail Event')

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
	<li><a href="{{ url('/admin/adminevent') }}">Events List</a></li>
	<li class="active">{{ $event->title }}</li>
  </ol>
</section>

<section class="content">
	<div class="col-lg-12">
		<h2>{{ $event->title }} - {{ $event->komunitas }} <small>made by {{ $CariUsername->username }}</small></h2>
		<hr>
	</div>

	<div class="col-lg-6">
		
		<p>Time: <br>
		{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
		</p>
		
		<p>Duration: <br>
		{{ $duration }}
		</p>
		
		<p>							
				<form action="{{ url('admin/adminevent/' . $event->id) }}" style="display:inline;" method="POST">
					<input type="hidden" name="_method" value="DELETE" />
					{{ csrf_field() }}
					<button onclick="return confirm('Anda yakin akan menghapus Agenda ini ?');" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</form>
				<a class="btn btn-primary" href="{{ url('admin/adminevent/' . $event->id . '/edit')}}">
					<span class="glyphicon glyphicon-edit"></span> Edit</a> 
			
		</p>
		
	</div>
<section>

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