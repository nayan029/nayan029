<?php
$login = Auth::user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{$sitesetting->title}} | {{$title}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo URL::to('/'); ?>/uploads/logo/{{$sitesetting->logo}}" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="{{asset('fronted/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('fronted/css/toastr.min.css')}}" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="<?php echo URL::to('/'); ?>/">
					<img src="{{asset('fronted/images/logo.png')}}" alt="logo">
				</a>
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item " id="home">
							<a class="nav-link" href="<?php echo URL::to('/'); ?>/">Home</a>
						</li>
						@if(isset($login['step']) && $login->user_type == '3')
						@if($login['step'] == '0' || $login['step'] == '1' || $login['step'] == '2')
						<li class="nav-item" id="practice">
							<a class="nav-link" href="<?php echo URL::to('/'); ?>/lawyer/enrollment">Adv.Login</a>
						</li>
						@endif
						@else
						<li class="nav-item" id="practice">
							<a class="nav-link" href="<?php echo URL::to('/'); ?>/lawyer/enrollment">Adv.Login</a>
						</li>
						@endif
						<li class="nav-item" id="advice">
							<a class="nav-link" href="#">Legal Query</a>
							<div class="inner-menu">
								<ul>
									<li class="ul-title">Research Paper</li>
									<li class="li-border"></li>
									<?php
									$listAdviceQuery = DB::table('main_legal_query')->where('legal_query_type_id', '1')->where('status', 1)->where('deleted_at', NULL)->limit(3)->get();
									foreach ($listAdviceQuery as $keyQuery) {

									?>

										<li><a href="<?php echo URL::to('/legalQueryDesc'); ?>?id=<?= $keyQuery->id ?>">{{ucfirst($keyQuery->type_name)}}</a></li>

									<?php } ?>

									<li>
										<a href="<?php echo URL::to('/'); ?>/free-legal-advice" class="btn btn-outline-primary min-w120 mt-4 ">Show All</a>

									</li>

								</ul>
								<ul>
									<li class="ul-title">Notes</li>
									<li class="li-border"></li>
									<?php
									$listLegalGuides = DB::table('main_legal_query')->where('legal_query_type_id', '2')->where('status', 1)->where('deleted_at', NULL)->limit(5)->get();
									foreach ($listLegalGuides as $keyGuides) {
									?>
										<li>
											<a href="<?php echo URL::to('/legalQueryDesc'); ?>?id=<?= $keyGuides->id ?>">{{ucfirst($keyGuides->type_name)}}</a>
										</li>
									<?php } ?>

									<li>
										<a href="<?php echo URL::to('/'); ?>/free-legal-guides" class="btn btn-outline-primary min-w120 mt-4 ">Show All</a>
									</li>

								</ul>


								<!-- this is test legal service -->

								<ul>
									<li class="ul-title">Bare Acts</li>
									<li class="li-border"></li>
									<?php
									$getquerysdatas = DB::table('main_legal_query')->where('legal_query_type_id', '3')->where('status', 1)->where('deleted_at', NULL)->limit(5)->get();
									foreach ($getquerysdatas as $value) {

									?>
										<li><a href="<?php echo URL::to('/legalQueryDesc') ?>?id=<?= $value->id ?>">{{ucfirst($value->type_name)}}</a></li>

									<?php } ?>
									<!-- <li><a href="<?php echo URL::to('/') ?>/indian-kanoon">Indian Kanoon</a></li>
									<li><a href="<?php echo URL::to('/') ?>/new-rules">New Rules</a></li>
									<li><a href="<?php echo URL::to('/') ?>/in-the-media">In The Media</a></li>
									<li><a href="<?php echo URL::to('/') ?>/career">Career</a></li> -->

									<li>
										<a href="<?php echo URL::to('/'); ?>/ask-a-free-question" class="btn btn-outline-primary min-w120 mt-4 ">Show All</a>
									</li>
								</ul>

								<!-- <ul>
									<li class="ul-title">Need Instant Advice</li>
									<li class="li-border"></li>
									<li>
										<a href="<?php echo URL::to('/'); ?>/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk To Lawyer</a>
									</li>
								</ul> -->

							</div>
						</li>
						<!-- legal services -->
						<li class="nav-item legal-services-li" id="advice">
							<a class="nav-link" href="#">Legal Services</a>
							<div class="inner-menu legal-services-menu">
								<div class="row">
									<div class="col-md-6 b-right">
										<h6 class="lititle text-center mr-0">Documentation</h6>
										<div class="row">
											<div class="col-md-12">
												<ul class="w-100">
													<!-- <li class="ul-title">Documentation</li> -->
													<!-- <li class="li-border"></li> -->
													<?php
													$listLegalGuides = DB::table('legal_services')->where('category_id', '2')->where('deleted_at', NULL)->limit(10)->get();


													foreach ($listLegalGuides as $keyGuides) {

													?>
														<li><a href="<?php echo URL::to('/'); ?>/legal-services/{{$keyGuides->slug}}">{{ucfirst($keyGuides->service_name)}}</a></li>
													<?php } ?>

													<li>
														<!-- <a href="<?php echo URL::to('/'); ?>/divorce-legal-services" class="btn btn-outline-primary min-w120 mt-4">More services</a> -->
														<a href="<?php echo URL::to('/'); ?>/all-docs" class="btn btn-outline-primary min-w120 mt-4">More services</a>

													</li>

												</ul>

											</div>
											<div class="col-md-6">


												<ul>
													
													<!-- <li class="ul-title">Legal Notice</li>
													<li class="li-border"></li> -->
													<?php
													/*	$listLegalGuides = DB::table('legal_services')->where('deleted_at', NULL)->where('category_id', '2')->limit(6)->get();


													foreach ($listLegalGuides as $keyGuides) {
														// echo 	$tt = $keyGuides->category_id;	die;
														$tt = $keyGuides->category_id;
														// echo $tt; die;
														$query = DB::table('legal_advice_qa_category')->where('deleted_at', NULL)->where('id', $tt)->get();
														$cat = @$query[0]->slug;
													?>
														<li><a href="<?php echo URL::to('/'); ?>/legal-services/{{$keyGuides->slug}}">{{ucfirst($keyGuides->service_name)}}</a></li>
													<?php } */ ?>

													<!-- <li>
														<a href="<?php echo URL::to('/'); ?>/property-legal-services" class="btn btn-outline-primary min-w120 mt-4">More services</a>
													</li> -->

												</ul>
											</div>
											<div class="col-md-6">




												<ul>
													<!-- <li class="ul-title">Legal Notice</li>
													<li class="li-border"></li> -->
													<?php
													/*	$listLegalGuides = DB::table('legal_services')->where('deleted_at', NULL)->where('category_id', '2')->limit(6)->get();


													foreach ($listLegalGuides as $keyGuides) {
														// echo 	$tt = $keyGuides->category_id;	die;
														$tt = $keyGuides->category_id;
														// echo $tt; die;
														$query = DB::table('legal_advice_qa_category')->where('deleted_at', NULL)->where('id', $tt)->get();
														$cat = $query[0]->slug;
													?>
														<li><a href="<?php echo URL::to('/'); ?>/legal-services/{{$keyGuides->slug}}">{{ucfirst($keyGuides->service_name)}}</a></li>
													<?php } */ ?>

													<!-- <li>

														<a href="<?php echo URL::to('/'); ?>/documentation-legal-services" class="btn btn-outline-primary min-w120 mt-4">More Services</a>
													</li> -->

												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<h6 class="lititle text-center" style="margin-right: 15px">Legal AID</h6>
										<div class="row mr-0">
											<div class="col-md-6">
												<ul>
													<!-- <li class="ul-title">Legal Notice</li>
													<li class="li-border"></li> -->
													<?php
													$listLegalGuides = DB::table('legal_services')->where('deleted_at', NULL)->where('category_id', '1')->limit(6)->get();
													foreach ($listLegalGuides as $keyGuides) {
														// echo $keyGuides->id;
													?>

														<li><a href="<?php echo URL::to('/'); ?>/legal-services/{{$keyGuides->slug}}">{{ucfirst($keyGuides->service_name)}} </a></li>
													<?php  } ?>
													<li>
													<li>
														<a href="<?php echo URL::to('/'); ?>/all-aids" class="btn btn-outline-primary min-w120 mt-4">More Legal Aid</a>
													</li>
												</ul>



											</div>
											<div class="col-md-6">
												<!-- <ul> -->
												<!-- <li class="ul-title">Legal Notice</li>
													<li class="li-border"></li> -->
												<!-- <li><a href="<?php echo URL::to('/') ?>/labour-service-legal-services">Labour and Service</a></li>
													<li><a href="<?php echo URL::to('/') ?>/copyright-patent-trademark-legal-services">Trademark & Copyright</a></li>
													<li><a href="<?php echo URL::to('/') ?>/corporate-legal-services">Corporate</a></li> -->
												<!-- <li><a href="<?php echo URL::to('/') ?>/startup-legal-services">Startup</a></li> -->
												<!-- <li><a href="<?php echo URL::to('/') ?>/supreme-court-legal-services">Supreme Court</a></li>
													<li><a href="<?php echo URL::to('/') ?>/immigration-legal-services">Immigration</a></li> -->
												<!-- </ul> -->
												<ul>
													<!-- <li class="ul-title">Legal Notice</li>
													<li class="li-border"></li> -->
													<?php
													$listLegalGuides = DB::table('legal_services')->where('deleted_at', NULL)->where('category_id', '1')->skip(6)->take(6)->get();

													foreach ($listLegalGuides as $keyGuides) {

													?>
														<li><a href="<?php echo URL::to('/'); ?>/legal-services/{{$keyGuides->slug}}">{{ucfirst($keyGuides->service_name)}}</a></li>
													<?php  } ?>
													<li>

												</ul>


											</div>




										</div>
										<div class="willoughby">

											<img src="<?php echo URL::to('/'); ?>/fronted/images/29225-ai.png">
										</div>
									</div>
								</div>










							</div>
						</li>
						<li class="nav-item" id="about">
							<a class="nav-link" href="<?php echo URL::to('/'); ?>/about-us">About</a>
						</li>
						<!-- legal services -->
						<li class="nav-item">
							<a class="nav-link " id="contact-us" href="<?php echo URL::to('/'); ?>/contact-us">Contact</a>
						</li>
						<!-- <li class="nav-item" id="legalservie">
							<a class="nav-link" href="">LEGAL SERVICE</a>
							<div class="inner-menu">
								<ul>
									<li class="ul-title">Answered Questions</li>
									<li class="li-border"></li>

									<li><a href="<?php echo URL::to('/') ?>/indian-kanoon-detail">Indian Kanoon Detail</a></li>
									<li><a href="<?php echo URL::to('/') ?>/indian-kanoon">Indian Kanoon</a></li>
									<li><a href="<?php echo URL::to('/') ?>/new-rules">New Rules</a></li>
									<li><a href="<?php echo URL::to('/') ?>/in-the-media">In The Media</a></li>
									<li><a href="<?php echo URL::to('/') ?>/career">Career</a></li>

									<li><a href="<?php echo URL::to('/'); ?>/divorce-legal-advice">Divorce Law Queries</a></li>
									<li><a href="<?php echo URL::to('/'); ?>/property-legal-advice">Property Law Queries</a></li>
									<li><a href="<?php echo URL::to('/'); ?>/labourservice-legal-advice">Laybour & Service Queries</a></li>
									<li><a href="<?php echo URL::to('/'); ?>/criminal-legal-advice">Criminal Law Queries</a></li>
									<li><a href="<?php echo URL::to('/'); ?>/consumercourt-legal-advice">Consumer Court Queries</a></li>
									<li>
										<a href="<?php echo URL::to('/'); ?>/free-legal-advice" class="btn btn-outline-primary min-w120 mt-4 mb-4">All Answers</a>

									</li>
								
								</ul>
							</div>
						</li>  -->
					</ul>
				</div>
				<ul class="filter-search" id="filter-search">
					<li class="active">
						<a href="#" id="filterli">
							<img class="default" src="{{asset('fronted/images/svg/filter.svg')}}">
							<img class="active" src="{{asset('fronted/images/svg/filter-active.svg')}}">
						</a>
						<div class="filter-div " id="filter-div" style="display: none;">
							<form method="GET" action="{{URL::to('/')}}/search/lawyer/">
								<h4>Filter By</h4>
								<div class="filter-group">
									<input type="text" name="name">
									<img src="{{asset('fronted/images/svg/feather_search-active.svg')}} ">
								</div>
								<div class="accordion accordion-design" id="accordionExample">
									<div class="card">
										<div class="card-header" id="headingOne">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Court
												</button>
											</h2>
										</div>

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
											<div class="card-body">
												<!-- <div class="chandh">
													<span>Chandhigarh</span>
													<i class="ti-minus"></i>
												</div> -->

												<div class="mini-search">
													<select name="court" class="filter-group select2 sr-drop" id="">
														<option value="">Select court</option>
														@foreach($court as $data)
														<option value="{{$data->id}}">{{$data->name}}</option>
														@endforeach
													</select>
													<!-- <div class="filter-gr">
														<input type="text" name="city" class="">
														<button class="btn">
															<img src="{{asset('fronted/images/svg/feather_search-active.svg')}}"></button>
													</div>
													<ul>
														@foreach($city as $data)
														<li value="{{$data->name}}">{{$data->name}}</li>
														@endforeach
													</ul> -->
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<!-- <div class="card-header" id="headingTwo">
											<h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													Chandhigarh
												</button>
											</h2>
										</div> -->
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
											<div class="card-body">
												Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingThree">
											<h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													Category
												</button>
											</h2>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
											<div class="card-body">
												@php
												$qcategory = DB::table('legal_advice_qa_category')->where('status', 1)->where('type','question')->orderBy('id', 'ASC')->get();
												@endphp
												<select name="category" class="filter-group select2 sr-drop" id="">
													<option value="">Select Category</option>
													@foreach($qcategory as $data)
													<option value="{{$data->id}}">{{$data->category_name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="bottom text-center">
									<button type="submit" class="btn btn-outline-primary">Save</button>
								</div>
							</form>
						</div>
					</li>
					<li>
						<a href="#" id="searchli">
							<img class="default" src="{{asset('fronted/images/svg/feather_search.svg')}}">
							<img class="active" src="{{asset('fronted/images/svg/feather_search-active.svg')}}">
						</a>
						<div class="search-div " id="search-div" style="display: none;">
							<form method="GET" action="{{URL::to('/')}}/search/lawyer/">
								<h4>Search By</h4>
								<div class="filter-group d-flex">
									<input type="text" name="name">
									<img src="{{asset('fronted/images/svg/feather_search-active.svg')}} ">
									<button type="submit" class="btn btn-outline-primary ml-1">Search</button>
								</div>
							</form>
						</div>
					</li>

					<li>
						<div class="dropdown profile-dropdown">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="{{asset('fronted/images/gridicons_user.png')}}">
							</button>
							<div class="dropdown-menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
								<?php if (isset($login) && $login->user_type == '3') { ?>
									<a href="<?php echo URL::to('/') ?>/lawyer/edit-profile" class="dropdown-item"><i class="icon fa fa-user"></i><?php if (isset($login)) {
																																						echo ucfirst($login->name . " " . $login->username);
																																					} else {
																																						echo "";
																																					} ?>
									</a>

									<a class="dropdown-item" href="<?php echo URL::to('/') ?>/logout"><img src="{{asset('fronted/images/svg/signin.svg')}}" alt="icon" class="icon" style="transform: rotate(180deg);">Logout</a>
									<!-- <a class="dropdown-item" href="<?php echo URL::to('/') ?>/lawyer-profile"><img src="{{asset('fronted/images/gridicons_user.png')}}" alt="icon" class="icon" >My Profile</a> -->


								<?php	} elseif (isset($login) && $login->user_type == '2') { ?>
									<a href="<?php echo URL::to('/') ?>/my-account" class="dropdown-item"><i class="icon fa fa-user"></i><?php if (isset($login)) {
																																				echo ucfirst($login->name . " " . $login->username);
																																			} else {
																																				echo "";
																																			} ?>
									</a>

									<a class="dropdown-item" href="<?php echo URL::to('/') ?>/logout"><img src="{{asset('fronted/images/svg/signin.svg')}}" alt="icon" class="icon" style="transform: rotate(180deg);">Logout</a>
									<!-- <a class="dropdown-item" href="<?php echo URL::to('/') ?>/lawyer-profile"><img src="{{asset('fronted/images/gridicons_user.png')}}" alt="icon" class="icon" >My Profile</a> -->


								<?php } else {

								?>
									<a class="dropdown-item" href="<?php echo URL::to('/') ?>/lawyer/register"><i class="icon fa fa-user"></i>Lawyer Signup</a>
									<a class="dropdown-item" href="<?php echo URL::to('/') ?>/register"><i class="icon fa fa-user"></i>User Signup</a>
									<a class="dropdown-item" href="<?php echo URL::to('/') ?>/lawyer/login"><img src="{{asset('fronted/images/svg/signin.svg')}}" alt="icon" class="icon">SignIn</a>
								<?php } ?>

							</div>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="ti-menu"></span>
				</button>
			</nav>
		</div>
	</header>
	<br>
	@if(isset($login['step']) && $login->user_type == '3')
	@if($login['step'] == '0' || $login['step'] == '1' || $login['step'] == '2')
	<div class="container">
		<div class="alert alert-danger text-center" role="alert">
			Please Complete Profile Information
		</div>
	</div>

	@endif
	@endif
	<button type="button" class="btn btn-enquiry sr-enquiry" data-toggle="modal" data-target="#exampleModal">
		<img src="{{URL::to('/')}}/fronted/images/phone-call.png"> <span>Enquiry Now</span>
	</button>
	<!-- modal -->
	<div class="modal fade enquiry-mdal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							<!-- <label for="" style="color: #222;">Name</label><span style="color: red;"> *</span> -->
							<input type="text" name="name" class="form-control border-radius-5px" id="name" aria-describedby="nameHelp" placeholder="Name" autocomplete="off" maxlength="250">
							<span id="name_error" style="color: red;"></span>
						</div>
						<div class="form-group">
							<!-- <label for="" style="color: #222;">Mobile</label><span style="color: red;"> *</span> -->
							<input type="number" name="mobile" class="form-control border-radius-5px" id="mobile" aria-describedby="nameHelp" placeholder="Mobile number" autocomplete="off" maxlength="12">
							<span id="mobile_error" style="color: red;"></span>
						</div>
						<div class="form-group">
							<!-- <label for="" style="color: #222;">Email</label> -->
							<input type="email" name="email" class="form-control border-radius-5px" id="email" aria-describedby="emailHelp" placeholder="Email (Optional)" autocomplete="off" maxlength="250">
							<span id="email_error" style="color: red;"></span>
						</div>
						<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- modal -->