@extends('admin.layout')

@section('title', 'Admin Dashboard | Edit Kategori')

@section('content')
<section class="content-header">
	  <h1>
	    Dashboard
	    <small>Control panel</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Dashboard</li>
	    <li><a href="{{ url('/admin/kategori/DaftarKategori') }}">Daftar Kategori</a></li>
	    <li class="active">Edit Kategori</li>
	  </ol> 
</section>

<section>
		@if($errors)
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		@endif
	<div class="container col-xs-12">
		<form action="{{ url('/admin/kategori/' . $IsiCategory->id) }}" method="POST">
			{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT" />
			<input type="hidden" name="updated_by" value=" {{ Auth::user()->id }} ">      
		    <div class="form-group">
		        <label for="Username">Username di Forum : </label>
		        <input type="text" class="form-control" id="Username" value="{{ $CariUsername->username }}" required disabled>
		    </div>
		    <div class="form-group @if($errors->has('category')) has-error has-feedback @endif">
				<label for="category">Nama Kategori</label>
				<input type="text" class="form-control" name="category" placeholder="Nama Kategori" value="{{ $IsiCategory -> category }}">
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
						<option value=" {{ $CariKateg->id }} "> {{ $CariKateg->category }} </option>
					@endforeach()
				</select>
			</div>
			<div class="form-group @if($errors->has('description')) has-error has-feedback @endif">
				<label for="description">Deskripsi Singkat</label>
				<input type="text" class="form-control" name="description" placeholder="Nama Event" value="{{ $IsiCategory->description }}">
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

