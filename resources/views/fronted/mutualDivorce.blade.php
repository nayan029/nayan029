@include('fronted/include/header')
<div class="header-title">
  <div class="inner">
    <div class="container">
      <div class="sa-application">
        <?php if ($getquerys == null) {
          // print_r($getquerys);
          // return view('/'); 

          // return view('fronted.index');

          die;
        } else {
          // dd($getquerys);
          // echo "nio";
          // die();
        }
        ?>
        <h2 class="sa-color1">{{$getquerys->service_title}}</h2>

        <!-- <div class="col-md-12 pl-0 pt-3 pb-3">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="pl-4">4.8 | 241+ ratings</span>
        </div> -->
        <div>
          <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-primary sa-color3 poppins-light">Find A Lawyer</a>
        </div>
        <p class="fs-20 pt-3 pb-3">{{$getquerys->short_description}}</p>
        <p class="mt-3 mb-0 fs-20">Please fill up to get more information on process</p>

      </div>
    </div>
  </div>
</div>


<div class="sa-enroll-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row sr-border2 sr-res-card">
          <div class="col-md-12 mt-1">
            <div class="">
              <p class="ls-1"><?php echo $getquerys->description; ?></p>

            </div>





            <div class="mb-4 sr-l-space">
              <div class="row">
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>


              </div>

            </div>



          </div>
        </div>

      </div>
      <!-- <div class=" col-md-5 pl-4">
        <div class="mitem text-center">
          <div class="sr-card ">
            <img src="{{asset('fronted/images/user.png')}}">
            <h5 class="mt-4 sr-title">Googling your legal issue online?</h5>
          </div>
          <p>The internet is not a lawyer and neither are you.
            <br />
            Talk to a real lawyer about your legal issue.
          </p>
          <a href="<?php echo URL::to('/'); ?>/legal-enquiry">
            <button type="submit" class="btn btn-outline-primary min-w120 ">Find a Lawyer Now</button></a>
        </div>


      </div>
    </div> -->

      <!-- <div class="row mt-4">
          <div class="col-md-12">
            <div class="sa-application">
                <h5 class="sa-color2">Get Legal Advice Over the Phone</h5>
            </div>
            <div class="mb-4 sr-l-space">
              <p>Going through a divorce? Launching a business? Hurt in a car accident? Writing a will? Facing a lawsuit? In any of these situations, you may consider hiring a lawyer to advise you or represent your interests. While each state has many lawyers to choose from, choosing the right lawyer can make the difference between a pleasant and a frustrating experience. The phone advice received from legal experts can make one understand the intricacies involved in a particular case and can help the party understand his or her legal journey.</p>  
            </div>
            <div class="mb-4 sr-l-space">
              <p>It's important to understand that a good lawyer doesn't guarantee that you'll win your case. However, having a good lawyer will give you the best chances for a favorable outcome and the comfort of knowing that you had the best legal representation. The first step in hiring a lawyer is choosing one in the practice area that is related to your legal matter because this will ensure that the lawyer is well versed in cases similar to yours.</p>  
            </div>
            <div class="mb-4 sr-l-space">
              <p>.com makes it easier for you to get legal advice from Top Rated Lawyers across the country. Discuss your legal issue over phone, email, schedule an office meeting, or consult with any of the listed Lawyers at your home / office. We are ready to help you, as per your convenience.</p>  
            </div>
           
            
          </div>
        </div> -->

      <!-- <div class="row mt-30">
      <div class="col-md-6">

        <div class="mitem3">
          <div class="sr-card">
            <a href="#">
              <h5 class="sr-title2 d-flex align-items-center">
                15 Minutes Divorce Advice Session by Phone</h5>
            </a>
          </div>
          <div class="col-md-12 pl-0 pt-3 pb-3">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="pl-4"> 4.8 |371+ ratings</span>
          </div>
          <p class="mb-20">Ask questions and get advice from a local experienced advocate on divo....</p>
          <div class="ml-auto">
            <a href="#" class="btn btn-outline-primary">Learn More</a>
          </div>
        </div>

      </div>
      <div class="col-md-6">

        <div class="mitem3">
          <div class="sr-card">
            <a href="#">
              <h5 class="sr-title2 d-flex align-items-center">
                15 Minutes Divorce Advice Session by Phone</h5>
            </a>
          </div>
          <div class="col-md-12 pl-0 pt-3 pb-3">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="pl-4"> 4.8 |371+ ratings</span>
          </div>
          <p class="mb-20">Ask questions and get advice from a local experienced advocate on divo....</p>
          <div class="ml-auto">
            <a href="#" class="btn btn-outline-primary">Learn More</a>
          </div>
        </div>

      </div>
    </div>
    <div class="row ">
      <div class="col-md-12 sr-center">
        <a href="" class="btn btn-outline-primary">See All Family / Matrimonial Legal Services</a>

      </div>
    </div> -->

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
                <button type="submit" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</button>
              </a>

            </div>
            <div class="col-md-4 text-center">
              <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
              <p>Post your question for free and get response from</p>
              <p>experienced lawyers within 48 hours</p>
              <a href="{{URL::to('/')}}/ask-a-free-question">
                <button type="submit" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</button>
              </a>
            </div>
            <div class="col-md-4 text-center">

              <h6 class="sr-sub-t">HIRE A LAWYER</h6>
              <p>Contact and get legal assistance from our lawyer</p>
              <p> network for your specific matter</p>
              <a href="#">
                <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</a>
              </a>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>