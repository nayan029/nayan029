@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Document Enquiry</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Document Enquiry</li>
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
                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/document-enquiry">

                                <div class="form-group mr-2">
                                    <input type="text" maxlength="20" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/document-enquiry"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <!-- Button trigger modal -->

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Document Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = ($getData->currentpage()-1)* $getData->perpage() + 1;
                                    @endphp
                                    @if(count($getData)>0)
                                    @foreach($getData as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->document_name}}</td>
                                        <td>{{date("d-M-Y h:i A", strtotime($data->created_at))}}</td>
                                        <td>
                                            <a title="Edit" class="mr-2" href="javascript:void(0)" onclick="" data-toggle="modal" data-target="#exampleModaledit{{$data->id}}"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="functiondelete('{{ $data->id }}','delete','')"></i></a>
                                            @if(isset($data->document)) <a title="View" href="{{URL::to('/')}}/uploads/legal_documents/{{$data->document}}" class="sa-icons active"><i class="fas fa-eye mr-2"></i></a>@endif
                                        </td>

                                    </tr>

                                    @php
                                    $i++
                                    @endphp
                                    <!-- edit modal -->
                                    <div class="modal fade" id="exampleModaledit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Upload document</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{URL::to('/')}}/admin/document/upload" id="document_form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Upload document</label><span style="color: red;"> *</span>
                                                            <input type="file" class="form-control" name="document" id="document" placeholder="upload documemt">
                                                            <span style="color: red;" id="document_error"></span>
                                                            <input type="hidden" class="form-control" name="id" id="id" value="{{$data->id}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- edit modal -->
                                    @endforeach
                                    @else
                                    @endif


                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                        {{ $getData->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->.

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

        $('#documentenquiry').addClass('nav-item active');

    });
</script>
<script>
    function functiondelete(id, type, th) {

        if (type == 'delete') {
            var message = "Delete Enquiry?";
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
                    url: "<?php echo URL::to('/'); ?>/admin/document-enquiry/" + id + "?type=" + type,
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
    $('#document_form').submit(function(e) {


        var documents = $('#document').val();

        var cnt = 0;
        var f = 0;
        $('#document_error').html("");

        if (documents.trim() == '') {
            $('#document_error').html("Please select document");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#document').focus();
            }
        }
        if (documents) {
            var formData = new FormData();
            var file = document.getElementById('document').files[0];
            formData.append("Filedata", file);
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "docx" && t != "pdf" && t != "doc") {
                $('#document_error').html("Only PDF, DOC and DOCX document are allowed");
                cnt = 1;
            }
        }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
</script>