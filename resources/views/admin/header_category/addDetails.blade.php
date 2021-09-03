@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Legal Query Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/query-category">Legal Query Category</a></li>
                        <li class="breadcrumb-item">Add Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <h3><b>{{@$query_name->title}} Query</b></h3>
                    <br>
                    <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/insertSubQuerys" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $id }}" name="query_id">
                        <input type="hidden" id="subcatId" name="subcatId">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEduction">Description</label><span style="color: red;">*</span>
                                    <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" maxlength="250">
                                    <span style="color:red;" id="description_error">{{ $errors->first('discription'); }}</span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEduction">Document</label><span style="color: red;">*</span>
                                    <input type="file" class="form-control" id="document" name="document">
                                    <span style="color:red;" id="document_error">{{ $errors->first('discription'); }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo URL::to('/') ?>/admin/query-category"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
                                    <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12" id="tbl">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($sub_query_list as $rows)
                                    <tr>
                                        <td>{{ $rows->description }}</td>
                                        <td>

                                            <a title="Edit" href="javascript:void(0)" onclick="editLegalSubcat('{{ $rows->id }}','{{ $rows->description }}')"><i class="fas fa-edit mr-2"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup('{{ $rows->id }}')"></i></a>

                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('admin/include/footer')
<script>
    $('#category_menu').addClass('nav-item active');
    $('#categorymaster_menu').addClass('nav-link active');
    $('#categorymaster_open').addClass('menu-open active');

    $('#lawyer_cat').addClass('active mm-active');
</script>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#main_form').submit(function(e) {

        var name = $('#name').val();

        var description = $('#description').val();
        var documents = $('#document').val();

        var cnt = 0;
        var f = 0;
        $('#description_error').html("");
        $('#document_error').html("");

        $('#image_error').html("");






        if (description.trim() == '') {
            $('#description_error').html("Please enter description  ");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#description').focus();
            }
        }

        if (documents.trim() == '') {
            $('#document_error').html("Please select document");
            cnt = 1;
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
                window.location.href = "<?php echo URL::to('/admin/deleteSubQuery'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>

<script>
    function editLegalSubcat(id, desc) {

        $('#subcatId').val(id);
        $('#description').val(desc);

    }
</script>