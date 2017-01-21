<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- <title>{{ config('app.name', 'Kumpul Komunitas') }}</title> -->
    <link rel="shortcut icon" href={{asset('img/logo.ico')}} />
    <title>@yield('title') | Kumpul Komunitas</title>

    <!-- for calendar -->
    <link href={{asset('assets/css/fullcalendar.min.css')}} rel='stylesheet' />
    <link href="{{ url('assets/css') }}/daterangepicker.css" rel="stylesheet">

  
    <!-- Bootstrap core CSS -->
    <!-- <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css"> -->
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dist/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('dist/css/dropdown-submenu.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/search.css')}}" rel="stylesheet" type="text/css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{asset('assets/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{asset('dist/css/navbar-fixed-top.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dist/css/carousel.css')}}" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{asset('assets/js/ie-emulation-modes-warning.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap-submenu.min.js')}}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 

    <style type="text/css">
      #login-dp{
        min-width: 250px;
        padding: 14px 14px 0;
        overflow:hidden;
        /*background-color:rgba(255,255,255,.8);*/
      }

      #login-dp .help-block{
        font-size:12px    
      }

      #login-dp .bottom{
        background-color:rgba(255,255,255,.8);
        border-top:1px solid #ddd;
        clear:both;
        padding:14px;
      }

      #login-dp .form-group {
        margin-bottom: 10px;
      }

      .my-quest
      {
          position: fixed;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          background: rgba(0,0,0,0.8);
          z-index: 99999;
          opacity: 0;
          -webkit-transition: opacity 100ms ease-in;
          -moz-transition: opacity 100ms ease-in;
          transition: opacity 100ms ease-in;
          pointer-events: none;
      }

      #quest > div
      {
          width: 80%;
          height: 80%;
          margin: 5% auto;
          background: #fff;
          padding: 10px;
      }

      #quest:target
      {
          opacity: 1;
          pointer-events: auto;
      }

    </style>

  </head>

  <body>
  @if(Session::has('flash_message'))
    <div class="row">
      <div class="alert alert-success alert-dismissable fade in col-md-4 col-md-offset-4" align="center" id="success-alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
      </div>
    </div>
  @endif

