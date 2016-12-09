@extends('layout.layout')

@section('content')

<section>
	<div class="container">
		<h4>General Discussion</h4>
		<hr>	

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">General Discussion</h3>				
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
					@foreach($GenDisc as $GenDiscus)
						<tr>
							<td><h4>{{ $GenDiscus->title }}</h4></td>
							<td><h4>{{ $GenDiscus->username }}</h4></td>
							<td><h4>{{ $GenDiscus->created_at }}</h4></td>
							<td><h4>{{ $GenDiscus->updated_at }}</h4></td>
						</tr>
					@endforeach()					
				  </tbody>
				</table>
			</div>
		</div>
</section>


@endsection