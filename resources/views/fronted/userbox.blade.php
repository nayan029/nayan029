<h5 class="sa-color2">Consult Best Divorce Lawyers / Advocates in India</h5>
<br />
@if(count($user_data)>0)
@foreach($user_data as $data)
<div class="mitem3 mt-3" id="">

    <div class="row ">
        <div class="col-md-6">

            <div class="row">   
                <div class="col-md-4">
                    <a href="{{URL::to('/')}}/advocate/{{$data->id}}">
                        @if($data->profileimage)
                        <img src="{{URL::to('/')}}/uploads/lawyerprofile/{{$data->profileimage}}" class="img-bor">
                        @else
                        <!-- <img src="{{asset('fronted/images/advocate-vibhor-agarwal.jpg')}}" class="img-bor"> -->
                        <img src="{{URL::to('/')}}/fronted/images/team2.png" class="img-bor">
                        @endif
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="sr-card">
                        <a href="{{URL::to('/')}}/advocate/{{$data->id}}">
                            <h5 class="sr-title-left mb-2">
                                Advocate {{$data->lname." ".$data->fathername}}
                            </h5>
                        </a>
                    </div>
                    <div>
                        <span><img src="{{asset('fronted/images/map-marker-icon.png')}}" class="mr-2"></span> {{ucfirst($data->location)}}
                    </div>
                    <div class="mt-2">
                        <span><img src="{{asset('fronted/images/suitcase-icon.png')}}" class="mr-2"></span>@if($data->experience) {{ucfirst($data->experience)}} @else {{"0"}} @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 pl-0 pb-2">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="pl-4"> 4.0 | 2+ user ratings</span>
            </div>
            <h6 class="sr-title-left mb-1">Practice area & skills</h6>
            <p class="mb-3">{{ucfirst( substr($data->about,0,50))}}</p>
            <!-- <a href="{{URL::to('/')}}/advocate/{{$data->id}}" class="btn btn-primary sa-color3 sa-next-btn poppins-light">Contact Now</a> -->
        </div>
    </div>

</div>
@endforeach
@else{{"0 Lawyers found"}}
@endif