@extends('layout.layout')

@section('content')
<section>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="img/community.jpg" alt="Community">
            <div class="carousel-caption">
              <h3>Community</h3>
              <p>My Community</p>
            </div>
          </div>

          <div class="item">
            <img src="img/community2.jpg" alt="Community2">
            <div class="carousel-caption">
              <h3>Community</h3>
              <p>My Community</p>
            </div>
          </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
    </div> <!-- /container -->

    <div class="container">
    <div class="page-header page-heading">
      <ol class="breadcrumb pull-left where-am-i">
        <li><a href="#">FAQ</a></li>
        <li><a href="{{url('calendar')}}">Calendar</a></li>
      </ol>      

      <ol>
        <div class="col-lg-3" style="margin-left: 66%">
            <div class="input-group">
              <input type="text" class="form-control" aria-label="..." placeholder="Cari..">
              <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><img src="img/cari.png"></button>
              </span>
            </div>
          </div>
      </ol>
      <div class="clearfix"></div> 
    </div>

    <div class="table-responsive">
      <table class="table forum">
        <thead>
        @foreach ($allSubCategories as $subCate)
          <tr>
            <th><h3><a href='{{url("forum/$subCate->id")}}'><i class="fa fa-comments"></i>   {{ $subCate->category }}</a></h3></th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
            <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
            <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
          </tr>
        </thead>
          <tbody>
          @foreach ($subCate->subCategory as $firstNestedSub)
              <tr>
                <td><h5><a href='{{url("forum/$firstNestedSub->id")}}'>{{ $firstNestedSub->category }} </a></h5></td>
                <td class="text-center hidden-xs hidden-sm">9542</td>
                <td class="text-center hidden-xs hidden-sm">8997</td>
                <td class="hidden-xs hidden-sm">by <a href="#">John Doe</a></td>
              </tr>
          </tbody>
          @endforeach()
        @endforeach()        
      </table>
    </div>
</section>
@endsection
