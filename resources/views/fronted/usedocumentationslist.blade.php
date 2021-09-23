@include('fronted/include/header')
<div class="container">
    <div class="col-md-12 p-0">
        <div class="sa-application">
            <p class="sa-color2">All Documents</p>
        </div>
    </div>
    <div class="col-md-12 pl-0 pr-0 sa-overflow">
        <table class="table table-bordered sr-t-bordered sa-font-acctable">
            <tr>

                <td class="sa-color2 sr-b-right">Sr No </td>
                <td class="sa-color2 sr-b-right">Documentation </td>
                <!-- <td class="sa-color2 sr-b-right">Service Type</td> -->
                <td class="sa-color2 sr-b-right">Created Date</td>
                <td class="sa-color2 sr-b-right">Action</td>
            </tr>
            @php $i = 1; @endphp
            @if(count($all_documentations)>0)
            @foreach($all_documentations as $data)
            <tr>
                <td class="sr-p-white sr-b-right text-white">{{$i}}</td>
                <td class="sr-p-white sr-b-right text-white"> @if(isset($data->document_name)){{$data->document_name}}@endif</td>
                <!-- <td class="sr-p-white sr-b-right text-white"> {{"Documentation"}}</td>  -->
                <td class="sr-p-white sr-b-right text-white">@if(isset($data->created_at)) {{date("d-m-Y", strtotime($data->created_at))}} @else{{"N/A"}}@endif </td>
                <td>
                    @if(isset($data->document))
                    <a download title="Download Now" target="_blank" href="{{ URL::to('/')}}/uploads/legal_documents/{{$data->document}}" class="sa-icons1 active"><i class="fa fa-download ml-2"></i></a>
                    @else
                    <a style="color:red;" onclick="message()" title="Download Now" href="#" class="sa-icons1 active"><i class="fa fa-download ml-2"></i></a>
                    @endif
                </td>
            </tr>
            @php $i++; @endphp
            @endforeach
            @else
            <td colspan="7" class="sr-p-white sr-b-right text-white text-center">{{"No data found"}}</td>
            @endif

        </table>
    </div>


    <div class="col-md-12">
        <div class="d-flex justify-content-end pt-3">

        </div>
    </div>
</div>
@include('fronted/include/footer')
<script>
    function message() {
        toastr.error('Soory you have no allocated document', '', {
            timeOut: 4000
        });
    }
</script>