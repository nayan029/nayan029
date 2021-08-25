@include('fronted/include/header')
<section class="aiming-section">
	<div class="container">
		<div class="position-relative">
			<h6 class="after-text">JUSTICE</h6>
		</div>
		<div class="aiming-owl owl-carousel owl-theme">

			<div class="item">
				<div class="aiming-item">
					<div class="row">
						<div class="col-md-5 col1">
							<div class="text">
								<h3>Aiming to provide high qualitythe best experience we can offer</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Convallis sed at mollis malesuada a arcu</p>
								<a href="{{URL::to('/')}}/ask-a-free-question" class="btn btn-outline-primary min-w152">Ask a Question</a>
							</div>
						</div>
						<div class="col-md-7 col2" style="background-image: url(<?php echo URL::to('/'); ?>/fronted/images/58da5f275f58be1227aec934.png);">
							<div class="text">
								<h6>We have picked the most efficient law conversion courses for you</h6>
								<a class="btn btn-primary" href="{{URL::to('/')}}/about-us" role="button">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="aiming-item">
					<div class="row">
						<div class="col-md-5 col1">
							<div class="text">
								<h3>Aiming to provide high qualitythe best experience we can offer</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Convallis sed at mollis malesuada a arcu</p>
								<a href="{{URL::to('/')}}/ask-a-free-question" class="btn btn-outline-primary min-w152">Ask a Question</a>
							</div>
						</div>
						<div class="col-md-7 col2" style="background-image: url(<?php echo URL::to('/'); ?>/fronted/images/willoughby-zachry-law-02-1.png);">
							<div class="text">
								<h6>We have picked the most efficient law conversion courses for you</h6>
								<a class="btn btn-primary" href="{{URL::to('/')}}/about-us" role="button">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="aiming-item">
					<div class="row">
						<div class="col-md-5 col1">
							<div class="text">
								<h3>Aiming to provide high qualitythe best experience we can offer</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Convallis sed at mollis malesuada a arcu</p>
								<a href="{{URL::to('/')}}/ask-a-free-question" class="btn btn-outline-primary min-w152">Ask a Question</a>
							</div>
						</div>
						<div class="col-md-7 col2" style="background-image: url(<?php echo URL::to('/'); ?>/fronted/images/court-hammer-removebg.png);">
							<div class="text">
								<h6>We have picked the most efficient law conversion courses for you</h6>
								<a class="btn btn-primary" href="{{URL::to('/')}}/about-us" role="button">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- whats trending section -->
