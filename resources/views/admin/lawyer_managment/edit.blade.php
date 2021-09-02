@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Lawyer Edit</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/manage-lawyer">Manage Lawyer</a></li>
                        <li class="breadcrumb-item">Lawyer Edit</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/manage-lawyer/{{$lawyerdata->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Lawyer Name</label><span style="color: red;">*</span>
                                        <input type="name" maxlength="20" class="form-control" id="name" value="@if(isset($lawyerdata->name)){{$lawyerdata->name}}@endif" name="name" aria-describedby="nameHelp" placeholder="Enter First Name">
                                        <span style="color:red;" id="name_error"><?php echo $errors->name_error->first('name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email Id</label><span style="color: red;">*</span>
                                        <input readonly type="email" maxlength="250" class="form-control" id="email" name="email" value="@if(isset($lawyerdata->email)){{$lawyerdata->email}}@endif" aria-describedby="emailHelp" placeholder="Enter Email Id">
                                        <span style="color:red;" id="email_error"><?php echo $errors->email_error->first('email'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Contact No</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" id="mobile" value="@if(isset($lawyerdata->mobile)){{$lawyerdata->mobile}}@endif" name="phone" aria-describedby="numberHelp" placeholder="Enter Contact No">
                                        <span style="color:red;" id="mobile_error"><?php echo $errors->mobile_error->first('mobile'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Profile Pic</label><span style="color: red;">*</span>
                                        <input type="file" class="form-control" id="image" name="profileimage" aria-describedby="nameHelp" placeholder="User Profile">
                                        <span style="color:red;" id="image_error"><?php echo $errors->customer_error->first('company_logo'); ?></span>
                                    </div>
                                </div>
                                @if(isset($lawyerdata->profileimage))
                                <!-- {{$lawyerdata->profileimage}} -->
                                <img style="border: 1px solid #ccc;" width="58px" height="58px" src="{{URL::to('/')}}/uploads/lawyerprofile/{{$lawyerdata->profileimage}}" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                @else
                                <img style="border: 1px solid #ccc;" width="58px" height="58px" src="{{URL::to('/')}}/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                @endif
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">DOB </label><span style="color: red;">*</span>
                                        <input type="date" class="form-control" id="dob" name="ldob" value="{{$lawyerdata->ldob}}">
                                        <span style="color:red;" id="dob_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Experience</label><span style="color: red;">*</span>
                                        <input type="name" maxlength="20" class="form-control" id="experience" name="experience" value="@if(isset($lawyerdata->experience)) {{ $lawyerdata->experience}} @endif" placeholder="Enter experience ">
                                        <span style="color:red;" id="experience_error"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Practice areas</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="about_data" name="about" placeholder=" please enter practice area">@if(isset($lawyerdata->about)) {{ $lawyerdata->about}} @endif</textarea>
                                        <span style="color:red;" id="about_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Specialization</label><span style="color: red;">*</span>
                                        <select name="category[]" id="specialization" class="form-control sa-form-font half-border-radius">
                                            <option value="">Select Specialization</option>
                                            @foreach ($category as $data)
                                            <option @if(in_array($data->id, $user_category)) {{"selected"}} @endif value="{{$data->id}}">{{ucfirst($data->category_name)}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red;" id="specialization_error"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction"> Degree Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="degreename" name="degreename" value='@if(isset($lawyerdata->frollno)){{$lawyerdata->frollno}}@endif' placeholder="please enter degree name">
                                        <br>
                                        @if(isset($lawyerdata->srollno))
                                        <input type="text" class="form-control" id="sdegreename" name="sdegreename" value='@if(isset($lawyerdata->srollno)){{$lawyerdata->srollno}}@endif' placeholder="second year">
                                        @endif
                                        <span style="color:red;" id="degree_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Year</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="20" class="form-control" id="year" name="year" value='@if(isset($lawyerdata->fyear)){{$lawyerdata->fyear}}@endif' placeholder="year">
                                        <br>
                                        @if(isset($lawyerdata->syear))
                                        <input type="text" class="form-control" id="syear" name="syear" value='@if(isset($lawyerdata->syear)){{$lawyerdata->syear}}@endif' placeholder="second year">
                                        @endif
                                        <span style="color:red;" id="year_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Institution</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="institution" name="institution" value='@if(isset($lawyerdata->finstitue)){{$lawyerdata->finstitue}}@endif' placeholder="first institute">
                                        <br>
                                        @if(isset($lawyerdata->sinstitue))
                                        <input type="text" class="form-control" id="sinstitution" name="sinstitution" value='@if(isset($lawyerdata->sinstitue)){{$lawyerdata->sinstitue}}@endif' placeholder="first institute">
                                        @endif
                                        <span style="color:red;" id="institution_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Price</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="price" name="price" value="@if(isset($lawyerdata->price)){{$lawyerdata->price}} @endif" placeholder="confirm password">
                                        <span style="color:red;" id="price_error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 sa-pb">

                                    <div class="form-group">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Courts</label>
                                        <div class="row sr-pad1">
                                            @foreach ($court as $data)
                                            <div class="col-md-4">
                                                <div class="pm-check " id="courtcheck">
                                                    <input class="form-check-input court" @if(in_array($data->id, $user_court)) {{"checked"}} @endif name="court[]" type="checkbox" value="{{$data->id}}" id="{{ $data->name}}">
                                                    <span class="real-checkbox"></span>
                                                    <label class="form-check-label" for="{{$data->name}}">
                                                        {{$data->name}}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                        <span id="court_error" style="color:red"></span>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12 sa-pb">
                                    <label for="inputName" class="form-label sa-color2 sa-label"> Language</label>

                                    <div class="d-flex">
                                        <div class="pm-check pr-3 mr-2">
                                            <input class="form-check-input language" <?php if (in_array("english", $user_language)) {
                                                                                            echo "checked";
                                                                                        } ?> name="language[]" type="checkbox" value="english" id="one">
                                            <span class="real-checkbox"></span>
                                            <label class="form-check-label  sa-label" for="one">
                                                English
                                            </label>
                                        </div>
                                        <div class="pm-check ">
                                            <input class="form-check-input language" <?php if (in_array("hindi", $user_language)) {
                                                                                            echo "checked";
                                                                                        } ?> name="language[]" type="checkbox" value="hindi" id="two">
                                            <span class="real-checkbox"></span>
                                            <label class="form-check-label  sa-label" for="two">
                                                Hindi
                                            </label>
                                        </div>
                                    </div>
                                    <span id="language_error" style="color: red;"></span>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <a href="<?php echo URL::to('/') ?>/admin/manage-lawyer"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>

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

        $('#lawyer_menu').addClass('nav-item active');
        $('#manage_lawyer').addClass('active mm-active');

    });
</script>
<script>
    $('#main_form').submit(function(e) {

        var about = $('#about_data').val();
        // var length = $("#courtcheck input[type=checkbox]:checked").length;
        // var category = $("#catcheck input[type=checkbox]:checked").length;


        var experience = $('#experience').val();
        var language = $('#language').val();
        var location = $('#location').val();
        var court = $('#court').val();
        var specialization = $("#specialization").val();
        var price = $("#price").val();

        var mobile = $('#mobile').val();

        var degreename = $('#degreename').val();
        var year = $('#year').val();
        var institution = $('#institution').val();
        var image = $('#image').val();




        // alert(specialization)

        var cnt = 0;
        var f = 0;

        $('#court_error').html();
        $('#experience_error').html("");
        $('#about_error').html("");
        $('#specialization_error').html("");
        $('#price_error').html("");

        $('#degree_error').html("");
        $('#year_error').html("");
        $('#institution_error').html("");

        $('#sdegree_error').html("");
        $('#syear_error').html("");
        $('#sinstitution_error').html("");


        // if (image.trim() == '') {
        //     $('#image_error').html("Please select Pictures");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#image').focus();
        //     }
        // }

        // if (image) {
        //     var formData = new FormData();
        //     var file = document.getElementById('image').files[0];
        //     // var image = $('#image').val();
        //     formData.append("Filedata", file);
        //     var t = file.type.split('/').pop().toLowerCase();
        //     if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        //         $('#image_error').html("Only JPG, PNG and JPEG image are allowed");
        //         cnt = 1;
        //     }
        // }
        if (specialization.trim() == '') {
            $("#specialization_error").html("Please select specialization");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#specialization').focus();
            }
        } else {
            $("#specialization_error").html("");
        }
        if (experience.trim() == '') {
            $('#experience_error').html("Please enter experience");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#experience').focus();
            }
        }

        if (about.trim() == '') {
            $('#about_error').html("Please enter practice area");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#about_data').focus();
            }
        }
        if (mobile.trim() == '') {
            $('#mobile_error').html("Please enter mobile no");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#mobile').focus();
            }
        }


        if (price.trim() == '') {
            $('#price_error').html("Please enter price");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#price').focus();
            }
        }

        if (degreename.trim() == '') {
            $('#degree_error').html("Please enter degree name");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#degreename').focus();
            }
        }

        if (year.trim() == '') {
            $('#year_error').html("Please enter year");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#year').focus();
            }
        }

        if (institution.trim() == '') {
            $('#institution_error').html("Please enter institution name");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#institution').focus();
            }
        }

        if (cnt == 1) {
            return false;
        } else {
            // $("#reg_btn").html("Loading...");
            // $(':input[type="submit"]').prop('disabled', true);
            return true;
        }

        // }
    })
</script>