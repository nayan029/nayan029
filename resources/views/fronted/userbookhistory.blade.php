@include('fronted/include/header')
<div class="container">
    <div class="col-md-12">
        <div class="sa-application">
            <p class="sa-color2">Booking History</p>
        </div>
    </div>
    <div class="col-md-12 pl-0 pr-0">
        <table class="table table-bordered sr-t-bordered">
            <tr>
                
                <td class="sa-color2 sr-b-right">Sr No </td>
                <!-- <td class="sa-color2 sr-b-right">Order Id</td> -->
                <td class="sa-color2 sr-b-right">Customer Name  </td>
                <td class="sa-color2 sr-b-right">Mobile</td>
                <td class="sa-color2 sr-b-right">Issue Name </td>
                <!-- <td class="sa-color2 sr-b-right">Type Name </td> -->
                <td class="sa-color2 sr-b-right">Fees Type</td>
                <td class="sa-color2 sr-b-right">Created Date</td>
                <td class="sa-color2 sr-b-right">Payment Status</td>
                <td class="sa-color2 sr-b-right">Enquiry Status</td>
                <td class="sa-color2 sr-b-right">Action</td>
                
            </tr>
            @php $i = 1; @endphp
            @if(count($enquiry_data)>0)
            @foreach($enquiry_data as $data)
            <tr>
               
               
                
                <td class="sr-p-white sr-b-right text-white">{{$i}}</td>
                <!-- <td class="sr-p-white sr-b-right text-white">@if(isset($data->orderid)){{$data->orderid}}@endif</td> -->
                <td class="sr-p-white text-white">{{$data->name}}</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->subissue_name)){{$data->subissue_name}}@else{{"N/A"}}@endif -  @if(isset($data->issue_name)){{$data->issue_name}}@else{{"N/A"}}@endif </td>
                <!-- <td class="sr-p-white sr-b-right text-white"></td> -->

                <td class="sr-p-white sr-b-right text-white">
                	@if($data->feestype == 2)
                		Fees(By per date)
                	@else
                		Full Legal Representation
                	@endif
                </td>

                <td class="sr-p-white sr-b-right text-white">@if(isset($data->created_at)) {{date("d-m-Y", strtotime($data->created_at))}} @else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">Success</td>
                <td class="sr-p-white sr-b-right text-white">Open</td>
                <td class="sr-p-white sr-b-right text-white"><a href="#">Close</a></td>
                    
            </tr>
           
            @php $i++; @endphp
            @endforeach
            @else 
            <td colspan="8" class="sr-p-white sr-b-right text-white text-center">{{"No booking history found"}}</td>
            @endif

        </table>
    </div>
   
    <div class="col-md-12">
        <div class="d-flex justify-content-end pt-3">
       
        </div>
    </div>
</div>
@include('fronted/include/footer')