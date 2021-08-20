@include('fronted/include/header')
<div class="sa-enroll-details">
    <div class="container">
        <div class="sa-application">
            <p class="sa-color2">User Reviews</p>
        </div>
        <div class="row">
            <div class="col-md-7 sr-border">
                @if(count($allreviews)>0)
                @foreach($allreviews as $data)
                <div class="row bottom-border">
                    <div class="col-md-12">
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
                        <!-- <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span> -->
                    </div>
                    <div class="col-md-12">
                        <p>{{substr($data->review, 0, 100)}}
                            <br />
                            {{$data->user_name}} on {{date('d-m-Y', strtotime($data->created_at))}}
                        </p>

                    </div>
                </div>
                @endforeach
                @else
                {{"NO DATA FOUND"}}
                @endif
            </div>
            <div class=" col-md-5 pl-4">
                <div class="mitem text-center">
                    <div class="sr-card ">
                        <img src="{{URL::to('/')}}/fronted/images/user.png">
                        <h5 class="mt-4 sr-title">Googling your legal issue online?</h5>
                    </div>
                    <p>The internet is not a lawyer and neither are you.
                        <br />
                        Talk to a real lawyer about your legal issue.
                    </p>
                    <a href="{{URL::to('/')}}/legal-enquiry">
                        <button type="submit" class="btn btn-outline-primary min-w120 ">Find a Lawyer Now</button></a>
                </div>


            </div>
        </div>




        <div class="row mb-5">
            <div class="col-md-12">
                <div>
                    <!-- <h2 class="sr-t">50,000 People Choose Every Day</h2> -->
                </div>
                <div class="row mt-5 sr-c ">
                    <div class="col-md-4 text-center">
                        <h6 class="sr-sub-t">INDIA’S LEADING LEGAL PLATFORM</h6>

                        <p>Get the legal help & representation from over 10000 </p>
                        <p>lawyers across 700 cities in India</p>
                        <a href="{{URL::to('/')}}/free-legal-advice-phone">
                            <button type="submit" class="btn btn-outline-primary min-w120 mt-4">Talk to a Lawyer</button></a>

                    </div>
                    <div class="col-md-4 text-center">
                        <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
                        <p>Post your question for free and get response from</p>
                        <p>experienced lawyers within 48 hours</p>
                        <a href="{{URL::to('/')}}/ask-a-free-question">
                            <button type="submit" class="btn btn-outline-primary min-w120 mt-4">Ask a Free Question</button></a>
                    </div>
                    <div class="col-md-4 text-center">

                        <h6 class="sr-sub-t">HIRE A LAWYER</h6>
                        <p>Contact and get legal assistance from our lawyer</p>
                        <p> network for your specific matter</p>
                        <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>