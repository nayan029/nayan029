@include('fronted/include/header')
<div class="container">
    <div class="col-md-12 p-0">
        <div class="sa-application">
            <p class="sa-color2">My Booking History</p>
        </div>
    </div>
    <div class="col-md-12 pl-0 pr-0 sa-overflow">
        <table class="table table-bordered sr-t-bordered sa-font-acctable">
            <tr>

                <td class="sa-color2 sr-b-right">Id </td>
                <td class="sa-color2 sr-b-right">Issue Name </td>
                <!-- <td class="sa-color2 sr-b-right">User Name</td> -->
                <td class="sa-color2 sr-b-right">Lawyer Name</td>
                <td class="sa-color2 sr-b-right">Payment Type </td>
                <td class="sa-color2 sr-b-right">Amount</td>
                <td class="sa-color2 sr-b-right">Payment Status</td>
                <td class="sa-color2 sr-b-right">Created Date</td>
            </tr> 
                @php $i = 1; @endphp
                @if(count($payment_details)>0)
                @foreach($payment_details as $data)
            <tr>
                <td class="sr-p-white sr-b-right text-white">{{$i}}</td>
                <td class="sr-p-white sr-b-right text-white"> @if(isset($data->issue_name)){{$data->issue_name}}@else{{"N/A"}}@endif</td>
                <!-- <td class="sr-p-white sr-b-right text-white"> @if(isset($data->user_name)){{$data->user_name}}@else{{"N/A"}}@endif</td> -->
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->lawyer_name)){{$data->lawyer_name}}@else{{"N/A"}}@endif</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->type) && $data->type == '2'){{"Fees(By per date)"}}@elseif(isset($data->type) && $data->type == '3'){{"Legal Representation"}}@endif</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->amount)){{$data->amount}}@else{{"N/A"}}@endif</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->amount)){{"Success"}}@else{!!"<span style='color:red;'>Pending<span>"!!}@endif</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->created_at)) {{date("d-m-Y", strtotime($data->created_at))}} @else{{"N/A"}}@endif </td>
            </tr>
            @php $i++; @endphp
            @endforeach
            @else
            <td colspan="7" class="sr-p-white sr-b-right text-white text-center">{{"No booking found"}}</td>

            @endif

        </table>
    </div>



    <div class="col-md-12">
        <div class="d-flex justify-content-end pt-3">
            <!-- <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Confirm</button>
            <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Download pdf</button> -->

        </div>
    </div>
</div>
@include('fronted/include/footer')