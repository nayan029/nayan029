@include('fronted/include/header')
<div class="sa-enroll-details pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row pro-sidesec">
                    <div class="col-md-12 d-flex">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                @if(isset($user_login->profileimage))
                                <div id="imagePreview" style="background-image: url( {{URL::to('/')}}/uploads/lawyerprofile/{{$user_login->profileimage}});">
                                    @else
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="text-center nametxt">
                                <p class="sa-color2 mb-1">@if(isset($user_login->lname)){{$user_login->lname}}@else{{"N/A"}}@endif</p>
                                <p class="mb-1">@if(isset($user_login->nicno)){{$user_login->nicno}}@else{{"N/A"}}@endif</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <div class=" sr-pro-card">
                                    <p class="sa-color2 sr-ed-sec">Email</p>
                                    <p class="fs-14px">@if(isset($user_login->email)){{$user_login->email}}@else{{"N/A"}}@endif</p>
                                </div>
                                <div class="sr-pro-card">
                                    <p class="sa-color2 sr-ed-sec">Contact</p>
                                    <p class="fs-14px">@if(isset($user_login->mobile)){{$user_login->mobile}}@else{{"N/A"}}@endif</p>
                                </div>
                                <!-- <div class="sr-pro-card">
                                    <p class="sa-color2 sr-ed-sec">Nationality</p>
                                    <p class="fs-14px">@if(isset($user_login->nationality)){{$user_login->nationality}}@else{{"N/A"}}@endif </p>
                                </div> -->
                                <div class="sr-pro-card">
                                    <p class="sa-color2 sr-ed-sec">DOB</p>
                                    <p class="fs-14px">@if(isset($user_login->ldob)){{date("d-M-Y ", strtotime($user_login->ldob)) }}@else{{"N/A"}}@endif</p>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>
                <div class="col-md-8">
                    <div class="sa-pills-design sr-pillmain">
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" id="pills-pro-personal-tab" data-toggle="pill" href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="true">Personal Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#pills-special" role="tab" aria-controls="pills-special" aria-selected="false">Change Password</a>
                            </li>
                        </ul>
                    </div>
                    <!-- tab1 -->
                    <form action="{{URL::to('/')}}/lawyer/edit-profile/{{$user_login->id}}" method="POST" enctype="multipart/form-data" id="main_id">
                        @csrf
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade active show" id="pills-personal" role="tabpanel" aria-labelledby="pills-pro-personal-tab">
                                <div class="row">
                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Experience</label>
                                        <input type="text" name="experience" class="form-control sa-form-font half-border-radius" id="experience" value='@if(isset($user_login->experience)){{$user_login->experience}}@else{{"N/A"}}@endif' placeholder="Enter Experience">
                                        <span id="experience_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Location</label>
                                        <input type="text" name="location" class="form-control sa-form-font half-border-radius" id="location" placeholder="Enter your Location" value='@if(isset($user_login->location)){{$user_login->location}}@else{{"N/A"}}@endif'>
                                        <span id="location_error" style="color: red;"></span>

                                    </div>
                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Courts</label>
                                        <select class="form-select sa-form-font border-radius-5px" name="court" id="court">
                                            <option selected="">Select your Court</option>
                                            @foreach($court as $data)
                                            <option value="3">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="court_error" style="color: red;"></span>

                                    </div>
                                    <div class="col-lg-6 col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label"> Language</label>
                                        <select class="form-select sa-form-font border-radius-5px" id="language" name="language">
                                            <option selected="">Select your Language</option>
                                            <option value="1">English </option>
                                            <option value="2">Hindi</option>
                                        </select>
                                        <span id="language_error" style="color: red;"></span>

                                    </div>
                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label" title="Basic example" multiple="multiple" name="example-basic">Specialization</label>
                                        <select class="form-select sa-form-font border-radius-5px" name="category" id="category">
                                            <option selected="">Select your Specialization</option>
                                            @foreach($category as $data)
                                            <option value="1">{{$data->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="specializatio_error" style="color: red;"></span>

                                    </div>

                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Practice areas</label>
                                        <input type="text" name="about" value='{{$user_login->about}}' class="form-control sa-form-font half-border-radius" id="about" placeholder="Practice areas">
                                    </div>
                                    <span id="about_error" style="color: red;"></span>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 sa-pb mt-3 sr-end">
                                        <button type="submit" class="btn btn-outline-primary sa-color3 mt-3  poppins-light">Update</button>
                                    </div>
                                </div>

                            </div>
                    </form>
                    <!-- tab2 -->
                    <div class="tab-pane fade" id="pills-special" role="tabpanel" aria-labelledby="pills-password-tab">
                        <div class="row ">
                            <div class="col-lg-7 col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label sa-color2 sa-label">Old Password</label>
                                    <input type="password" class="form-control sa-form-font half-border-radius" id="" placeholder="old password">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label sa-color2 sa-label">New Password</label>
                                    <input type="password" class="form-control sa-form-font half-border-radius" id="" placeholder="New password">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label sa-color2 sa-label">Confirm Password</label>
                                    <input type="password" class="form-control sa-form-font half-border-radius" id="" placeholder="Confirm password">
                                </div>
                            </div>
                            <div class="col-md-7 ">
                                <div class="text-center">
                                    <button class="btn btn-outline-primary sa-color3  poppins-light">Change Password</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end tab2 -->
                </div>



            </div>
        </div>



    </div>
</div>

@include('fronted/include/footer')

<!-- edit profile picture script -->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>
<!-- end edit profile picture script -->
<script>
    $('#main_id').submit(function(e) {

        // var type = 2;
        // var name = $('#name').val();
        // var dob = $('#dob').val();
        // var fathername = $('#fathername').val();
        // var image = $('#profileimage').val();
        var experience = $('#experience').val();
        // var gender = $('#gender').val();

        // var frollno = $('#frollno').val();
        // var fyear = $('#fyear').val();
        // var finsti = $('#finsti').val();

        // var srollno = $('#srollno').val();
        // var syear = $('#syear').val();
        // var sinsti = $('#sinsti').val();
        var language = $('#language').val();
        //  alert(language)
        // var trollno = $('#trollno').val();
        // var tyear = $('#tyear').val();
        // var tinsti = $('#tinsti').val();
        var location = $('#location').val();
        var court = $('#court').val();


        // var nationality = $('#nationality').val();
        // var nicno = $('#nicno').val();

        // var language = $('input[name=language]:checked').val();

        // var mobile = $('#mobile').val();
        // alert (language)

        var cnt = 0;
        var f = 0;

        $('#name_error').html("");
        // $('#location_error').html();
        $('#court_error').html();
        $('#dob_error').html("");
        $('#fathername_error').html("");
        $('#experience_error').html("");
        // $('#gender_error').html("");


        $('#frollno_error').html("");
        $('#fyear_error').html("");
        $('#finsti_error').html("");

        $('#srollno_error').html("");
        $('#syear_error').html("");
        $('#sinsti_error').html("");

        // $('#trollno_error').html("");
        // $('#tyear_error').html("");
        // $('#tinsti_error').html("");

        // $('#nationality_error').html();
        $('#language_error').html("");
        $('#nicno_error').html();

        $('#mobile_error').html();

        // if (image.trim() == '') {
        //     $('#image_error').html("Please select Pictures");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#profileimage').focus();
        //     }
        // }
        // if(element.attr("language[]") == "check") error.appendTo("#nicno_error")

        // if (image) {
        //     var formData = new FormData();
        //     var file = document.getElementById('profileimage').files[0];
        //     // var image = $('#image').val();
        //     formData.append("Filedata", file);
        //     var t = file.type.split('/').pop().toLowerCase();
        //     if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        //         $('#image_error').html("Only JPG, PNG and JPEG image are allowed");
        //         cnt = 1;
        //     }
        // }
        if (language.trim() == '') {
            $('#language_error').html("Please select language");
            cnt = 1;
            f++;
            if (f == 1) {
                $('.language').focus();
            }
        }
        // if(element.attr("language") == "check") error.appendTo("#language_error ")

        if (location.trim() == '') {
            $('#location_error').html("Please enter location");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#location').focus();
            }
        }

        if (court.trim() == '') {
            $('#court_error').html("Please select court");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#court').focus();
            }
        }
        if (experience.trim() == '') {
            $('#experience_error').html("Please enter experience");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#experience').focus();
            }
        }

        // if (!ValidateEmail(email)) {
        // 	$('#email_error').html("Please enter Valid Email");
        // 	cnt = 1;
        // 	f++;
        // 	if (f == 1) {
        // 		$('#email').focus();
        // 	}
        // }


        // if (srollno.trim() == '') {
        //     $('#srollno_error').html("Please enter Degree Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#srollno').focus();
        //     }
        // }
        // if (syear.trim() == '') {
        //     $('#syear_error').html("Please enter year");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#syear').focus();
        //     }
        // }
        // if (sinsti.trim() == '') {
        //     $('#sinsti_error').html("Please enter institute name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#sinsti').focus();
        //     }
        // }

        // if (trollno.trim() == '') {
        //     $('#trollno_error').html("Please enter Degree Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#trollno').focus();
        //     }
        // }
        // if (tyear.trim() == '') {
        //     $('#tyear_error').html("Please enter year");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#tyear').focus();
        //     }
        // }
        // if (tinsti.trim() == '') {
        //     $('#tinsti_error').html("Please enter institute name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#tinsti').focus();
        //     }
        // }
        // if (nationality.trim() == '') {
        //     $('#nationality_error').html("Please select nationality");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#nationality').focus();
        //     }
        // }


        // if (gender.trim() == '') {
        //     $('#gender_error').html("Please select gender");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#gender').focus();
        //     }
        // }
        // var number = /([0-9])/;
        // var alphabets = /([a-zA-Z])/;
        // var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        // if (password) {
        // 	if (password.length < 8) {
        // 		$('#password_error').html("Password should be atleast 8 characters");
        // 		cnt = 1;
        // 	} else {
        // 		if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {

        // 		} else {
        // 			$('#password_error').html(
        // 				"Must contain min. 8 characters with at least 1 number and 1 special character");
        // 			cnt = 1;
        // 		}
        // 	}
        // }

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