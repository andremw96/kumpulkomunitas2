@extends('admin.layout')

@section('title', 'Admin Dashboard | Lihat Request')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li><a href="{{ url('/admin/request/DaftarRequest') }}">Daftar Request</a></li>
    <li class="active">Lihat Request</li>
  </ol> 
</section>

<section class="content">
	<div class="col-lg-12">
		<h2>ID = {{ $IsiRequest->id }}</h2>
		<h2>Username = {{ $CariUsername->username }}</h2>
		<h2>Nama Komunitas = {{ $IsiRequest->namaKomunitas }}</h2>
		<h2>Deskripsi = {{ $IsiRequest->deskipsi }} </h2>
		<hr>
	</div>
	@if ( $IsiRequest->disetujui === 0 ) 
		 <a class="btn btn-primary btn-xs" href="{{ url('/admin/request/create/' .$IsiRequest->id)}}"><span class="glyphicon glyphicon-edit"></span> Buatkan Thread</a>
		 <form action="{{ url('/admin/request/' . $IsiRequest->id) }}" style="display:inline" method="POST">
		    <input type="hidden" name="_method" value="DELETE" />
		    {{ csrf_field() }}

		    <button onclick="return confirm('Anda yakin akan menghapus Account ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Tolak</button>
		 </form>
	@elseif ( $IsiRequest->disetujui === 1 ) 
		 <h4>Request ini sudah dibuatkan thread, <a href='{{ route("thread.show", $IsiRequest->post_id )}}' target="_blank">bisa lihat disini</a></h4>
	@else
		 <h4>Request ini telah ditolak, <a class="btn btn-primary btn-xs" href="{{ url('/admin/request/create/' .$IsiRequest->id)}}"><span class="glyphicon glyphicon-edit"></span> Buatkan Thread</a></h4>
	@endif
</section>
@endsection()