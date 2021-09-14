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
                        <li class="breadcrumb-item">Legal Services</li>
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

                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/legal-services">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$service_title}}" id="" name="title" placeholder="Service Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/legal-services"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <a href="<?php echo URL::to('/'); ?>/admin/addService"><button type="button" class="sa-btn-add float-right p-2">
                                    Add Service
                                </button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Type</th>
                                        <th>Service Name</th>
                                        <!-- <th>ServiceTitle</th> -->
                                        <!-- <th>Descriptions</th> -->
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = ($getservices->currentpage() - 1) * $getservices->perpage() + 1;
                                    foreach ($getservices as $data) {
                                        // echo $data;

                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                @if($data->category_id == '1')
                                                {{"Legal Aid"}}
                                                @elseif($data->category_id == '2')
                                                {{"Documentation"}}
                                                @endif

                                            </td>
                                            <td>{{$data->service_name}}</td>
                                            <!-- <td>{{$data->service_title}}</td> -->

                                            <!-- <td></td> -->

                                            <td data-order="<?= strtotime($data->created_at); ?>">
                                                <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                            </td>
                                            <td>
                                                <a title="Edit" href="<?php echo URL::to('/'); ?>/admin/legal-services/{{$data->id}}/edit"><i class="fas fa-edit mr-2"></i></a>
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup('{{$data->id}}')"></i></a>
                                                @if($data->category_id == '1')
                                                <a title="Details" href="{{URL::to('/')}}/admin/addDeatails/{{$data->id}}" class="sa-icons active"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>

                                    <?php if (count($getservices) == 0) {
                                        echo "<tr><td colspan='7'><center>No record available<center><td></tr>";
                                    } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                        {{ $getservices->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
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
    $('#legal_service').addClass('active mm-active');
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
                window.location.href = "<?php echo URL::to('/admin/legalServiceDelete'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>