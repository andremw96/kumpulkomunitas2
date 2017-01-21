@extends('layout.layout')

@section('title', 'Buat Pesan')
@section('content')

<div class="container">           
    <hr>
    <form method="POST" action="{{ route('message.store') }}">   
    {{csrf_field()}}
    <input type="hidden" name="userid_pengirim" value="{{ Auth::user()->id }}">                   
        <label>Penerima</label>
        <select name="userid_penerima" class="form-control">
          @foreach($User as $DaftarUser)
              <option value="{{ $DaftarUser->id }}">{{$DaftarUser->username}}</option>
          @endforeach()
        </select>
        <label>Judul</label>
          <input type="text" class="form-control" name="title" required>
        <label>Isi</label>
          <textarea name="isi" class="form-control" rows="10" required></textarea>
        <br>
        <input type="submit" class="btn btn-success pull-right" value="Kirim Pesan">
    </form><br>
    <hr>
    <a href="" class="pull-right">Keluar</a>
</div>

@endsection