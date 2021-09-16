@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Manage Customer</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Manage Customer</li>
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

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/customer_managment">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/customer_managment"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Profile</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email Id</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    $i = ($getusers->currentpage() - 1) * $getusers->perpage() + 1;

                                    foreach ($getusers as $data) {
                                        if ($data->status == 1 && $data->email_verify == 1) {
                                            $class = 'success';
                                            $status = 'Active';
                                            $thumbs = 'down';
                                            $statustxt = 'Make Inactive';
                                        } else {
                                            $class = 'danger';
                                            $status = 'Inactive';
                                            $thumbs = 'up';
                                            $statustxt = 'Make Active';
                                        }
                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                @if(isset($data->profileimage))
                                                <img style="border: 1px solid #ccc;" width="58px" src="<?php echo URL::to('/'); ?>/uploads/userprofile/{{$data->profileimage}}" alt="image">
                                                @else
                                                <img style="border: 1px solid #ccc;" width="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" alt="image">
                                                @endif
                                            </td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->username}}</td>
                                            <td>{{$data->email}}</td>
                                            <td data-order="<?= strtotime($data->created_at); ?>">
                                                <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                            </td>
                                            <td>{{$status}}</td>
                                            <td>
                                                <!-- <a title="view" href="<?php echo URL::to('/'); ?>/admin/adminProfile/{{$data->id}}" class="sa-icons1 active"><i class="fas fa-eye mr-2"></i></a> -->
                                                <!-- <a title="Edit" href="<?php echo URL::to('/'); ?>/admin/adminEdit/{{$data->id}}"><i class="fas fa-edit mr-2"></i></a> -->
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="functiondelete('{{ $data->id }}','delete','')"></i></a>
                                                <a title="{{$statustxt}}" href="#" onclick="functiondelete('{{ $data->id }}','status','{{$thumbs}}')">
                                                    <i class="far fa-thumbs-{{$thumbs}}"></i>
                                                </a>
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
    $(document).ready(function() {

        // $('#customer_menu').addClass('nav-item active');
        // $('#master_menu').addClass('nav-link active');
        // $('#master_open').addClass('menu-open active');
        $('#manage_customer').addClass('active mm-active');
    });
</script>
<script>
    function functiondelete(id, type, th) {

        if (type == 'delete') {
            var message = "Delete Customer?";
        } else {
            if (th == 'up') {
                var message = "Make Customer Active?";
            } else {
                var message = "Make Customer Inactive?";
            }

        }

        Swal.fire({
            title: message,
            // text: "You won't be delete record?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel: true

        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo URL::to('/'); ?>/admin/customer_managment/" + id + "?type=" + type,
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
        })

        //     }
        // });
    }
</script>