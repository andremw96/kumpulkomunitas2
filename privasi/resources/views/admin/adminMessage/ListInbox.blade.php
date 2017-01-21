@extends('admin.layout')

@section('title', 'Admin Dashboard | Daftar Pesan Masuk')

@section('content')	
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="active">List Pesan Masuk</li>
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
              <h3 class="box-title">Inbox</h3>

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
            	<div class="table-responsive mailbox-messages">
	                <table class="table table-hover table-striped">
	                  <tbody>
	                  	@foreach($message as $Listmessage)
		                  <tr>
		                    <td class="mailbox-name">{{ $Listmessage->username }}</td>
		                    <td class="mailbox-subject"><a href="{{ url('admin/adminmessage/inbox/' . $Listmessage->id) }}">{{ $Listmessage->title }}</a></td>
		                    <td class="mailbox-date">{{ $Listmessage->created_at }}</td>
		                  </tr>
		                @endforeach()
	                  </tbody>
	                </table>
	            </div>
           </div>
          </div>
         </div>
	</div>
</section>	
@endsection