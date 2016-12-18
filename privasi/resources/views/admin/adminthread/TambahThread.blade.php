@extends('admin.layout')

@section('title', 'Admin Dashboard | Buat Thread')


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
    <li class="active">Buatkan Thread</li>
  </ol> 
</section>

 <section class="content">        
    <form method="POST" action="{{ url('/admin/adminthread/') }}">   
    {{csrf_field()}}                   
        <label>Kategori</label>
          <select name="category" class="form-control">
          	@foreach ($category as $daftarKat)
              <option value=" {{ $daftarKat->id }} "> {{ $daftarKat->category }} </option>
            @endforeach()
          </select>
        <label>Judul Thread</label>
          <input type="text" class="form-control" name="title" required>
        <label>Konten</label>
          <textarea name="content" class="form-control" rows="10" required></textarea>
        <br>
        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
        <input type="hidden" name="username_id" value="{{ Auth::user()->username }}">
        <input type="submit" class="btn btn-success pull-right" value="Tambahkan Thread">
    </form><br>
</section>

@endsection()