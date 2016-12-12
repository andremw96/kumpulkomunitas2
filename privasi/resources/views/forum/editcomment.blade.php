@extends('layout.layout')

@section('content')

<section>
	<div class="container">
		<h3>Edit Comment</h3>	
		<div class="panel panel-success">
			<div class="panel-heading">
				 @foreach($CariKategori as $CariK)
				 	<label>Topic Category : <a href='{{url("forum/$CariK->id")}}'> {{ $CariK->category }} </a></label>
				 @endforeach()
				 
				 @foreach($IsiThread as $IsiThread)
		         	<h3 class="panel-title">Judul Thread : {{ $IsiThread->title }} </h3>		
		         @endforeach()         
		    </div> 

		    <div class="panel-body">   
		    	<form method="POST" action="{{ route('comment.update', $IsiComment->comment_id)}}">		
		    		{!! csrf_field() !!}
     				<input type="hidden" name="_method" value="PUT">    		
					<textarea class="form-control" name="comment" rows="10" required> {{ $IsiComment -> comment }} </textarea><br>
					<input type="submit" id="save" class="btn btn-success pull-right" value="Edit Comment">					
		    	</form>		        
		       <hr>
		    </div>
		</div>
	</div>
</section>
@endsection