@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Document Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Document Details</li>
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

                            <a href="<?php echo URL::to('/'); ?>/admin/add-document-details"><button type="button" class="sa-btn-add float-right p-2">
                                    Add Details
                                </button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = ($allDetails->currentpage()-1)* $allDetails->perpage() + 1; @endphp

                                    @foreach($allDetails as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>@if( $data->type=='2') {{"Content"}} @elseif($data->type=='1') {{"Image"}} @endif </td>
                                        <td>{{$data->title}}</td>
                                        <td>@if(isset($data->type) && $data->type=='2') {!! substr($data->description, 0, 50);!!} @endif</td>
                                        <td>@if(isset($data->type) && $data->type=='1') <img src="{{URL::to('/')}}/uploads/document_image/{{$data->image}}" alt="image" style="height: 70px; width:70px">@endif</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt " onclick="functiondelete('{{ $data->id }}','delete')"></i></a>
                                            <a title="Edit" class="ml-2" href="{{URL::to('/')}}/admin/document-deatils/{{$data->id}}"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a target="_blank" title="View" class="" href="{{URL::to('/')}}/admin/view-content/{{App\Helpers\CryptHelper::encryptstring($data->id)}}"><i class="fas fa-eye text-info font-16"></i></a>

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
@include('admin/include/footer')
<script>
    $('#documentdetails').addClass('active mm-active');
</script>
<script>
    function functiondelete(id, type) {
        Swal.fire({
            title: "Delete Details",
            text: "You won't be delete record?",
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
                    url: "<?php echo URL::to('/'); ?>/admin/document-deatils/" + id,
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
    }
</script>