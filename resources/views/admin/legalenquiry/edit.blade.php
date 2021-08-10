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
                        
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="exampleInputFirstName">Issue Name</label>
                                        <input type="text" maxlength="30" class="form-control" value="{{$data->issue_name}}" id="title" name="title" aria-describedby="nameHelp" readonly>
                                    </div>
                                </div>
                               
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputContactNo">Subissue Name</label>
                                            <input type="text" maxlength="250" class="form-control" value="{{$data->subissue_id}}" id="short_description" name="short_description" readonly   >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputContactNo">Location</label>
                                            <input type="text" maxlength="250" class="form-control" value="{{$data->location}}" id="short_description" name="short_description"readonly>
                                        </div>
                                    </div>   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputContactNo">Name</label>
                                            <input type="text" maxlength="250" class="form-control" value="{{$data->name}}" readonly>
                                        </div>
                                    </div>  
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputContactNo">Email</label>
                                            <input type="text" maxlength="250" class="form-control" value="{{$data->email}}" id="short_description" readonly>
                                        </div>
                                    </div>  
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputContactNo">Mobile</label>
                                            <input type="text" maxlength="250" class="form-control" value="{{$data->mobile}}" id="short_description" name="short_description" readonly>
                                        </div>
                                    </div>   
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEduction">Description</label>
                                        <textarea class="form-control" id="description" name="description" aria-describedby="nameHelp" placeholder="User Description" readonly>
                                        {{$data->other_info}}  
                                    </textarea>
                                    </div>
                                </div>
                                <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="<?php echo URL::to('/') ?>/admin/legal-enquiry"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
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
