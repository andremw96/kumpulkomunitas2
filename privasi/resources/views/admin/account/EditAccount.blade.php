@extends('admin.layout')

@section('title', 'Admin Dashboard | Edit Account')

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
    <li class="active">Edit Account</li>
  </ol> 
</section>

<section class="content">
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/account/' . $IsiAccount->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <div class="input-group">  
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $IsiAccount->name }}" placeholder="Masukkan Nama" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $IsiAccount->email }}" placeholder="Masukkan Email"  required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6"> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ $IsiAccount->username }}" placeholder="Masukkan Username" disabled>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-venus-mars" aria-hidden="true"></i></span>
                                    <select name="gender" class="form-control" value="{{$IsiAccount->gender}}">      
                                        <option>Jenis Kelamin</option>                  
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>    

                        <div class="form-group{{ $errors->has('TglLahir') ? ' has-error' : '' }}">
                            <label for="TglLahir" class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
                                    <input type="date" class="form-control" name="TglLahir" id="TglLahir" placeholder="Masukkan Tanggal Lahir" 
                                    value="{{$IsiAccount->TglLahir}}" required>
                                </div>
                            </div>
                        </div>                                             

                        <div class="form-group{{ $errors->has('HakAkses') ? ' has-error' : '' }}">
                            <label for="HakAkses" class="col-md-4 control-label">Hak Akses</label>
                            <div class="col-md-6">
                                <div class="input-group">                                    
                                    <select name="HakAkses" class="form-control" value="{{$IsiAccount->HakAkses}}">                                                         
                                        <option value="User">User</option>
                                        <option value="Admin">Admin</option>                                        
                                    </select>
                                </div>
                            </div>
                        </div>   

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div> 

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection()