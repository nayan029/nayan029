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
                    <img src="{{asset('fronted/images/advocate-rajesh-ks.jpg')}}" class="pro-img">
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
                            <a href="#" class="btn btn-primary sa-color3 poppins-light ">Contact Now</a>
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
            <div class="col-md-2 sa-color2">Court</div>
            <div class="col-md-10">
                <p>Karnataka High Court, Supreme Court Of India</p>
            </div>
        </div>



        <div class="sa-application col-md-12 sr-pro-review">
            <h3 class="sa-color2">Top Reviews</h3>
            <div>
                <a href="#" class="btn btn-outline-primary min-w120s">Write A Review</a>
            </div>

        </div>


        <div class="mitem3  mt-30">
            <div class="row">
                <div class="sr-card col-md-2">
                    <h5 class="user-pic">
                        M</h5>
                </div>

                <div class="sr-card col-md-10">
                    <div class="col-md-12 pl-0 pt-3 pb-1">
                        <p class="m-0">Murlimanohar -<span class="pl-1 pr-4"><i class="sa-color2">Verified Client </i></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </p>
                    </div>
                    <p class="mb-20">The lawyer was an expert in my legal issue. The lawyer gave me the right guidance. The lawyer helped me in taking the right decision going forward.</p>

                    <span class="pro-dt">Jul 04, 2021</span>
                </div>
            </div>
        </div>
        <div class="mitem3  mt-30">
            <div class="row">
                <div class="sr-card col-md-2">
                    <h5 class="user-pic">
                        G</h5>
                </div>

                <div class="sr-card col-md-10">
                    <div class="col-md-12 pl-0 pt-3 pb-1">
                        <p class="m-0">Ganesh Kumar Mishra -<span class="pl-1 pr-4"><i class="sa-color2">Verified Client </i></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </p>
                    </div>
                    <p class="mb-20">Ask questions and get advice from a local experienced advocate on divo....
                    </p>

                    <span class="pro-dt">Jul 04, 2021</span>
                </div>
            </div>
        </div>
        <div class="mitem3  mt-30">
            <div class="row">
                <div class="sr-card col-md-2">
                    <h5 class="user-pic">
                        K</h5>
                </div>

                <div class="sr-card col-md-10">
                    <div class="col-md-12 pl-0 pt-3 pb-1">
                        <p class="m-0">KRM Reddy -<span class="pl-1 pr-4"><i class="sa-color2">Verified Client </i></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </p>
                    </div>
                    <p class="mb-20">Ask questions and get advice from a local experienced advocate on divo....
                    </p>

                    <span class="pro-dt">Jul 04, 2021</span>
                </div>
            </div>
        </div>
        <div class="col-md-12 pl-0">
            <a href="#" class="btn btn-outline-primary">View ALL</a>

        </div>

    </div>
    <!--   </div> -->



    <div class="row mb-5">
        <div class="col-md-12">
            <div>
                <h2 class="sr-t">50,000 People Choose LawRato Every Day</h2>
            </div>
            <div class="row mt-5 sr-c ">
                <div class="col-md-4 text-center">
                    <h6 class="sr-sub-t">INDIA’S LEADING LEGAL PLATFORM</h6>

                    <p>Get the legal help & representation from over 10000 </p>
                    <p>lawyers across 700 cities in India</p>
                    <a href="" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

                </div>
                <div class="col-md-4 text-center">
                    <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
                    <p>Post your question for free and get response from</p>
                    <p>experienced lawyers within 48 hours</p>
                    <a href="" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
                </div>
                <div class="col-md-4 text-center">

                    <h6 class="sr-sub-t">CONTACT A LAWYER</h6>
                    <p>Contact and get legal assistance from our lawyer</p>
                    <p> network for your specific matter</p>
                    <button type="submit" class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</button>

                </div>
            </div>
        </div>
    </div>



</div>
</div>

@include('fronted/include/footer')