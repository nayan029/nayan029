@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Legal Query Category</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/query-category">Legal Query</a></li>
                        <li class="breadcrumb-item">Add Legal Query</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/query-category" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Category</label><span style="color: red;">*</span>
                                        <select name="query_id" id="query_id" class="form-control">
                                            <!-- <option value="">Select Category</option> -->
                                            <?php foreach ($mainLegalQueryType as $value) {

                                            ?>
                                                <option value="{{$value->id}}">{{ ucfirst($value->title)}}</option>
                                            <?php } ?>
                                        </select>
                                        <span style="color:red;" id="query_error"><?php echo $errors->profile_error->first('query_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Title</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="250" class="form-control" id="title" name="title" placeholder="Title">
                                        <span style="color:red;" id="title_error"><?php echo $errors->profile_error->first('title'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Type</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="250" class="form-control" id="type" name="type" placeholder="Type">
                                        <span style="color:red;" id="type_error"><?php echo $errors->profile_error->first('type'); ?></span>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Description</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="description" name="description" placeholder="Description">
                                            </textarea>
                                        <span style="color:red;" id="details_error"><?php echo $errors->profile_error->first('description'); ?></span>
                                    </div>
                                </div> -->
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?php echo URL::to('/') ?>/admin/query-category"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
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
    $('#category_menu').addClass('nav-item active');
    $('#categorymaster_menu').addClass('nav-link active');
    $('#categorymaster_open').addClass('menu-open active');

    $('#lawyer_cat').addClass('active mm-active');

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        var title = $('#title').val();
        var type = $('#type').val();
        var details = $('#details').val();
        // var description = CKEDITOR.instances.description.getData();

        var cnt = 0;
        var f = 0;

        $('#title_error').html("");
        $('#type_error').html("");
        $('#details_error').html("");


        if (title.trim() == '') {
            $('#title_error').html("Please enter title");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#title').focus();
            }
        }
        if (type.trim() == '') {
            $('#type_error').html("Please enter type");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#type').focus();
            }
        }

        // if (description.trim() == '') {
        //     $('#details_error').html("Please enter description");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#description').focus();
        //     }
        // }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
    // CKEDITOR.replace('description');
</script>