@extends('layout.layout')

@section('title', 'Lihat User')

@section('content')

<div class="container">
	<div class="panel panel-primary class">
		<div class="panel-heading"><strong>Detail User</strong></div>
		<div class="panel-body">
    		<div class="col-lg-12">
				<h2>Nama = {{ $IsiAccount->name }}</h2>
				<h2>Email = {{ $IsiAccount->email }}</h2>
				<h2>Username = {{ $IsiAccount->username }} </h2>
				<h2>Gender = {{ $IsiAccount->gender }}</h2>
				<h2>Tanggal Lahir = {{ $IsiAccount->TglLahir }}</h2>
				<hr>
			</div>
 		 </div>
	</div>
</div>
	
@endsection()