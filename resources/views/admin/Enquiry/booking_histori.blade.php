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
                            <form class="form-inline mb-3" method="GET" action="{{ URL::to('/') }}/admin/bookingHistory">

                                <div class="form-group mr-2">
                                    <input type="text" maxlength="40" class="form-control w-180px" value="{{$name}}" id="" name="name" placeholder="Name">
                                </div>
                                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                <a href="{{ URL::to('/') }}/admin/bookingHistory"><button type="button" class="btn btn-dark ml-2">Reset</button></a>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Booking Id</th>
                                        <th>Customer Name</th>
                                        <th>Issue Name</th>
                                        <!-- <th>Type Name</th> -->
                                        <th>Type</th>
                                        <th>Created Date</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($enquiry_data as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>@if(isset($data->orderid)){{$data->orderid}}@endif</td>
                                        <td>{{$data->uname}} {{$data->username}}
                                            @if(isset($data->mobile)){{"-".$data->mobile}}@else{{""}}@endif
                                        </td>
                                        <td>@if(isset($data->subissue_name)){{$data->subissue_name}}@else{{""}}@endif
                                            @if(isset($data->issue_name)){{"-".$data->issue_name}}@else{{""}}@endif
                                            @if(isset($data->document_name)){{$data->document_name}}@endif

                                        </td>
                                        <!-- <td>@if(isset($data->issue_name)){{$data->issue_name}}@else{{"N/A"}}@endif</td> -->
                                        <td>
                                            @if($data->feestype == 1)
                                            Legal Aid-Basic Fees
                                            @elseif($data->feestype == 2)
                                            Legal Aid-Fees(By per days)
                                            @elseif($data->feestype == 3)
                                            Legal Aid-Full Legal Representation
                                            @else
                                            {{"Documentation"}}
                                            @endif
                                        </td>
                                        <td>@if(isset($data->created_at)) {{date("d-m-Y", strtotime($data->created_at))}} @else{{"N/A"}}@endif</td>
                                        <td>
                                            @if(isset($data->amount)){{"??? ".$data->amount}}@else{{"-"}}@endif
                                        </td>
                                        <td><span title="{{$data->feedback}}">
                                                @if(isset($data->status))

                                                <span style="color: green;">Success</span>
                                                @endif
                                            </span>
                                        </td>
                                        <!-- modal start -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Booking History</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal end -->


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