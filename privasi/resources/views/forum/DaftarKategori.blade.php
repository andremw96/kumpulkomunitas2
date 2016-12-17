@extends('layout.layout')

@section('title', 'Daftar Kategori')
@section('content')
<div class="container">
  <div clss="col-lg-12">
    <ol class="breadcrumb">
      <li>You are here: <a href="{{ url('/') }}">Home</a></li>
      <li class="active">Daftar Kategori</li> 
    </ol>
  </div>
</div>  

<section>
  <div class="container">
    <div class="table-responsive">
      <table class="table forum">
        <thead>
        @foreach ($allSubCategories as $subCate)
          <tr>
            <th><h3><a href='{{url("forum/$subCate->id")}}'><i class="fa fa-comments"></i>   {{ $subCate->category }}</a></h3></th>
          </tr>
        </thead>
          <tbody>
          @foreach ($subCate->subCategory as $firstNestedSub)
              <tr>
                <td><h5><a href='{{url("forum/$firstNestedSub->id")}}'>{{ $firstNestedSub->category }} </a></h5></td>
              </tr>
          </tbody>
          @endforeach()
        @endforeach()        
      </table>
    </div>
  </div>
</section>

@endsection