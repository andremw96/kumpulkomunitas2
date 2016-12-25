@extends('layout.layout')

@section('title', 'Daftar Pesan Masuk')

@section('content')	
<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li class="active">List Pesan Masuk</li>		
		</ol>
	</div>
</div>

<div class="container">
	<div class="col-lg-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Pengirim</th>
					<th>Judul</th>
					<th>created_at</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;?>
				@foreach($message as $Listmessage)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td>{{ $Listmessage->username }}</td>
					<td><a href="{{ url('message/inbox/' . $Listmessage->id) }}">{{ $Listmessage->title }}</a></td>
					<td>{{ $Listmessage->created_at }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection