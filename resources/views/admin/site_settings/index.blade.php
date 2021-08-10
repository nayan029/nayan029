@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Site Settings</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Site Settings</li>
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
                        <form role="form" id="main_id" method="POST" action="<?php echo URL::to('/') ?>/admin/site-settings" enctype="multipart/form-data">
					@method('POST')
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$site_setting->id}}">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Title</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="title" value="{{$site_setting->title}}" name="title" aria-describedby="nameHelp" placeholder="Enter First Name">
                                        <span style="color:red;" id="title_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Front Logo</label><span style="color: red;">*</span>
                                        <input type="file" class="form-control" id="logo" value="Logo" name="logo">

                                    </div>
                                    <img class="site-stg-img" width="100px" height="100px" src="<?php echo URL::to('/'); ?>/uploads/logo/{{ $site_setting->logo }}" id="blah-edit" />
                                    <span style="color:red;" id="logo_error"></span>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Backend Logo</label><span style="color: red;">*</span>
                                        <input type="file" name="backend_logo" class="form-control" id="front_logo">

                                    </div>
                                    <img class="site-stg-img" width="100px" height="100px" src="<?php echo URL::to('/'); ?>/uploads/logo/{{ $site_setting->backend_logo }}" id="blah-edit1" />
                                    <span style="color:red;" id="front_logo_error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="">
                                        <button type="button" class="sa-btn-close p-2 float-right">Close</button>
                                    </a>
                                    <button id="submitform" type="submit" class="sa-btn-submit p-2 float-right mr-2">Update</button>
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
    $('#site-settings').addClass('active mm-active');
</script>
<script>
    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if (charCode == 32) {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                return true;
            else
                return false;
        } catch (err) {
            alert(err.Description);
        }
    }

    function isNumberDot(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode != 46 || $(this).val().indexOf('.') != -1) && (charCode < 48 || charCode > 57)) {

            return false;
        }
        return true;
    }

    $('.number').on('input', function() {
        this.value = this.value.match(/^\d+\.?\d{0,2}/);
    });

    /*Percentage Validation*/
    function checkLength(id) {
        var fieldVal = document.getElementById(id).value;
        //Suppose u want 3 number of character
        if (fieldVal <= 100 && fieldVal != 0) {
            return true;
        } else {
            var str = document.getElementById(id).value;
            str = str.substring(0, str.length - 1);
            document.getElementById(id).value = str;
        }
    }
    /*Percentage Validation*/

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah-edit').css({
                    height: '100px',
                    width: '100px'
                });
                $('#blah-edit').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function() {
        readURL(this);
    });

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah-edit1').css({
                    height: '100px',
                    width: '100px'
                });
                $('#blah-edit1').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#front_logo").change(function() {
        readURL1(this);
    });

    /*Validation*/
    $('#main_id').submit(function(e) {

        // $('#submitform').prop('disabled', true);

        var title = $('#title').val();
        var image = $('#logo').val();
        var front = $('#front_logo').val();

        var cnt = 0;
        var f = 0;
        $('#title_error').html("");
        $('#logo_error').html("");
        $('#front_logo_error').html("");


        if (title.trim() == '') {
            $('#title_error').html("Please enter Title ");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#title').focus();
            }
        }

        if (image) {
            var formData = new FormData();
            var file = document.getElementById("logo").files[0];
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
                $('#logo_error').html("Only JPG, PNG and JPEG image are allowed");
                cnt = 1;
                f++;
                if (f == 1) {
                    $('#logo').focus();
                }
            }
        }
        if (front) {
            var formData = new FormData();
            var file = document.getElementById("front_logo").files[0];
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
                $('#front_logo_error').html("Only JPG, PNG and JPEG image are allowed");
                cnt = 1;
                f++;
                if (f == 1) {
                    $('#front_logo').focus();
                }
            }
        }

        if (cnt == 1) {
            return false;
        } else {
            return true;
        }
    })
</script>