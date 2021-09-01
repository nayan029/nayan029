@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Lawyer Edit</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/manage-lawyer">Manage Lawyer</a></li>
                        <li class="breadcrumb-item">Lawyer Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-body">
                        <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/manage-lawyer" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Lawyer Name</label><span style="color: red;">*</span>
                                        <input type="name" maxlength="20" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter First Name">
                                        <span style="color:red;" id="name_error"><?php echo $errors->name_error->first('name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email Id</label><span style="color: red;">*</span>
                                        <input type="email" maxlength="250" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Id">
                                        <span style="color:red;" id="email_error"><?php echo $errors->email_error->first('email'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputContactNo">Contact No</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" id="mobile" name="phone" aria-describedby="numberHelp" placeholder="Enter Contact No">
                                        <span style="color:red;" id="mobile_error"><?php echo $errors->mobile_error->first('mobile'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Profile Pic</label><span style="color: red;">*</span>
                                        <input type="file" class="form-control" id="image" name="image" aria-describedby="nameHelp" placeholder="User Profile">
                                        <span style="color:red;" id="image_error"><?php echo $errors->customer_error->first('company_logo'); ?></span>
                                    </div>
                                </div>
                                <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">DOB </label><span style="color: red;">*</span>
                                        <input type="date" class="form-control" id="dob" name="dob">
                                        <span style="color:red;" id="dob_error"><?php echo $errors->customer_error->first('company_logo'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Experience</label><span style="color: red;">*</span>
                                        <input type="name" maxlength="20" class="form-control" id="experience" name="experience" aria-describedby="nameHelp" placeholder="Enter experience ">
                                        <span style="color:red;" id="experience_error"><?php echo $errors->name_error->first('name'); ?></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Practice areas</label><span style="color: red;">*</span>
                                        <textarea class="form-control" id="practice_area" name="practice_area" aria-describedby="nameHelp" placeholder=" please enter practice area"></textarea>
                                        <span style="color:red;" id="practice_area_error"><?php echo $errors->reset_password->first('password'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Specialization</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="specialization" name="specialization" aria-describedby="nameHelp" placeholder="please enter specialization">
                                        <span style="color:red;" id="specialization_error"><?php echo $errors->reset_password->first('specialization'); ?></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction"> Degree Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="degreename" name="degreename" aria-describedby="nameHelp" placeholder="please enter degree name">
                                        <span style="color:red;" id="degreename_error"><?php echo $errors->reset_password->first('degreename'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Year</label><span style="color: red;">*</span>
                                        <input type="text" maxlength="20" class="form-control" id="year" name="year" aria-describedby="nameHelp" placeholder="year">
                                        <span style="color:red;" id="year_error"><?php echo $errors->reset_password->first('year'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Institution</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" id="institution" name="institution" aria-describedby="nameHelp" placeholder="confirm password">
                                        <span style="color:red;" id="institution_error"><?php echo $errors->reset_password->first('institution'); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Price</label><span style="color: red;">*</span>
                                        <input type="password" class="form-control" id="price" name="price" aria-describedby="nameHelp" placeholder="confirm password">
                                        <span style="color:red;" id="price_error"><?php echo $errors->reset_password->first('price'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <a href="<?php echo URL::to('/') ?>/admin/manageAdmin"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>

                                    <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@include('admin/include/footer')
<script>
    $(document).ready(function() {

        $('#lawyer_menu').addClass('nav-item active');
        $('#manage_lawyer').addClass('active mm-active');

    });
</script>