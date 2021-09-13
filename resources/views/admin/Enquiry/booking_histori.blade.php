@include('admin/include/header')
@include('admin/include/nav')

<div class="content-wrapper" style="min-height: 40.0312px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><small> Booking History</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
                        <li class="breadcrumb-item"> Booking History</li>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Customer Name</th>
                                        <th>Issue Name</th>
                                        <th>Type Name</th>
                                        <th>Fees Type</th>
                                        <th>Mobile</th>
                                        <th>Created Date</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($enquiry_data as $data)
                                   
                                    
                                    <tr>

                                        <td>{{$i}}</td>
                                        <td>{{$data->uname}} {{$data->username}}</td>
                                        <td>@if(isset($data->subissue_name)){{$data->subissue_name}}@else{{"N/A"}}@endif</td>
                                        <td>@if(isset($data->issue_name)){{$data->issue_name}}@else{{"N/A"}}@endif</td>
                                        <td>
                                            @if($data->feestype == 1)
                                                Basic Fees
                                            @elseif($data->feestype == 2)
                                                Fees(By per days)
                                            @else
                                                Full Legal Representation
                                            @endif
                                        </td>
                                        <td>@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif</td>
                                        <td>@if(isset($data->created_at)) {{date("d-m-Y", strtotime($data->created_at))}} @else{{"N/A"}}@endif</td>
                                        <td><span title="{{$data->feedback}}">
                                            @if(isset($data->status))
                                                @if($data->status=='1')
                                                    {{"Pending"}}
                                                @else
                                                    {{"Payment success"}}
                                                @endif
                                            @endif
                                            </span>
                                        </td>

                                        
                                        @php $i++; @endphp
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation example">



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
<!-- edit modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="append">
       
    </div>
</div>
<!-- edit modal -->
@include('admin/include/footer')
<script>
    $('#bookinghistory').addClass('active mm-active');
</script>
