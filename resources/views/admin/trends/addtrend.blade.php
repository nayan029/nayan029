@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Trends Add</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/trends">Manage Trends</a></li>
                        <li class="breadcrumb-item">Trends Add</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/trends" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Select Trends</label><span style="color: red;">*</span>
                                        <select class="form-control" id="trends" name="trends">
                                            <!-- <option value="">Select Value</option> -->
                                            <option value="Law Firm Insights">Law Firm Insights</option>
                                            <option value="Free Guides">Free Guides</option>
                                            <option value="TLP Events">TLP Events</option>
                                            <option value="Career Tips">Career Tips</option>
                                        </select>
                                        <span style="color:red;" id="trends_error"><?php echo $errors->profile_error->first('trends'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Trends Title</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="250" class="form-control" id="title" name="title" aria-describedby="nameHelp" placeholder="Enter First Title">
                                        <span style="color:red;" id="title_error"><?php echo $errors->profile_error->first('title'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Trends Image</label><span style="color: red;">*</span>
                                        <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" placeholder="Enter Image">
                                        <span style="color:red;" id="image_error"><?php echo $errors->profile_error->first('image'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Short Description</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="250" class="form-control" id="short_description" name="short_description" aria-describedby="numberHelp" placeholder="Enter Short Description">
                                        <span style="color:red;" id="short_description_error"><?php echo $errors->profile_error->first('short_description'); ?></span>
                                    </div>
                                </div>
                            </div>   
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Description</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="description" name="description" aria-describedby="nameHelp" placeholder="User Description"></textarea>
                                        <span style="color:red;" id="description_error"><?php echo $errors->customer_error->first('discription'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo URL::to('/') ?>/admin/trends"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
                                    <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Submit</button>
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

    $("#image").change(function() {
        readURL(this);
    });
</script>

<script>
$('#trends').addClass('active mm-active');

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        var title = $('#title').val();
        var short_description = $('#short_description').val();
        // var description = $('#description').val();
        var description = CKEDITOR.instances.description.getData();

        var image = $('#image').val();
        //var trends = $('#trends').val();

        var cnt = 0;
        var f = 0;
        $('#title_error').html("");
        $('#short_description_error').html("");
        $('#description_error').html("");
        $('#image_error').html("");
        //$('#trends_error').html("");


        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        // if (trends.trim() == '') {
        //     $('#trends_error').html("Please Select Trend");
        //     cnt == 1;
        //     f++;
        //     if (f == 1) {
        //         $('#trends').focus();
        //     }
        // }
        if (image.trim() == '') {
            $('#image_error').html("Please select Pictures");
            cnt = 1;
        }
        if (image) {
            var formData = new FormData();
            var file = document.getElementById('image').files[0];
            // var image = $('#image').val();
            formData.append("Filedata", file);
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
                $('#image_error').html("Only JPG, PNG and JPEG image are allowed");
                cnt = 1;
            }
        }
        if (title.trim() == '') {
            $('#title_error').html("Please enter title");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#title').focus();
            }
        }
        if (short_description.trim() == '') {
            $('#short_description_error').html("Please enter Short description");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#short_description').focus();
            }
        }

        if (description.trim() == '') 
        {
            $('#description_error').html("Please enter description");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#description').focus();
            }
        }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
CKEDITOR.replace( 'description' );

</script>