@extends('admin.layout')

@section('title', 'Admin Dashboard | Calendar')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
    <li class="active">Calendar</li>
  </ol>
</section>

<section class="content">
	<a href="{{ url('/admin/adminevent/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Add new event</a>
	<a href="{{ url('/admin/adminevent') }}" type="submit" button type="button" class="btn btn-primary pull-left">Events List</a>
<hr>
<div class="row">
	<div class="col-lg-12">
        <div class="box box-primary">
           <div class="box-body">
              <div id="calendar"></div>
           </div>
        </div>
    </div>
</div>
</section>
@endsection()

@section('js')
	<script src="{{asset('adminLTE/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
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
@endsection()


