<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Legal Bench | Lawyer Login</title>
	  <meta charset="utf-8">
      <link rel="icon" href="<?php echo URL::to('/'); ?>/fronted/images/favicon.png" type="image/png" sizes="16x16">
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
	<section class="signin-section">
		<div class="themis-figurine-stands">
			<img src="{{asset('fronted/images/themis-figurine-stands-white-wooden-table-stack-old-books-scales-law-lawyer-business-concept-image 1.png')}}" class="themis-figurine">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col1">					
					<!-- <a href="<?php echo URL::to('/'); ?>/"><img src="{{asset('fronted/images/small-logo.png')}}" class="small-logo"></a> -->
					<div class="mid">
						<div class="sa-small-logocenter">
							<a href="<?php echo URL::to('/'); ?>/"><img src="{{asset('fronted/images/small-logo.png')}}" class="small-logo sa-small-logo"></a>
						</div>
						<h3>Get your justice </h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>				
					</div>
					<div class="bottom">
						<ul class="social">
						<li><a href="https://twitter.com/?lang=en" target="_blank"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="https://www.facebook.com/" target="_blank"><i class="ti-facebook"></i></a></li>
							<li><a href="https://www.linkedin.com/" target="_blank"><i class="ti-linkedin"></i></a></li>
						</ul>

					</div>
				</div>
				<div class="col-md-6 col2">
					<div class="top">
						<div class="inner">
							<a href="<?php echo URL::to('/'); ?>/">
							<img src="{{asset('fronted/images/logo.png')}}" alt="big-logo" class="big-logo"></a>
							<!-- <ul class="social-icon">
								<li><a href="#" target="_blank"><img src="{{asset('fronted/images/icon/entypo-social_facebook.png')}}"></a></li>
								<li><a href="#" target="_blank"><img src="{{asset('fronted/images/icon/icomoon-free_google-plus2.png')}}"></a></li>
								<li><a href="#" target="_blank"><img src="{{asset('fronted/images/icon/Group.png')}}"></a></li>
							</ul>
							<p>or use your email account</p> -->
							<div class="form">
								<form method="POST" action="<?php echo URL::to('/'); ?>/lawyer/login" id="main_id">
									@csrf
									<div class="form-group mb-3">
								    	<input type="email" class="form-control without-border border-radius-5px" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" autocomplete="off">
										<span id="email_error" style="color: red;"><?php echo $errors->email_error->first('email'); ?></span>
									</div>
								    <div class="form-group mb-3">
										<input type="password" id="password" name="password" class="form-control without-border border-radius-5px" placeholder="Password">
										<span id="password_error" style="color: red;"></span>
										
								    </div>
								    <div class="form-group mb-3 text-right">
								    	<a href="<?php echo URL::to('/') ?>/lawyer/forgot-password" class="forgot-password">Forgot password?</a>
								    </div>
								    <div class="text-center pt-3">
								    	<!-- <button type="button" class="btn btn-gradient">Sign In</button> -->
								    	<button type="submit"  class="btn btn-gradient">Sign In</button>
								    </div>
							    </form>
							</div>
						</div>
					</div>
					<div class="bottom">
						<a href="<?php echo URL::to('/') ?>/lawyer/register">I Need to Signup</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
<script src="{{asset('fronted/js/jquery.min.js')}}"></script>
<script src="{{asset('fronted/js/popper.min.js')}}"></script>
<script src="{{asset('fronted/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronted/js/select2.min.js')}}"></script>
<script src="{{asset('fronted/js/owl.carousel.js')}}"></script>
<script src="{{asset('fronted/js/custom.js')}}"></script>
<script src="{{asset('fronted/js/toastr.min.js')}}"></script>
<script> $(".select2").select2({ minimumResultsForSearch: -1});</script>
</script>
@if(Session::has('success'))
<script>
toastr.success('<?php echo Session::get('success') ?>', '', {timeOut: 5000});
</script>
@endif

@if(Session::has('error'))
<script>
toastr.error('<?php echo Session::get('error') ?>', '', {timeOut: 5000});
</script>
@endif
<script>
	$('#main_id').submit(function(e) {

		var email = $('#email').val();
		var password = $('#password').val();

		var cnt = 0;
		var f = 0;

		$('#email_error').html("");
		$('#password_error').html("");


		function ValidateEmail(email) {
			var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			return expr.test(email);
		};
		

		if (email.trim() == '') {
			$('#email_error').html("Please enter Email");
			cnt = 1;
			f++;
			if (f == 1) {
				$('#email').focus();
			}
		}

		if (!ValidateEmail(email)) {
			$('#email_error').html("Please enter Valid Email");
			cnt = 1;
			f++;
			if (f == 1) {
				$('#email').focus();
			}
		}

		if (password.trim() == '') {
			$('#password_error').html("Please enter Password");
			cnt = 1;
			f++;
			if (f == 1) {
				$('#password').focus();
			}
		}

		if (cnt == 1) {
			return false;
		} else {
			return true;
		}

	})
</script>
</html>
