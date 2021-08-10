@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Other Resources</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Other Resources</li>
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
                            <a href="<?php echo URL::to('/'); ?>/admin/addresources"><button type="button" class="sa-btn-add float-right p-2">
                                    Add
                                </button>
                            </a>
                            <br>
                            <!-- <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/manage-lawyer">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/manage-lawyer"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form> -->

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Resource Name</th>
                                        <!-- <th>Discription</th> -->
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    $i = ($getquerys->currentpage()-1)* $getquerys->perpage() + 1;
                                    foreach ($getquerys as $values) {
                                        
                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$values->category_name}}</td>   
                                            <!-- <td>{{$values->description}}</td> -->
                                            <td>{{$values->question}}</td>
                                            <td><?php echo $values->answer; ?></td>
                                            <td data-order="<?= strtotime($values->created_at); ?>">
                                                <?= date("d-M-Y h:i A", strtotime($values->created_at)); ?>
                                            </td>
                                            <td>
                                                <a title="Edit" href="<?php echo URL::to('/'); ?>/admin/other-resoureces/{{$values->id}}/edit"><i class="fas fa-edit mr-2"></i></a>
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="functiondelete('{{$values->id}}')"></i></a>
                                            </td>

                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                    <?php if (count($getquerys) == 0) {
                                        echo "<tr><td colspan='7'><center>No record available<center><td></tr>";
                                    } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                    {{ $getquerys->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
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

        // $('#lawyer_menu').addClass('nav-item active');
        $('#other_resources').addClass('active mm-active');

    });
</script>

<script>
    function functiondelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be delete record?",

            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?php echo URL::to('/admin/otherresoureces'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>