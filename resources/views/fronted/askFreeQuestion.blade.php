@include('fronted/include/header')
<div class="sa-enroll-details">
  <div class="container">
    <div class="sa-application">
      <p class="sa-color2">Ask a Free Legal Question Online</p>
    </div>
    <div class="row">
      <div class="col-md-7 sr-border sr-res-card">
        <form id="main_id" action="{{URL::to('/')}}/ask-a-free-question" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label for="inputName" class="form-label sa-color2 sa-label">Area of law</label><span style="color:red;"> *</span>
              <select class="form-select sa-form-font border-radius-5px" id="lawarea" name="lawarea">
                <option value="">Select Area of law</option>
                @foreach($category as $data)
                <option value="{{$data->category_name}}">{{$data->category_name}}</option>
                @endforeach
              </select>
              <span id="lawarea_error" style="color: red;"></span>

            </div>

            <!-- <div class="col-md-12">
              <label for="inputName" class="form-label sa-color2 sa-label"> city </label><span style="color:red;"> *</span>
              <select class="form-select sa-form-font border-radius-5px" id="city" name="city">
                <option value="">Select your city</option>
                @foreach($city as $data)
                <option value="{{$data->name}}">{{$data->name}}</option>
                @endforeach
              </select>
              <span id="city_error" style="color: red;"></span>

            </div> -->

          </div>

          <div class="row">

            <div class="col-md-12">
              <div class="sa-pb">
                <label for="inputName" class="form-label sa-color2 sa-label">Subject</label><span style="color:red;"> *</span>
                <input type="text" class="form-control sa-form-font half-border-radius" id="subject" name="subject" placeholder="Subject " maxlength="250"> 
                <span id="subject_error" style="color: red;"></span>

              </div>
            </div>
            <div class="col-md-12">
              <label for="inputName" class="form-label sa-color2 sa-label"> Your brief background</label><span style="color:red;"> *</span>
              <textarea class="form-control" placeholder="" id="short_description" name="short_description" rows="3" maxlength="1000"></textarea>
              <span id="short_description_error" style="color: red;"></span>

              <p class="sr-err mt-2 ">
                Please DO NOT mention any person / party / company's name in your Question.</p>
              <p class="sr-err ">If this is a matrimonial or property question, please mention your religion as laws may differ.
              </p>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <h5 class="sa-color2">Your Contact Details</h5>
            </div>
            <div class="col-md-12 mt-1">
              <div class="sa-pb">
                <label for="inputName" class="form-label sa-color2 sa-label">Name</label><span style="color:red;"> *</span>
                <input type="text" class="form-control sa-form-font half-border-radius" id="name" placeholder="Enter your name" name="name">
                <span id="name_error" style="color: red;"></span>

              </div>
              <div class="sa-pb">
                <label for="inputName" class="form-label sa-color2 sa-label">Contact no.</label><span style="color:red;"> *</span>
                <input type="number" class="form-control sa-form-font half-border-radius" id="mobile" placeholder="Enter your Contact No." name="mobile">
                <span id="mobile_error" style="color: red;"></span>

                <p class="sr-err mt-2">
                  You will be notified by SMS when you recieve a response.</p>
              </div>
              <div class="sa-pb mb-4">
                <label for="inputName" class="form-label sa-color2 sa-label">Email</label><span style="color:red;"> *</span>
                <input type="email" class="form-control sa-form-font half-border-radius" id="email" placeholder="Enter your Email" name="email">
                <span id="email_error" style="color: red;"></span>
                <p class="sr-err mt-2">
                  You will be emailed all responses on this email id.</p>
                <p class="sr-err mt-3">
                  Your query and lawyer responses will be published on our website, without your details.</p>
                <p class="sr-err ">
                  We do NOT publish your name or contact details.</p>
                <p class="sr-err ">
                  Lawyers who answer your query may contact you to discuss your query in detail.</p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="pm-check ">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" name="checkbox">
                <span class="real-checkbox"></span>
                <label class="form-check-label" for="defaultCheck2">
                  I am interested in talking to a lawyer for my legal issue
                </label>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" onclick=" if(!this.form.checkbox.checked){ alert('Please check the checkbox');return false;}" class="btn btn-outline-primary min-w120 mt-3">Submit</button>
            </div>

            <p class="sr-err mt-3">
              By submitting your question, you agree to our<a href="{{URL::to('/')}}/page/terms-of-use" class="sa-color2 "> terms & conditions.</a></p>

          </div>


        </form>
      </div>
      <div class=" col-md-5 pl-4">

        <div class="mitem2">
          <div class="sr-card">
            <h5 class="sr-title d-flex align-items-center">
              <img src="{{asset('/fronted/images/svg/Icons-16.svg')}}" width="35px" class="mr-2">
              <span>What are others saying?</span>
            </h5>
          </div>
          <p>“I got clear answers to my legal problem from top lawyers within a few minutes of posting a question at . It works like magic"</p>
          <div class="ml-auto">
            <h6 class="font-weight-bold">- Anuradha S</h6>
          </div>
        </div>
        <div class="mitem2">
          <div class="sr-card">
            <h5 class="sr-title d-flex align-items-center">
              <img src="{{asset('/fronted/images/svg/Icon-18.svg')}}" width="35px" class="mr-2">
              <span>Talk to a top rated lawyer</span>
            </h5>
          </div>
          <p>Contact a top rated lawyer in your city to get detailed opinion on your legal problem.</p>
          <div class="ml-auto">
            <a href="" class="btn btn-outline-primary">Talk to a Lawyer</a>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <div class="sa-application">
          <h5 class="sa-color2">Frequently Asked Questions</h5>
        </div>
        <div class="mb-4 sr-l-space">
          <h6 class="mt-3 sa-color2">What kinds of questions can I ask?</h6>
          <p>You can ask about anything related to your legal situation, such as questions about a specific process, documents or forms related to your legal matter, or about the meaning of specific terms or phrases. You can ask for advice, strategic coaching, or insight into possible outcomes. Advice sessions and document review services are also a good way to get a second opinion about your legal issue.</p>
        </div>
        <div class="mb-4 sr-l-space">
          <h6 class="mt-3 sa-color2">How can I keep my identity private while asking questions?</h6>
          <p>Your query and lawyer responses will be published on our website, without your details. We do NOT publish your name or contact details. Lawyers who answer your query may contact you to discuss your query in detail.</p>
        </div>
        <div class="mb-4 sr-l-space">
          <h6 class="mt-3 sa-color2">When can I expect a reply to my question?</h6>
          <p>Lawyers on  have different and unique expertise. We work to serve your question to the right lawyer for a quick and useful response. You can expect to get a response in 24 working hours after posting your question. Lawyers on  are active and are passionate about helping you solve your legal problems, meaning you won’t have to wait very long to get answers.</p>
        </div>
        <div class="mb-4 sr-l-space">
          <h6 class="mt-3 sa-color2">How can I find if my question was answered?</h6>
          <p>We will notify you by Email and SMS whenever your question receives an answer. If at any time you wish to see the question you have posted, you can view My Questions tab in your account.</p>
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
            <a href="<?php echo URL::to('/') ?>/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

          </div>
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
            <p>Post your question for free and get response from</p>
            <p>experienced lawyers within 48 hours</p>
            <a href="{{URL::to('/')}}/ask-a-free-question" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
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
@include('fronted/include/footer')
<script>
  $('#main_id').submit(function(e) {

    var name = $('#name').val();
    var lawarea = $('#lawarea').val();
    // var city = $('#city').val();
    var subject = $('#subject').val();
    var short_description = $('#short_description').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    // alert (language)

    var cnt = 0;
    var f = 0;

    $('#name_error').html("");
    $('#lawarea_error').html();
    // $('#city_error').html("");
    $('#subject_error').html("");
    $('#short_description_error').html("");
    $('#email_error').html();
    $('#mobile_error').html();



    if (name.trim() == '') {
      $('#name_error').html("Please enter name");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#name').focus();
      }
    }
    if (lawarea.trim() == '') {
      $('#lawarea_error').html("Please Select Area Of Law");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#lawarea').focus();
      }
    }

    // if (city.trim() == '') {
    //   $('#city_error').html("Please Select City");
    //   cnt = 1;
    //   f++;
    //   if (f == 1) {
    //     $('#city').focus();
    //   }
    // }

    if (subject.trim() == '') {
      $('#subject_error').html("Please enter subject");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#subject').focus();
      }
    }

    if (short_description.trim() == '') {
      $('#short_description_error').html("Please enter brif background");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#short_description').focus();
      }
    }
    if (email.trim() == '') {
      $('#email_error').html("Please enter email");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#email').focus();
      }
    }

    if (mobile.trim() == '') {
      $('#mobile_error').html("Please enter Contact no");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#mobile').focus();
      }
    }
    if (mobile.length < 10) {
      $('#mobile_error').html("Please enter Valid Contact no ");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#mobile').focus();
      }
    }


    if (cnt == 1) {
      return false;
    } else {
      // $("#reg_btn").html("Loading...");
      // $(':input[type="submit"]').prop('disabled', true);
      return true;
    }

    // }
  })
</script>