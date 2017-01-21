@extends('admin.layout')

@section('title', 'Admin Dashboard | Balas Pesan')

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/adminmessage/inbox') }}">List Pesan Masuk</a></li>
    <li class="active">Balas Pesan</li>
  </ol> 
</section>

<section class="content">
  <div class="row">
    <div class="col-md-3">
          <a href="{{ url('admin/adminmessage/create') }}" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ url('admin/adminmessage/inbox') }}"><i class="fa fa-inbox"></i> Inbox </a></li>
                <li><a href="{{ url('admin/adminmessage/ListSentMessage') }}"><i class="fa fa-envelope-o"></i> Sent</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Pesan</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <div class="box-body">  
                <hr>
                <form method="POST" action="{{ route('adminmessage.store') }}">   
                {{csrf_field()}}
                <input type="hidden" name="userid_pengirim" value="{{ Auth::user()->id }}">                   
                    <label>Penerima</label>
                    <select name="userid_penerima" class="form-control">
                          <option value="{{ $User->id }}">{{$User->username}}</option>
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
          </div>
    </div>
  </div>

@endsection
