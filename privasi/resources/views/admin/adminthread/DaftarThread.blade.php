@extends('admin.layout')

@section('title', 'Admin Dashboard | Lihat Daftar Thread')


@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="active">Daftar Thread</a></li>
  </ol> 
</section>

<section class="content">
  <div>
    <a href="{{ url('/admin/adminthread/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Buat Thread</a>
      <table class="table">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Username</th>
            <th>Kategori</th>
            <th>Created At</th>
            <th>Updated At</th>
          </tr>
        </thead>
          <tbody>
          @foreach ($thread as $dafthread)         
              <tr>
              	<td><a href='{{ route("thread.show", $dafthread->post_id )}}' target="_blank">{{ $dafthread->title }}</a></td>
                <td><a href="{{ url('/admin/account/' . $dafthread->user_id) }}"> {{ $dafthread->username }} </a></td>
                <td>{{ $dafthread->category}}</td>
                <td>{{ $dafthread->created_at}}</td>
                <td>{{ $dafthread->updated_at}}</td>                               
              </tr>
          </tbody>
          @endforeach()   
      </table> 
      {{ $thread->links() }}  
   </div>
</section>

@endsection()