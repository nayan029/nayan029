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
                                    <p class="sa-color2 sr-ed-sec">Mobile No</p>
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


                                    <div class="col-lg-6 col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label"> Language</label>

                                        <div class="d-flex">
                                            <div class="pm-check pr-3">
                                                <input class="form-check-input language" @if('english'==$user_language[0]) {{'checked'}} @endif name="language[]" type="checkbox" value="english" id="one">
                                                <span class="real-checkbox"></span>
                                                <label class="form-check-label  sa-label" for="one">
                                                    English
                                                </label>
                                            </div>
                                            <div class="pm-check ">
                                                <input class="form-check-input language" @if('hindi'==$user_language[0]) {{'checked'}} @endif name="language[]" type="checkbox" value="hindi" id="two">
                                                <span class="real-checkbox"></span>
                                                <label class="form-check-label  sa-label" for="two">
                                                    Hindi
                                                </label>
                                            </div>
                                        </div>
                                        <span id="language_error" style="color: red;"></span>

                                    </div>
                                    <div class="col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Practice areas</label>
                                        <textarea name="about" class="form-control sa-form-font half-border-radius" id="about_data" placeholder="Practice areas">{{$user_login->about}}</textarea>
                                    </div>
                                    <span id="about_error" style="color: red;"></span>

                                    <div class="col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label" title="Basic example" multiple="multiple" name="example-basic">Specialization</label>
                                        <div class="row sr-pad1">


                                            <div class="col-md-4">

                                                <div class="pm-check " id="catcheck">


                                                    <select name="category[]" id="specialization" class="form-control sa-form-font half-border-radius">
                                                        <option value="">Select Specialization</option>
                                                        @foreach ($category as $data)
                                                        <option @if(in_array($data->id, $user_category)) {{"selected"}} @endif value="{{$data->id}}">{{ucfirst($data->category_name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span id="specialization_error" style="color: red;"></span>
                                            </div>



                                        </div>

                                    </div>

                                    <div class="col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Courts</label>

                                        <div class="form-group">
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
                                    <div class="col-md-12 sa-pb mt-3 sr-end">
                                        <button type="submit" class="btn btn-outline-primary sa-color3 mt-3  poppins-light">Update</button>
                                    </div>
                                </div>

                            </div>
                    </form>
                    <!-- tab2 -->
                    <div class="tab-pane fade" id="pills-special" role="tabpanel" aria-labelledby="pills-password-tab">
                        <form method="post" id="password_form" action="{{URL::to('/')}}/lawyer/change_password/{{$user_login->id}}">
                            @csrf
                            <div class="row ">
                                <div class="col-lg-7 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label sa-color2 sa-label">Old Password</label>
                                        <input type="password" class="form-control sa-form-font half-border-radius" name="oldpassword" id="oldpassword" placeholder="old password">
                                    </div>
                                    <span style="color: red;" id="oldpassword_error"></span>
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label sa-color2 sa-label">New Password</label>
                                        <input type="password" class="form-control sa-form-font half-border-radius" name="newpassword" id="newpassword" placeholder="New password">
                                    </div>
                                    <span style="color: red;" id="newpassword_error"></span>

                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label sa-color2 sa-label">Confirm Password</label>
                                        <input type="password" class="form-control sa-form-font half-border-radius" name="confirmpassword" id="confirmpassword" placeholder="Confirm password">
                                    </div>
                                    <span style="color: red;" id="confirmpassword_error"></span>

                                </div>
                                <div class="col-md-7 ">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary sa-color3  poppins-light">Change Password</button>
                                    </div>
                                </div>

                            </div>
                        </form>
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

        var about = $('#about_data').val();
        // var length = $("#courtcheck input[type=checkbox]:checked").length;
        // var category = $("#catcheck input[type=checkbox]:checked").length;
        
        
        var experience = $('#experience').val();
        var language = $('#language').val();
        var location = $('#location').val();
        var court = $('#court').val();
        var specialization = $("#specialization").val();

        // alert(specialization)
        
        var cnt = 0;
        var f = 0;

        $('#court_error').html();
        $('#experience_error').html("");
        $('#about_error').html("");
        $('#specialization_error').html("");


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
<script>
    $('#password_form').submit(function(e) {

        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val();
        var confirm_password = $('#confirmpassword').val();
        var cnt = 0;
        $('#oldpassword_error').html("");
        $('#newpassword_error').html("");
        $('#confirmpassword_error').html("");


        if (oldpassword.trim() == '') {
            $('#oldpassword_error').html("Please enter old password");
            cnt = 1;
        }

        if (oldpassword) {

            $.ajax({
                url: "<?php echo URL::to('/'); ?>/admin/check_oldpassword",
                type: "POST",
                data: {
                    old_password: oldpassword,
                    _token: "<?php echo csrf_token(); ?>"
                },
                success: function(response) {

                    if (response == 1) {

                    } else {
                        $('#oldpassword_error').html("Old Password does not match");
                        cnt = 1;
                    }
                }
            });
        }

        if (newpassword.trim() == '') {
            $('#newpassword_error').html("Please enter new password");
            cnt = 1;
        }
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        if (newpassword) {
            if (newpassword.length < 8) {
                $('#newpassword_error').html("Password should be atleast 8 characters");
                cnt = 1;
            } else {
                if (newpassword.match(number) && newpassword.match(alphabets) && newpassword.match(special_characters)) {

                } else {
                    $('#newpassword_error').html(
                        "Must contain min. 8 characters with at least 1 number and 1 special character");
                    cnt = 1;
                }
            }
        }

        if (confirm_password.trim() == '') {
            $('#confirmpassword_error').html("Please enter confirm Password");
            cnt = 1;
        }
        if (newpassword != confirm_password) {

            $('#confirmpassword_error').html("New Password and Confirm Password does not match");
            cnt = 1;
        }



        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
</script>