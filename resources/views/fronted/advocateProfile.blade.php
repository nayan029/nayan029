@include('fronted/include/header')
<div class="sa-enroll-details">
    <div class="container">
        <!-- <div class="mitem3"> -->
        <div class="row sr-profile">
            <div class="col-md-2">
                <div class="l-img">
                    @if(isset($lawyerData->profileimage))
                    <img src="@php echo URL::to('/'); @endphp/uploads/lawyerprofile/{{$lawyerData->profileimage}}" class="pro-img">
                    @else
                    <!-- <img src="{{asset('fronted/images/advocate-rajesh-ks.jpg')}}" class="pro-img"> -->
                    <img class="pro-img" src="{{URL::to('/')}}/fronted/images/team2.png">

                    @endif
                    <div>
                        <p class="sr-varify"> Varified</p>

                    </div>

                </div>
            </div>
            <div class="col-md-10">
                <div class="sr-pro">
                    <div class="sr-pro-card">
                        <a href="#">
                            <h5 class="sr-pro-title mb-2"> @if(isset($lawyerData->name)){{"Advocate"." ".$lawyerData->lname." ".$lawyerData->fathername}}@endif</h5>
                        </a>
                        <div>
                            <a href="#" class="btn btn-primary sa-color3 poppins-light " data-toggle="modal" data-target=".bd-example-modal-md">Contact Now</a>
                        </div>
                    </div>
                    <div class="col-md-12 sr-pro-star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="pl-4"> 4.0 | 2+ user ratings</span>
                    </div>
                </div>
                <div class="sr-loc">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="d-flex">
                                <span><img src="{{asset('fronted/images/map-marker-icon.png')}}" class="mr-2"></span>
                                <p class="sr-p-title">Location : </p>
                                <p>{{ucfirst($lawyerData->location)}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <span><img src="{{asset('fronted/images/lang-icon.png')}}" class="mr-2"></span>
                                <p class="sr-p-title">Languages :</p>
                                <p>

                                    <?php
                                    ob_start();
                                    foreach ($userlanguages as $result) {
                                        echo ucfirst($result->language) . ',';
                                    }
                                    $output = ob_get_clean();

                                    echo rtrim($output, ','); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <span><img src="{{asset('fronted/images/suitcase-icon.png')}}" class="mr-2"></span>
                                <p class="sr-p-title">Experience :</p>
                                <p>@if($lawyerData->experience) {{ucfirst($lawyerData->experience )}} @else {{"0"}} @endif</p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 sa-color2">Practice areas :</div>
            <div class="col-md-10">
                <p>{{ucfirst($lawyerData->about)}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 sa-color2">Specialization :</div>
            <div class="col-md-10">
                <p>
                    <?php
                    ob_start();
                    foreach ($specialization as $result) {
                        // echo $result->userid;

                        echo ucfirst($result->category_name) . ',';
                    }
                    $output = ob_get_clean();

                    echo rtrim($output, ','); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 sa-color2">Court :</div>
            <div class="col-md-10">
                <p>Karnataka High Court, Supreme Court Of India</p>
            </div>
        </div>



        <div class="sa-application col-md-12 sr-pro-review">
            <h3 class="sa-color2">Top Reviews</h3>
            @if(isset($user_login))
            @if($user_login->user_type == '2')
            <div>
                <a type="button" data-toggle="modal" data-target="#exampleModalCenter" href="#" class="btn btn-outline-primary min-w120s">Write A Review</a>
            </div>
            @else
            <script>
                window.location.href = "{{url('/login')}}";
            </script>
            @endif
            @endif

        </div>
        <!-- modal to write review -->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button> -->

        <!-- Modal -->
        @if(isset($user_login))
        @if($user_login->user_type == '2')
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Write A Review</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> -->
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{URL::to('/')}}/write-review" id="main_form">
                            @csrf
                            <div class="form-group">
                                <label style="color: black;" for="exampleInputEmail1">Review</label><span style="color: red;"> *</span>
                                <textarea class="form-control" id="review" name="review" placeholder="Enter Review"></textarea>
                                <span style="color: red;" id="review-error"></span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="lawyer_id" name="lawyer_id" readonly value="{{$lawyerData->id}}">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" readonly value="{{$user_login->id}}">
                                <input type="hidden" class="form-control" id="user_name" name="user_name" readonly value="{{$user_login->name}}">
                            </div>
                            <div class="form-group">
                                <label style="color: black;" for="exampleInputPassword1">Rating</label><span style="color: red;"> *</span>
                                <div id="half-stars-example">
                                    <div class="rating-group">
                                        <input class="rating__input rating__input--none" checked name="rating2" id="rating2-0" value="0" type="radio">
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <!-- <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-05" value="0.5" type="radio"> -->
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
                                        <!-- <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-15" value="1.5" type="radio"> -->
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
                                        <!-- <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-25" value="2.5" type="radio"> -->
                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
                                        <!-- <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-35" value="3.5" type="radio"> -->
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
                                        <!-- <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-45" value="4.5" type="radio"> -->
                                        <label aria-label="5 stars" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
                                    </div>
                                    <br>
                                    <!-- <input type="text" name="rating" class="form-control" id="rating" placeholder="Rating" > -->
                                    <span style="color: red;" id="rating-error"></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        @else
        <script>
            window.location.href = "{{url('/login')}}";
        </script>
        @endif
        @endif
    </div>
    <!-- modal to write review -->
    <div class="container">

        @foreach($lawyer_review as $data)
        <div class="mitem3  mt-30">
            <div class="row">
                <div class="sr-card col-md-2">
                    <h5 class="user-pic">
                        M</h5>
                </div>

                <div class="sr-card col-md-10">
                    <div class="col-md-12 pl-0 pt-3 pb-1">
                        <p class="m-0">{{$data->user_name}} -<span class="pl-1 pr-4"><i class="sa-color2">Verified Client </i></span>
                            @if($data->rating =='1')
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            @endif
                            @if($data->rating =='2')
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>

                            @endif
                            @if($data->rating =='3')
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>

                            @endif
                            @if($data->rating =='4')
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>

                            @endif
                            @if($data->rating =='5')
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            @endif
                            <!-- <span class="fa fa-star "></span>  
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span> -->
                        </p>
                    </div>
                    <p class="mb-20">{{$data->review}}</p>

                    <span class="pro-dt">{{date('d-m-Y', strtotime($data->created_at))}}</span>
                </div>
            </div>
        </div>
        @endforeach


        <div class="col-md-12 pl-0">
            <a href="{{URL::to('/')}}/experts/reviews/{{$lawyerData->id}}" class="btn btn-outline-primary">View ALL</a>

        </div>
    </div>

</div>
<!--   </div> -->



<div class="row mb-5">
    <div class="col-md-12">
        <div>
            <h2 class="sr-t">50,000 People Choose Every Day</h2>
        </div>
        <div class="row mt-5 sr-c ">
            <div class="col-md-4 text-center">
                <h6 class="sr-sub-t">INDIA’S LEADING LEGAL PLATFORM</h6>

                <p>Get the legal help & representation from over 10000 </p>
                <p>lawyers across 700 cities in India</p>
                <a href="<?php echo URL::to('/') ?>/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

            </div>
            <div class="col-md-4 text-center">
                <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
                <p>Post your question for free and get response from</p>
                <p>experienced lawyers within 48 hours</p>
                <a href="<?php echo URL::to('/') ?>/free-legal-advice" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
            </div>
            <div class="col-md-4 text-center">

                <h6 class="sr-sub-t">CONTACT A LAWYER</h6>
                <p>Contact and get legal assistance from our lawyer</p>
                <p> network for your specific matter</p>
                <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4">Find a Lawyer</a>
            </div>
        </div>
    </div>
</div>



</div>
</div>
<!-- model for contact us -->
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content contact-modal">
            <div class="row">
                <div class="col-md-6">
                    <div class="sr-contact pr-0">
                        <div class="card">
                            <div class="card-body modalcard-body">
                                <div class="upper">
                                    <h3 class="price">$123</h3>
                                    <p class="mb-0">Weekly</p>
                                </div>
                                <div class="bottom">
                                    <p class="w-detail">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet</p>
                                    <a href="#" class="btn btn-primary sa-color3 poppins-light ">Buy Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sr-contact pl-0">
                        <div class="card">
                            <div class="card-body modalcard-body">
                                <div class="upper">
                                    <h3 class="price">$123</h3>
                                    <p class="mb-0">Monthly</p>
                                </div>
                                <div class="bottom">
                                    <p class="w-detail">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet</p>
                                    <a href="#" class="btn btn-primary sa-color3 poppins-light ">Buy Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end model -->

@include('fronted/include/footer')
<script>
    $('#main_form').submit(function(e) {

        var review = $('#review').val();
        var rating = $('input[name="rating2"]:checked').val();
        // var rating = $('#rating').val();

        var cnt = 0;

        $('#review-error').html("");
        $('#rating-error').html("");

        if (review.trim() == '') {
            $('#review-error').html("Please enter review");
            cnt = 1;
        }
        if (rating.trim() == '0') {
            $('#rating-error').html("Please select rate");
            cnt = 1;
        }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    })
</script>