<header class="page-row">
  <div class="menu">
  	<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('')}}">My Community</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('/about')}}">About</a></li>
              <li><a href="{{url('/contact')}}">Contact</a></li>
              <li class="dropdown">
                <a href="/forum" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori <span class="caret"></span></a>
                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" id="dropmenu">
                    @foreach ($allSubCategories as $subCate)
                     <li class="dropdown-header"><a href='{{url("forum/$subCate->id")}}'>{{ $subCate->category }}</a></li>
                        @foreach ($subCate->subCategory as $firstNestedSub)
                            <li><a href='{{url("forum/$firstNestedSub->id")}}'>{{ $firstNestedSub->category }}</a></li>
                        @endforeach()
                        <li role="separator" class="divider"></li>
                    @endforeach()                    
                </ul>
              </li>
              <li><a href="{{url('/regcommunity')}}">Daftar Komunitas</a></li>
              <li><a href="{{url('calendar')}}">Calendar</a></li>
                <form method="POST" action="{{ url('/search') }}" role="search" class="navbar-form navbar-right" > 
                  {{ csrf_field() }}
                    <div class="input-group"> 
                      <input type="text" class="form-control" placeholder="Cari.." name="query">            
                    </div>
               </form>
          </ul>       
          <ul class="nav navbar-nav navbar-right">            
              @if (Auth::guest())
                     <li><p class="navbar-text">Sudah Punya Akun?</p></li>
                        <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                           <ul id="login-dp" class="dropdown-menu">
                            <li>
                              <div class="row">
                                <div class="col-md-12">
                                  <form class="nav navbar-form navbar-right" method="POST" action="{{ url('/login') }}">
                                  {{ csrf_field() }}
                                   <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                       <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>      
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif                                                                          
                                   </div>   

                                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                                                                                      
                                   </div>

                                   <div class="form-group">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember"> Remember Me
                                          </label>
                                      </div>
                                   </div>

                                   <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>     
                                   </div>
                                  </form>
                                </div>
                                <div class="bottom text-center">
                                  Atau ? <a href="{{url('/register')}}"><b>Join Us</b></a>
                                </div>
                              </div>
                            </li>
                           </ul>
                        </li>
              @else                 
                  <ul class="nav navbar-nav navbar-left">
                      <li><a href="#quest"> Buat Thread</a></li>
                  </ul>           

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          Hello, {{ Auth::user()->username }} <span class="caret"></span>
                      </a>

                       <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" id="dropmenu">
                          <li>
                              <a href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                           <li role="separator" class="divider"></li>
                          <li class="dropdown-header">Pesan</li>
                                <li><a tabindex="-1" href="{{ route('message.create') }}">Buat Pesan</a></li>
                                <li><a href="{{ route('message.index') }}">List Pesan Terkirim</a></li>
                                <li><a href="{{ url('/message/inbox') }}">List Pesan Masuk</a></li>
                      </ul>
                  </li>   

                  <div class="my-quest" id="quest">
                    <div>           
                        <hr>
                        <form method="POST" action="{{ route('thread.store') }}">   
                        {{csrf_field()}}                   
                            <label>Kategori</label>
                              <select name="category" class="form-control">
                                  <option value="1">General Discussion</option>
                                  <option value="2">General Discussion - The Lounge</option>
                                  <option value="3">General Discussion - FAQ</option>
                              </select>
                            <label>Judul Thread</label>
                              <input type="text" class="form-control" name="title" required>
                            <label>Konten</label>
                              <textarea name="content" class="form-control" rows="10" required></textarea>
                            <br>
                            <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="username_id" value="{{ Auth::user()->username }}">
                            <input type="submit" class="btn btn-success pull-right" value="Tambahkan Thread">
                        </form><br>
                        <hr>
                        <a href="" class="pull-right">Keluar</a>
                    </div>
                  </div>                                            
              @endif 
          </ul>
        </div><!--/.nav-collapse -->
        </div>
    </nav>
  </div>
</header>
  
  <main class="page-row page-row-expanded">
    @yield('content')  
  </main>

    <footer class="footer-distributed" class="page-row"><!--Footer-->
        <div class="footer-left">
          <h3>My Community</h3>
          <p class="footer-links">
            <a href="{{url('/')}}">Home</a>
            ·
            <a href="{{url('/about')}}">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="{{url('/contact')}}">Contact</a>
          </p>

          <p class="footer-company-name">My Community &copy; 2016</p>
        </div>

        <div class="footer-center">

          <div>
            <i class="fa fa-map-marker"></i>
            <p><span>21 Revolution Street</span> Semarang, Indonesia</p>
          </div>

          <div>
            <i class="fa fa-phone"></i>
            <p>+000000000</p>
          </div>

          <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">support@mycommunity.com</a></p>
          </div>

        </div>

        <div class="footer-right">

          <p class="footer-company-about">
            <span>About the Web</span>
            My Community adalah sebuah tempat di dunia maya yang mengumpulkan semua komunitas yang ada, untuk sharing dan lain - lain.
          </p>

          <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

          </div>
        </div>
    </footer><!--/Footer--> 
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('assets/js/ie10-viewport-bug-workaround.js')}}"></script>
    <script src="{{asset('dist/js/header.js')}}"></script>
    <script src={{asset('assets/js/jquery-ui.min.js')}}></script>
    <!-- <script src="{{ url('assets/js') }}/moment.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script>
        webshims.setOptions('forms-ext', {types: 'date'});
        webshims.polyfill('forms forms-ext');
    </script>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        $(document).ready(function () {
          window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                  $(this).remove(); 
              });
          }, 5000);       
        });
    </script>

    @yield('js')
  </body>
</html>


