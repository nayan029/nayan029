@include('fronted/include/header')

<div class="sa-enroll-details">
  <div class="container">


    <div class="row">
      <div class="col-md-7 ">
        <div class="row mt-2 ">
          <div class="col-md-12 ">
            <div class="sa-application">
              <a href="#">
                <h5 class="sa-color2 mb-3">My Bookings (0) </h5>
              </a>
            </div>

            <div class="mitem3">
              <div class="row">
                <div class="col-md-3">
                  <a href="#">
                    <img src="{{asset('fronted/images/crt1.png')}}">
                  </a>
                </div>
                <div class="col-md-8 mt-3 pl-0">
                  <a href="#">
                    <p class="fs-20">View your bookings</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="sa-application">
              <a href="{{URL::to('/')}}/account/all-questions">
                <!-- {{count($my_questions)}} -->
                <h5 class="sa-color2 mb-3">My Questions ({{count($my_questions)}})</h5>
              </a>
            </div>

            <div class="mitem3">
              <div class="row">
                <div class="col-md-3">
                  <a href="{{URL::to('/')}}/account/all-questions">
                    <img src="{{asset('fronted/images//pt1.png')}}">
                  </a>
                </div>
                <div class="col-md-8 mt-3 pl-0">
                  <a href="{{URL::to('/')}}/account/all-questions">
                    <p class="fs-20">View your questions/answers</p>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class=" col-md-5 pl-4">
        <div class="mitem text-center">
          <div class="sr-card ">
            <img src="{{asset('fronted/images/user.png')}}">
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
          <!-- <h2 class="sr-t">50,000 People Choose  Every Day</h2> -->
        </div>
        <div class="row mt-5 sr-c ">
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">INDIA’S LEADING LEGAL PLATFORM</h6>

            <p>Get the legal help & representation from over 10000 </p>
            <p>lawyers across 700 cities in India</p>
            <a href=" {{ URL::to('/') }}/free-legal-advice-phone">
              <button type="submit" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</button></a>

          </div>
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
            <p>Post your question for free and get response from</p>
            <p>experienced lawyers within 48 hours</p>
            <a href="{{ URL::to('/') }}/ask-a-free-question">
              <button type="submit" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free
                Question</button></a>
          </div>
          <div class="col-md-4 text-center">

            <h6 class="sr-sub-t">HIRE A LAWYER</h6>
            <p>Contact and get legal assistance from our lawyer</p>
            <p> network for your specific matter</p>
            <a href="{{URL::to('/')}}/legal-enquiry"  class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('fronted/include/footer')