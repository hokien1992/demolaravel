@extends('layout.index')
@section('content')
	<div class="main-content">		
		<div class="col-md-9 total-news">
			<div class="technology">
				<div class="tech-main">
				@foreach($tintuc as $tt)
					<div class="col-md-4 tech">
						<a href="singlepage.html" title="{{$tt->tieude}}"><img src="upload/tintuc/{{$tt->hinhanh}}" alt="{{$tt->tieude}}" /></a>
						<a class="power" href="singlepage.html" title="{{$tt->tieude}}">{{$tt->tieude}}</a>
					</div>
				@endforeach
				</div>
			</div>
		</div>
		@include('layout.right')
		<div class="clearfix"></div>
	</div>
@endsection
