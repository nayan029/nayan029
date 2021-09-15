@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Add Document Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/document-deatils">Document Details</a></li>
                        <li class="breadcrumb-item">Add Document Details</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/document-deatils" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Type</label><span style="color: red;">*</span>
                                        <select name="type" id="type" class="form-control" onchange="getsubcategory(this.value);">
                                            <option value="">Select Type</option>
                                            <option value="1">Image</option>
                                            <option value="2">Content</option>
                                        </select>
                                        <span style="color:red;" id="type_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Title</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="30" class="form-control" id="title" name="title" aria-describedby="nameHelp" placeholder="Enter First Title">
                                        <span style="color:red;" id="title_error"><?php echo $errors->profile_error->first('title'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group" style="display: none;" id="hideimg">
                                        <label for="exampleInputEmail">Image</label><span style="color: red;">*</span>
                                        <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" placeholder="Enter Image">
                                        <span style="color:red;" id="image_error"><?php echo $errors->profile_error->first('image'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="display: none;" id="hidedesc">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Description</label><span style="color: red;">*</span>
                                        <textarea class="form-control description" id="description" name="description" aria-describedby="nameHelp" placeholder="User Description"></textarea>
                                        <span style="color:red;" id="description_error"><?php echo $errors->profile_error->first('discription'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo URL::to('/') ?>/admin/document-deatils"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
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
    $('#documentdetails').addClass('active mm-active');
    // ajax hide show

    function getsubcategory(types) {

        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/getcategory",
            type: "POST",
            data: {
                types: types,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                $('#name').html(response);
                if (types == '2') {
                    $('#hideimg').css('display', 'none');
                    $('#hidedesc').css('display', 'block');
                    CKEDITOR.replace('description');
                } else if (types == '1') {
                    $('#hideimg').css('display', 'block');
                    $('#hidedesc').css('display', 'none');

                }
            }
        });
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        var title = $('#title').val();
        var type = $('#type').val();
        // var description = CKEDITOR.instances.description.getData();

        var image = $('#image').val();

        var cnt = 0;
        var f = 0;
        $('#title_error').html("");
        $('#short_description_error').html("");
        $('#type_error').html("");


        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


        if (type.trim() == '') {
            $('#type_error').html("Please select type");
            cnt = 1;
            cnt = 1;
            f++;
            if (f == 1) {
                $('#type').focus();
            }
        }
        if (image) {
            var formData = new FormData();
            var file = document.getElementById('image').files[0];
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


        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
    CKEDITOR.replace('description');
</script>