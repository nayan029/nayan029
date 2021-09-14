@include('fronted/include/header')
<div class="sa-enroll-details pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row pro-sidesec">
                    <div class="col-md-12 d-flex">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input id="imageUpload" type="file" name="sortpic" accept=".png, .jpg, .jpeg" />

                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <!--  @if(isset($user_login->profileimage))
                                <div id="imagePreview" style="background-image: url( {{URL::to('/')}}/uploads/lawyerprofile/{{$user_login->profileimage}});">
                                    @else
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                        @endif

                                    </div>
                                </div> -->
                                @if(isset($user_login->profileimage))
                                <div id="" style="">
                                    <img id="imagePreview" src="{{URL::to('/')}}/uploads/lawyerprofile/{{$user_login->profileimage}}" style="background-image;">


                                    @else
                                    <div id="" style="">
                                        <img id="imagePreview" src="http://i.pravatar.cc/500?img=7" style="background-image;">

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="text-center nametxt">
                                <p class="sa-color2 mb-1">@if(isset($user_login->name)){{$user_login->name}}@else{{"N/A"}}@endif</p>
                                <p class="mb-1">@if(isset($user_login->username)){{$user_login->username}}@else{{"N/A"}}@endif</p>
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
                                    <div class="col-md-12 sa-pb">
                                        <h5 class="experience-title">Personal Information</h5>
                                    </div>
                                    <div class="col-lg-6 col-md-6 sa-pb mb-2">
                                        <label for="inputDate" class="form-label sa-color2 sa-label">Allotment Number <img class="ml-1" src="{{asset('fronted/images/svg/ant-design_info-circle-filled.svg')}}"></label><span style="color: red;"> *</span>
                                        <input name="allotment" type="text" value='@if(isset($user_login->allotmentno)){{$user_login->allotmentno}}@else{{"N/A"}}@endif' class="form-control sa-form-font half-border-radius" id="allotment" placeholder="" maxlength="13">
                                        <span id="allotment_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 sa-pb mb-2">
                                        <label for="inputDate" class="form-label sa-color2 sa-label">Membership Number <img class="ml-1" src="{{asset('fronted/images/svg/ant-design_info-circle-filled.svg')}}"></label><span style="color: red;"> *</span>
                                        <input name="membership" type="text" value='@if(isset($user_login->membershipno)){{$user_login->membershipno}}@else{{"N/A"}}@endif' class="form-control sa-form-font half-border-radius" id="membership" placeholder="" maxlength="13">
                                        <span id="membership_error" style="color: red;"></span>
                                    </div>
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
                                    <!-- <div class="col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Price</label>
                                        <input type="number" name="price" class="form-control sa-form-font half-border-radius" id="price" value='@if(isset($user_login->price)){{$user_login->price}}@else{{"N/A"}}@endif' placeholder="Enter price">
                                        <span id="price_error" style="color: red;"></span>
                                    </div> -->

                                    <div class="col-md-4 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Degree Name</label>
                                        <input type="text" name="degreename" class="form-control sa-form-font half-border-radius" id="degreename" value='@if(isset($user_login->frollno)){{$user_login->frollno}}@else{{"N/A"}}@endif' placeholder="Degree Name" maxlength="100">
                                        <span id="degree_error" style="color: red;"></span>
                                        <br>

                                    </div>
                                    <div class="col-md-4 sa-pb">

                                        <label for="inputName" class="form-label sa-color2 sa-label">Year</label>
                                        <input type="text" name="year" class="form-control sa-form-font half-border-radius" id="year" value='@if(isset($user_login->fyear)){{$user_login->fyear}}@else{{"N/A"}}@endif' placeholder="Year" maxlength="4">
                                        <span id="year_error" style="color: red;"></span>
                                        <br>

                                    </div>
                                    <div class="col-md-4 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Institution</label>
                                        <input type="text" name="institution" class="form-control sa-form-font half-border-radius" id="institution" value='@if(isset($user_login->finstitue)){{$user_login->finstitue}}@else{{"N/A"}}@endif' placeholder="Institution Name" maxlength="100">
                                        <span id="institution_error" style="color: red;"></span>
                                        <br>
                                    </div>
                                    @if(isset($user_login->srollno)|| isset($user_login->syear)|| isset($user_login->sinstitue))
                                    <div class="col-md-4 sa-pb">
                                        <!-- <label for="inputName" class="form-label sa-color2 sa-label">Degree Name</label> -->
                                        <input type="text" name="sdegreename" class="form-control sa-form-font half-border-radius" id="sdegreename" value='@if(isset($user_login->srollno)){{$user_login->srollno}}@else{{"N/A"}}@endif' placeholder="Degree Name" maxlength="100">
                                        <span id="sdegree_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-4 sa-pb">

                                        <!-- <label for="inputName" class="form-label sa-color2 sa-label">Year</label> -->
                                        <input type="text" name="syear" class="form-control sa-form-font half-border-radius" id="syear" value='@if(isset($user_login->syear)){{$user_login->syear}}@else{{"N/A"}}@endif' placeholder="Year" maxlength="4">
                                        <span id="syear_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-4 sa-pb">
                                        <!-- <label for="inputName" class="form-label sa-color2 sa-label">Institution</label> -->
                                        <input type="text" name="sinstitution" class="form-control sa-form-font half-border-radius" id="sinstitution" value='@if(isset($user_login->sinstitue)){{$user_login->sinstitue}}@else{{"N/A"}}@endif' placeholder="Institution Name" maxlength="100">
                                        <span id="sinstitution_error" style="color: red;"></span>
                                    </div>
                                    @endif

                                    <div class="col-md-12 sa-pb">
                                        <h5 class=""></h5>
                                    </div>
                                    <div class="col-md-12 sa-pb mt-3">
                                        <h5 class="experience-title">Specialization</h5>
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


                                    <!-- <div class="col-md-4 sa-pb">

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="sa-color2">Basic Fees</label><span style="color: red;"> *</span>
                                            <input type="text" name="basic_fees" id="basic_fees" class="form-control" onkeypress="return isNumber(event)" value='@if(isset($user_login->basic_fees)){{$user_login->basic_fees}}@else{{"N/A"}}@endif'>
                                            <span id="basicFees_error" style="color:red"></span>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4 sa-pb">

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="sa-color2">Fees (By per date)</label><span style="color: red;"> *</span>
                                            <input type="text" name="fees" id="fees" class="form-control" onkeypress="return isNumber(event)" value='@if(isset($user_login->fees)){{$user_login->fees}}@else{{"N/A"}}@endif'>
                                            <span id="fees_error" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 sa-pb">

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="sa-color2">Legal Representation</label><span style="color: red;"> *</span>
                                            <input type="text" name="full_legal" id="full_legal" class="form-control" onkeypress="return isNumber(event)" value='@if(isset($user_login->full_legal_fees)){{$user_login->full_legal_fees}}@else{{"N/A"}}@endif'>
                                            <span id="fullLegal_error" style="color:red"></span>
                                        </div>
                                    </div>



                                    <div class="col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Courts</label>

                                        <div class="form-group">
                                            <div class="row sr-pad1">
                                                @foreach ($court as $data)
                                                <div class="col-md-4">
                                                    <div class="pm-check pmsa-check" id="courtcheck">
                                                        <input class="form-check-input court" @if(in_array($data->id, $user_court)) {{"checked"}} @endif name="court[]" type="checkbox" value="{{$data->id}}" id="{{ $data->name}}">
                                                        <span class="real-checkbox"></span>
                                                        <label class="form-check-label pmsa-labels" for="{{$data->name}}">
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
@php $auth = Auth::user(); @endphp
<!-- edit profile picture script -->
<script type="text/javascript">
    function readURL() {
        var file_data = $('#imageUpload').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('_token', '{{ csrf_token() }}');
        form_data.append('id', '<?php echo $id = $auth['id'] ?>');
        // alert(form_data);
        // console.log(form_data)
        $.ajax({
            url: '{{URL::to("/")}}/lawyer/edit-profile', // <-- point to server-side PHP script 
            dataType: 'text', // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response) {
                // alert(php_script_response); // <-- display response from the PHP script, if any
                return window.location.href = '';
            }
        });
    }

    $("#imageUpload").change(function() {
        // console.log(this);
        readURL();
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

        // var basic_fees = $('#basic_fees').val();
        var fees = $('#fees').val();
        var full_legal = $('#full_legal').val();

        // var price = $("#price").val();

        var degreename = $('#degreename').val();
        var year = $('#year').val();
        var institution = $('#institution').val();
        var allotment = $('#allotment').val();
        var memership = $('#membership').val();


        // var sdegreename = $('#sdegreename').val();
        // var syear = $('#syear').val();
        // var sinstitution = $('#sinstitution').val();

        // alert(specialization)

        var cnt = 0;
        var f = 0;

        $('#court_error').html();
        $('#experience_error').html("");
        $('#about_error').html("");
        $('#specialization_error').html("");

        // $('#basicFees_error').html("");
        $('#fees_error').html("");
        $('#fullLegal_error').html("");

        $('#price_error').html("");

        $('#degree_error').html("");
        $('#year_error').html("");
        $('#institution_error').html("");

        $('#sdegree_error').html("");
        $('#syear_error').html("");
        $('#sinstitution_error').html("");
        $('#allotment_error').html();
        $('#membership_error').html();



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

        // if (basic_fees.trim() == '') {
        //     $("#basicFees_error").html("Please enter basic fees.");
        // } else {
        //     $("#basicFees_error").html("");
        // }
        if (fees.trim() == '') {
            $("#fees_error").html("Please enter fees.");
        } else {
            $("#fees_error").html("");
        }
        if (full_legal.trim() == '') {
            $("#fullLegal_error").html("Please enter full legal representation fees.");
        } else {
            $("#fullLegal_error").html("");
        }

        // if (price.trim() == '') {
        //     $('#price_error').html("Please enter price");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#price').focus();
        //     }
        // }

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
        if (allotment.trim() == '') {
            $('#allotment_error').html("Please enter allotment number");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#allotment').focus();
            }
        }

        if (memership.trim() == '') {
            $('#membership_error').html("Please enter membership number");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#membership').focus();
            }
        }

        // if (sdegreename.trim() == '') {
        //     $('#sdegree_error').html("Please enter degree name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#sdegreename').focus();
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

        // if (sinstitution.trim() == '') {
        //     $('#sinstitution_error').html("Please enter institution name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#sinstitution').focus();
        //     }
        // }

        if (cnt == 1) {
            return false;
        } else {

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