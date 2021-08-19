@include('fronted/include/header')
<div class="container">
    <div class="col-md-12">
        <div class="sa-application">
            <p class="sa-color2">All Questions</p>
        </div>
    </div>
    <div class="col-md-12 pl-0 pr-0">
        <table class="table table-bordered sr-t-bordered">
            <tr>
                <!-- <td class="sa-color2">Name</td> -->
                <!-- <td class="sa-color2">Mobile </td> -->
                <td class="sa-color2 sr-b-right">Category </td>
                <td class="sa-color2 sr-b-right">Subject </td>
                <td class="sa-color2 sr-b-right">Description </td>
                <td class="sa-color2 sr-b-right">Create Date </td>
            </tr>
            @php $i = 1; @endphp
            @foreach($my_questions as $data)
            <tr>
                <!-- <td class="sr-p-white text-white">@if(isset($data->name)){{$data->name}}@else{{"N/A"}}@endif</td> -->
                <!-- <td class="sr-p-white text-white">@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif </td> -->
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->lawarea)){{$data->lawarea}}@else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->subject)){{ substr($data->subject, 0, 50); }}@else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->short_description)){{ substr($data->short_description, 0, 50); }}@else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->created_at)){{date("d-m-Y", strtotime($data->created_at)); }}@else{{"N/A"}}@endif
                    <a title="view" href="" data-toggle="modal" data-target="#seeDetails{{$i}}" class="sa-icons1 active"><i class="fa fa-eye ml-2"></i></a>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="seeDetails{{$i}}" tabindex="-1" role="dialog" aria-labelledby="seeDetails{{$i}}" aria-hidden="true">
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
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            @php $i++; @endphp
            @endforeach

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