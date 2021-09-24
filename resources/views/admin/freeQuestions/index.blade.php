@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Free Question</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Free Question</li>
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
                            <form class="form-inline mb-3" method="GET" action="{{ URL::to('/') }}/admin/free-questions">

                                <div class="form-group mr-2">
                                    <input type="text" maxlength="40" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="{{ URL::to('/') }}/admin/free-questions"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Area Of Law</th>
                                        <!-- <th>City</th> -->
                                        <th>Subject</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = ($quetion_list->currentpage()-1)* $quetion_list->perpage() + 1; @endphp
                                    @foreach($quetion_list as $data)
                                    <tr>

                                        <td>{{$i}}</td>
                                        <td>{{$data->lawarea}}</td>
                                        <!-- <td>{{$data->city}}</td> -->
                                        <td> {{substr($data->subject,0, 40)}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->mobile}}</td>
                                        <td data-order="<?= strtotime($data->created_at); ?>">
                                            <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                        </td>
                                        <td>
                                            <a title="Edit" href="javascript:void(0)" onclick="functionedit('{{ $data->id }}')" data-toggle="modal" data-target="#exampleModaledit"><i class="fas fa-eye  mr-2"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup('{{$data->id}}')"></i></a>
                                        </td>
                                        @php $i++; @endphp
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">



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
<!-- edit modal -->
<div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="append">

    </div>
</div>
<!-- edit modal -->
@include('admin/include/footer')
<script>
    function functionedit(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/free-questions/" + id + "/edit",
            type: "GET",
            success: function(response) {
                $('#append').html(response);
                // $('#exampleModaledit').modal('show');
            }
        });

    }
</script>
<script>
    $('#freequestions').addClass('active mm-active');
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
                window.location.href = "<?php echo URL::to('/admin/free-questions'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>