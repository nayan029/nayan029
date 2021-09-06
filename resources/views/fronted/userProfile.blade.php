@include('fronted/include/header')
<div class="sa-enroll-details pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row pro-sidesec">
                    <div class="col-md-12 d-flex">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input id="imageUpload" type="file" name="sortpic" accept=".png, .jpg, .jpeg" />

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

                                <div class="sr-pro-card">
                                    <p class="sa-color2 sr-ed-sec">DOB</p>
                                    <p class="fs-14px">@if(isset($user_login->ldob)){{date("d-M-Y ", strtotime($user_login->ldob)) }}@else{{"N/A"}}@endif</p>
                                </div>

                            </div>
                        </div>
                    </div>


                </div> -->
                <div class="col-md-8">
                    <div class="sa-pills-design sr-pillmain">
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" id="pills-pro-personal-tab" data-toggle="pill" href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="true">Personal Information</a>
                            </li>
                            <li class="nav-item">
                            </li>
                        </ul>
                    </div>
                    <!-- tab1 -->
                    <form action="{{URL::to('/')}}/my-profile" method="POST" enctype="multipart/form-data" id="main_id">
                        @csrf
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade active show" id="pills-personal" role="tabpanel" aria-labelledby="pills-pro-personal-tab">
                                <div class="row">
                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">First Name</label>
                                        <input type="text" name="firstname" class="form-control sa-form-font half-border-radius" id="firstname" value='@if(isset($user_login->name)){{$user_login->name}}@else{{"N/A"}}@endif' placeholder="Enter Experience">
                                        <span id="firstname_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Last Name</label>
                                        <input type="text" name="lastname" class="form-control sa-form-font half-border-radius" id="lastname" value='@if(isset($user_login->username)){{$user_login->username}}@else{{"N/A"}}@endif' placeholder="Enter Experience">
                                        <span id="lastname_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-6 sa-pb">
                                        <label for="inputProfilepic" class="col-sm-3 col-form-label">ProfilePicture</label>
                                        <input type="file" class="form-control" id="profilepic" name="profilepic" placeholder="Profileimge">
                                        <span style="color:red;" id="profilepic_error"><?php echo $errors->customer_error->first('company_logo'); ?></span>
                                        @if($user_login->profileimage)
                                        <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/userprofile/{{$user_login->profileimage}}" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                        @else
                                        <br>
                                        <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                        @endif


                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col-md-12 sa-pb ">
                                        <button type="submit" class="btn btn-outline-primary sa-color3 mt-3  poppins-light">Update</button>
                                    </div>
                                </div>

                            </div>
                    </form>
                    <!-- tab2 -->
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').css({
                    height: '58px',
                    width: '58px'
                });
                $('#blah').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profilepic").change(function() {
        readURL(this);
    });
</script>
<!-- end edit profile picture script -->
<script>
    $('#main_id').submit(function(e) {

        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var image = $('#profilepic').val();


        // alert(specialization)

        var cnt = 0;
        var f = 0;

        $('#firstname_error').html();
        $('#lastname_error').html("");
        $('#profilepic_error').html("");


        if (firstname.trim() == '') {
            $('#firstname_error').html("Please enter firstname");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#firstname').focus();
            }
        }

        if (lastname.trim() == '') {
            $('#lastname_error').html("Please enter lastname");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#lastname').focus();
            }
        }

        // if (image.trim() == '') {
        //     $('#profilepic_error').html("Please select Pictures");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#profilepic').focus();
        //     }
        // }

        if (image) {
            var formData = new FormData();
            var file = document.getElementById('profilepic').files[0];
            // var image = $('#image').val();
            formData.append("Filedata", file);
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
                $('#profilepic_error').html("Only JPG, PNG and JPEG image are allowed");
                cnt = 1;
            }
        }

        if (cnt == 1) {
            return false;
        } else {

            return true;
        }

    })
</script>