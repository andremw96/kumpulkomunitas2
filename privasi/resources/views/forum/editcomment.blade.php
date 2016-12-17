@extends('layout.layout')

@section('title', 'Edit Comment')
@section('content')
<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			@foreach($CariKategori as $CariK)
				<li><a href='{{url("forum/$CariK->id")}}'>{{ $CariK->category }}</a></li>
			@endforeach()

			@foreach($IsiThread as $JudulThread)
	         	<li><a href='{{ route("thread.show", $JudulThread->post_id )}}'>{{ $JudulThread->title }}</a></li>	
	        @endforeach()
	        <li class="active">Edit Comment</li>
		</ol>
	</div>
</div>	

<section>
	<div class="container">
		<h3>Edit Comment</h3>	
		<div class="panel panel-success">
			<div class="panel-heading">
				 @foreach($CariKategori as $CariK)
				 	<label>Topic Category : <a href='{{url("forum/$CariK->id")}}'> {{ $CariK->category }} </a></label>
				 @endforeach()
				 
				 @foreach($IsiThread as $IsiThread)
		         	<h3 class="panel-title">Judul Thread : <a href='{{ route("thread.show", $IsiThread->post_id )}}'>{{ $IsiThread->title }}</a> </h3>		
		         @endforeach()         
		    </div> 

		    <div class="panel-body">   
		    	<form method="POST" action="{{ route('comment.update', $IsiComment->comment_id)}}">		
		    		{!! csrf_field() !!}
     				<input type="hidden" name="_method" value="PUT">   
     				<input type="hidden" name="updated_by" value=" {{ Auth::user()->id }} "> 		
					<textarea class="form-control" name="comment" rows="10" required> {{ $IsiComment -> comment }} </textarea><br>
					<input type="submit" id="save" class="btn btn-success pull-right" value="Edit Comment">					
		    	</form>		        
		       <hr>
		    </div>
		</div>
	</div>
</section>
@endsection