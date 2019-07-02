@extends('layouts.app_inner')
@section('page_title', 'About')
@section('content')
<h2>{!! $content['display_title'] !!}</h2>
<div class="row">
	<div class="col-md-12">
		
		<div class="row row-pb-sm">
			<div class="col-md-12">
				<img class="img-responsive" src="frontend/images/about.jpg" alt="">
			</div>
			
		</div>	
		{!! $content['page_content'] !!}
		
	</div>
</div>


@endsection

