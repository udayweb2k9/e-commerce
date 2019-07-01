@extends('layouts.app')
@section('page_title', 'Home')
@section('content')
<!-- container -->
<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-4 fh5co-item-wrap">
			<a class="fh5co-listing-item">
				<img src="{{ url('public/frontend/images/img-1.jpg') }}" alt="zanzibarexcursion.com" class="img-responsive">
				<div class="fh5co-listing-copy">
					<h2>Safari</h2>
					<span class="icon">
						<i class="icon-chevron-right"></i>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-4 col-sm-4 fh5co-item-wrap">
			<a class="fh5co-listing-item">
				<img src="{{ url('public/frontend/images/img-2.jpg') }}" alt="zanzibarexcursion.com" class="img-responsive">
				<div class="fh5co-listing-copy">
					<h2>Mountain Climbing</h2>
					<span class="icon">
						<i class="icon-chevron-right"></i>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-4 col-sm-4 fh5co-item-wrap">
			<a class="fh5co-listing-item">
				<img src="{{ url('public/frontend/images/img-3.jpg') }}" alt="zanzibarexcursion.com" class="img-responsive">
				<div class="fh5co-listing-copy">
					<h2>Kite Surfing</h2>
					<span class="icon">
						<i class="icon-chevron-right"></i>
					</span>
				</div>
			</a>
		</div>
		<!-- END 3 row -->

		<div class="col-md-4 col-sm-4 fh5co-item-wrap">
			<a class="fh5co-listing-item">
				<img src="{{ url('public/frontend/images/img-4.jpg') }}" alt="zanzibarexcursion.com" class="img-responsive">
				<div class="fh5co-listing-copy">
					<h2>Dive Zanzibar</h2>
					<span class="icon">
						<i class="icon-chevron-right"></i>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-4 col-sm-4 fh5co-item-wrap">
			<a class="fh5co-listing-item">
				<img src="{{ url('public/frontend/images/img-5.jpg') }}" alt="zanzibarexcursion.com" class="img-responsive">
				<div class="fh5co-listing-copy">
					<h2>Game Fishing</h2>
					<span class="icon">
						<i class="icon-chevron-right"></i>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-4 col-sm-4 fh5co-item-wrap">
			<a class="fh5co-listing-item">
				<img src="{{ url('public/frontend/images/img-6.jpg') }}" alt="zanzibarexcursion.com" class="img-responsive">
				<div class="fh5co-listing-copy">
					<h2>Wedding Safaris</h2>
					<span class="icon">
						<i class="icon-chevron-right"></i>
					</span>
				</div>
			</a>
		</div>
		<!-- END 3 row -->


	</div>
</div>
<!-- /container -->

@endsection


