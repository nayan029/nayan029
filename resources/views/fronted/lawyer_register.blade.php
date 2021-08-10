<!DOCTYPE html>
<html lang="en">

<head>
	<title>Legal Bench | Lawyer Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo URL::to('/'); ?>/fronted/images/favicon.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="<?php echo URL::to('/'); ?>/fronted/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL::to('/'); ?>/fronted/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo URL::to('/'); ?>/fronted/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo URL::to('/'); ?>/fronted/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo URL::to('/'); ?>/fronted/css/style.css">
	<link rel="stylesheet" href="<?php echo URL::to('/'); ?>/fronted/css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<section class="signin-section before-border">
		<div class="themis-figurine">
			<img src="<?php echo URL::to('/'); ?>/fronted/images/Rectangle101.png" class="themis">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col1">
				
					<div class="mid">
						<div class="sa-small-logocenter">
							<a href="<?php echo URL::to('/'); ?>/"><img src="{{asset('fronted/images/small-logo.png')}}" class="small-logo sa-small-logo"></a>
						</div>
						<h3>Get your justice </h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
					<div class="bottom">
						<ul class="social">
							<li><a href="#" target="_blank"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#" target="_blank"><i class="ti-facebook"></i></a></li>
							<li><a href="#" target="_blank"><i class="ti-linkedin"></i></a></li>
						</ul>

					</div>
				</div>
				<div class="col-md-6 col2">
					<div class="top">
						<div class="inner">
							<h4>Create an Account</h4>
							<ul class="social-icon">
								<li><a href="#" target="_blank"><img src="<?php echo URL::to('/'); ?>/fronted/images/icon/w-entypo-social_facebook.png"></a></li>
								<li><a href="#" target="_blank"><img src="<?php echo URL::to('/'); ?>/fronted/images/icon/w-icomoon-free_google-plus2.png"></a></li>
								<li><a href="#" target="_blank"><img src="<?php echo URL::to('/'); ?>/fronted/images/icon/w-in.png"></a></li>
							</ul>
							<div class="round-line"><span></span></div>

							<div class="form">
								<form method="POST" action="<?php echo URL::to('/'); ?>/lawyer/register" id="main_id">
									@csrf
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control without-border border-radius-5px" placeholder="Firstname" id="name" name="name">
												<span id="name_error" style="color: red;"></span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control without-border border-radius-5px" placeholder="Lastname" id="username" name="username">
												<span id="username_error" style="color: red;"></span>

											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="email" class="form-control without-border border-radius-5px" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" autocomplete="off">
												<span id="email_error" style="color: red;"><?php echo $errors->email_error->first('email'); ?></span>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="password" class="form-control without-border border-radius-5px" name="password" id="password" placeholder="Password">
												<span id="password_error" style="color: red;"></span>
											</div>
										</div>
										<div class="col-md-12 form-group">
											<div class="pm-check">
												<input class="form-check-input" name="checkbox" type="checkbox" value="check" id="defaultCheck1">
												<span class="real-checkbox"></span>
												<label class="form-check-label" for="defaultCheck1">
													I agree to legal bench terms of use.
												</label>
											</div>
										</div>
									</div>

									<div class="text-center">
										<button id="reg_btn" onclick=" if(!this.form.checkbox.checked){ alert('You must agree to the terms first.');return false;}" type="submit" class="btn btn-gradient btn-outline-primary sign-up">Sign Up</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="bottom">
						<span class="alr">Already Signed Up? Go ahead and</span>
						<a href="<?php echo URL::to('/') ?>/lawyer/login">SignIn</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel" style="color: #000;">Terms & condition</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="container">
					<div class="modal-body">
						<p style="color: #000;">
							Some text to enable scrolling.. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

							Some text to enable scrolling.. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</p>
					</div>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?php echo URL::to('/'); ?>/fronted/js/jquery.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/fronted/js/popper.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/fronted/js/bootstrap.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/fronted/js/select2.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/fronted/js/owl.carousel.js"></script>
<script src="<?php echo URL::to('/'); ?>/fronted/js/custom.js"></script>
<script src="<?php echo URL::to('/'); ?>/fronted/js/toastr.min.js"></script>
<script>
	$(".select2").select2({
		minimumResultsForSearch: -1
	});
</script>
</script>
@if(Session::has('success'))
<script>
	toastr.success('<?php echo Session::get('success') ?>', '', {
		timeOut: 5000
	});
</script>
@endif

@if(Session::has('error'))
<script>
	toastr.error('<?php echo Session::get('error') ?>', '', {
		timeOut: 5000
	});
</script>
@endif
<script>
	$('#main_id').submit(function(e) {

		var type = 3;
		var name = $('#name').val();
		var username = $('#username').val();
		var email = $('#email').val();
		var password = $('#password').val();

		var cnt = 0;
		var f = 0;

		$('#name_error').html("");
		$('#username_error').html("");
		$('#email_error').html("");
		$('#password_error').html("");

		function uniqueEmailCheck(email) {
			response = false;
			$.ajax({
				url: "<?php echo URL::to('/getexitemailusers'); ?>",
				'async': false,
				'type': "POST",
				'global': false,
				'dataType': 'html',
				data: {
					email: email,
					type: type,
					'_token': '<?php echo csrf_token(); ?>'
				},
				success: function(msg) {
					// return msg;
					var jsonData = JSON.parse(msg);
					// console.log(jsonData)
					if (msg == 1) {
						$('#email_error').html("This Email is Already exist.");
						response = true;
					} else {
						$("#email_error").html("");
						response = false;

					}
				},
				error: function(jqXHR, textStatus) {
					$("#email_error").html("");
					response = false;
				}
			});
			return response;
		}

		function ValidateEmail(email) {
			var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			return expr.test(email);
		};
		if (uniqueEmailCheck(email) == true) {
			$('#email_error').html("This Email is Already exist.");
			cnt = 1;
			f++;
			if (f == 1) {
				$('#email').focus();
			}
		}

		if (name.trim() == '') {
			$('#name_error').html("Please enter Name");
			cnt = 1;
			f++;
			if (f == 1) {
				$('#name').focus();
			}
		}
		if (username.trim() == '') {
			$('#username_error').html("Please enter Username");
			cnt = 1;
			f++;
			if (f == 1) {
				$('#username').focus();
			}
		}

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
		var number = /([0-9])/;
		var alphabets = /([a-zA-Z])/;
		var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

		if (password) {
			if (password.length < 8) {
				$('#password_error').html("Password should be atleast 8 characters");
				cnt = 1;
			} else {
				if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {

				} else {
					$('#password_error').html(
						"Must contain min. 8 characters with at least 1 number and 1 special character");
					cnt = 1;
				}
			}
		}

		if (cnt == 1) {
			return false;
		} else {
			$("#reg_btn").html("Loading...");
			$(':input[type="submit"]').prop('disabled', true);
			return true;

		}

	})
</script>
<script>
	$(document).ready(function() {
		$('input[name="checkbox"]').on('change', function(e) {
			// console.log('ttt')
			if (e.target.checked) {
				$('#exampleModal').modal();
			} else {
				// console.log('ddd')
				$('#exampleModal').modal('hide');
			}

		});
	});
</script>

</html>