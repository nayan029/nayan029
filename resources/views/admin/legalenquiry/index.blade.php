@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small>Legal Enquiry</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item">Legal Enquiry</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/admin/legal-enquiry">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="<?php echo URL::to('/'); ?>/admin/legal-enquiry"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <!-- <th>Issue Name</th> -->
                                        <th>SubIssue Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <!-- <th>Message</th> -->
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = ($enquiry_data->currentpage()-1)* $enquiry_data->perpage() + 1;
                                    @endphp
                                    @foreach($enquiry_data as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <!-- <td>{{$data->issue_name}}</td> -->
                                        <td>{{$data->subissue_name." - ".$data->issue_name}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>@if(isset($data->email)){{$data->email}}@else{{"N/A"}}@endif</td>
                                        <td>@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif</td>
                                        <!-- <td>@if(isset($data->other_info)){{$data->other_info}}@else{{"N/A"}}@endif</td> -->
                                        <td>{{ date("d-M-Y h:i A", strtotime($data->created_at))}}</td>
                                        <td>
                                            <a title="View" class="mr-2" href="{{ URL::to('/')}}/admin/legal-enquiry/{{$data->id}}/edit" onclick=""><i class="fas fa-eye text-info font-16"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="sa-icons active"><i class="fas fa-trash-alt mr-2" onclick="openPopup({{$data->id}})"></i></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">

                                        {{ $enquiry_data->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

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
    $('#legalenquiry').addClass('active mm-active');

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
                window.location.href = "<?php echo URL::to('/admin/legal-enquiry'); ?>/" + id;
            } else {
                return false;
            }
        })
    }
</script>