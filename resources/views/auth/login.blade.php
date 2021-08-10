<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Legal Bench | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo URL::to('/'); ?>/assets/img/lb final logo.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style type="text/css">
        .sa-btn-signin {
            width: 100px;
            font-size: 17px;
            background-color: #bc9d6c;
            border: #bc9d6c;
            border-radius: 5px;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="sa-login-form">
        <div class="row m-0">
            <div class="col-6 p-0">
                <div class="sa-bg-login"></div>
            </div>

            <div class="col-6 p-0">
                <div class="hold-transition login-page sa-login-bgcolor">
                    <div class="login-box">

                        <img src="{{asset('fronted/images/logo.png')}}" alt="AdminLTE Logo" class="brand-link lg-image-rounded">

                        <div class="card">
                            <div class="card-body login-card-body">
                                <div class="sa-text-heading">
                                    <h2 class="text-center">Login</h2>
                                </div>
                                <p class="login-box-msg">Sign in to start your session</p>

                                <form method="post" id="main_id" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="color:red" id="email_error"></span>
                                    <div class="input-group mb-3">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="color:red" id="password_error"></span>
                                    @if(Session::has('error'))
                                    <span style="color:red" id=""><?php echo Session::get('error') ?></span>
                                    @endif
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit" class="sa-btn-signin btn-block p-2">Sign In</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <!-- /.social-auth-links -->

                                <p class="mb-1">
                                    <a href="<?php echo URL::to('/'); ?>/forgot-password">Forgot Password</a>
                                </p>
                            </div>
                            <!-- /.login-card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script href="<?php echo URL::to('/'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- <script href="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script> -->
    <!-- Bootstrap 4 -->
    <script href="<?php echo URL::to('/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script href="<?php echo URL::to('/'); ?>/assets/js/adminlte.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // function checkvalidation() {
$('#main_id').submit(function (e) {

            // alert('vvvv');

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

        // }
	})

    </script>
</body>

</html>