@extends('layout.layout')

@section('content')
    <div class="container">
       <h2>Form untuk Daftar Komunitas</h2>

       <form>
          <div class="form-group">
            <label for="Nama">Nama : </label>
            <input type="text" class="form-control" id="Nama" required>
          </div>
          <div class="form-group">
            <label for="Username">Username di Forum : </label>
            <input type="text" class="form-control" id="Username" required>
          </div>
          <div class="form-group">
            <label for="Kategori">Nama Komunitas yang diinginkan : </label>
            <input type="text" class="form-control" id="Kategori" required>
          </div>
          <div class="form-group">
            <label for="comment">Deskripsi tentang Komunitas : </label>
            <textarea class="form-control" rows="10" id="comment" required></textarea>
          </div>

          <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
       </form>

    </div> <!-- /container -->

@endsection
