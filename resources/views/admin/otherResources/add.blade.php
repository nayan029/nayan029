@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Resource Add</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/other-resoureces">Other Resources</a></li>
                        <li class="breadcrumb-item">Resource Add</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/other-resoureces" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Resource Name</label><span style="color: red;">*</span>
                                        <select class="form-control" name="resourcename" id="resourcename">
                                            <option value="">Please Select</option>
                                            <?php 
                                                foreach ($categorylist as $val) {
                                                  ?>
                                            <option value="{{$val->id}}">{{$val->name}}</option>

                                             <?php   }
                                            ?>
                                            
                                        </select>
                                        <span style="color:red;" id="name_error"><?php echo $errors->name_error->first('name'); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <!-- <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputContactNo">Discription</label><span style="color: red;"></span>
                                            <textarea class="form-control" id="discription" name="discription" aria-describedby="numberHelp" placeholder="Enter Discription"></textarea>
                                            <span style="color:red;" id="discription_error"><?php echo $errors->discription_error->first('discription'); ?></span>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Question</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="question" name="question" aria-describedby="nameHelp" placeholder="Enter Question">
                                        <span style="color:red;" id="question_error"><?php echo $errors->question->first('question'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Answer</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="answer" name="answer" aria-describedby="nameHelp" placeholder="Enter Answer"></textarea>
                                        <span style="color:red;" id="answer_error"><?php echo $errors->reset_password->first('confirm_password'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <a href="<?php echo URL::to('/') ?>/admin/other-resoureces"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>

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
    $(document).ready(function() {
        $('#other_resources').addClass('active mm-active');
    });
</script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        var name = $('#resourcename').val();
        var question = $('#question').val();
        // var answer = $('#answer').val();
        var answer = CKEDITOR.instances.answer.getData();

        var cnt = 0;
        var f = 0;
        $('#name_error').html("");
        $('#description_error').html("");
        $('#question_error').html(" ");
        $('#answer_error').html("");


        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        if (name.trim() == '') {
            $('#name_error').html("Please Select Resource Name");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#resourcename').focus();
            }
        }
     
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        if (question.trim() == '') {
            $('#question_error').html("Please enter question");
            cnt = 1;
        }
        if (answer.trim() == '') {
            $('#answer_error').html("Please enter answer");
            cnt = 1;
        }

        if (cnt == 1) {
            return false;
        } else {
            return true;
        }


    })
    CKEDITOR.replace('answer');
</script>