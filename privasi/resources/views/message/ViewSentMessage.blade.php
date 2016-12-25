@extends('layout.layout')

@section('title', 'Detail Pesan Terkirim')

@section('content')

<div class="container">
	<div clss="col-lg-12">
		<ol class="breadcrumb">
			<li>You are here: <a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ route('message.index') }}">List Pesan Terkirim</a></li>
			<li class="active">{{ $message->title }}</li>
		</ol>
	</div>
</div>

<div class="container">
	<div class="col-lg-12">
		<h2>{{ $message->title }}</h2>
		<h5>Penerima : {{ $CariUsername->username }}</h5>
		<hr>
	</div>
</div>

<div class="container">
	<p class="well">{{ $message->isi }}</p>
</div>
@endsection
