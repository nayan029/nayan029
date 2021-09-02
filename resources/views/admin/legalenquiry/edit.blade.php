@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Legal Enquiry View</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/legal-enquiry">Legal Enquiry</a></li>
                        <li class="breadcrumb-item">Legal Enquiry View</li>
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
                        <h4>Legal Enquiry Detail</h4>
                        <table id="example2" class="table table-bordered table-hover">
                              
                            <tr>
                                <th>Issue Name</th>
                                <td>{{$data->issue_name ? $data->issue_name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Subissue Name</th>
                                <td>{{$data->subissue_name ? $data->subissue_name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$data->name ? $data->name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$data->email ? $data->email : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{$data->mobile ? $data->mobile : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$data->short_description ? $data->short_description : '-'}}</td>
                            </tr>
                                
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?php echo URL::to('/') ?>/admin/legal-enquiry"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Lawyer Detail</h4>
                        <div class="row">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Profile</th>
                                        <th>First Name</th>
                                       <!--  <th>Last Name</th> -->
                                        <th>Email Id</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    $i = ($getActivelawyer->currentpage() - 1) * $getActivelawyer->perpage() + 1;

                                    foreach ($getActivelawyer as $data) {
                                        if ($data->status == 1) {
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
                                            <td> <?php
                                                    if (isset($data->profileimage)) {
                                                    ?>
                                                    <img style="border: 1px solid #ccc;" width="58px" src="<?php echo URL::to('/'); ?>/uploads/lawyerprofile/{{$data->profileimage}}" alt="User profile picture" style="height: 80px;">
                                                <?php } else {
                                                ?>
                                                    <img style="border: 1px solid #ccc;" width="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" alt="image">
                                                <?php
                                                    } ?>
                                            </td>
                                            <td>{{$data->name}} {{$data->username}}</td>
                                            
                                            <td>{{$data->email}}</td>
                                            <td>{{$status}}</td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                    <?php if (count($getActivelawyer) == 0) {
                                        echo "<tr><td colspan='7'><center>No record available<center><td></tr>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">
                                        {{ $getActivelawyer->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
                                    </nav>
                                </div>
                            </div>



                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@include('admin/include/footer')
<script>
    $('#legalenquiry').addClass('active mm-active');

</script>
