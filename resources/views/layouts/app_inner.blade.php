@include('partial.head')
<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
            @include('partial.top')
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
        	@yield('banner')
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth">
                            @include('partial.inner_left')
						</div>
						<div class="col-three-forth">
							@yield('content')	
						</div>
					</div>
				</div>
			</div>
		</div>


		@include('partial.newsletter')

		<footer id="colorlib-footer" role="contentinfo">
        @include('partial.footer_top')
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
    @include('partial.footer')