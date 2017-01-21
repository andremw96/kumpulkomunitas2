@extends('layout.layout')

@section('title', 'Search')
@section('content')

<div class="container">
	  <form method="POST" action="{{ url('/search') }}" role="search"> 
	    {{ csrf_field() }}
	        <div class="input-group">               
	          <input type="text" class="form-control" aria-label="..." placeholder="Cari.." name="query">
	          <span class="input-group-btn">
	                <button class="btn btn-default" type="submit"><img src="img/cari.png"></button>
	          </span>
	        </div>
	 </form>
</div>
<hr>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"><strong>Thread</strong></div>
		 <div class="panel-body">
    		<p><small>Thread yang ditemukan</small></p>
 		 </div>
 		 
 		 <div class="table-responsive">
	 		 <table class="table table-striped">
	 		 	<thead>
					<tr>
						<th>Topic title</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>Last Post</th>
					</tr>
				</thead>
				<tbody>
		 		 	@foreach($posts as $GenDiscus)					
						<tr>
							<td><h4><a href='{{ route("thread.show", $GenDiscus->post_id )}}'>{{ $GenDiscus->title }}</a></h4></td>
							<td><h4>{{ $GenDiscus->username }}</h4></td>
							<td><h4>{{ $GenDiscus->created_at }}</h4></td>
							<td><h4>{{ $GenDiscus->updated_at }}</h4></td>
						</tr>
					@endforeach()	
				</tbody>
	 		 </table>
	 	 </div>
	</div>
</div>

<div class="container">
	<div class="panel panel-danger">
		<div class="panel-heading""><strong>Username</strong></div>
		 <div class="panel-body">
    		<p><small>Username yang ditemukan</small></p>
 		 </div>
 		 
 		 <div class="table-responsive">
	 		 <table class="table table-striped">
	 		 	<thead>
					<tr>
			            <th>Nama</th>
			            <th>Username</th>	
			            <th>Join Date</th>		              
					</tr>
				</thead>
				<tbody>
				  @foreach ($users as $daftaraccount)
		              <tr>
		                <td><a href='{{ url("user/Lihatuser/$daftaraccount->id") }}'> {{ $daftaraccount->name }}</a></td>
		                <td> {{ $daftaraccount->username }} </td>		
		                <td> {{ $daftaraccount->created_at }} </td>                
		              </tr>
		          @endforeach()   
				</tbody>
	 		 	
	 		 </table>
	 	 </div>
	</div>
</div>

@endsection

