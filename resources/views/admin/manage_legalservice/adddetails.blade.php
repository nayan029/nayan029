@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Legal Services</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/legal-services">Legal Services</a></li>
                        <li class="breadcrumb-item">Add Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                    <div class="card-body">
                        <h3><b>{{@$service_name->service_name}} service</b></h3>
                        <br>
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/insertSubService" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $id }}" name="service_id" >
                            <input type="hidden" id="subcatId" name="subcatId" >
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Description</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
                                        <span style="color:red;" id="description_error">{{ $errors->first('discription'); }}</span>
                                    </div>
                                </div>
                                 
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
                        <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12" id="tbl">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($sub_service_list as $rows)
                                            <tr>
                                                <td>{{ $rows->description }}</td>
                                                <td>
                                               
                                                    <a title="Edit" href="javascript:void(0)" onclick="editLegalSubcat('{{ $rows->id }}','{{ $rows->description }}')"><i class="fas fa-edit mr-2"></i></a>
                                                    <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup('{{ $rows->id }}')"></i></a>
                                                    
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                        </div> 
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

<script>
    function openPopup(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be delete record?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?php echo URL::to('/admin/deleteSubService'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>

<script>
    function editLegalSubcat(id,desc) 
    {
        
        $('#subcatId').val(id);
        $('#description').val(desc);
        
    }
</script>