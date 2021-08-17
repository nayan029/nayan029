@include('fronted/include/header')
<div class="div-middle mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="mb-3">SEARCH </h5>
                <form method="GET">
                    <!-- <select class="form-select sa-form-font border-radius-5px mb-3" id="city" name="city">
                        <option value="">Select city</option>
                        @foreach($city as $data)
                        <option @if(app('request')->input('city') == $data->name){{"selected"}} @endif value="{{$data->name}}">{{ucfirst($data->name)}} </option>
                        @endforeach
                    </select> -->
                    <select class="form-select sa-form-font border-radius-5px mb-3" id="category" name="category">
                        <option value="">Select Category</option>
                        @foreach($category as $data)
                        <option @if(app('request')->input('category') == $data->id){{"selected"}} @endif  value="{{$data->id}}">{{ucfirst($data->category_name)}} </option>
                        @endforeach
                    </select>
                    <select class="form-select sa-form-font border-radius-5px mb-3" id="court" name="court">
                        <option value="">Select Courts</option>
                        @foreach($court as $data)
                        <option @if(app('request')->input('court') == $data->id){{"selected"}} @endif  value="{{$data->id}}">{{ucfirst($data->name)}} </option>
                        @endforeach
                    </select>
                    <select class="form-select sa-form-font border-radius-5px mb-3" id="experience" name="experience">
                        <option value="">Select Experience</option>
                        <option value="1">
                            < 5 Years </option>
                        <option value="2">5-10 Years</option>
                        <option value="3">10-15 Years</option>
                        <option value="4">15 Years</option>
                    </select>
                    <select class="form-select sa-form-font border-radius-5px mb-3" id="language" name="language">
                        <option value="">Select Language</option>
                        <option @if(app('request')->input('language') == 'english'){{"selected"}} @endif    value="english">English</option>
                        <option @if(app('request')->input('language') == 'gujarati'){{"selected"}} @endif  value="gujarati">Gujrati</option>
                        <option @if(app('request')->input('language') == 'hindi'){{"selected"}} @endif  value="hindi">Hindi </option>
                    </select>
                    <!-- <select class="form-select sa-form-font border-radius-5px mb-3" id="gender" name="gender">
                        <option value="">Select Gender</option>
                        <option @if(app('request')->input('gender') == 'm'){{"selected"}} @endif  value="m">Male </option>
                        <option @if(app('request')->input('gender') == 'f'){{"selected"}} @endif  value="f">Female</option>
                    </select> -->
                    <select class="form-select sa-form-font border-radius-5px mb-3" id="rating" name="rating">
                        <option value="">Select Ratings</option>
                        <option value="5">5 ratings </option>
                        <option value="4">>4 ratings</option>
                        <option value="3">>3 ratings</option>
                    </select>
                    <select class="form-select sa-form-font border-radius-5px mb-3" id="short_by" name="sort_by">
                        <option value="">By Activity</option>
                        <option value="1">By Experience </option>
                        <option value="2">By Alphbetically</option>
                    </select>
                    <button type="button" onclick="getData()" class="btn btn-outline-primary min-w120 mt-4 mb-2">Filter &rarr;</button>
                    <a href="{{URL::to('/')}}/find-lawyer" type="submit" class="btn btn-outline-primary min-w120 mt-4 mb-2">Reset &larr;</a>

                </form>

            </div>
            <div class="col-md-9" id="databox">
                <h5 class="sa-color2">Consult Best Divorce Lawyers / Advocates in India</h5>
                <br />
                <!-- <p>Hiring an experienced divorce lawyer is the best way you get peace of mind when dealing with matrimonial
                    cases, child custody, alimony, and mutual divorce or contested divorce proceedings. Use LawRato to consult a
                    top rated divorce lawyer for marriage issues in India to file or defend your mutual divorce petition,
                    contested divorce, alimony, domestic violence (DV), interim maintenance, 125 CrPC, dowry harassment u/s
                    498a, women cell complaints or any other related matters. </p>
                <a href="#" class="btn btn-outline-primary min-w120 mt-2 mb-2">Read More</a> -->

                @if(count($user_data)>0)
                @foreach($user_data as $data)
            <a href="{{URL::to('/')}}/advocate/{{$data->id}}">
                <div class="mitem3 mt-3" id="">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- <a href="{{URL::to('/')}}/advocate/{{$data->id}}"> -->
                                        @if($data->profileimage)
                                        <img src="{{URL::to('/')}}/uploads/lawyerprofile/{{$data->profileimage}}" class="img-bor">
                                        @else
                                        <!-- <img src="{{asset('fronted/images/advocate-vibhor-agarwal.jpg')}}" class="img-bor"> -->
                                        <img src="{{URL::to('/')}}/fronted/images/team2.png" class="img-bor">
                                        @endif
                                    <!-- </a> -->
                                </div>
                                <div class="col-md-8">
                                    <div class="sr-card">
                                        <!-- <a href="{{URL::to('/')}}/advocate/{{$data->id}}"> -->
                                            <h5 class="sr-title-left mb-2">
                                                Advocate {{$data->lname." ".$data->fathername}}
                                            </h5>
                                        <!-- </a> -->
                                    </div>
                                    <div>
                                        <span ><img src="{{asset('fronted/images/map-marker-icon.png')}}" class="mr-2"></span> <span class="sa-color2"> {{ucfirst($data->location)}} </span>
                                    </div>
                                    <div class="mt-2">
                                        <span><img src="{{asset('fronted/images/suitcase-icon.png')}}" class="mr-2"></span>
                                        <span class="sa-color2">@if($data->experience) {{ucfirst($data->experience)}} @else {{"0"}} @endif </span>
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
                                <span class="pl-4 sa-color2"> 4.0 | 2+ user ratings</span>
                            </div>
                            <h6 class="sr-title-left mb-1">Practice area & skills</h6>
                            <p class="mb-3">{{ucfirst( substr($data->about,0,50))}}</p>
                            <!-- <a href="{{URL::to('/')}}/advocate/{{$data->id}}" class="btn btn-primary sa-color3 sa-next-btn poppins-light">Contact Now</a> -->


                        </div>
                    </div>

                </div>
            </a>
                @endforeach
                @else{{"0 Lawyers found"}}
                @endif
            </div>
        </div>
    </div>
</div>
<div id="databox"></div>

@include('fronted/include/footer')
<script>
    //     $("#city").change(function() {
    //     value = this.value;
    //     window.location.href = "http://localhost/legelbench/public/find-lawyer/" + value;
    // });




    function getData() {

        var  city = $('#city').val();
        var  category = $('#category').val();
        var  court = $('#court').val();
        var  expexpirience = $('#expirience').val();
        var  language = $('#language').val();
        var  gender = $('#gender').val();
        var  rating = $('#rating').val();
        var  short_by = $('#short_by').val();
        $.ajax({
            url: "{{ URL::to('/')}}/find-lawyer",
            type: "post",
            data: {
                city: city,
                category: category,
                court: court,
                expexpirience: expexpirience,
                language: language,
                gender: gender,
                rating: rating,
                short_by: short_by,
                _token: "<?php echo csrf_token(); ?>"
            },
            success: function(response) {
                // die();
                var res = JSON.toString(response);
                $('#databox').html(response);
            }
        });
    }
</script>