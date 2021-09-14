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
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php
                                if (isset($userdata->profileimage)) {
                                ?>
                                    <img class="profile-user-img" src="<?php echo URL::to('/'); ?>/uploads/lawyerprofile/{{$userdata->profileimage}}" alt="User profile picture" style="height: 90px;">
                                <?php } else {
                                ?>
                                    <br>
                                    <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                <?php } ?>
                            </div>

                            <h3 class="profile-username text-center">{{ucfirst($userdata->name." ".$userdata->username)}}</h3>
                            <!-- <p class="text-center">@if($userdata->nicno) {{$userdata->nicno}} @else {{"N/A"}} @endif</p> -->
                            <!-- <p class="text-muted text-center">Software Engineer</p> -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Practice Area</h3>
                        </div>

                        <div class="card-body">
                            <p>
                                @if($userdata->about) {{$userdata->about}} @else {{"N/A"}} @endif
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <?php
                                            if ($userdata->profileimage) {
                                            ?>
                                                <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                                                <img class="profile-user-img img-fluid img-circle" src="<?php echo URL::to('/'); ?>/uploads/lawyerprofile/{{$userdata->profileimage}}" alt="User profile picture">
                                            <?php } else {
                                            ?>
                                                <br>
                                                <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                            <?php } ?>
                                            <span class="username">
                                                <a href="#">{{$userdata->name." ".$userdata->username}}</a>
                                                <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                                            </span>
                                            <span class="description"><?= date("d-M-Y", strtotime(Auth::user()->created_at)); ?></span>
                                        </div>
                                        <!-- /.user-block -->
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Name of lawyer ::</th>
                                                    <td> {{$userdata->name." ".$userdata->username}}</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Email ::</th>
                                                    <td> {{$userdata->email}}</td>

                                                </tr>

                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Mobile ::</th>
                                                    <td> @if($userdata->mobile) {{$userdata->mobile}} @else {{"N/A"}} @endif </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Location ::</th>
                                                    <td> @if($userdata->location) {{ucfirst($userdata->location)}} @else {{"N/A"}} @endif</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Experience ::</th>
                                                    <td> @if($userdata->experience) {{ucfirst($userdata->experience )}} @else {{"N/A"}} @endif</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Allotment Number ::</th>
                                                    <td> @if($userdata->allotmentno) {{ucfirst($userdata->allotmentno )}} @else {{"N/A"}} @endif</td>

                                                </tr> <tr>
                                                    <th scope="row" style="color: #007bff;"> Membership Number ::</th>
                                                    <td> @if($userdata->membershipno) {{ucfirst($userdata->membershipno )}} @else {{"N/A"}} @endif</td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Languages ::</th>
                                                    <td>
                                                        <?php
                                                        ob_start();
                                                        foreach ($userlanguages as $result) {
                                                            echo ucfirst($result->language . ',');
                                                        }
                                                        $output = ob_get_clean();

                                                        echo rtrim($output, ','); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="color: #007bff;"> Signature ::</th>
                                                    <td> <?php
                                                            if ($userdata->siganturepic) {
                                                            ?>
                                                            <img class="profile-user-img" src="<?php echo URL::to('/'); ?>/uploads/signature/{{$userdata->siganturepic}}" alt="User profile picture" style="height:80px;">
                                                        <?php } else {
                                                        ?>
                                                            {{"N/A"}}
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" style="color: #007bff;">Sno</th>
                                                                <th scope="col" style="color: #007bff;">Degree Name</th>
                                                                <th scope="col" style="color: #007bff;">Year</th>
                                                                <th scope="col" style="color: #007bff;">Institution</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td> @if($userdata->frollno) {{ucfirst($userdata->frollno)}} @else {{"N/A"}} @endif</td>
                                                                <td> @if($userdata->fyear) {{ucfirst($userdata->fyear)}} @else {{"N/A"}} @endif</td>
                                                                <td> @if($userdata->finstitue) {{ucfirst($userdata->finstitue)}} @else {{"N/A"}} @endif</td>
                                                            </tr>
                                                            @if(isset($userdata->srollno)|| isset($userdata->syear)|| isset($userdata->sinstitue))
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td> @if($userdata->srollno) {{ucfirst($userdata->srollno)}} @else {{"N/A"}} @endif</td>
                                                                <td> @if($userdata->syear) {{ucfirst($userdata->syear)}} @else {{"N/A"}} @endif</td>
                                                                <td> @if($userdata->sinstitue) {{ucfirst($userdata->sinstitue)}} @else {{"N/A"}} @endif</td>
                                                            </tr>
                                                            @endif
                                                            <!-- <tr>
                                                                <th scope="row">3</th>
                                                                <td> @if($userdata->trollno) {{$userdata->trollno}} @else {{"N/A"}} @endif</td>
                                                                <td> @if($userdata->tyear) {{$userdata->tyear}} @else {{"N/A"}} @endif</td>
                                                                <td> @if($userdata->tinstitue) {{$userdata->tinstitue}} @else {{"N/A"}} @endif</td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.post -->


                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@include('admin/include/footer')
<script>
    $(document).ready(function() {

        $('#lawyer_menu').addClass('nav-item active');
        $('#manage_lawyer').addClass('active mm-active');

    });
</script>