@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small> Enquiry</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"> Enquiry</li>
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
                            <form class="form-inline mb-3" method="GET" action="{{ URL::to('/') }}/admin/enquiry">

                                <div class="form-group mr-2">
                                    <input type="text" maxlength="40" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="{{ URL::to('/') }}/admin/enquiry"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = ($contact_us_data->currentpage()-1)* $contact_us_data->perpage() + 1; @endphp
                                    @foreach($contact_us_data as $data)
                                    <!-- @if ($data->status == 1)
                                    $class = 'success';
                                    $status = 'Active';
                                    $thumbs = 'down';
                                    $statustxt = 'Make Inactive';
                                    @else
                                    $class = 'danger';
                                    $status = 'Inactive';
                                    $thumbs = 'up';
                                    $statustxt = 'Make Active';

                                    @endif -->
                                    <!-- @if ($data->email_verify == 1)
                                    $class1 = 'success';
                                    $status1 = 'Verified';
                                    @else
                                    $class1 = 'danger';
                                    $status1 = 'Not Verified';

                                    @endif -->
                                    <?php if ($data->status == 1) {
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

                                    if ($data->email_verify == 1) {
                                        $class1 = 'success';
                                        $status1 = 'Verified';
                                    } else {
                                        $class1 = 'danger';
                                        $status1 = 'Not Verified';
                                    }

                                    ?>
                                    <tr>

                                        <td>{{$i}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->mobile}}</td>
                                        <td>@if(isset($data->email)){{$data->email}}@else{{"N/A"}}@endif</td>
                                        <td><span title="{{$data->feedback}}">@if(isset($data->status))
                                                @if($data->status=='1'){{"Close"}}
                                                @endif
                                                @if($data->status=='2'){{"Call Not Recived"}}
                                                @else{{"Pending"}}
                                                @endif
                                                @endif
                                            </span>
                                        </td>

                                        <td data-order="<?= strtotime($data->created_at); ?>">
                                            <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                        </td>
                                        <td>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="functiondelete('{{ $data->id }}','delete','')"></i></a>
                                            <a title="Edit" class="mr-2" href="javascript:void(0)" onclick="functionedit('{{$data->id}}')" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit text-info font-16"></i></a>

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
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="append">

    </div>
</div>
<!-- edit modal -->
@include('admin/include/footer')
<script>
    $('#enquiry').addClass('active mm-active');
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
                    url: "<?php echo URL::to('/'); ?>/admin/enquiry/" + id,
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    success: function(response) {
                        if (response) {
                            location.reload();
                            window.location.href = "";

                        }
                    }
                });

            }
        })
    }
</script>
<script>
    function functiondelete(id, type, th) {

        if (type == 'delete') {
            var message = "Delete lawyer?";
        } else {
            if (th == 'up') {
                var message = "Make lawyer Active?";
            } else {
                var message = "Make lawyer Inactive?";
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
                    url: "<?php echo URL::to('/'); ?>/admin/enquiry/" + id + "?type=" + type,
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
<script>
    function functionedit(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/admin/enquiry/" + id + "/edit",
            type: "GET",
            success: function(response) {
                $('#append').html(response);
                // $('#exampleModaledit').modal('show');
            }
        });

    }
</script>
<script>
    $('#edit_form').submit(function(e) {

        var status = $('#status').val();

        var cnt = 0;
        var f = 0;

        $('#status_error').html("");


        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        if (status.trim() == '') {
            $('#status_error').html("Please select status");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#status').focus();
            }
        }

        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
</script>