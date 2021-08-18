@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Settings</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-body">
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/settings" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $getsettings->id }}">
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputFirstName">Marketing Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="name" value="{{$getsettings->marketing_name}}" name="marketing_name" aria-describedby="nameHelp" placeholder="Enter First Name">
                                        <span style="color:red;" id="name_error"><?php echo $errors->profile_error->first('name'); ?></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail">Marketing Email</label><span style="color: red;">*</span>
                                        <input type="email" class="form-control" id="email" value="{{$getsettings->marketing_email}}" name="marketing_email" aria-describedby="emailHelp" placeholder="Enter Email Id">
                                        <span style="color:red;" id="email_error"><?php echo $errors->profile_error->first('email'); ?></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputContactNo">Marketing Contact</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" id="mobile" name="marketing_phone" value="{{$getsettings->marketing_phone}}" aria-describedby="numberHelp" placeholder="Enter Contact No">
                                        <span style="color:red;" id="mobile_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                                    </div> -->
                                </div>
                            </div>

                            <!-- Account PayBal -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputFirstName">Accountant Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="accountant_name" value="{{$getsettings->accountant_name}}" name="accountant_name" aria-describedby="nameHelp" placeholder="Enter First Name">
                                        <span style="color:red;" id="accountant_name_error"><?php echo $errors->profile_error->first('name'); ?></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail">Accountant Email</label><span style="color: red;">*</span>
                                        <input type="email" class="form-control" id="accountant_email" value="{{$getsettings->accountant_email}}" name="accountant_email" aria-describedby="emailHelp" placeholder="Enter Email Id">
                                        <span style="color:red;" id="accountant_email_error"><?php echo $errors->profile_error->first('email'); ?></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputContactNo">Accountant Contact</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" id="accountant_mobile" name="accountant_phone" value="{{$getsettings->accountant_phone}}" aria-describedby="numberHelp" placeholder="Enter Contact No">
                                        <span style="color:red;" id="accountant_mobile_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                                    </div> -->
                                </div>
                            </div>


                            <!-- Hr Contact -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputFirstName">Hr Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="hr_name" name="hr_name" value="{{$getsettings->hr_name}}" aria-describedby="nameHelp" placeholder="Enter First Name">
                                        <span style="color:red;" id="hr_name_error"><?php echo $errors->profile_error->first('name'); ?></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail">Hr Email</label><span style="color: red;">*</span>
                                        <input type="email" class="form-control" id="hr_email" name="hr_email" value="{{$getsettings->hr_email}}" aria-describedby="emailHelp" placeholder="Enter Email Id">
                                        <span style="color:red;" id="hr_email_error"><?php echo $errors->profile_error->first('email'); ?></span>
                                    </div> -->
                                </div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        <label for="exampleInputContactNo">Hr Contact</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" id="hr_mobile" name="hr_phone" value="{{$getsettings->hr_phone}}" aria-describedby="numberHelp" placeholder="Enter Contact No">
                                        <span style="color:red;" id="hr_mobile_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                                    </div> -->
                                </div>
                            </div>

                            <!--opning settings  -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Opning Days</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="opning_day" name="opning_day" value="{{$getsettings->opning_day}}" aria-describedby="nameHelp" placeholder="Enter Opning Days">
                                        <span style="color:red;" id="opning_day_error"><?php echo $errors->profile_error->first('name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Opning Hours</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="opning_hours" name="opning_hours" value="{{$getsettings->opning_hours}}" aria-describedby="emailHelp" placeholder="Enter Opning Hours">
                                        <span style="color:red;" id="opning_hours_error"><?php echo $errors->profile_error->first('email'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Address</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address">{{$getsettings->address}}</textarea>
                                        <span style="color:red;" id="address_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Support Email</label><span style="color: red;">*</span>
                                        <input type="email" class="form-control" id="support_email" name="support_email" value="{{$getsettings->support_email}}" aria-describedby="emailHelp" placeholder="Enter Support Email Id">
                                        <span style="color:red;" id="support_email_error"><?php echo $errors->profile_error->first('email'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Support Contact</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" id="support_mobile" name="support_phone" value="{{$getsettings->support_phone}}" aria-describedby="numberHelp" placeholder="Enter Support Contact No">
                                        <span style="color:red;" id="support_mobile_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@include('admin/include/footer')
<script>
    $(document).ready(function() {

        // $('#setting_menu').addClass('nav-item active');
        // $('#master_menu').addClass('nav-link active');
        // $('#master_open').addClass('menu-open active');


        $('#category_menu').addClass('nav-item active');
        $('#categorymaster_menu').addClass('nav-link active');
        $('#categorymaster_open').addClass('menu-open active');

        $('#settings').addClass('active mm-active');
    });
</script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        // var name = $('#name').val();
        // var email = $('#email').val();
        // var mobile = $('#mobile').val();

        // var accountant_name = $('#accountant_name').val();
        // var accountant_email = $('#accountant_email').val();
        // var accountant_mobile = $('#accountant_mobile').val();

        // var hr_name = $('#hr_name').val();
        // var hr_email = $('#hr_email').val();
        // var hr_mobile = $('#hr_mobile').val();

        var opning_day = $('#opning_day').val();
        var opning_hours = $('#opning_hours').val();
        var address = $('#address').val();

        var support_email = $('#support_email').val();
        var support_mobile = $('#support_mobile').val();



        var cnt = 0;
        var f = 0;

        // $('#accountant_name_error').html("");
        // $('#accountant_email_error').html("");
        // $('#accountant_mobile_error').html("");

        // $('#name_error').html("");
        // $('#email_error').html("");
        // $('#mobile_error').html("");

        // $('#hr_name_error').html("");
        // $('#hr_email_error').html("");
        // $('#hr_mobile_error').html("");

        $('#opning_day_error').html("");
        $('#opning_hours_error').html("");
        $('#address_error').html("");
        $('#support_email_error').html("");
        $('#support_mobile_error').html("");




        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        // opning day-hours

        if (opning_day.trim() == '') {
            $('#opning_day_error').html("Please enter Opning Day");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#opning_day').focus();
            }
        }

        if (opning_hours.trim() == '') {
            $('#opning_hours_error').html("Please enter Opning Hours");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#opning_hours').focus();
            }
        }

        if (address.trim() == '') {
            $('#address_error').html("Please enter Address");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#address').focus();
            }
        }

        if (support_email.trim() == '') {
            $('#support_email_error').html("Please enter Email");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#support_email').focus();
            }
        }

        function support_ValidateEmail(support_email) {
            var expr =
                /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            return expr.test(support_email);
        };

        if (support_email) {
            if (!support_ValidateEmail(support_email)) {
                $('#support_email_error').html("Please enter valid email");
                cnt = 1;
                f++;
                if (f == 1) {
                    $('#support_email').focus();
                }
            }
        }

        if (support_mobile.trim() == '') {
            $('#support_mobile_error').html("Please enter Mobile No");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#support_mobile').focus();
            }
        }
        if (support_mobile.length > 12) {
            $('#support_mobile_error').html("Please enter Valid Mobile ");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#support_mobile').focus();
            }
        }

        //opning 


        // if (name.trim() == '') {
        //     $('#name_error').html("Please enter Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#name').focus();
        //     }
        // }
        // if (email.trim() == '') {
        //     $('#email_error').html("Please enter Email");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#email').focus();
        //     }
        // }

        // function ValidateEmail(email) {
        //     var expr =
        //         /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        //     return expr.test(email);
        // };

        // if (email) {
        //     if (!ValidateEmail(email)) {
        //         $('#email_error').html("Please enter valid email");
        //         cnt = 1;
        //         f++;
        //         if (f == 1) {
        //             $('#email').focus();
        //         }
        //     }
        // }

        // if (mobile.trim() == '') {
        //     $('#mobile_error').html("Please enter Mobile No");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#mobile').focus();
        //     }
        // }
        // if (mobile.length > 12) {
        //     $('#mobile_error').html("Please enter Valid Mobile ");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#mobile').focus();
        //     }
        // }


        // Marketing
        // if (accountant_name.trim() == '') {
        //     $('#accountant_name_error').html("Please enter Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#accountant_name').focus();
        //     }
        // }
        // if (accountant_email.trim() == '') {
        //     $('#accountant_email_error').html("Please enter Email");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#accountant_email').focus();
        //     }
        // }

        // function accountant_ValidateEmail(accountant_email) {
        //     var expr =
        //         /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        //     return expr.test(accountant_email);
        // };

        // if (accountant_email) {
        //     if (!accountant_ValidateEmail(accountant_email)) {
        //         $('#accountant_email_error').html("Please enter valid email");
        //         cnt = 1;
        //         f++;
        //         if (f == 1) {
        //             $('#accountant_email').focus();
        //         }
        //     }
        // }

        // if (accountant_mobile.trim() == '') {
        //     $('#accountant_mobile_error').html("Please enter Mobile No");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#accountant_mobile').focus();
        //     }
        // }
        // if (accountant_mobile.length > 12) {
        //     $('#accountant_mobile_error').html("Please enter Valid Mobile ");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#accountant_mobile').focus();
        //     }
        // }

        //Marketing

        //HR
        // if (hr_name.trim() == '') {
        //     $('#hr_name_error').html("Please enter Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#hr_name').focus();
        //     }
        // }
        // if (email.trim() == '') {
        //     $('#hr_email_error').html("Please enter Email");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#hr_email').focus();
        //     }
        // }

        // function hr_ValidateEmail(hr_email) {
        //     var expr =
        //         /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        //     return expr.test(hr_email);
        // };

        // if (hr_email) {
        //     if (!hr_ValidateEmail(hr_email)) {
        //         $('#hr_email_error').html("Please enter valid email");
        //         cnt = 1;
        //         f++;
        //         if (f == 1) {
        //             $('#hr_email').focus();
        //         }
        //     }
        // }

        // if (hr_mobile.trim() == '') {
        //     $('#hr_mobile_error').html("Please enter Mobile No");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#hr_mobile').focus();
        //     }
        // }
        // if (hr_mobile.length > 12) {
        //     $('#hr_mobile_error').html("Please enter Valid Mobile ");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#hr_mobile').focus();
        //     }
        // }
        //HR


        if (cnt == 1) {
            return false;
        } else {
            return true;
        }


    })
</script>