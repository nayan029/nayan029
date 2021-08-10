@include('fronted/include/header')
      <div class="sa-enroll-details">
      <div class="container">
        <div class="sa-application">
            <p class="sa-color2">Find the best legal jobs and internship opportunities in India</p>
        </div>
        <div class="row">
          <div class="col-md-7 sr-border sr-res-card">
            <div class="row">
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Name</label>
                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Email</label>
                    <input type="email" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your email">
                </div>
              </div>
              
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Contact no.</label>
                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Contact No.">
                </div>
              </div>
              <div class="col-md-6">
                
                <label for="inputName" class="form-label sa-color2 sa-label"> city of residence </label>
                 <select class="form-select sa-form-font border-radius-5px">
                    <option selected="">Select your city</option>
                    <option value="1">Lorem ipsum </option>
                    <option value="2">Lorem ipsum</option>
                    <option value="3">Lorem ipsum</option>
                </select>
           
         
              </div>
              </div>

            <div class="row">
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">linkedin profile link</label>
                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your linkedin profile link">
                </div>
              </div>
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Work Experience</label>
                    <select class="form-select sa-form-font border-radius-5px">
                      <option selected="">Select your work experience</option>
                      <option value="1">Lorem ipsum </option>
                      <option value="2">Lorem ipsum</option>
                      <option value="3">Lorem ipsum</option>
                </select>
                </div>
              </div>
            </div>

            <div class="row">
              
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Collage Name</label>
                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Collage Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Course Name</label>
                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Course name">
                </div>
              </div>
            </div>

              <div class="row">
             <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Role</label>
                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Which Role are you applying for?">
                </div>
              </div>
              <div class="col-md-6">
                <div class="sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Year of Pass</label>
                    <select class="form-select sa-form-font border-radius-5px">
                    <option selected="">Select your year of passing out</option>
                    <option value="1">Lorem ipsum </option>
                    <option value="2">Lorem ipsum</option>
                    <option value="3">Lorem ipsum</option>
                </select>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-lg-4 sa-pb">
                    <label for="inputName" class="form-label sa-color2 sa-label">Attach your photo</label>
                    <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
                    <p class="choose-imgs"><label for="file" style="cursor: pointer;" class="sa-attach">Attach a pic</label></p>

                </div>
                <div class="col-md-4 col-lg-2 sa-bgs sa-pb">
                    <img id="blah" src="{{asset('fronted/images/new-images/bgs-01.png')}}" alt="your image">
                </div>

                
              </div>

               <div class="row">
              <div class="col-md-12">
                <label for="inputName" class="form-label sa-color2 sa-label"> Your brief background</label>
                 <textarea class="form-control" placeholder="Your Brief Background / Expertise (you can also paste your resume here)" rows="3" maxlength="1000"></textarea>             
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <label for="inputName" class="form-label sa-color2 sa-label">Job Type</label>
                    <div>
                      <div class="sr-form">
                          <input type="radio" id="Full Time" name="Job Type" >
                          <label for="Full Time" class="pr-3">Full Time</label>
                      </div>
                      <div class="sr-form">
                          <input type="radio" id="part Time" name="Job Type" value="">
                          <label for="part Time" class="pr-3">part Time</label>
                        </div>
                        <div class="sr-form">
                          <input type="radio" id="internship" name="Job Type" value="">
                          <label for="internship" class="pr-3">internship</label>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="inputName" class="form-label sa-color2 sa-label">Applying for</label>
                    <div>
                      <div class="sr-form">
                          <input type="radio" id="LawRato In-house team" name="Applying for" >
                          <label for="LawRato In-house team" class="pr-3">LawRato In-house team </label>
                      </div>
                      <div class="sr-form">
                          <input type="radio" id="Litigation Associate" name="Applying for" value="">
                          <label for="Litigation Associate" class="pr-3">Litigation Associate</label>
                      </div>
                      <div class="sr-form">
                          <input type="radio" id="Corporate Law Firm" name="Applying for" value="">
                          <label for="Corporate Law Firm" class="pr-3">Corporate Law Firm</label>
                      </div>
                    </div>
                    
                    
                  </div>
                  <button type="submit" class="btn btn-outline-primary min-w120 mt-3">Submit</button>
                </div>
              </div>

          </div>
           

              
             
          </div>
          <div class=" col-md-5 pl-4">
            <div class="mitem">
              <div class="sr-card">
                <h5 class="sr-title">Be a part of LawRato’s exciting journey</h5>
              </div>
              <p>We are India’s leading legal advice and lawyer search platform, and are always looking for passionate young minds who can help us grow faster. Select ‘Applying for LawRato In-house team’ if you wish to work with LawRato. We currently operate from our corporate office in South Delhi.</p>
            </div>

            <div class="mitem">
              <div class="sr-card">
                <h5 class="sr-title">Work with a top rated lawyer in India</h5>
              </div>
              <p>LawRato has partnered with thousands of top lawyers across hundreds of cities in India. Select Applying for - ‘Litigation Associate’ or ‘Corporate Law Firm’ if you wish to join a lawyer in the city of your choice. Lawyers having a vacancy will directly get in touch with you for an interview.</p>
            </div>
          </div>
        </div>


     <!--    <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">
          <label for="inputName" class="form-label sa-color2 sa-label"> city of residence </label>
                 <select class="form-select sa-form-font border-radius-5px">
                    <option selected="">Select your city</option>
                    <option value="1">Lorem ipsum </option>
                    <option value="2">Lorem ipsum</option>
                    <option value="3">Lorem ipsum</option>
                </select>
           
         </div>
         <div class="col-md-12">
          <label for="inputName" class="form-label sa-color2 sa-label">Professional photo</label>
          <div class="d-flex justify-content-center">
              <img src="images/new-images/bgs-01.png" alt="your image" class="blah2">
          </div>
           <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
            <p class="choose-imgs"><label for="file" style="cursor: pointer;" class="sa-attach">Attach a pic</label></p>
            
           
         </div>
        </div>
       </div> -->

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
               <a href="<?php echo URL::to('/') ?>/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

             </div>
             <div class="col-md-4 text-center">
                <h6 class="sr-sub-t">FREE LEGAL ADVICE</h6>
                    <p>Post your question for free and get response from</p>
                    <p>experienced lawyers within 48 hours</p>
                    <a href="<?php echo URL::to('/') ?>/free-legal-advice" class="btn btn-outline-primary min-w120 mt-4 mb-4">Ask a Free Question</a>
             </div>
             <div class="col-md-4 text-center">

              <h6 class="sr-sub-t">CONTACT A LAWYER</h6>
               <p>Contact and get legal assistance from our lawyer</p>
               <p> network for your specific matter</p>
               <a href="#" class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</a>
               
             </div>
           </div>
         </div>
       </div>
       </div>
      </div>
      @include('fronted/include/footer')
