@extends('admin.layout')

@section('title', 'Admin Dashboard | Tambah Kategori')

@section('content')
<section class="content-header">
	  <h1>
	    Dashboard
	    <small>Control panel</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
	    <li><a href="{{ url('/admin/kategori/DaftarKategori') }}">Daftar Kategori</a></li>
	    <li class="active">Tambah Kategori</li>
	  </ol> 
</section>

<section class="content">
	<div class="container col-xs-12">
		<form action="{{ url('/admin/kategori/') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="userid" value="{{ Auth::user()->id }}">		     
		    <div class="form-group">
		        <label for="Username">Username di Forum : </label>
		        <input type="text" class="form-control" id="Username" value="{{ Auth::user()->username }}" required disabled>
		    </div>
		    <div class="form-group @if($errors->has('category')) has-error has-feedback @endif">
				<label for="category">Nama Kategori</label>
				<input type="text" class="form-control" name="category" placeholder="Nama Kategori" value="{{ old('category') }}">
				@if ($errors->has('category'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('category') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('parent')) has-error has-feedback @endif">
				<label for="parent">Sub Kategori dari</label>
				<select class="form-control" name="parent">
					<option value=0> Bukan SubCategory </option>
					@foreach($category as $CariKateg)
						<option value=" {{$CariKateg->id}} "> {{ $CariKateg->category }} </option>
					@endforeach()
				</select>
			</div>
			<div class="form-group @if($errors->has('description')) has-error has-feedback @endif">
				<label for="description">Deskripsi Singkat</label>
				<input type="text" class="form-control" name="description" placeholder="Nama Event" value="{{ old('description') }}">
				@if ($errors->has('description'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
						{{ $errors->first('description') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</section>
@endsection

