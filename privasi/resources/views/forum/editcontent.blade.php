@extends('layout.layout')

@section('content')

<section>
	<div class="container">
		<h3>Edit Thread</h3>		
		<div class="panel panel-success">
			<div class="panel-heading">
				 @foreach($CariKategori as $CariK)
				 	<label>Topic Category : <a href='{{url("forum/$CariK->id")}}'> {{ $CariK->category }} </a></label>
				 @endforeach()
				 
		         <h3 class="panel-title">Judul Thread : {{ $IsiThread->title }} </h3>		         
		    </div> 

		    <div class="panel-body">   
		    	<form method="POST" action="{{ route('thread.update', $IsiThread->post_id)}}">	
		    		{!! csrf_field() !!}
     				<input type="hidden" name="_method" value="PUT">	    		
					<textarea class="form-control" name="content" rows="10" required> {{ $IsiThread -> content }} </textarea><br>
					<input type="submit" id="save" class="btn btn-success pull-right" value="Edit Thread">					
		    	</form>		        
		       <hr>
		    </div>
		</div>
	</div>
</section>
@endsection