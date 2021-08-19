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
                <td class="sa-color2">Name</td>
                <td class="sa-color2">Mobile </td>
                <td class="sa-color2 sr-b-right">Category </td>
                <td class="sa-color2 sr-b-right">Subject </td>
                <td class="sa-color2 sr-b-right">Create Date </td>
            </tr>
            @foreach($my_questions as $data)
            <tr>
                <td class="sr-p-white text-white">@if(isset($data->name)){{$data->name}}@else{{"N/A"}}@endif</td>
                <td class="sr-p-white text-white">@if(isset($data->mobile)){{$data->mobile}}@else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->lawarea)){{$data->lawarea}}@else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->subject)){{$data->subject}}@else{{"N/A"}}@endif </td>
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->created_at)){{date("d-m-Y", strtotime($data->created_at)); }}@else{{"N/A"}}@endif </td>
            </tr>
            @endforeach
            
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