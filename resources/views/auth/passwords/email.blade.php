<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Legal Bench | Forgot Password</title>
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
    .sa-btn-forgot {
        font-size: 17px;
        background-color: #bc9d6c;
        border: #bc9d6c;
        border-radius: 5px;
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="sa-forgot-form">
        <div class="row m-0">
            <div class="col-6 p-0">
                <div class="sa-bg-login"></div>
            </div>
            <div class="col-6 p-0">
                <div class="hold-transition login-page sa-login-bgcolor">
                    <div class="login-box">

                        <img src="{{asset('fronted/images/logo.png')}}" alt="AdminLTE Logo"
                            class="brand-link lg-image-rounded">

                        <div class="card">
                            <div class="card-body login-card-body">
                                <div class="sa-text-heading">
                                    <h3 class="text-center">Forgot Password</h3>
                                </div>
                                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new
                                    password.</p>
                                    <!-- action="{{ route('password.email') }}" -->
                                    <form method="POST" id="main_id" action="<?php echo URL::to('/')?>/verify-email" class="form-horizontal auth-form my-4">
										@csrf
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if(Session::has('error'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
                                        @endif
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="color: red;" id="email_error"></span>
                                    <div class="row">
                                        <div class="col-12">
                                            <button  type="submit"   
                                                class="sa-btn-forgot btn-block p-2">
                                                {{ __('Send Password Reset Link') }}

                                            </button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <p class="mt-3 mb-1">
                                    <a href="{{route('login')}}">Login</a>
                                </p>
                            </div>
                            <!-- /.login-card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo URL::to('/'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL::to('/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL::to('/'); ?>/assets/js/adminlte.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
<script>
$('#main_id').submit(function (e) {



    //$(':input[type="submit"]').prop('disabled', true);
    var email = $('#email').val();
    // alert(email)
    var cnt = 0;

    $('#email_error').html("");


    function ValidateEmail(email) {
        var expr =
            /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };


    if (email.trim() == '') {
        $('#email_error').html("Please enter Email");
        $('#email').focus();
        cnt = 1;
    }

    if (email) {
        if (!ValidateEmail(email)) {
            $('#email_error').html("Please enter Valid Email");
            cnt = 1;

        }
    }

    if (cnt == 1) {
        // $(':input[type="submit"]').prop('disabled', false);
        return false;
    } else {
        return true;
    }
	})

</script>