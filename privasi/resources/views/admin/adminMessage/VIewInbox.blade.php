@extends('admin.layout')

@section('title', 'Admin Dashboard | Detail Pesan Masuk')

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
    <li class="active">{{ $message->title }}</li>
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
                <li class="active"><a href="{{ url('admin/adminmessage/inbox') }}"><i class="fa fa-inbox"></i> Inbox </a></li>
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
              <h3 class="box-title">Detail Pesan Masuk</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	<div class="container">
	            	<h2>{{ $message->title }}</h2>
					<h5>Pengirim : {{ $CariUsername->username }}</h5>
					<hr>
				</div>

				<div class="container">
					<p>{{ $message->isi }}</p>
				</div>	
				<a class="btn btn-primary pull-right" href="{{ url('/admin/adminmessage/balaspesan/' . $message->user_id_pengirim)}}"><span class="glyphicon glyphicon-edit"></span> Balas</a> 
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
