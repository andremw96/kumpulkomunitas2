@extends('admin.layout')

@section('title', 'Admin Dashboard | Lihat Daftar Kategori')


@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="active">Daftar Kategori</li>
  </ol> 
</section>

<section class="content">
  <div>
  <a href="{{ url('/admin/kategori/create') }}" type="submit" button type="button" class="btn btn-primary pull-right">Add new Category</a>
      <table class="table">
        <thead>
          <tr>
            <th>Kategori</th>
            <th>Topics</th>
            <th>Posts</th>
            <th>Last Post</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <tbody>
          @foreach ($category as $firstNestedSub)
              <tr>
                <td><h5><a href='{{url("forum/$firstNestedSub->id")}}' target="_blank">{{ $firstNestedSub->category }} </a></h5></td>
                <td> {{ $firstNestedSub->JmlhPost }} </td>
                <td> {{ $firstNestedSub->JmlhComment }} </td>
                <td> {{ $firstNestedSub->LastPost }} </td>
                <td>
                    <a class="btn btn-primary btn-xs" href="{{ url('/admin/kategori/' . $firstNestedSub->id . '/edit')}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <form action="{{ url('/admin/kategori/' . $firstNestedSub->id) }}" style="display:inline" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}

                        <button onclick="return confirm('Anda yakin akan menghapus Kategori ini ?');" class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                    </form>
                </td>
              </tr>
          </tbody>
          @endforeach()   
      </table>
    {{ $category->links() }}    
   </div>
</section>

@endsection()