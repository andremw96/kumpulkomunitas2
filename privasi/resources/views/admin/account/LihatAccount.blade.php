@extends('admin.layout')

@section('title', 'Admin Dashboard | Lihat Daftar Account')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li><a href="{{ url('/admin/account/DaftarAccount') }}">Daftar Account</a></li>
    <li class="active">Lihat Account</li>
  </ol> 
</section>

<section class="content">
	<div class="col-lg-12">
		<h2>ID = {{ $IsiAccount->id }}</h2>
		<h2>Nama = {{ $IsiAccount->name }}</h2>
		<h2>Email = {{ $IsiAccount->email }}</h2>
		<h2>Username = {{ $IsiAccount->username }} </h2>
		<h2>Gender = {{ $IsiAccount->gender }}</h2>
		<h2>Tanggal Lahir = {{ $IsiAccount->TglLahir }}</h2>
		<h2>HakAkses = {{ $IsiAccount->HakAkses }}</h2>
		<hr>
	</div>
	 <a class="btn btn-primary btn-xs" href="{{ url('/admin/account/' . $IsiAccount->id . '/edit')}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
	<form action="{{ url('/admin/account/' . $IsiAccount->id) }}" style="display:inline" method="POST">
	    <input type="hidden" name="_method" value="DELETE" />
	    {{ csrf_field() }}

	    <button onclick="return confirm('Anda yakin akan menghapus Account ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
	</form>
</section>
@endsection()