@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Manage Blog</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Manage Blog</li>
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
                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/Blog">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$blog_title}}" id="" name="title" placeholder="Blog Title">
                                </div>  
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/Blog"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <a href="<?php echo URL::to('/'); ?>/admin/addBlog"><button type="button" class="sa-btn-add float-right p-2">
                                    Add Blog
                                </button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Blog Image</th>
                                        <th>Blog Title</th>
                                        <th>Short Description</th>
                                        <!-- <th>Descriptions</th> -->
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(count($getblogs))
                                    {
                                    // $i = 1;
                                    $i = ($getblogs->currentpage()-1)* $getblogs->perpage() + 1;

                                    foreach ($getblogs as $data) {

                                    ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>
                                                <?php
                                                if ($data->blog_image) {
                                                ?>
                                                    <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                                                    <img src="<?php echo URL::to('/'); ?>/uploads/blogs/{{$data->blog_image}}" alt="Blog Image" class="sa-profile-img img-circle elevation-2">
                                                <?php } else {
                                                    ?>
                                                    <br>
                                                    <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                                    <?php } ?>
                                                    
                                                </td>
                                                <td>{{$data->blog_title}}</td>
                                            <td>{{$data->short_description}}</td>
                                            
                                            <td data-order="<?= strtotime($data->created_at); ?>">
                                                <?= date("d-M-Y h:i A", strtotime($data->created_at)); ?>
                                            </td>
                                            <td>
                                                <a title="Edit" href="<?php echo URL::to('/'); ?>/admin/Blog/{{$data->id}}/edit"><i class="fas fa-edit mr-2"></i></a>
                                                <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup('{{$data->id}}')"></i></a>
                                            </td>

                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                }else {?>
                                   	<td colspan="7" style="text-align:center">No Record Available</td>

                              <?php  }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">

                                        {{ $getblogs->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

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
    $('#manage_blog').addClass('active mm-active');
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
                window.location.href = "<?php echo URL::to('/admin/blogDelete'); ?>/"+ id;
            }else {
                return false;
            }
        })
    }
</script>