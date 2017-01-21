@extends('layout.layout')

@foreach($IsiThread as $JudulThread)
	@section('title', $JudulThread->title)
@endforeach()

@section('content')
<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			@foreach($CariKategori as $CariK)
				<li><a href='{{url("forum/$CariK->id")}}'>{{ $CariK->category }}</a></li>
			@endforeach()

			@foreach($IsiThread as $JudulThread)
	         	<li class="active">{{ $JudulThread->title }}</li>	
	        @endforeach()
		</ol>
	</div>
</div>	

<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			 @foreach($CariKategori as $CariK)
			 	<label>Topic Category : <a href='{{url("forum/$CariK->id")}}'> {{ $CariK->category }} </a></label>
			 @endforeach()

			 @foreach($IsiThread as $JudulThread)	         
	         	@if (Auth::guest())		

				@elseif (Auth::id() === $JudulThread->user_id)				
				   <a href="{{ url('forum/BuatAgenda/'. $JudulThread->post_id) }}" type="submit" button type="button" class="btn btn-primary btn-xs pull-right">Buat Agenda Pertemuan</a>
				@endif
				<h3 class="panel-title">Judul Thread : {{ $JudulThread->title }} </h3>
	         @endforeach()
	    </div> 
	    
	    <div class="panel-body">
	    	@foreach($IsiThread as $Isi)   
	       		<label>Posted By: {{ $Isi -> username}} </label>    	
	       		<label>Date time posted : {{ $Isi -> updated_at}} </label>		       		
		        <p class='well'>{{{ $Isi -> content }}}</p>	        
		        @if (Auth::guest())

		        @elseif ((Auth::id() === $Isi->user_id)	or (Auth::user()->HakAkses === 'Admin'))
		        	<a href="{{ route('thread.edit', $Isi->post_id)}}" type="submit" button type="button" class="btn btn-info btn-xs pull-right">Edit Thread</a>
		        @else

		        @endif		

		        @if (Auth::guest())

		        @elseif (Auth::user()->HakAkses === 'Admin')
		        	<form method="POST" action="{{ route('thread.destroy', $Isi->post_id)}}" accept-charset="UTF-8">	
		        	{{csrf_field()}}
		        		<input name="_method" type="hidden" value="DELETE">		        		
		        		<input onclick="return confirm('Anda yakin akan menghapus thread ?');" type="submit" button type="button" class="btn btn-danger btn-xs pull-right" value="Delete Thread" />
		        	</form>
		        @else

		        @endif        
	        @endforeach()
	        	<label>Agenda Pertemuan </label>
	        	<div class="list-group">
	        		@foreach($CariEvent as $ListEvent)
				  		<a href="{{ url('events/' . $ListEvent->id) }}" class="list-group-item" target="_blank">{{$ListEvent->title}} Waktu : {{ date("g:ia\, jS M Y", strtotime($ListEvent->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($ListEvent->end_time)) }}</a>
				  	@endforeach()
				</div>	
	       <br>
	       <hr>
	       <div id="comments">
	       	  @foreach($IsiComment as $key=>$IsiC)
	       		<label>Comment # {{++$key}} by : </label> {{ $IsiC -> username }} <br>
                <h6 class="pull-right"> {{ $IsiC -> updated_at }} </h6>
                <p class='well'> {{ $IsiC -> comment }} </p>
                
	            @if (Auth::guest())

		        @elseif ((Auth::id() === $IsiC->user_id) or (Auth::user()->HakAkses === 'Admin'))	
		        	<a href="{{ route('comment.edit', $IsiC->comment_id)}}" type="submit" button type="button" class="btn btn-info btn-xs pull-right">Edit Comment</a>
		        @endif	 

		        @if (Auth::guest())

		        @elseif (Auth::user()->HakAkses === 'Admin')
		        	<form method="POST" action="{{ route('comment.destroy', $IsiC->comment_id)}}" accept-charset="UTF-8">	
		        	{{csrf_field()}}	
		        		<input name="_method" type="hidden" value="DELETE">		        		
		        		<input onclick="return confirm('Anda yakin akan menghapus Comment ?');" type="submit" button type="button" class="btn btn-danger btn-xs pull-right" value="Delete Comment" />
		        	</form>
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