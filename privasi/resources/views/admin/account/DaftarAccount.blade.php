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
    <li class="active">Daftar Account</li>
  </ol> 
</section>

<section class="content">
  <div>
  <a href="{{ url('/admin/account/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Add new Account</a>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th>HakAkses</th>        
          </tr>
        </thead>
          <tbody>
          @foreach ($account as $daftaraccount)
              <tr>
                <td><a href="{{ url('/admin/account/' . $daftaraccount->id) }}">{{ $daftaraccount->id }}</a></td>
                <td><a href="{{ url('/admin/account/' . $daftaraccount->id) }}"> {{ $daftaraccount->name }}</a></td>
                <td> {{ $daftaraccount->username }} </td>
                <td> {{ $daftaraccount->HakAkses }} </td>
                <td>
                    <a class="btn btn-primary btn-xs" href="{{ url('/admin/account/' . $daftaraccount->id . '/edit')}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <form action="{{ url('/admin/account/' . $daftaraccount->id) }}" style="display:inline" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}

                        <button onclick="return confirm('Anda yakin akan menghapus Account ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    </form>
                </td>
              </tr>
          </tbody>
          @endforeach()   
      </table>
        {{ $account->links() }}
   </div>
</section>

@endsection()