<!-- <section class="whats-trending">
	<div class="container">
		<div class="title text-center">
			<h3>Whats trending?</h3>
		</div>
		<div class="pills-design">
			<ul class="nav nav-pills " id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Law Firm Insights</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Free Guides</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">TLP Events</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact-new" role="tab" aria-controls="pills-contact-new" aria-selected="false">Career Tips</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="row">
						<?php
						foreach ($getlawfirm as $value) {
						?>
							<div class="col-lg-4 col-md-6">
								<div class="wt-box">
									<img src="{{asset('uploads/trends/')}}<?php echo "/" . $value->trend_image; ?>" class="top-img" alt="images">
									<div class="text">
										<h4>{{$value->trend_title}}</h4>
										<p>{{$value->short_description}}</p>
										<hr>
										<div class="row recommended">
											<div class="col-8 pr-0">
												<h6>Recommended by 8K users</h6>
											</div>
											<div class="col-4 text-right">
												<button class="like"> <img src="{{asset('fronted/images/svg/like.svg')}}" alt="images"></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="row">
						<?php
						foreach ($getfreeguides as $value) {
						?>
							<div class="col-lg-4 col-md-6">
								<div class="wt-box">
									<img src="{{asset('uploads/trends/')}}<?php echo "/" . $value->trend_image; ?>" class="top-img" alt="images">
									<div class="text">
										<h4>{{$value->trend_title}}</h4>
										<p>{{$value->short_description}}</p>
										<hr>
										<div class="row recommended">
											<div class="col-8 pr-0">
												<h6>Recommended by 8K users</h6>
											</div>
											<div class="col-4 text-right">
												<button class="like"> <img src="{{asset('fronted/images/svg/like.svg')}}" alt="images"></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="col-12 mt-5 text-center">
							<a href="#" class="btn btn-outline-primary min-w152">Load More</a>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
					<div class="row">
					<?php
					foreach ($getTlp as $value) {
					?>
						<div class="col-lg-4 col-md-6">
							<div class="wt-box">
								<img src="{{asset('uploads/trends/')}}<?php echo "/" . $value->trend_image; ?>" class="top-img" alt="images">
								<div class="text">
									<h4>{{$value->trend_title}}</h4>
									<p>{{$value->short_description}}</p>
									<hr>
									<div class="row recommended">
										<div class="col-8 pr-0">
											<h6>Recommended by 8K users</h6>
										</div>
										<div class="col-4 text-right">
											<button class="like"> <img src="{{asset('fronted/images/svg/like.svg')}}" alt="images"></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-contact-new" role="tabpanel" aria-labelledby="pills-contact-new-tab">
					<div class="row">
					<?php
					foreach ($getcarrertips as $value) {
					?>
						<div class="col-lg-4 col-md-6">
							<div class="wt-box">
							<img src="{{asset('uploads/trends/')}}<?php echo "/" . $value->trend_image; ?>" class="top-img" alt="images">
								<div class="text">
									<h4>{{$value->trend_title}}</h4>
									<p>{{$value->short_description}}</p>
									<hr>
									<div class="row recommended">
										<div class="col-8 pr-0">
											<h6>Recommended by 8K users</h6>
										</div>
										<div class="col-4 text-right">
											<button class="like"> <img src="{{asset('fronted/images/svg/like.svg')}}" alt="images"></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- whats trending section end -->
<section class="fourbox">
	<div class="container">
		<div class="divorce-owl owl-carousel owl-theme">

			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=civil">
					<!-- <form method="GET" action="{{URL::to('/')}}/search/lawyer/"></form> -->
					<div class="fbox">
						<p>Divorce </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/new4.png">

					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=22">

					<div class="fbox">
						<p>Bail </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/Group38.png" class="sr-rotate">

					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=10">
					<div class="fbox">
						<p>Challan </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/new2.png">
					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=23">

					<div class="fbox">
						<p>Sexual abuse </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/hammer1.png">
					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=24">

					<div class="fbox">
						<p>Court Marriage </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/ring1.png">
					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=2">


					<div class="fbox">
						<p>Consumer Court </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/lady.png">
					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=25">

					<div class="fbox">
						<p>Banking Fraud </p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/new3.png">
					</div>
				</a>
			</div>
			<div class="item">
				<a href="{{URL::to('/')}}/search/lawyer/?category=26">

					<div class="fbox">
						<p>Property Law</p>
						<img src="<?php echo URL::to('/'); ?>/fronted/images/new1.png">
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- award winnig section -->
<!-- <section class="award-winning">
	<a href="#" class="entypo-chat"><img src="{{asset('fronted/images/svg/entypo_chat.svg')}}"><span>Live Chat</span></a>
	<div class="container">
		<div class="position-relative">
			<h6 class="after-text">STUDY</h6>
		</div>
		<div class="title">
			<div class="row">
				<div class="col-md-8">
					<h3>Award winning Free Content</h3>
				</div>
				<div class="col-md-4 text-right">
					<select class="select2 sort-by">
						<option>Sort By</option>
						<option>For Lawyers</option>
						<option>For Students</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="area-box">
					<img src="{{asset('fronted/images/area.png')}}" class="blur" alt="images">
					<div class="text">
						<h5>Areas of Legal Practice</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, malesuada amet, feugiat dignissim tincidunt ultrices vulputate.</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="area-box-sm">
					<img src="{{asset('fronted/images/Rectangle133.png')}}" class="blur" alt="images">
					<div class="text">
						<img src="{{asset('fronted/images/Rectangle133.png')}}" class="blur2" alt="images">
						<h5>Law Conversion</h5>
					</div>
				</div>
				<div class="area-box-sm">
					<img src="{{asset('fronted/images/Rectangle134.png')}}" class="blur" alt="images">
					<div class="text">
						<img src="{{asset('fronted/images/Rectangle134.png')}}" class="blur2" alt="images">
						<h5>Pupillage</h5>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="area-box-sm lg">
					<img src="{{asset('fronted/images/Rectangle136.png')}}" class="blur" alt="images">
					<div class="text">
						<img src="{{asset('fronted/images/Rectangle136.png')}}" class="blur2" alt="images">
						<h5>Training Contracts</h5>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="area-box-sm lg">
					<img src="{{asset('fronted/images/Rectangle135.png')}}" class="blur" alt="images">
					<div class="text">
						<img src="{{asset('fronted/images/Rectangle135.png')}}" class="blur2" alt="images">
						<h5>Law Work Experience</h5>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="area-box-sm">
					<img src="{{asset('fronted/images/Rectangle138.png')}}" class="blur" alt="images">
					<div class="text">
						<img src="{{asset('fronted/images/Rectangle138.png')}}" class="blur2" alt="images">
						<h5>Law Universities</h5>
					</div>
				</div>
				<div class="area-box-sm">
					<img src="{{asset('fronted/images/Rectangle139.png')}}" class="blur" alt="images">
					<div class="text">
						<img src="{{asset('fronted/images/Rectangle139.png')}}" class="blur2" alt="images">
						<h5>Commercial Awareness</h5>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="area-box">
					<img src="{{asset('fronted/images/Rectangle137.png')}}" class="blur" alt="images">
					<div class="text">
						<h5>SQE</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, malesuada amet, feugiat dignissim tincidunt ultrices vulputate.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</section> -->
<!-- award wining  -->
<section class="management management-withbg" style="background-image: url(<?php echo URL::to('/'); ?>/fronted/images/team-bg.png);">
	<a href="#" class="entypo-chat"><img src="<?php echo URL::to('/'); ?>/fronted/images/svg/entypo_chat.svg"><span>Live Chat</span></a>
	<div class="container">
		<div class="position-relative">
			<h6 class="after-text fill">TEAM</h6>
			<img src="<?php echo URL::to('/'); ?>/fronted/images/Group38.png" class="fix-img1">
		</div>
		<div class="title text-center">
			<h3>The Best Attorneys</h3>
		</div>
		<div class="team-row row">
			@foreach($getlawyer as $data)
			<div class="team-col">
				<div class="team-box">
					<a href="advocate/{{$data->id}}" class="hoverid" onmouseover="change({{$data->id}})">
						<input type="hidden" name="id" id="id_{{$data->id}}" class="testone" data-hid="{{$data->id}}" value="{{$data->id}}">
						@if($data->profileimage)
						<img class="main" src="{{URL::to('/')}}/uploads/lawyerprofile/{{$data->profileimage}}">
						@else
						<img class="main" src="{{URL::to('/')}}/fronted/images/team2.png">
						@endif
						<div class="text">
							@if($data->profileimage)
							<img src="{{ URL::to('/')}}/uploads/lawyerprofile/{{$data->profileimage}}">
							@else
							<img class="main" src="{{URL::to('/')}}/fronted/images/team2.png">
							@endif
							<div class="inner">
								<h5>{{$data->name." ".$data->username}}</h5>
								<h6 style="color: var(--primary-color);"><span id="catname_{{$data->id}}"></span></h6>
								<p></p>
							</div>
						</div>
					</a>
				</div>
			</div>
			@endforeach
			<!-- <div class="col-md-4">
				<div class="team-box">
					<img class="main" src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
					<div class="text">
						<img src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
						<div class="inner">
						   <h5>Lore ipsum Lore   </h5>
						   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisl pulvinar in id vel vel, eget vitae euismod. Neque, quis elit eget non amet non, condimentum nunc magna. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="team-box">
					<img class="main" src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
					<div class="text">
						<img src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
						<div class="inner">
						   <h5>Lore ipsum Lore   </h5>
						   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisl pulvinar in id vel vel, eget vitae euismod. Neque, quis elit eget non amet non, condimentum nunc magna.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="team-box">
					<img class="main" src="<?php echo URL::to('/'); ?>/fronted/images/team1.png">
					<div class="text">
						<img src="<?php echo URL::to('/'); ?>/fronted/images/team1.png">
						<div class="inner">
						   <h5>Lore ipsum Lore   </h5>
						   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisl pulvinar in id vel vel, eget vitae euismod. Neque, quis elit eget non amet non, condimentum nunc magna.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="team-box">
					<img class="main" src="<?php echo URL::to('/'); ?>/fronted/images/team1.png">
					<div class="text">
						<img src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
						<div class="inner">
						   <h5>Lore ipsum Lore   </h5>
						   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisl pulvinar in id vel vel, eget vitae euismod. Neque, quis elit eget non amet non, condimentum nunc magna. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="team-box">
					<img class="main" src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
					<div class="text">
						<img src="<?php echo URL::to('/'); ?>/fronted/images/team2.png">
						<div class="inner">
						   <h5>Lore ipsum Lore   </h5>
						   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisl pulvinar in id vel vel, eget vitae euismod. Neque, quis elit eget non amet non, condimentum nunc magna.</p>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>

<section class="we-are we-are-second" style="background-image: url(<?php echo URL::to('/'); ?>/fronted/images/statue-justice-symbol.png);">
	<div class="container">
		<img src="<?php echo URL::to('/'); ?>/fronted/images/Group39.png" class="fix-img2">
		<div class="title">
			<h3>We are Trusted</h3>
			<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h6>
		</div>
		<div class="masonry">
			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh dui sit quam sit blandit tincidunt. Turpis vitae, mattis feugiat non. Eget leo justo, nibh felis suspendisse eget ultrices quisque. Nunc vestibulum placerat metus, varius at.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh dui sit quam sit blandit tincidunt. Turpis vitae, mattis feugiat non. Eget leo justo, nibh felis suspendisse eget ultrices quisque. Nunc vestibulum placerat metus, varius at.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<section class="find-the">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-6 col1">
				<img src="{{asset('fronted/images/Group40.png')}}" class="fix-img3">
				<div class="main">
					<img src="{{asset('fronted/images/Columns_6001.png')}}">
				</div>
				<div class="box">
					<p>”Lorem ipsum dolor sit amet Lorem ipsum”</p>
				</div>
			</div>

			<div class="col-lg-5 col-md-6 col2">
				<a href="{{url('/search/lawyer?name=')}}">
					<div class="title">
						<h3>Find the Right Lawyer For you</h3>
						<h6>We promise you will get the justice you deserve</h6>
					</div>
				</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsumLorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum.</p>
			</div>

		</div>
	</div>
</section>
<!-- <section class="we-are we-are we-are-second" style="background-image: url(<?php echo URL::to('/'); ?>/fronted/images/statue-justice-symbol.png);">
	<div class="container">
		<img src="<?php echo URL::to('/'); ?>/fronted/images/Group39.png" class="fix-img2">	
		<div class="title">
			<h3>We are Trusted By Clients across the nation</h3>
			<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h6>
		</div>
		<div class="masonry">
			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh dui sit quam sit blandit tincidunt. Turpis vitae, mattis feugiat non. Eget leo justo, nibh felis suspendisse eget ultrices quisque. Nunc vestibulum placerat metus, varius at.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh dui sit quam sit blandit tincidunt. Turpis vitae, mattis feugiat non. Eget leo justo, nibh felis suspendisse eget ultrices quisque. Nunc vestibulum placerat metus, varius at.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum.</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

			<div class="mitem">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Quam nunc in vel pellentesque ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida facilisis nulla quis ipsum ut</p>
				<hr>
				<div class="bottom">
					<img src="{{asset('fronted/images/Ellipse16.png')}}">
					<div>
						<h5>Allian Marie</h5>
						<h6>Lorem ipsum dummy text</h6>
					</div>
				</div>
			</div>

		</div>
	</div>
</section> -->

<!-- blogs and webinar -->

<!-- <section class="we-have">
	<div class="container">
		<div class="title text-right">
			<h3>We have collected some great news for you!</h3>
			<h6 class="ml-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h6>
		</div>
		<div class="pills-design">
			<ul class="nav nav-pills " id="we-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="we-one" data-toggle="pill" href="#we-pills-one" role="tab" aria-controls="we-pills-one" aria-selected="true">Webinars</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="we-two" data-toggle="pill" href="#we-pills-two" role="tab" aria-controls="we-pills-two" aria-selected="false">Blogs</a>
				</li>
			</ul>
			<div class="tab-content" id="we-tabContent">
				<div class="tab-pane fade" id="we-pills-one" role="tabpanel" aria-labelledby="we-one">
					<div class="row">
						<?php foreach ($getwebinar as $data) {

						?>
							<div class="col-lg-4 col-md-6">
								<div class="wt-box">
									<img src="{{asset('uploads/webinar/')}}<?php echo "/" . $data->webinar_image; ?>" class="top-img" alt="images">
									<div class="text">
										<h4>{{$data->webinar_title}}</h4>
										<p>{{$data->short_description}}</p>
										<hr>
										<div class="recommended ">
											<div class="row">
												<div class="ml-auto">
													<a href="#" class="btn btn-outline-primary">View Article</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="tab-pane fade show active" id="we-pills-two" role="tabpanel" aria-labelledby="we-two">
					<div class="row">
						<?php foreach ($getblogs as $data) {

						?>
							<div class="col-lg-4 col-md-6">
								<div class="wt-box">
									<img src="{{asset('uploads/blogs/')}}<?php echo "/" . $data->blog_image; ?>" class="top-img" alt="images">
									<div class="text">
										<h4>{{$data->blog_title}}</h4>
										<p>{{$data->short_description}}</p>
										<hr>
										<div class="recommended ">
											<div class="row">
												<div class="ml-auto">
													<a href="#" class="btn btn-outline-primary">View Article</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<!-- <div class="col-lg-4 col-md-6">
			  			<div class="wt-box">
			  				<img src="{{asset('fronted/images/wt1.png')}}" class="top-img" alt="images">
			  				<div class="text">
			  					<h4>LNAT The Ultimate Test Guide</h4>
			  					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tempor nunc sed risus donec.</p>
			  					<hr>
			  					<div class="recommended ">
			  						<div class="row">
			  							<div class="ml-auto">
			  								<a href="#" class="btn btn-outline-primary">View  Article</a>
			  							</div>
			  						</div>
			  					</div>
			  				</div>
			  			</div>
			  		</div>
			  		<div class="col-lg-4 col-md-6">
			  			<div class="wt-box">
			  				<img src="{{asset('fronted/images/wt1.png')}}" class="top-img" alt="images">
			  				<div class="text">
			  					<h4>LNAT The Ultimate Test Guide</h4>
			  					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tempor nunc sed risus donec.</p>
			  					<hr>
			  					<div class="recommended ">
			  						<div class="row">
			  							<div class="ml-auto">
			  								<a href="#" class="btn btn-outline-primary">View  Article</a>
			  							</div>
			  						</div>
			  					</div>
			  				</div>
			  			</div>
			  		</div> -->
<!-- </div>
				</div>

			</div>
		</div>
	</div>
</section>  -->

<!-- blogs and webinar -->
<section class="your-time">
	<div class="container">
		<div class="inner">
			<img class="g10" src="{{asset('fronted/images/g10.png')}}">
			<div class="row">
				<div class="offset-md-4 col-md-7 col2">
					<h1>Your Time is valuable</h1>
					<!-- <h4>Get answers quick</h4> -->
					<div class="form">
						<form method="POST" action="{{URl::to('/')}}/quick-answer" onsubmit="return validation();">
							@csrf
							<div class="form-group">
								<input type="email" class="form-control" id="cemail" aria-describedby="emailHelp" placeholder="Email" name="email" autocomplete="off">
								<span id="cemail_error" style="color: red;"></span>
							</div>
							<div class="form-group">
								<div class="with-label">
									<label>Select Category</label>
									<select class="select2 form-control" id="category" name="category">
										<option value="">Select Category</option>
										@foreach($category as $data)
										<option value="{{$data->category_name}}">{{ucfirst($data->category_name)}}</option>
										@endforeach
									</select>
									<span id="category_error" style="color: red;"></span>

								</div>
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Enter message" rows="5" name="message" id="message"></textarea>
								<span id="message_error" style="color: red;"></span>

							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-outline-primary min-w120">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-enquiry sr-enquiry" data-toggle="modal" data-target="#exampleModal">
	<img src="{{URL::to('/')}}/fronted/images/phone-call.png"> <span>Enquiry Now</span>
</button> -->

<!-- Modal -->
<!-- <div class="modal fade enquiry-mdal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: #000;">Enquiry Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{URL::to('/')}}/enquiry-form" id="main_form">
					@csrf
					<div class="form-group">

						<input type="text" name="name" class="form-control border-radius-5px" id="name" aria-describedby="nameHelp" placeholder="Name" autocomplete="off" maxlength="250">
						<span id="name_error" style="color: red;"></span>
					</div>
					<div class="form-group">

						<input type="number" name="mobile" class="form-control border-radius-5px" id="mobile" aria-describedby="nameHelp" placeholder="Mobile number" autocomplete="off" maxlength="12">
						<span id="mobile_error" style="color: red;"></span>
					</div>
					<div class="form-group">

						<input type="email" name="email" class="form-control border-radius-5px" id="email" aria-describedby="emailHelp" placeholder="Email (Optional)" autocomplete="off" maxlength="250">
						<span id="email_error" style="color: red;"></span>
					</div>

					<div class="modal-footer">

						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->
@include('fronted/include/footer')
<script>
	$('#home').addClass('active');
</script>
<script>
	// $('#contact-us').addClass('active ');

	function validation() {
		// $('#submitBtn1').prop('disabled', true);
		var temp = 0;
		var f = 0;
		var category = $("#category").val();
		var cemail = $("#cemail").val();
		var message_contact = $("#message").val();


		if (category.trim() == '') {
			$('#category_error').html("Please select category");
			// cnt = 1;
			temp++;

		}

		function ValidateEmail(cemail) {
			var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			return expr.test(cemail);
		};
		if (cemail) {
			if (!ValidateEmail(cemail)) {
				$('#cemail_error').html("Please enter valid email ");
				temp++;
				cnt = 1;
				f++;
				if (f == 1) {
					$('#cemail').focus();
				}
			}
		}

		if (cemail == "") {

			$('#cemail_error').html("Please enter email");

			temp++;

		}
		if (message_contact == "") {

			$('#message_error').html("Please enter message");

			temp++;

		}

		if (temp == 0) {
			// $("#submitBtn1").prop('disabled', false);
			$("#submitBtn1").show();
			return true;
		} else {
			$("#submitBtn1").show();
			return false;
			// $('#main_id').submit();
		}
	}
</script>
<script>
	// $('#main_form').submit(function(e) {

	// 	var name = $('#name').val();
	// 	var email = $('#email').val();
	// 	var mobile = $('#mobile').val();


	// 	var cnt = 0;
	// 	var f = 0;

	// 	$('#name_error').html("");
	// 	$('#email_error').html("");
	// 	$('#mobile_error').html("");



	// 	var number = /([0-9])/;
	// 	var alphabets = /([a-zA-Z])/;
	// 	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

	// if (email.trim() == '') {
	// 	$('#email_error').html("Please enter Email");
	// 	cnt = 1;
	// 	f++;
	// 	if (f == 1) {
	// 		$('#email').focus();
	// 	}
	// }
	// 	if (name.trim() == '') {
	// 		$('#name_error').html("Please enter Name");
	// 		cnt = 1;
	// 		f++;
	// 		if (f == 1) {
	// 			$('#name').focus();
	// 		}
	// 	}


	// 	function ValidateEmail(email) {
	// 		var expr =
	// 			/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	// 		return expr.test(email);
	// 	};

	// 	if (email) {
	// 		if (!ValidateEmail(email)) {
	// 			$('#email_error').html("Please enter valid email");
	// 			cnt = 1;
	// 			f++;
	// 			if (f == 1) {
	// 				$('#email').focus();
	// 			}
	// 		}
	// 	}

	// 	if (mobile.trim() == '') {
	// 		$('#mobile_error').html("Please enter Mobile No");
	// 		cnt = 1;
	// 		f++;
	// 		if (f == 1) {
	// 			$('#mobile').focus();
	// 		}
	// 	}
	// 	if (mobile.length > 12) {
	// 		$('#mobile_error').html("Please enter Valid Mobile ");
	// 		cnt = 1;
	// 		f++;
	// 		if (f == 1) {
	// 			$('#mobile').focus();
	// 		}
	// 	}

	// 	if (cnt == 1) {
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}


	// })
</script>
<script>
	function change(id) {
		// console.log(id);

		$.ajax({
			'type': 'POST',
			// 'csrf': '@csrf',
			'url': '{{URL::to("/")}}/fronted/getcategoryname',
			// 'data': id,
			data: {
				"_token": "{{ csrf_token() }}",
				"id": id
			},
			'success': function(data) {
				// console.log(data);

				$('#catname_' + id).text(data);
				/*var $label = $("#catname");
   				 var text = $label.text();
   				 $label.text(text.replace("text", data));*/
				// $('#products').replaceWith(response);
			}
		});


	}
	// $(".hoverid").hover(function() {

	// 	var abc = $(this).data("hid");
	// 	console.log(abc);
	// 	var val = $('.testone').val();
	// 	console.log(val);

	// 	$.ajax({
	// 		// 'type': 'POST',
	// 		// 'url': 'handlers/route_request.php',
	// 		// 'dataType': 'html',
	// 		'success': function(data) {
	// 			// console.log(data);
	// 		}
	// 	});
	// });
</script>