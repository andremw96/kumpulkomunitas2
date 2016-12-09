
@extends('layout.layout')

@section('content')
	<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">My Community</h1>
	               		<h2>Daftar Akun</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="{{url('/registeruser')}}">	
					{!! csrf_field() !!}					
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="gender">Jenis Kelamin</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-venus-mars" aria-hidden="true"></i></span>
									<select class="form-control" name="gender" required>
										<option>Jenis Kelamin</option>
										<option value="Male">Laki-laki</option>
										<option value="Female">Perempuan</option>
									</select>
								</div>																						
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Tanggal Lahir</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span> 
									<input type="date" class="form-control" name="TglLahir" id="TglLahir" placeholder="Masukkan Tanggal Lahir" required>								
								</div>
							</div>
						</div>						

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type="submit" class="btn btn-success btn-lg btn-block login-button"></button>
						</div>
					</form>

						<div class="login-register">
							<p>Sudah punya akun? <a href="{{url('login')}}">Login Here</a></p>
				        </div>					
				</div>
			</div>
	</div>
@endsection