@extends('layout.layout')

@section('content')

<section>
	<div class="container">
		<h4>General Discussion - The Lounge</h4>
		<hr>	

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">The Lounge</h3>				
			</div>

			<div class="panel-body">
				<table class="table table-stripped">
				  <thead>
					<tr>
						<th>Topic title</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>Last Post</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach($GenDisc as $TheL)
						<tr>
							<td><h4><a href="{{url('content')}}">{{ $TheL->title }}</a></h4></td>
							<td><h4>{{ $TheL->username }}</h4></td>
							<td><h4>{{ $TheL->created_at }}</h4></td>
							<td><h4>{{ $TheL->updated_at }}</h4></td>
						</tr>
					@endforeach()					
				  </tbody>
				</table>
			</div>
		</div>
</section>


@endsection