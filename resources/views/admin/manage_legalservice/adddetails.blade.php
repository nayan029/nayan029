@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Add Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/legal-services">Manage Service</a></li>
                        <li class="breadcrumb-item">Add Details</li>
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
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/legal-issue" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Service Name</label><span style="color: red;">*</span>
                                        <select class="form-control" id="name" name="service_id">
                                            <option value="">Select Service Name</option>
                                            @foreach($servicename as $data)
                                            <option @if($data->category_name==$service_name->service_name) {{"selected"}} @endif value="{{$data->id}}" data-name="{{$data->category_name}}">{{$data->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red;" id="name_error"><?php echo $errors->profile_error->first('title'); ?></span>
                                    </div>
                                </div> -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Description</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
                                        <input type="hidden" class="form-control" id="description" placeholder="Enter Description" name="description">
                                        <span style="color:red;" id="description_error"><?php echo $errors->customer_error->first('discription'); ?></span>
                                    </div>
                                    <!-- <button type="button" onclick="validate()" class="sa-btn-submit p-2 float-right mr-2">Add</button> -->
                                </div>
                                <!-- <div class="container" id="tbl">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Service Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="<?php echo URL::to('/') ?>/admin/legal-services"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
                                        <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Submit</button>
                                    </div>
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
    $('#legal_service').addClass('active mm-active');
</script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        var name = $('#name').val();

        var description = $('#description').val();

        var cnt = 0;
        var f = 0;
        $('#name_error').html("");
        $('#short_description_error').html("");
        $('#description_error').html("");
        $('#title_error').html("");

        $('#image_error').html("");


        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;



        if (name.trim() == '') {
            $('#name_error').html("Please select service name ");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#name').focus();
            }
        }
        if (description.trim() == '') {
            $('#description_error').html("Please enter description name ");
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
    // CKEDITOR.replace('description');
</script>
<script>
    // function validate() {
    //     var description = $('#description').val();
    //     var service_id = $('#name').val();
    //     var service_name = $('#name').find(':selected').attr('data-name');
    //     // alert(test)
    //     var cnt = 0;

    //     var uid = $('#uid').val();

    //     var ser_id = ++uid;

    //     var f = 0;

    //     $('#name_error').html("");
    //     $('#description_error').html("");

    //     if (service_id.trim() == '') {
    //         $('#name_error').html("Please select service name ");
    //         cnt = 1;
    //         f++;
    //         if (f == 1) {
    //             $('#name').focus();
    //         }
    //     }

    //     if (description.trim() == '') {
    //         $('#description_error').html("Please enter description name ");
    //         cnt = 1;
    //         f++;
    //         if (f == 1) {
    //             $('#description').focus();
    //         }
    //     }

    //     if (cnt == 1) {
    //         return false;
    //     } else {
    // $.ajax({
    //   // 'type': 'POST',
    //   // 'url': '{{URL::to("/")}}/admin/legal-service-description',
    //   data: {
    //     // "_token": "{{ csrf_token() }}",
    //     'description': description,
    //     'service_id': service_id
    //   },
    //   'success': function(data) {
    //     console.log(data);

    //     alert(data);

    //     // $('#catname_' + id).text(data);

    //   }
    // });
    // alert(ser_id);
    //  $('#uid').val();
    //         $('#uid').val(ser_id);
    //         // alert (i)
    //         // console.log(i);
    //         $('#tbl tbody').append('<tr class="child_' + ser_id + '" id="child_' + ser_id + '"><td>' + ser_id + '</td><td>' + service_name + '</td><input type="hidden" value="' + service_name + '" name="name[]" id="name"><td>' + description + '</td><input type="hidden" value="' + description + '" name="description[]" id="description"><td><a title="Delete" href="javascript:void(0)" class="sa-icons active"><i onclick="remove(' + ser_id + ')" class="fas fa-trash-alt mr-2"></i></a></td></tr>');

    //     }
    // }

    // function remove(ser_id) {
    //     $('#child_' + ser_id).remove();
    // }
</script>