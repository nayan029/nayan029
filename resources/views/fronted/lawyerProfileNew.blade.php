@include('fronted/include/header')
<div class="container">
    <div class="col-md-12">
        <div class="sa-application d-flex justify-content-between">
            <p class="sa-color2">Lawyer Detail</p>
            <a href="{{URL::to('/')}}/account/customer/my-booking" type="button" class="sa-color3   poppins-light"><span class="mr-2"><i class="fa fa-arrow-left"></i></span>Back</a>
        </div>
    </div>

    <div class="">
        <div class="container">
            <div class="row sr-profile">
                <div class="col-md-2">
                    <div class="l-img">
                        @if(isset($lawyerData->profileimage))
                        <img src="@php echo URL::to('/'); @endphp/uploads/lawyerprofile/{{$lawyerData->profileimage}}" class="pro-img">
                        @else
                        <img class="pro-img" src="{{URL::to('/')}}/fronted/images/team2.png">

                        @endif
                        <div>
                            <p class="sr-varify"> Varified</p>

                        </div>

                    </div>
                </div>

                <div class="col-md-10">
                    <div class="sr-pro pb-15">
                        <div class="sr-pro-card">
                            <a href="#">
                                <h5 class="sr-pro-title pb-0"> @if(isset($lawyerData->name)){{"Advocate"." ".$lawyerData->lname." ".$lawyerData->fathername}}@endif</h5>
                            </a>

                        </div>
                        <div class="col-md-12 sr-pro-star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="pl-4"> 4.0 | 2+ user ratings</span>
                        </div>
                    </div>
                    <div class="sr-loc pb-0">
                        <div class="row">
                            <div class="col-md-6">


                                <div class="d-flex">
                                    <span><img src="{{asset('fronted/images/suitcase-icon.png')}}" class="mr-2"></span>
                                    <p class="sr-p-title">Experience :</p>
                                    <p>@if($lawyerData->experience) {{ucfirst($lawyerData->experience )}} @else {{"0"}} @endif</p>
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



                </div>
            </div>
        </div>
        <!-- modal to write review -->
    </div>
    <div class="sa-application col-md-12 sr-pro-review">
        <h3 class="sa-color2">Top Reviews</h3>
        @if(isset($user_login)) @if($user_login->user_type == '2')
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

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: black;" id="exampleModalCenter">Write A Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{URL::to('/')}}/write-review" method="POST" id="review_form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: black;">Rating</label>
                            <div id="half-stars-example">
                                <div class="rating-group">
                                    <input class="rating__input rating__input--none" checked name="rating2" id="rating2-0" value="0" type="radio">
                                    <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                    <label aria-label="1 star" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
                                    <label aria-label="2 stars" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
                                    <label aria-label="3 stars" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
                                    <label aria-label="4 stars" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
                                    <label aria-label="5 stars" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
                                </div>
                            </div>
                        </div>
                        <span id="rating_error" style="color: red;"></span>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: black;">Review</label>
                            <textarea class="form-control" name="review" id="review" placeholder="write a review" maxlength="450"></textarea>
                            <span style="color: red;" id="review_error"></span>
                        </div>

                        <input type="hidden" name="user_name" value="{{$user_login->name}}">
                        <input type="hidden" name="user_id" value="{{$user_login->id}}">
                        <input type="hidden" name="lawyer_id" value="{{$lawyerData->id}}">
                        <input type="hidden" name="booking_id" value="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <div class="container">
        @php
        $c = count($lawyer_review)
        @endphp
        @if($c>0)
        @foreach($lawyer_review as $data)
        <div class="mitem3  mt-30">
            <div class="row">
                <div class="sr-card col-md-2">
                    <h5 class="user-pic">
                        {{ substr($data->user_name, 0, 1)}}
                    </h5>
                </div>

                <div class="sr-card col-md-10">
                    <div class="col-md-12 pl-0 pt-3 pb-1">
                        <p class="m-0">{{$data->user_name}}
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

                        </p>
                    </div>
                    <p class="mb-20">{{$data->review}}</p>

                    <span class="pro-dt">{{date('d-m-Y', strtotime($data->created_at))}}</span>
                </div>
            </div>
        </div>
        @endforeach
        @else
        No reviews found
        @endif

        @if($c>5)

        <div class="col-md-12 pl-0">
            <a href="{{URL::to('/')}}/experts/reviews/{{$lawyerData->id}}" class="btn btn-outline-primary">View ALL</a>

        </div>
        @endif

    </div>

    <div class="col-md-12">
        <div class="d-flex justify-content-end pt-3">

        </div>
    </div>
</div>
@include('fronted/include/footer')
<script>
    $('#review_form').submit(function(e) {

        var review = $('#review').val();

        var rating = $('input[name=rating2]:checked').val();


        var cnt = 0;
        var f = 0;

        $('#ratingerror').html("");
        $('#review_error').html("");




        if (review.trim() == '') {
            $('#review_error').html("Please enter review");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#review').focus();
            }
        }



        if (rating <= 0) {
            $('#rating_error').html("Please selact a rating");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#rating').focus();
            }
        }


        if (cnt == 1) {
            return false;
        } else {
            return true;
        }


    })
</script>