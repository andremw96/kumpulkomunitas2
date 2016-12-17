@extends('admin.layout')

@section('title', 'Admin Dashboard | Lihat Daftar Kategori')


@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
    <li class="active">Daftar Kategori</li>
  </ol> 
</section>

<section>
  <div>
      <table class="table table-responsive table-stripped">
        <thead>
        @foreach ($allSubCategories as $subCate)
          <tr>
            <th><h3><a href='{{url("forum/$subCate->id")}}'><i class="fa fa-comments"></i>   {{ $subCate->category }}</a></h3></th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
            <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <tbody>
          @foreach ($subCate->subCategory as $firstNestedSub)
              <tr>
                <td><h5><a href='{{url("forum/$firstNestedSub->id")}}'>{{ $firstNestedSub->category }} </a></h5></td>
                <td class="text-center hidden-xs hidden-sm"> - </td>
                <td class="text-center hidden-xs hidden-sm"> - </td>
                <td class="hidden-xs hidden-sm">by <a href="#"> - </a></td>
                <td><a href="#"><button class="btn btn-default">Edit</button></a> <a href="#"><button class="btn btn-danger">Delete</button></a></td>
              </tr>
          </tbody>
          @endforeach()
        @endforeach()        
      </table>
   </div>
	<a href="add-category.php" class="pull-right btn btn-success">Tambah Baru</a><br><br>		
</section>

@endsection()