@extends('layout.layout')

@section('title', 'Detail Pesan Masuk')

@section('content')

<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/message/inbox') }}">List Pesan Masuk</a></li>
			<li class="active">{{ $message->title }}</li>
		</ol>
	</div>
</div>

<div class="container">
	<div class="col-lg-12">
		<h2>{{ $message->title }}</h2>
		<h5>Pengirim : {{ $CariUsername->username }}</h5>
		<hr>
	</div>
</div>

<div class="container">
	<p class="well">{{ $message->isi }}</p>
	<a class="btn btn-primary pull-right" href="{{ url('/message/balaspesan/' . $message->user_id_pengirim)}}"><span class="glyphicon glyphicon-edit"></span> Balas</a> 
</div>


@endsection
