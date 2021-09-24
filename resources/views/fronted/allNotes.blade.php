@include('fronted/include/header')
<div class="sa-enroll-details">
  <div class="container">
    <div class="sa-application d-flex justify-content-between">
      <h4 class="sa-color2 mb-4">Free @if(isset($researchpapers)){{"Research Paper"}}
        @elseif(isset($notes)){{"Notes"}} @elseif(isset($bars)){{"Bare Acts"}}@endif From Top Rated Lawyers</h4>
        <div class="col-md-3 res-search-md">
            <form method="GET">
              <div class="filter-group mutual-sa-search d-flex">
                <input placeholder="Search" type="text" name="name" id="search" autocomplete="off">

                <button type="button" onclick="getData(this)" class="btn btn-outline-search ml-1"><img src="https://appworkdemo.com/legalbench/public/fronted/images/svg/feather_search-active.svg " class=""></button>
              </div>
            </form>
          </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 ">
        <div class="row">
          <!-- <div class="col-md-5 d-flex align-items-center">
            <input type="text" class="form-control sa-form-font half-border-radius mr-4" id="search" placeholder="Search Law Guides">
            <button type="submit" class="btn btn-outline-primary sr-btn-search"><i class="fa fa-search fs-24"></i></button>
          </div> -->
          <div class="col-md-7 ">
            <!-- <div class="row">
              <div class="col-md-6 pl-0 pr-0">
                <a href="<?php echo URL::to('/') ?>/ask-a-free-question" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
              </div>
              <div class="col-md-6 pl-0 pr-0">
                <a href="<?php echo URL::to('/') ?>/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>
              </div>
            </div> -->
          </div>
        </div>
        <div class="row sr-border mt-4 " id="databox">
          <!-- <h5 class="sa-color2 mb-3"><b>Over 123046 legal queries answered by our top experts</b></h5> -->
          <?php foreach ($allQuerys as $data) {
          ?>
            <div class="col-md-12">
              <ul class="footer-ul sa-footer-mb">

                <li><a href="<?php echo URL::to('/legalQueryDesc'); ?>?id=<?= $data->id ?>"><i class="fa fa-arrow-right"></i> {{ucfirst($data->title)}}</a></li>

              </ul>
            </div>
          <?php } ?>
          <div class="col-md-6">
            <ul class="footer-ul">
              <!-- <li><a href="#"><i class="fa fa-arrow-right"></i> Divorce</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Medical Negligence</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Landlord/Tenant</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Property</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Motor Accident</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Divorce</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Medical Negligence</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Landlord/Tenant</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Property</a></li>
					<li><a href="#"><i class="fa fa-arrow-right"></i> Motor Accident</a></li> -->
            </ul>
          </div>
        </div>
            

        <!-- <div class="row sr-border2 sr-res-card mt-5">
          <h5 class="sa-color2 mb-3"><b>Talk to a Lawyer</b></h5>
          <p>Just fill in your details to immediately get the best matched lawyers for legal issues. Every lawyer profile has been verified, and you can contact them within minutes.</p>
          <div class="col-md-12 mt-1">
            <div class="sa-pb">
              <label for="inputName" class="form-label sa-color2 sa-label">Name</label>
              <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your name">
            </div>
            <div class="sa-pb">
              <label for="inputName" class="form-label sa-color2 sa-label">Mobile Number</label>
              <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Contact No.">
            </div>
            <div class="sa-pb">
              <label for="inputName" class="form-label sa-color2 sa-label">Email</label>
              <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Email">
            </div>
            <div class="">
              <label for="inputName" class="form-label sa-color2 sa-label"> city </label>
              <select class="form-select sa-form-font border-radius-5px">
                <option selected="">Select city where you need a lawyer</option>
                <option value="1">Lorem ipsum </option>
                <option value="2">Lorem ipsum</option>
                <option value="3">Lorem ipsum</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <p class="sr-err mt-3">
              I agree to<a href="term_of_use.html" class="sa-color2 "> 's terms of use</a>
            </p>

          </div>

          <div class="col-md-12">
            <a href="#" class="btn btn-outline-primary min-w120 mt-4 mb-2">Find Lawyers</a>
          </div>



        </div> -->


        <!-- <div class="row sr-border mt-4 ">
          <h5 class="sa-color2 mb-3">Free Legal Advice from Top Rated Lawyers</h5>
          <p>
            Need instant solution to your legal problem? You can do it with ’s free legal advice service. You can post your query related to any legal matter online and get it answered instantly by top advocates in India for free.
          </p>
          <br />
          <p>
            .com lists Top Rated Legal Experts in the country to help you get practical Legal Advice & help. We have experts across criminal defence, property dispute, family issues, corporate law, IPR & 20 other areas of expertise. Our listed Lawyers have practice across 700 cities, and 3000 courts across India, to help provide you the required advice & representation for your legal issues.
          </p>
          <br />
          <p>
            The internet is not a lawyer and neither are you. Googling your legal queries might not be a viable solution for your case. With 's free legal advice service you can talk to a real lawyer about your legal issue for free and get a practical solution instantly.
          </p><br />
          <p>
            We believe that the right information helps you make better decisions. At .com, we provide you with detailed information on Lawyers, their areas of expertise, and their experience so that you can make the choices that are right for you. Find your legal solution using the FREE LEGAL ADVICE service through the website, where lacs of people have already found the right guidance for their needs.
          </p>

        </div> -->
        <!-- <h5 class="sa-color2 mt-4 mb-3">Latest legal answers</h5> -->
        <!-- <div class="col-md-12 p-0">
          <div class="mitem3">
            <div class="sr-card">
              <h5 class="sr-title1 d-flex" style="color:orange;font-size:16px; font-weight:bold;">
                <span class="back-q">Q</span> Regarding safety of self n wife
              </h5>
            </div>
            <p class="mb-20">Hi There, Looking for an advice for a situation we are living in. We(I and my Wife) married secretly 2 years ago because we are aware that if we go …
            </p>
            <div class="ml-auto">
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-12 p-0">
          <div class="mitem3">
            <div class="sr-card">
              <h5 class="sr-title1 d-flex" style="color:orange;font-size:16px; font-weight:bold;">
                <span class="back-q">Q</span> Regarding safety of self n wife
              </h5>
            </div>
            <p class="mb-20">Hi There, Looking for an advice for a situation we are living in. We(I and my Wife) married secretly 2 years ago because we are aware that if we go …
            </p>
            <div class="ml-auto">
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-12 p-0">
          <div class="mitem3">
            <div class="sr-card">
              <h5 class="sr-title1 d-flex" style="color:orange;font-size:16px; font-weight:bold;">
                <span class="back-q">Q</span> Regarding safety of self n wife
              </h5>
            </div>
            <p class="mb-20">Hi There, Looking for an advice for a situation we are living in. We(I and my Wife) married secretly 2 years ago because we are aware that if we go …
            </p>
            <div class="ml-auto">
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-12 p-0">
          <div class="mitem3">
            <div class="sr-card">
              <h5 class="sr-title1 d-flex" style="color:orange;font-size:16px; font-weight:bold;">
                <span class="back-q">Q</span> Regarding safety of self n wife
              </h5>
            </div>
            <p class="mb-20">Hi There, Looking for an advice for a situation we are living in. We(I and my Wife) married secretly 2 years ago because we are aware that if we go …
            </p>
            <div class="ml-auto">
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-12 p-0">
          <div class="mitem3">
            <div class="sr-card">
              <h5 class="sr-title1 d-flex" style="color:orange;font-size:16px; font-weight:bold;">
                <span class="back-q">Q</span> Regarding safety of self n wife
              </h5>
            </div>
            <p class="mb-20">Hi There, Looking for an advice for a situation we are living in. We(I and my Wife) married secretly 2 years ago because we are aware that if we go …
            </p>
            <div class="ml-auto">
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div> -->
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
                    <a href="<?php echo URL::to('/') ?>/legal-enquiry">
                        <button type="submit" class="btn btn-outline-primary min-w120 ">Find a Lawyer Now</button></a>
                </div>


            </div> -->
    </div>




    <div class="row mb-5">
      <div class="col-md-12">
        <div>
          <!-- <h2 class="sr-t">50,000 People Choose  Every Day</h2> -->
        </div>
        <!-- <div class="row mt-5 sr-c ">
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">INDIA’S LEADING LEGAL PLATFORM</h6>

            <p>Get the legal help & representation from over 10000 </p>
            <p>lawyers across 700 cities in India</p>
            <a href="<?php echo URL::to('/') ?>/free-legal-advice-phone">
              <button type="submit" class="btn btn-outline-primary min-w120 mt-4">Talk to a Lawyer</button></a>

          </div>
          <div class="col-md-4 text-center">
            <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
            <p>Post your question for free and get response from</p>
            <p>experienced lawyers within 48 hours</p>
            <a href="<?php echo URL::to('/') ?>/free-legal-advice">
              <button type="submit" class="btn btn-outline-primary min-w120 mt-4">Ask a Free Question</button></a>
          </div>
          <div class="col-md-4 text-center">

            <h6 class="sr-sub-t">HIRE A LAWYER</h6>
            <p>Contact and get legal assistance from our lawyer</p>
            <p> network for your specific matter</p>
            <a href="{{URL::to('/')}}/legal-enquiry" class="btn btn-outline-primary min-w120 mt-4">Find a Lawyer</a>

          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
@include('fronted/include/footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var route = "{{ url('/search/autocomplete-search/two') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                  $('#databox').html(data);
                    // return process(data);
                });
            }
        });
    </script>