@extends('layout.layout')

@section('content')

<section>
  <div class="jumbotron">
    <div class="container text-center">
      <h1>My Community</h1>
      <p>Tempat dimana kita para komunitas bisa berbagi informasi dan sebagai wadah berkumpul untuk solidaritas sesama komunitas se - Indonesia...</p>
    </div>
  </div>
    
  <div class="container-fluid bg-3 text-center">
    <h3>Ini adalah beberapa komunitas yang tergabung dalam (MC) </h3><br>
    <div class="row">
      <div class="col-sm-3">
        <p>Komunitas Moge</p>
        <img src="img/moge.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Komunitas Mobil Sport..</p>
        <img src="img/mobil.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Komunitas Mobil Antik</p>
        <img src="img/mobilantik.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Komunitas Motor Vespa</p>
        <img src="img/vespa.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br>

  <div class="container-fluid bg-3 text-center">
    <div class="row">
      <div class="col-sm-3">
        <p>Komunitas DKV</p>
        <img src="img/dkv.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Komunitas Gamers</p>
        <img src="img/gamer.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>ASKOMINDO Komunitas musisi indie</p>
        <img src="img/asko.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Komunitas Kuliner</p>
        <img src="img/kuliner.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br><br>

  <footer class="container-fluid text-center">
  	<p><font size="6"></font></p>
    <p>Di atas adalah sebagian contoh para komunitas yang tergabung dalam My Community </p>
  </footer>
</section>

@endsection

