@include('fronted/include/header')
<div class="container">
    <div class="col-md-12">
        <div class="sa-application">
            <p class="sa-color2">Lawyer Detail</p>
        </div>

    </div>
    <div class="row">
        <a href="{{URL::to('/')}}/account/all-questions" type="button" class="btn btn-outline-primary sa-color3 mr-5  poppins-light">Back</a>
    </div>
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

            <form method="POST" action="{{URL::to('/')}}/pay-fees" id="fees_main">
                @csrf

                <input type="hidden" name="lawyer_id" value="{{$lawyerData->id}}">
                <input type="hidden" name="customer_id" value="{{$enquiryUserId->user_id}}">
                <input type="hidden" name="id" value="{{request('id');}}">
                <div class="row">

                    <!-- <input type="radio" onclick="test()" checked name="fees" id="fees" value="{{$lawyerData->basic_fees}}" data-id="1">
                    <div class="col-md-2 sa-color2">Basic Fees - {{$lawyerData->basic_fees}}</div> -->

                    <input type="radio" onclick="test()" checked name="fees" id="fees" value="{{$lawyerData->fees}}" data-id="2">
                    <div class="col-md-2 sa-color2">Fees(By per date) - {{$lawyerData->fees}}</div>

                    <input type="radio" onclick="test()" name="fees" id="fees" value="{{$lawyerData->full_legal_fees}}" data-id="3">
                    <div class="col-md-5 sa-color2">Legal Representation - {{$lawyerData->full_legal_fees}}</div>
                </div>
                <span id="fees_error" style="color: red;"></span>
                <input type="hidden" name="type" id="radio_id">

                <input type="hidden" name="issue_id" value="{{$enquiryUserId->issue_id}}">
                <input type="hidden" name="subissue_id" value=" {{$enquiryUserId->subissue_id}}">

                <div class="row">
                    <button type="submit" class="btn btn-outline-primary sa-color3 mt-3  poppins-light">Pay Now
                    </button>
                </div>
            </form>


        </div>
        <!-- modal to write review -->


    </div>
    <div class="col-md-12">
        <div class="d-flex justify-content-end pt-3">

        </div>
    </div>
</div>
@include('fronted/include/footer')
<script>
    test();

    function test() {
        var id = $('input[name="fees"]:checked').attr("data-id");
        $('#radio_id').val(id);
    }
</script>