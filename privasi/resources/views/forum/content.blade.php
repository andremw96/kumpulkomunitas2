@extends('layout.layout')

@section('content')

<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			 @foreach($CariKategori as $CariK)
			 	<label>Topic Category : <a href='{{url("forum/$CariK->id")}}'> {{ $CariK->category }} </a></label>
			 @endforeach()

			 @foreach($IsiThread as $JudulThread)
	         	<h3 class="panel-title">Judul Thread : {{ $JudulThread->title }} </h3>
	         @endforeach()
	    </div> 
	    
	    <div class="panel-body">
	    	@foreach($IsiThread as $Isi)   
	       		<label>Posted By: {{ $Isi -> username}} </label>    	
	       		<label>Date time posted : {{ $Isi -> created_at}} </label>		       		
		        <p class='well'>{{ $Isi -> content}}</p>		        
		        @if (Auth::id() === $Isi->user_id)	
		        	<a href="{{ route('thread.edit', $Isi->post_id)}}" type="submit" button type="button" class="btn btn-info btn-xs pull-right">Edit Thread</a>
		        @endif		        
	        @endforeach()
	       <br>
	       <hr>
	       <div id="comments">
	       	  @foreach($IsiComment as $key=>$IsiC)
	       		<label>Comment # {{++$key}} by : </label> {{ $IsiC -> username }} <br>
                <h6 class="pull-right"> {{ $IsiC -> created_at }} </h6>
                <p class='well'> {{ $IsiC -> comment }} </p>
                
	            @if (Auth::id() === $IsiC->user_id)	
		        	<a href="{{ route('comment.edit', $IsiC->comment_id)}}" type="submit" button type="button" class="btn btn-info btn-xs pull-right">Edit Comment</a>
		        @endif	 
              @endforeach()
	       </div>
	    </div>

	     @if (Auth::guest())
	     	<div class="col-sm-5 col-md-5 sidebar">
				 <h3>Komentar?? <a href="{{ url('/login')}}">Login Dulu..!!</a></h3>
			      <form> 
				        <textarea type="text" class="form-control" name="commenttxt" rows="5"></textarea><br>
				        <input type="submit" id="save" class="btn btn-success pull-right" value="Tambahkan Komentar">
			      </form>
		    </div>
	     @else
		    <div class="col-sm-5 col-md-5 sidebar">
				 <h3>Komentar</h3>
			      <form method="POST" action="{{ route('comment.store')}}">
			      	{{csrf_field()}}  
				        <textarea type="text" class="form-control" name="commenttxt" rows="5" required></textarea><br>
				        @foreach($IsiThread as $Cari)
				        	<input type="hidden" name="postid" value="{{ $Cari -> post_id }}">
				        @endforeach()
		            	<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
		            	<input type="hidden" name="username_id" value="{{ Auth::user()->username }}">
				        <input type="submit" id="save" class="btn btn-success pull-right" value="Tambahkan Komentar">
			      </form>
		    </div>
		@endif
	</div>
</div>
@endsection