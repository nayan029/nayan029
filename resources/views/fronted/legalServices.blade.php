@include('fronted/include/header')
<div class="sa-enroll-details">
  <div class="container">
    <div class="sa-application">
      <h5 class="sa-color2 mb-2">Family / Matrimonial Legal Services</h5>
      <p class=" mb-3">Solve your divorce / family related issues with a local, experienced lawyer for a fixed fee</p>
    </div>


    <div class="row mt-30">
      <?php foreach ($familydata as $data) {
      ?>
        <div class="col-md-6">
          <div class="mitem3">
            <div class="sr-card">
              <a href="<?php echo URL::to('/'); ?>/legal-services/<?php echo strtolower($data->slug); ?>">
                <h5 class="sr-title-left d-flex align-items-center">
                  {{$data->service_name}}
                </h5>
              </a>
            </div>
            <div class="col-md-12 pl-0 pb-3">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="pl-4"> 4.8 |371+ ratings</span>
            </div>

            <div class="d-flex justify-content-end">
              <a href="<?php echo URL::to('/'); ?>/legal-services/<?php echo strtolower($data->slug); ?>" class="btn btn-outline-primary">Learn More</a>
            </div>

          </div>

        </div>


      <?php
      } ?>
    </div>


    <div class="row mb-4 mt-30">
      <div class="col-md-12">
        <h5 class="sa-color2 mb-2 fs-24 mb-5">Legal Help in 3 easy steps.</h5>
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="row figure-row">
              <div class="col-md-4">
                <img src="{{asset('fronted/images/service-icon.png')}}" class="mb-3">
                <p class="sr-title2 mb-0">Choose Your Service</p>
                <p>Packages include advice sessions, document reviews, & start-to-finish support.</p>

              </div>
              <div class="col-md-4">
                <img src="{{asset('fronted/images/shop-icon.png')}}" class="mb-3">
                <p class="sr-title2 mb-0">Book Online</p>
                <p>Packages include advice sessions, document reviews & start-to-finish support.</p>

              </div>
              <div class="col-md-4">
                <img src="{{asset('fronted/images/guarantee-icon.png')}}" class="mb-3">
                <p class="sr-title2 mb-0">Service Delivery</p>
                <p>Assigned lawyer will provide you the required services and your case manager will ensure end-to-end support.</p>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="row mb-5">
      <div class="col-md-12">
        <div>
          <h2 class="sr-t">50,000 People Choose  Every Day</h2>
        </div>
        <div class="row mt-5 sr-c ">
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">INDIA’S LEADING LEGAL PLATFORM</h6>

            <p>Get the legal help & representation from over 10000 </p>
            <p>lawyers across 700 cities in India</p>
            <a href="{{URL::to('/')}}/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

          </div>
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
            <p>Post your question for free and get response from</p>
            <p>experienced lawyers within 48 hours</p>
            <a href="{{URL::to('/')}}/ask-a-free-question" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
          </div>
          <div class="col-md-4 text-center">

            <h6 class="sr-sub-t">CONTACT A LAWYER</h6>
            <p>Contact and get legal assistance from our lawyer</p>
            <p> network for your specific matter</p>
            <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</a>

          </div>
        </div>
      </div>
    </div>



  </div>
</div>
@include('fronted/include/footer')