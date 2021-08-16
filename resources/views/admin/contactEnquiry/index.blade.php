@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Contact Enquiry</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Contact Enquiry</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/ContactEnquiry">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/ContactEnquiry"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Message</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($contact_us_data as $data) {

                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td> {{$data->name}}</td>
                                            <td>
                                                {{$data->email}}
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a style="cursor: pointer;" class="text-dark" data-toggle="modal" data-target="#exampleModalLong{{$i}}">
                                                    <?php $message = $data->message;
                                                    echo $dd = substr($message, 0, 10);
                                                    ?>
                                                    <!-- {{$data->message}} -->
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalLong{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$i}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle{{$i}}">Message</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- {{ $data->message}} -->
                                                                <?php echo $message; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </td>
                                            <td>{{$data->created_at}}</td>
                                            <td>
                                                <!-- <a title="view" href="<?php echo URL::to('/'); ?>/admin/adminProfile/" class="sa-icons1 active"><i class="fas fa-eye mr-2"></i></a> -->
                                                <!-- <a title="Edit" href="<?php echo URL::to('/'); ?>/admin/adminEdit/"><i class="fas fa-edit mr-2"></i></a> -->
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup({{$data->id}})"></i></a>

                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
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
                                        {{ $contact_us_data->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

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
    $('#contactenquiry').addClass('active mm-active');

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
                window.location.href = "<?php echo URL::to('/admin/ContactEnquiry'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>