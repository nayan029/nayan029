@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Review Rating</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Review Rating</li>
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



                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Review Name</th>
                                        <th>Reating</th>
                                        <th>Lawyer Name</th>
                                        <th>User Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = ($allreviews->currentpage() - 1) * $allreviews->perpage() + 1;

                                    @endphp

                                    @foreach($allreviews as $data)

                                    @if ($data->status == 1)
                                    @php
                                    $class = 'success';
                                    $status = 'Active';
                                    $thumbs = 'down';
                                    $statustxt = 'Make Inactive';
                                    @endphp
                                    @else

                                    @php
                                    $class = 'danger';
                                    $status = 'Inactive';
                                    $thumbs = 'up';
                                    $statustxt = 'Make Active';
                                    @endphp

                                    @endif

                                    @if ($data->email_verify == 1)
                                    @php
                                    $class1 = 'success';
                                    $status1 = 'Verified';
                                    @endphp
                                    @else

                                    @php

                                    $class1 = 'danger';
                                    $status1 = 'Not Verified';
                                    @endphp
                                    @endif

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            {{$data->review}}
                                        </td>
                                        <td>{{$data->rating}}</td>
                                        <td>{{$data->lawyer_name}}</td>
                                        <td>{{$data->user_name}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="functiondelete('{{ $data->id }}','delete','')"></i></a>
                                            <a title="{{$statustxt}}" href="#" onclick="functiondelete('{{ $data->id }}','status','{{$thumbs}}')">
                                                <i class="far fa-thumbs-{{$thumbs}}"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                        {{ $allreviews->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

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
        $('#reviewrating').addClass('active mm-active');

    });
</script>

<script>
    // function functiondelete(id) {
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be delete record?",
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.value) {
    //             $.ajax({
    //                 url: "<?php echo URL::to('/'); ?>/admin/review-rating/" + id,
    //                 type: "DELETE",
    //                 data: {
    //                     id: id,
    //                     _token: "<?php echo csrf_token(); ?>"
    //                 },
    //                 success: function(response) {
    //                     if (response) {
    //                         // location.reload();
    //                         window.location.href = "";

    //                     }
    //                 }
    //             });

    //         }
    //     })
    // }



    function functiondelete(id, type, th) {

        if (type == 'delete') {
            var message = "Are you sure?";
        } else {
            if (th == 'up') {
                var message = "Make Active?";
            } else {
                var message = "Make  Inactive?";
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
                    url: "<?php echo URL::to('/'); ?>/admin/review-rating/" + id + "?type=" + type,
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    success: function(response) {
                        if (response) {
                            location.reload();
                            // window.location.href = "";


                        }
                    }
                });

            }
        })

        //     }
        // });
    }
</script>