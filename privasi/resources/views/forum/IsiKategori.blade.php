@extends('layout.layout')

@section('content')

<section>
	<div class="container">
		<table class="table">
		@foreach ($allSubCategories as $subCate)
		  <thead>
			<tr>
				<th><a href='{{url("forum/$subCate->id")}}'>{{ $subCate->category }}</a></th>
			</tr>
		  </thead>			
		  <tbody>
		  	<tr>
		  		@foreach ($subCate->subCategory as $firstNestedSub)
		  			<td><a href='{{url("forum/$firstNestedSub->id")}}'>{{ $firstNestedSub->category }}</a></td>
		  		@endforeach()
		  	</tr>
		  </tbody>
		@endforeach()
		</table>	

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