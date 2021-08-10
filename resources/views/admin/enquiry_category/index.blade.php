@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Enquiry Category</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Enquiry Category</li>
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
                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/enquiry-category">

                                <div class="form-group mr-2">
                                    <input type="text" maxlength="20" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/enquiry-category"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
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
                                            <form id="main_id" method="POST" action="<?php echo URL::to('/') ?>/admin/enquiry-category">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputEmail1">Category</label><span style="color: red;">*</span>
                                                        <select class="form-control" name="category" id="category">
                                                            <option value="">Select a value</option>
                                                            <option value="test">test</option>
                                                        </select>
                                                        <span style="color:red;" id="category_error"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputEmail1">Enquiry Category</label><span style="color: red;">*</span>
                                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter category">
                                                        <span style="color:red;" id="name_error"></span>
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
                                        <th>Enquiry Category</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $i = ($getData->currentpage()-1)* $getData->perpage() + 1;
                                    @endphp
                                    @foreach($getData as $user)

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a title="Edit" class="mr-2" href="javascript:void(0)" onclick="" data-toggle="modal" data-target="#exampleModaledit"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick=""></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @php

                                    $i++
                                    @endphp

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">

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
    $(document).ready(function() {

        $('#enquiry_cat').addClass('nav-item active');

    });
</script>

<script>
    function functionedit(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/manageCategory/" + id + "/edit",
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
                    url: "<?php echo URL::to('/'); ?>/admin/manageCategory/" + id,
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
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/getexitcategory",
            type: "POST",
            data: {
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
        var category = $('#category').val();
        var name = $('#name').val();

        var cnt = 0;
        $('#category_error').html("");
        $('#name_error').html("");

        if (name.trim() == '') {
            $('#name_error').html("Please enter enquiey category");
            cnt = 1;
        }
        if (category.trim() == '') {
            $('#category_error').html("Please select category");
            cnt = 1;
        }
        if (response == 1) {
            $('#name_error').html("This Category is Already Exit");
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