@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Lawyer Profile</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Lawyer Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-outline sa-card-outlines" style="object-fit: contain;">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php
                                if ($userdata->photo) {
                                ?>
                                    <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" alt="User profile picture">
                                <?php } else {
                                ?>
                                    <br>
                                    <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                <?php } ?>

                            </div>
                            <h3 class="profile-username text-center">{{$userdata->name}}</h3>
                            <!-- <p class="text-muted text-center">Corporate Lawyer</p> -->

                            <ul class="list-group list-group-unbordered mb-3 mt-3">
                                <!-- <li class="list-group-item">
                                    <b>Education</b> <a class="float-right">LLB</a>
                                </li> -->
                                <!-- <li class="list-group-item">
                                    <b>Experience</b> <a class="float-right">1 Year</a>
                                </li> -->
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$userdata->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Contact</b> <a class="float-right">{{$userdata->mobile}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last Updated</b> <a class="float-right">{{$userdata->updated_at}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

</div>

@include('admin/include/footer')