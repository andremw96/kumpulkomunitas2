@extends('layout.layout')

@section('title', 'Edit Thread')
@section('content')

<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			@foreach($CariKategori as $CariK)
				<li><a href='{{url("forum/$CariK->id")}}'>{{ $CariK->category }}</a></li>
			@endforeach()

	         	<li><a href='{{ route("thread.show", $IsiThread->post_id )}}'>{{ $IsiThread->title }} </a></li>	
	        <li class="active">Edit Thread</li>
		</ol>
	</div>
</div>

<section>
	<div class="container">
		<h3>Edit Thread</h3>		
		<div class="panel panel-success">
			<div class="panel-heading">
				 @foreach($CariKategori as $CariK)
				 	<label>Topic Category : <a href='{{url("forum/$CariK->id")}}'> {{ $CariK->category }} </a></label>
				 @endforeach()
				 
		         <h3 class="panel-title">Judul Thread : <a href='{{ route("thread.show", $IsiThread->post_id )}}'>{{ $IsiThread->title }} </a></h3>		         
		    </div> 

		    <div class="panel-body">   
		    	<form method="POST" action="{{ route('thread.update', $IsiThread->post_id)}}">	
		    		{!! csrf_field() !!}
     				<input type="hidden" name="_method" value="PUT">	
     				<input type="hidden" name="updated_by" value=" {{ Auth::user()->id }} ">
					<textarea class="form-control" name="content" rows="10" required> {{ $IsiThread -> content }} </textarea><br>
					<input type="submit" id="save" class="btn btn-success pull-right" value="Edit Thread">					
		    	</form>		        
		       <hr>
		    </div>
		</div>
	</div>
</section>
@endsection