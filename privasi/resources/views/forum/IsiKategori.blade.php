@extends('layout.layout')

@foreach($namaKategori as $Kategori)	
	@section('title', $Kategori->category)
@endforeach
@section('content')

<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			@foreach($namaKategori as $Kategori)
	         	<li class="active">{{ $Kategori->category }}</li>	
	        @endforeach()
		</ol>
	</div>
</div>	

<section>
	<div class="container">
{!! $GenDisc->render() !!}
		<div class="panel panel-success">
			<div class="panel-heading">
			  @foreach($namaKategori as $Kategori)	
				<h3 class="panel-title">{{ $Kategori->category }}</h3>		

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
							<td><h4><a href='{{ route("thread.show", $GenDiscus->post_id )}}'>{{ $GenDiscus->title }}</a></h4></td>
							<td><h4>{{ $GenDiscus->username }}</h4></td>
							<td><h4>{{ $GenDiscus->created_at }}</h4></td>
							<td><h4>{{ $GenDiscus->updated_at }}</h4></td>
						</tr>
					@endforeach()	
			  @endforeach			  				
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</section>


@endsection