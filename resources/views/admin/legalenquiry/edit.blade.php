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
                                <td>{{$enquirydata->issue_name ? $enquirydata->issue_name : '-'}} - {{$enquirydata->subissue_name ? $enquirydata->subissue_name : '-'}}</td>
                            </tr>
                            <!-- <tr>
                                <th>Subissue Name</th>
                                <td>{{$enquirydata->subissue_name ? $enquirydata->subissue_name : '-'}}</td>
                            </tr> -->
                            <tr>
                                <th>Name</th>
                                <td>{{$enquirydata->name ? $enquirydata->name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$enquirydata->email ? $enquirydata->email : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{$enquirydata->mobile ? $enquirydata->mobile : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>

                                <td>{{$enquirydata->other_info ? $enquirydata->other_info : '-'}}</td>
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
                                        <th>Lawyer Name</th>
                                        <!--  <th>Last Name</th> -->
                                        <th>Email</th>
                                        <th>Specialization Category</th>
                                        <th>Experience</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    $i = ($getActivelawyer->currentpage() - 1) * $getActivelawyer->perpage() + 1;

                                    foreach ($getActivelawyer as $data) {
                                        $lid = $data->id;
                                        if ($data->status == 1) {
                                            $class = 'success';
                                            //$status = 'Active';
                                            $thumbs = 'down';
                                            $statustxt = 'Make Inactive';
                                        } else {
                                            $class = 'danger';
                                            //$status = 'Inactive';
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
                                            <td>{{$data->category_name}}</td>
                                            <td>{{$data->experience}}</td>
                                            <td>{{$data->mobile}}</td>
                                            <td id="appendstatus{{$data->id}}">
                                                <!-- <?php
                                                        if ($data->assign_lawyer == "1") { ?>
                                                    <span class="label label-warning" onclick="change_status('<?= $data->id ?>','0','<?= $enquiry_id ?>');" style="cursor: pointer; color: 
                                                    #000080;" title="You can Disapprove this.">Assign</span> 
                                                    <?php } else if ($data->assign_lawyer == "0") {
                                                    ?>

                                                    <span class="label label-info" onclick="change_status('<?= $data->id ?>','1','<?= $enquiry_id ?>');" style="cursor: pointer; color: 
                                                    #800000;" title="You can Assign this.">Disapprove</span>
                                                    
                                                    <?php  }
                                                    ?>        -->

                                                @php $lid = $enquirydata->lawyer_id @endphp



                                                <?php
                                                $did = $data->id;
                                                if ($did == $lid) { ?>
                                                    <span class="label label-warning" onclick="change_status('<?= $data->id ?>','0','<?= $enquiry_id ?>');" style="cursor: pointer; color: 
                                                    #000080;" title="You can Disapprove this.">Assign</span>
                                                <?php } else if ($data->lawyer_id == NULL) {
                                                ?>

                                                    <span class="label label-info" onclick="change_status('<?= $data->id ?>','1','<?= $enquiry_id ?>');" style="cursor: pointer; color: 
                                                    #800000;" title="You can Assign this.">Disapprove</span>

                                                <?php  }
                                                ?>



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

<script>
    function change_status(id, ass_status, enquiry_id) {
        
        if (ass_status == 0) {
            var statusNew = 'Disapprove';
        } else {

            var statusNew = 'Assign';
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "you want to " + statusNew + " this Lawyer?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, " + statusNew + " it!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    async: false,
                    global: false,
                    type: "POST",
                    data: {
                        id: id,
                        ass_status: ass_status,
                        enquiry_id: enquiry_id,
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    url: "<?php echo URL::to('/'); ?>/admin/update_statuss",
                    success: function(response) {
                        if (response == 1) {
                            var statushtml = '<span class="label label-warning" onclick="change_status(' + id + ',0,' + enquiry_id + ');" style="cursor: pointer; color: #000080;" title="You can Disapprove this.">Assign</span>';
                            $('#appendstatus' + id).html(statushtml);
                            location.reload();
                        } else {
                            var statushtml = '<span class="label label-info" onclick="change_status(' + id + ',1,' + enquiry_id + ');" style="cursor: pointer; color: #800000;" title="You can Assign this.">Disapprove</span>';
                            $('#appendstatus' + id).html(statushtml);

                        }
                    }
                });
            } else {
                return false;
            }
        })
    }
</script>