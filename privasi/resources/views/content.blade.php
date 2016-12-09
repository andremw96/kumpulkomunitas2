@extends('layout.layout')

@section('content')

<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			 <label>Topic Category: </label>
	         <h3 class="panel-title">Ini Nanti Judul</h3>
	    </div> 

	    <div class="panel-body">
	       <label>Date time posted: </label>
	       <p class='well'></p>
	       <label>Posted By: </label>

	       <hr>
	       <div id="comments">
	       		ini untuk komentarrr
	       </div>
	    </div>

	    <div class="col-sm-5 col-md-5 sidebar">
			 <h3>Komentar</h3>
		      <form method="POST">
		        <textarea type="text" class="form-control" id="commenttxt" rows="5"></textarea><br>

		        <input type="submit" id="save" class="btn btn-success pull-right" value="Comment">
		      </form>
	    </div>
	</div>
</div>
@endsection