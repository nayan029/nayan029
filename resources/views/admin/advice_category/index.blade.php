@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Manage Lawyer Category</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Manage Lawyer Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="sa-btn-add float-right p-2" data-toggle="modal" data-target="#exampleModal">
                                Add
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="container">
                                            <form id="main_id" method="POST" action="<?php echo URL::to('/') ?>/admin/adviceCategory">
                                                @csrf
                                                <!-- <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputEmail1">Type</label><span style="color: red;">*</span>
                                                        <select name="type" id="type" class="form-control">
                                                            <option value="">Select Type</option>
                                                            <option value="question">Question & Answers</option>
                                                            <option value="guides">Guides</option>
                                                        </select>   
                                                        <span style="color:red;" id="type_error"></span>
                                                    </div>
                                                </div> -->
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputEmail1">Category</label><span style="color: red;">*</span>
                                                        <input type="text" maxlength="250" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter category">
                                                        <span style="color:red;" id="name_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputEmail1">Discription</label><span style="color: red;">*</span>
                                                        <textarea class="form-control" id="discription" name="discription" aria-describedby="emailHelp" placeholder="Enter Discription">
                                                        </textarea>
                                                        <span style="color:red;" id="discription_error"></span>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="checkvalidation();" id="submitform" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Category Name</th>
                                        <!-- <th>Type</th> -->
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    $i = ($categorylist->currentpage()-1)* $categorylist->perpage() + 1;
                                    
                                    foreach ($categorylist as $data) {

                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td> <?php echo ucfirst($data->category_name);?> </td>
                                            <!-- <td> <?php echo ucfirst($data->type);?>  </td> -->
                                            
                                            <td data-order="<?= strtotime($data->created_at); ?>">
                                                <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                            </td>
                                            <td>
                                                <a title="Edit" class="mr-2" href="javascript:void(0)" onclick="functionedit('{{$data->id}}')" data-toggle="modal" data-target="#exampleModaledit"><i class="fas fa-edit text-info font-16"></i></a>
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup('{{$data->id}}')"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                
                                    ?>
                                    
                                </tbody>
                                
                            </table>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                    {{ $categorylist->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->.
                        <!-- edit modal -->
                        <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" id="append">

                            </div>
                        </div>
                        <!-- edit modal -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.control-sidebar -->
</div>
@include('admin/include/footer')
<script>
    $(document).ready(function () {
        
        $('#category_menu').addClass('nav-item active');
        $('#categorymaster_menu').addClass('nav-link active');
        $('#categorymaster_open').addClass('menu-open active');
        $('#advice_cat').addClass('active mm-active');
    });
</script>

<script>
$('#advice_cat').addClass('active mm-active');



    function functionedit(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/adviceCategory/" + id + "/edit",
            type: "GET",
            success: function(response) {
                $('#append').html(response);
                // $('#exampleModaledit').modal('show');
            }
        });

    }
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

                $.ajax({
                    url: "<?php echo URL::to('/'); ?>/admin/adviceCategory/" + id,
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    success: function(response) {
                        if (response) {
                            // location.reload();
                            window.location.href = "";

                        }
                    }
                });

            }
        })
    }
</script>
<script>
    /*Validation*/
    function checkvalidation() {
        var name = $('#name').val();
        // var type = $('#type').val();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/getexitadvicecategory",
            type: "POST",
            data: {
                // type:type,
                name: name,
                _token: "<?php echo csrf_token(); ?>"
            },
            success: function(response) {
                if (response) {
                    getvalidation(response);
                }


            }
        });

    }
    /*Validation*/
    function getvalidation(response) {

        $('#submitform').prop('disabled', true);
        var name = $('#name').val();
        var discription = $('#discription').val();
        // var type = $('#type').val();

        var cnt = 0;
        $('#name_error').html("");
        $('#discription_error').html("");
        // $('#type_error').html("");

        if (name.trim() == '') {
            $('#name_error').html("Please enter Category");
            cnt = 1;
        }
        // if (type.trim() == '') {
        //     $('#type_error').html("Please Select Type");
        //     cnt = 1;
        // }
        if (response == 1) {
            $('#name_error').html("This Category is Already Exit");
            cnt = 1;
        }
        if (discription.trim() == '') {
            $('#discription_error').html("Please enter discription");
            cnt = 1;
        }
        if (cnt == 1) {
            $('#submitform').prop('disabled', false);
            return false;
        } else {
            $('#main_id').submit();
        }
    }
</script>