@extends('layouts.app_fullpage')
@section('page_title', 'About')
@section('banner')
	<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
			<li style="background-image: url(images/cover-img-1.jpg);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner text-center">
								<h1>Contact</h1>
								<h2 class="bread"><span><a href="index.html">Home</a></span> <span>Contact</span></h2>
							</div>
						</div>
					</div>
				</div>
			</li>
			</ul>
		</div>
	</aside>
@endsection
@section('content')
	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<div class="contact-wrap">
						<h3>Registred</h3>
						{!! Form::open(array('url' => URL::to('registerd', array(), true),'method'=>'POST','files'=>true,'id'=>'register-form','class'=>'main-contact-form' )) !!}
							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label for="fname">First Name</label>
									<input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname">
								</div>
								<div class="col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Password</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="Your subject of this message">
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Registred" class="btn btn-primary">
							</div>
						</form>		
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<div class="contact-wrap">
						<h3>Login</h3>
						{!! Form::open(array('url' => URL::to('login', array(), true),'method'=>'POST','files'=>true,'id'=>'login-form','class'=>'main-contact-form' )) !!}
							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" class="form-control" placeholder="Your email address">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Password</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Your login password">
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Login" class="btn btn-primary">
							</div>
						</form>		
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection