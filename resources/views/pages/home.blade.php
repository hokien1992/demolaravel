@extends('layout.index')
@section('content')
<div class="main-content">		
	<div class="col-md-9 total-news">
		<div class="slider">
			<script src="assets/js/responsiveslides.min.js"></script>
			 <script>
				// You can also use "$(window).load(function() {"
				$(function () {
				  $("#conference-slider").responsiveSlides({
					auto: true,
					manualControls: '#slider3-pager',
				  });
				});
			</script>
			 <div class="conference-slider">
				<!-- Slideshow 3 -->
				<ul class="conference-rslide" id="conference-slider">
				@foreach($slide as $sl)
				  <li><img src="upload/slide/{{$sl->hinhanh}}" alt=""></li>
				@endforeach
				</ul>
				<!-- Slideshow 3 Pager -->
				<ul id="slider3-pager">
				@foreach($slide as $sl)
				  <li><a href="#"><img src="upload/slide/{{$sl->hinhanh}}" alt=""></a></li>
				@endforeach
				</ul>
				<div class="breaking-news-title">
					<p>Lorem ipsum dolor sit amet, consectetur Nulla quis lorem neque, mattis venenatis lectus. </p>
				</div>
			</div> 
			<h5 class="breaking">Breaking news</h5>
		</div>	
	<div class="posts">
		<div class="left-posts">
		@foreach($loaitin as $lt)
			<div class="world-news">
				<div class="main-title-head">
					<h3>{{$lt->ten}}</h3>
					<a href="tin-tuc/{{$lt->theloai->alias}}/{{$lt->alias}}{{$lt->id}}">More  +</a>
					<div class="clearfix"></div>
				</div>
				<div class="world-news-grids">
				@foreach($tintuc as $tt)
				@if($tt->idLoaitin==$lt->id)
					<div class="world-news-grid">
						<img src="upload/tintuc/{{$tt->hinhanh}}" alt="{{$tt->tieude}}" />
						<a href="singlepage.html" class="title">{{$tt->tieude}} </a>
						<p>{{$tt->mota}}</p>
						<a href="singlepage.html" title="{{$tt->tieude}}">Read More</a>
					</div>
				@endif
				@endforeach
				</div>
			</div>
			<div class="clearfix"></div>
		@endforeach
			<div class="gallery">
				<div class="main-title-head">
					<h3>gallery</h3>
					<a href="#">More  +</a>
					<div class="clearfix"></div>
				</div>
				<div class="gallery-images">
					<div class="course_demo1">
					  <ul id="flexiselDemo1">	
						 <li>
							<a href="single.html"><img src="assets/images/g1.jpg" alt="" /></a>						
						 </li>
						 <li>
						   <a href="single.html"><img src="assets/images/g2.jpg" alt="" /></a>
						  </li>	
						 <li>
							<a href="single.html"><img src="assets/images/g3.jpg" alt="" /></a>
						 </li>	
						 <li>
							<a href="single.html"><img src="assets/images/g4.jpg" alt="" /></a>
						 </li>	
					 </ul>
				 </div>
				 <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />
					<script type="text/javascript">
				 $(window).load(function() {
					$("#flexiselDemo1").flexisel({
						visibleItems: 3,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 2
							}, 
							landscape: { 
								changePoint:640,
								visibleItems: 2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				 });
				  </script>
				 <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
			 </div>
			 <div class="course_demo1">
					  <ul id="flexiselDemo">	
						 <li>
							<a href="single.html"><img src="assets/images/g4.jpg" alt="" /></a>							
						 </li>
						 <li>
							<a href="single.html"><img src="assets/images/g5.jpg" alt="" /></a>
						  </li>	
						 <li>
							<a href="single.html"><img src="assets/images/g6.jpg" alt="" /></a>
						 </li>	
						 <li>
							<a href="single.html"><img src="assets/images/g1.jpg" alt="" /></a>
						 </li>	
					 </ul>
				 </div>
				 <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />
					<script type="text/javascript">
				 $(window).load(function() {
					$("#flexiselDemo").flexisel({
						visibleItems: 3,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 2
							}, 
							landscape: { 
								changePoint:640,
								visibleItems: 2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				 });
				  </script>
				 <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>

				</div>
			<div class="tech-news">
				<div class="main-title-head">
					<h3>tech     news</h3>
					<a href="singlepage.html">More  +</a>
					<div class="clearfix"></div>
				</div>	
				<div class="tech-news-grids">
					<div class="left-tech-news">
						<div class="tech-news-grid span_66">
							<a href="singlepage.html">Lorem ipsum dolor sit amet conse ctetur adipiscing elit  </a>
							<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ... </p>
							<p>by<a href="#">John Doe </a>  |  29 comments</p>
						</div>
						<div class="tech-news-grid">
							<a href="singlepage.html">Lorem ipsum dolor sit amet conse ctetur adipiscing elit  </a>
							<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ... </p>
							<p>by<a href="#">John Doe </a>  |  29 comments</p>
						</div>
					</div>
					<div class="right-tech-news">
						<div class="tech-news-grid span_66">
							<a href="singlepage.html">Lorem ipsum dolor sit amet conse ctetur adipiscing elit  </a>
							<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ... </p>
							<p>by<a href="#">John Doe </a>  |  29 comments</p>
						</div>
						<div class="tech-news-grid">
							<a href="singlepage.html">Lorem ipsum dolor sit amet conse ctetur adipiscing elit  </a>
							<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ... </p>
							<p>by<a href="#">John Doe </a>  |  29 comments</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="right-posts">
			<div class="desk-grid">
				<h3>FROM   THE   desk</h3>
				<div class="desk">
					<a href="singlepage.html" class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit </a>
					<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>
					<p><a href="singlepage.html">Read More</a><span>3 hours ago</span></p>
				</div>
				<div class="desk">
					<a href="singlepage.html" class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit </a>
					<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>
					<p><a href="singlepage.html">Read More</a><span>3 hours ago</span></p>
				</div>
				<div class="desk">
					<a href="singlepage.html" class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit </a>
					<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>
					<p><a href="singlepage.html">Read More</a><span>3 hours ago</span></p>
				</div>
				<a class="more" href="singlepage.html">More  +</a>
			</div>
			<div class="editorial">
				<h3>editorial</h3>
				<div class="editor">
					<a href="single.html"><img src="assets/images/e1.jpg" alt="" /></a>
					<a href="single.html">Lorem ipsum dolor sit amet con se cte tur adipiscing elit</a>
				</div>
				<div class="editor">
					<a href="single.html"><img src="assets/images/e2.jpg" alt="" /></a>
					<a href="single.html">Lorem ipsum dolor sit amet con se cte tur adipiscing elit</a>
				</div>
				<div class="editor">
					<a href="single.html"><img src="assets/images/e1.jpg" alt="" /></a>
					<a href="single.html">Lorem ipsum dolor sit amet con se cte tur adipiscing elit</a>
				</div>
				<div class="editor">
					<a href="single.html"><img src="assets/images/e3.jpg" alt="" /></a>
					<a href="single.html">Lorem ipsum dolor sit amet con se cte tur adipiscing elit</a>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>	
	</div>
	</div>	
	@include('layout.right')
</div>
@endsection