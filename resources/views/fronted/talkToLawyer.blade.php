@include('fronted/include/header')
<div class="sa-enroll-details">
  <div class="container">
    <div class="sa-application">
      <p class="sa-color2">Talk to a Lawyer</p>
    </div>
    <div class="row">
      <div class="col-md-7 ">
        <form method="POST" action="{{URL::to('/')}}/free-legal-advice-phone" id="enquiry_form">
          @csrf
          <div class="row sr-border2 sr-res-card">
            <div class="col-md-12 mt-1">
              <div class="sa-pb">
                <label for="inputName" class="form-label sa-color2 sa-label">Name</label><span style="color: red;"> *</span>
                <input type="text" class="form-control sa-form-font half-border-radius" name="name" id="ename" placeholder="Enter your name" maxlength="250">
                <span id="ename_error" style="color: red;"></span>

              </div>
              <div class="sa-pb">
                <label for="inputName" class="form-label sa-color2 sa-label">Contact no.</label><span style="color: red;"> *</span>
                <input type="number" class="form-control sa-form-font half-border-radius" id="emobile" name="mobile" placeholder="Enter your Contact No.">
                <span id="emobile_error" style="color: red;"></span>

              </div>
              <div class="sa-pb">
                <label for="inputName" class="form-label sa-color2 sa-label">Email</label>
                <input type="text" class="form-control sa-form-font half-border-radius" id="eemail" name="email" placeholder="Enter your Email" maxlength="250">
                <span id="eemail_error" style="color: red;"></span>

              </div>
              <!-- <div class="">
              <label for="inputName" class="form-label sa-color2 sa-label"> city </label>
              <select class="form-select sa-form-font border-radius-5px">
                <option selected="">Select city where you need a lawyer</option>
                <option value="1">Lorem ipsum </option>
                <option value="2">Lorem ipsum</option>
                <option value="3">Lorem ipsum</option>
              </select>
            </div> -->
            </div>
            <div class="col-md-12">
              <p class=" mt-3">
                I agree to<a href="{{URL::to('/')}}/page/terms-of-use" class="sa-color2 "> terms of use</a>
              </p>

            </div>

            <div class="col-md-12">
              <button type="submit" class="btn btn-outline-primary min-w120 mt-3 mb-2">Find Lawyers</button>
            </div>



        </form>
      </div>


    </div>
    <div class=" col-md-5 pl-4">
      <div class="mitem2">
        <div class="sr-card">
          <h5 class="sr-title d-flex align-items-center">
            <img src="{{asset('fronted/images/svg/Icons-16.svg')}}" width="35px" class="mr-2">
            <span>What are others saying?</span>
          </h5>
        </div>
        <p class="mb-20">“I got a call from ’s case manager within minutes and they connected me to a top lawyer instantly. It was never so easy to find the right lawyer"</p>
        <div class="ml-auto">
          <h6 class="font-weight-bold">- Ajay R</h6>
        </div>
      </div>

      <div class="mitem2">
        <div class="sr-card">
          <h5 class="sr-title d-flex align-items-center">
            <img src="{{asset('fronted/images/svg/Icon-18.svg')}}" width="35px" class="mr-2">
            <span>Talk to a top rated lawyer</span>
          </h5>
        </div>
        <p class="mb-20">Contact a top rated lawyer in your city to get detailed opinion on your legal problem.</p>
        <div class="ml-auto">
          <a href="#" class="btn btn-outline-primary">Find a Lawyer</a>
        </div>
      </div>



    </div>
  </div>

  <div class="row mt-4">
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
  </div>

  <div class="row mt-4">
    <div class="col-md-12">
      <div class="sa-application">
        <h5 class="sa-color2">Frequently Asked Questions</h5>
      </div>
      <div class="mb-4 sr-l-space">
        <h6 class="mt-3 sa-color2">What happens after I choose “Talk to a Lawyer"?</h6>
        <p>A representative will get in touch with you, understand your need and will identify which lawyers in our network can assist you.</p>
      </div>
      <div class="mb-4 sr-l-space">
        <h6 class="mt-3 sa-color2">When I use “Talk to a Lawyer" service, is that information private?</h6>
        <p>Yes. Your request is private. However, it is not a confidential communication between you and your lawyer, and therefore is not covered by Attorney-Client privilege. This means you should not include any information in your request that you would only feel comfortable sharing with the lawyer you end up working with. Confidentiality matters, so please err on the side of caution when you fill out the information to “Talk to a Lawyer”.</p>
      </div>
      <div class="mb-4 sr-l-space">
        <h6 class="mt-3 sa-color2">How do I Search a lawyer?</h6>
        <p>If you are looking for a lawyer, you can start by clicking on find a lawyer at the top of the page. This will take you to the Find a Lawyer page, where you can search based on expertise, location and a few other criteria like years of experience, gender, languages spoken, etc. Expertise helps you find lawyers that are suitable for your requirement and location mentions where they practice.</p>
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
          <a href="<?php echo URL::to('/') ?>/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

        </div>
        <div class="col-md-4 text-center">
          <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
          <p>Post your question for free and get response from</p>
          <p>experienced lawyers within 48 hours</p>
          <a href="<?php echo URL::to('/') ?>/free-legal-advice" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
        </div>
        <div class="col-md-4 text-center">

          <h6 class="sr-sub-t">HIRE A LAWYER</h6>
          <p>Contact and get legal assistance from our lawyer</p>
          <p> network for your specific matter</p>
          <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4">Find a Lawyer</a>


        </div>
      </div>
    </div>
  </div>
</div>
</div>
@include('fronted/include/footer')
<script>
  $('#enquiry_form').submit(function(e) {

    var ename = $('#ename').val();
    var eemail = $('#eemail').val();
    var emobile = $('#emobile').val();


    var cnt = 0;
    var f = 0;

    $('#ename_error').html("");
    $('#eemail_error').html("");
    $('#emobile_error').html("");



    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

    // if (email.trim() == '') {
    // 	$('#email_error').html("Please enter Email");
    // 	cnt = 1;
    // 	f++;
    // 	if (f == 1) {
    // 		$('#email').focus();
    // 	}
    // }
    if (ename.trim() == '') {
      $('#ename_error').html("Please enter Name");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#ename').focus();
      }
    }


    function ValidateEmail(eemail) {
      var expr =
        /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      return expr.test(eemail);
    };

    if (eemail) {
      if (!ValidateEmail(eemail)) {
        $('#eemail_error').html("Please enter valid email");
        cnt = 1;
        f++;
        if (f == 1) {
          $('#eemail').focus();
        }
      }
    }

    if (emobile.trim() == '') {
      $('#emobile_error').html("Please enter Mobile No");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#emobile').focus();
      }
    }
    if (emobile.length > 12) {
      $('#emobile_error').html("Please enter Valid Mobile ");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#emobile').focus();
      }
    }

    if (cnt == 1) {
      return false;
    } else {
      return true;
    }


  })
</script>