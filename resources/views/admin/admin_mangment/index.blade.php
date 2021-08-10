@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Manage Admin</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Manage Admin</li>
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
                        <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/manageAdmin">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>  
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/manageAdmin"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <a href="<?php echo URL::to('/'); ?>/admin/addAdmin"><button type="button" class="sa-btn-add float-right p-2">
                                    Add
                                </button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <!-- <th>Status</th> -->
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    $i = ($getusers->currentpage()-1)* $getusers->perpage() + 1;
                                    foreach ($getusers as $data) {

                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                <?php
                                                if ($data->photo) {
                                                ?>
                                                    <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                                                    <img src="<?php echo URL::to('/'); ?>/uploads/profile/{{$data->photo}}" alt="User Image" class="sa-profile-img img-circle elevation-2">
                                                <?php } else {
                                                ?>
                                                    <br>
                                                    <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                                <?php } ?>


                                            </td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->mobile}}</td>
                                            <!-- <td>Activate</td> -->
                                            <td data-order="<?= strtotime($data->created_at); ?>">
                                                <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                            </td>
                                            <td>
                                                <!-- <a title="view" href="<?php echo URL::to('/'); ?>/admin/adminProfile/{{$data->id}}" class="sa-icons1 active"><i class="fas fa-eye mr-2"></i></a> -->
                                                <a title="Edit" href="<?php echo URL::to('/'); ?>/admin/adminEdit/{{$data->id}}"><i class="fas fa-edit mr-2"></i></a>
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2"  onclick="openPopup('{{ $data->id }}')"></i></a>
                                                <!-- <i class="far fa-thumbs-up"></i> -->
                                                <!-- onclick="functiondelete('{{ $data->id }}')" -->
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                    <?php if (count($getusers) == 0) {
                                        echo "<tr><td colspan='7'><center>No record available<center><td></tr>";
                                    } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                        <!-- <ul class="pagination float-right mt-3 mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul> -->
							    {{ $getusers->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
        
        //$('#admin_menu').addClass('nav-link active');
        $('#admin_menu').addClass('nav-item active');
        $('#master_menu').addClass('nav-link active');
        $('#master_open').addClass('menu-open active');
        $('#manage_admin').addClass('active mm-active');

    });
</script>

<script>
    function functiondelete(id) {
        var c = confirm('are you sure');
        if (c = 'true') {
            $.ajax({
                url: "<?php echo URL::to('/'); ?>/admin/adminDelete/" + id,
                type: "DELETE",
                data: {
                    id: id,
                    _token: "<?php echo csrf_token(); ?>"
                },
                success: function(response) {
                    if (response) {
                        location.reload();
                    }
                }
            });
        }
    }
</script>
<script>
        function openPopup(id) 
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be delete record?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?php echo URL::to('/admin/adminDelete'); ?>/"+ id;
            } else {
                return false;
            }
        })
    }
</script>