@include('admin/include/header')
<div class="container">
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allContent as $data)
            <tr>
                <th scope="row">1</th>
                <td>{{$data->title}}</td>
                <td> {!! substr($data->description, 0, 50);!!}</td>
                <td>@if(isset($data->type) && $data->type=='1') <img src="{{URL::to('/')}}/uploads/document_image/{{$data->image}}" alt="image" style="height: 70px; width:70px">@endif</td>
                
            </tr>
            @endforeach
            <tr>
        </tbody>
    </table>
</div>