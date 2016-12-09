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

    <table class="table forum table-striped">
      <thead>
        <tr>
          <th class="cell-stat"></th>
          <th>
            <h3>General Discussion</h3>
          </th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
          <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><i class="fa fa-comments-o fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">General Discussion</a><br><small>Ngobrol - Ngobrol tentang Komunitas</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">9542</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">8997</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">John Doe</a><br><small><i class="fa fa-clock-o"></i> 3 months ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-coffee fa-2x text-primary"></i></td>
          <td>
            <h4><a href="##">The Lounge</a><br><small>Ngobrol Apa aja disini</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">FAQ</a><br><small>Tanyakan apa kebingunganmu disini</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">1234</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">231425</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>
      </tbody>
    </table>

    <table class="table forum table-striped">
      <thead>
        <tr>
          <th class="cell-stat"></th>
          <th>
            <h3>Kendaraan</h3>
          </th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
          <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><i class="fa fa-motorcycle fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Kendaraan Roda 2</a><br><small>Kumpul semua komunitas pemilik kendaraan roda 2</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 3 months ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-car fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Kendaraan Roda 4</a><br><small>Kumpul semua komunitas pemilik kendaraan roda 4</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-bicycle fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Sepeda</a><br><small>Kumpul semua komunitas pemilik Sepeda</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>
      </tbody>
    </table>
    <table class="table forum table-striped">
      <thead>
        <tr>
          <th class="cell-stat"></th>
          <th>
            <h3>Alat Elektronik</h3>
          </th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
          <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><i class="fa fa-laptop fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Komputer</a><br><small>Kumpul semua komunitas tentang Komputer</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-tv fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">TV</a><br><small>Kumpul semua komunitas tentang TV</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-hdd-o fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">DVD Player</a><br><small>Kumpul semua komunitas tentang DVD Player</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>
      </tbody>
    </table>

    <table class="table forum table-striped">
      <thead>
        <tr>
          <th class="cell-stat"></th>
          <th>
            <h3>Hiburan</h3>
          </th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
          <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td class="text-center"><i class="fa fa-keyboard-o fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Game Komputer</a><br><small>Kumpul semua komunitas tentang Game Komputer</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-tablet fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Game Konsol</a><br><small>Kumpul semua komunitas tentang Game Konsol</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

        <tr>
          <td class="text-center"><i class="fa fa-music fa-2x text-primary"></i></td>
          <td>
            <h4><a href="#">Musik</a><br><small>Kumpul semua komunitas tentang Musik</small></h4>
          </td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
          <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
          <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
        </tr>

      </tbody>
    </table>
</div>
    
</section>
@endsection
