@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Edit Querys</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/adviceQuerys">Advice Querys</a></li>
                        <li class="breadcrumb-item">Edit Querys</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/adviceQuerys/{{$data->id}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Category</label><span style="color: red;">*</span>
                                        <select name="category_id" id="category" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php foreach ($advicecategory as $d) { ?>
                                                <option <?php if ($data->category_id == $d->id) {
                                                            echo "selected";
                                                        } ?> value="{{$d->id}}">{{$d->category_name}}</option>
                                            <?php } ?>

                                        </select>
                                        <span style="color:red;" id="category_error"><?php echo $errors->profile_error->first('category'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Question</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="250" value="{{$data->question}}" class="form-control" id="question" name="question" aria-describedby="emailHelp" placeholder="Enter question">
                                        <span style="color:red;" id="question_error"><?php echo $errors->profile_error->first('question'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Question Details</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="details" name="details" aria-describedby="numberHelp" placeholder="Enter details">
                                        {{$data->question_details}}
                                        </textarea>
                                        <span style="color:red;" id="details_error"><?php echo $errors->profile_error->first('details'); ?></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?php echo URL::to('/') ?>/admin/adviceQuerys"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
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
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        //var category = $('#category').val();
        var question = $('#question').val();
        // var details = $('#details').val();
        var details = CKEDITOR.instances.details.getData();

        var cnt = 0;
        var f = 0;
        //$('#category_error').html("");
        $('#question_error').html("");
        $('#details_error').html("");


        // if (category.trim() == '') {
        //     $('#category_error').html("Please enter category");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#category').focus();
        //     }
        // }
        if (question.trim() == '') {
            $('#question_error').html("Please enter question");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#question').focus();
            }
        }

        if (details.trim() == '') {
            $('#details_error').html("Please enter details");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#details').focus();
            }
        }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
CKEDITOR.replace( 'details' );
$('#advice_query').addClass('active mm-active');

</script>