@include('fronted/include/header')
<div class="container">
    <div class="col-md-12 p-0">
        <div class="sa-application">
            <p class="sa-color2">All Enquiry</p>
        </div>
    </div>
    <div class="col-md-12 pl-0 pr-0 sa-overflow">
        <table class="table table-bordered sr-t-bordered sa-font-acctable">
            <tr>
                <!-- <td class="sa-color2">Name</td> -->
                <!-- <td class="sa-color2">Mobile </td> -->
                <td class="sa-color2 sr-b-right">Sr No </td>
                <td class="sa-color2 sr-b-right">Issue </td>
                <!-- <td class="sa-color2 sr-b-right">Type </td> -->
                <!-- <td class="sa-color2 sr-b-right">Name </td> -->
                <!-- <td class="sa-color2 sr-b-right">Email</td> -->
                <td class="sa-color2 sr-b-right">Mobile</td>
                <td class="sa-color2 sr-b-right">Service Type</td>
                <td class="sa-color2 sr-b-right">Created Date</td>
                <td class="sa-color2 sr-b-right">Status</td>
                <td class="sa-color2 sr-b-right">Lawyer Name</td>
            </tr>
            @php $i = 1; @endphp
            @if(count($enquiry_data)>0)
            @foreach($enquiry_data as $data)
            <tr>
                <!-- {{$data->lawyer_id}} -->
                <!-- <td class="sr-p-white text-white">@if(isset($data->name)){{$data->name}}@else{{"N/A"}}@endif</td> -->
                <!-- <td class="sr-p-white text-white">@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif </td> -->
                <td class="sr-p-white sr-b-right text-white">{{$i}}</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->subissue_name)){{$data->subissue_name." - "}}@else{{""}}@endif  @if(isset($data->issue_name)){{$data->issue_name}}@else{{""}}@endif
                    @if(isset($data->document_name)){{$data->document_name}}@endif
                </td>
                <!-- <td class="sr-p-white sr-b-right text-white"> </td> -->
                <!-- <td class="sr-p-white sr-b-right text-white">@if(isset($data->name)){{$data->name}}@else{{"N/A"}}@endif </td> -->
                <!-- <td class="sr-p-white sr-b-right text-white">@if(isset($data->email)){{$data->email}}@else{{"N/A"}}@endif </td> -->
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif</td>
                <td class="sr-p-white sr-b-right text-white"> @if(isset($data->document_name)){{"Documentation"}}@endif  @if(isset($data->subissue_name)){{"Leagl AID"}}@endif</td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->created_at)) {{date("d-m-Y", strtotime($data->created_at))}} @else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">
                    @if(isset($data->lawyer_id)){{"Assign"}}@else<span style="color: red;">Not Assign</span>@endif 
                
                </td>
                <td>
                    <!-- <a title="view" href="" data-toggle="modal" data-target="#seeDetails{{$i}}" class="sa-icons1 active"><i class="fa fa-eye ml-2"></i></a> -->
                    <!-- <a title="view" href="{{URL::to('/')}}/enquiryView/{{$data->id}}" class="sa-icons1 active"><i class="fa fa-eye ml-2"></i></a> -->
                   @if(isset($data->lawyer_name)) 
                    <a style="color:green;" href="{{URL::to('/')}}/enquiryView/{{$data->id}}" title="view">{{$data->lawyer_name." ".$data->lawyer_lastname}} </a>
                    @else
                    <a style="color: red;" href="{{URL::to('/')}}/enquiryView/{{$data->id}}" title="view">N/A </a>
                    @endif
                </td>
            </tr>
            <!-- Modal -->
            <!-- <div class="modal fade" id="seeDetails{{$i}}" tabindex="-1" role="dialog" aria-labelledby="seeDetails{{$i}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #222;" id="seeDetails{{$i}}">@if(isset($data->lawarea)){{$data->lawarea}}@endif - {{date("d-m-Y", strtotime($data->created_at)); }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="color: #222;">
                            {{$data->short_description}}
                        </div>
                        
                        <div class="modal-footer">
                            <h6 class="m-0 text-dark"><small>Created By-{{$data->name}}</small></h6>
                           
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- modal -->
            @php $i++; @endphp
            @endforeach
            @else
            <td colspan="7" class="sr-p-white sr-b-right text-white text-center">{{"No enquiry found"}}</td>
            @endif

        </table>
    </div>
    <!-- modal -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->


    <div class="col-md-12">
        <div class="d-flex justify-content-end pt-3">
            <!-- <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Confirm</button>
            <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Download pdf</button> -->

        </div>
    </div>
</div>
@include('fronted/include/footer')