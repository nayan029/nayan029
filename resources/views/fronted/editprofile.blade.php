
@include('fronted/include/header')

<div class="sa-enroll-details pb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="row pro-sidesec">
              <div class="col-md-12 d-flex">
                <div class="avatar-upload">
                  <div class="avatar-edit">
                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                      </div>
                  </div>
              	</div>
              </div>
              <div class="col-md-12 d-flex justify-content-center">
              	<div class="text-center nametxt">
              		<p class="sa-color2 mb-1">Admin</p>
	              	<p class="mb-1">NIC000012</p>
              	</div>
              </div>
              <div class="col-md-12">
              	<div>
              		<div class=" sr-pro-card">
              			<p class="sa-color2 sr-ed-sec">Email</p>
              			<p class="fs-14px">admin@gmail.com</p>
              		</div>
              		<div class="sr-pro-card">
              			<p class="sa-color2 sr-ed-sec">Contact</p>
              			<p class="fs-14px">1234567899</p>
              		</div>
              		<div class="sr-pro-card">
              			<p class="sa-color2 sr-ed-sec">Nationality</p>
              			<p class="fs-14px">Lorem ipsum </p>
              		</div>
              		<div class="sr-pro-card">
              			<p class="sa-color2 sr-ed-sec">DOB</p>
              			<p class="fs-14px">dd/mm/yyyy</p>
              		</div>

              	</div>
              </div>
            </div>
       
            
             

          </div>
          <div class="col-md-8">
          		<div class="sa-pills-design sr-pillmain">
               <ul class="nav nav-pills " id="pills-tab" role="tablist">
                  <li class="nav-item ">
                     <a class="nav-link active" id="pills-pro-personal-tab" data-toggle="pill" href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="true">Personal Information</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#pills-special" role="tab" aria-controls="pills-special" aria-selected="false">Change Password</a>
                  </li>
               </ul>
            </div>
            <!-- tab1 -->
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade active show" id="pills-personal" role="tabpanel" aria-labelledby="pills-pro-personal-tab">

                  
	                     <div class="row">
				                <div class="col-md-6 sa-pb">
				                    <label for="inputName" class="form-label sa-color2 sa-label">Experience</label>
				                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter Experience">
				                </div>
				                <div class="col-md-6 sa-pb">
				                    <label for="inputName" class="form-label sa-color2 sa-label">Location</label>
				                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Location">
				                </div>
				                <div class="col-md-6 sa-pb">
				                    <label for="inputName" class="form-label sa-color2 sa-label">Courts</label>
				                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Courts">
				                </div>
				                <div class="col-lg-6 col-md-12 sa-pb">
				                	<label for="inputName" class="form-label sa-color2 sa-label">  Language</label>
				                  <select class="form-select sa-form-font border-radius-5px">
				                      <option selected="">Select your Language</option>
				                       <option value="1">Lorem ipsum </option>
				                      <option value="2">Lorem ipsum</option>
				                      <option value="3">Lorem ipsum</option>
				                  </select>
	            				</div>
				                <div class="col-md-6 sa-pb">
				                    <label for="inputName" class="form-label sa-color2 sa-label" title="Basic example" multiple="multiple" name="example-basic">Specialization</label>
				                    <select class="form-select sa-form-font border-radius-5px">
				                      <option selected="">Select your Specialization</option>
				                       <option value="1">Lorem ipsum </option>
				                      <option value="2">Lorem ipsum</option>
				                      <option value="3">Lorem ipsum</option>
				                  </select>
				                </div>
	                
				                <div class="col-md-6 sa-pb">
				                    <label for="inputName" class="form-label sa-color2 sa-label">Practice areas</label>
				                    <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Practice areas">
				                </div>
	            	</div>
	            <div class="row">
	            	<div class="col-md-12 sa-pb mt-3 sr-end">
	                	<button class="btn btn-outline-primary sa-color3 mt-3  poppins-light">Update</button>
	                </div>
	            </div>
                     
                     
                 
                  
               </div>
               <!-- tab2 -->
                 <div class="tab-pane fade" id="pills-special" role="tabpanel" aria-labelledby="pills-password-tab">
                      <div class="row ">
                      	<div class="col-lg-7 col-md-12">
                      		<div class="form-group mb-3">
                      			<label class="form-label sa-color2 sa-label">Old Password</label>
				            	<input type="password" class="form-control sa-form-font half-border-radius" id="" placeholder="old password">
				            </div>
				        </div>
				        <div class="col-lg-7 col-md-12">
				        	<div class="form-group mb-3">
				        		<label class="form-label sa-color2 sa-label">New Password</label>
				            	<input type="password" class="form-control sa-form-font half-border-radius" id="" placeholder="New password">
				        </div>
				        </div>
				        <div class="col-lg-7 col-md-12">
				        	<div class="form-group mb-3">
				        		<label class="form-label sa-color2 sa-label">Confirm Password</label>
				           	 	<input type="password" class="form-control sa-form-font half-border-radius" id="" placeholder="Confirm password">
				        	</div>
				        </div>
				        <div class="col-md-7 ">
				        	<div class="text-center">
                               <button class="btn btn-outline-primary sa-color3  poppins-light">Change Password</button>
                            </div>
                        </div>
                      	 
                      </div>
                 </div>
                 <!-- end tab2 -->
                 </div>


            
          </div>
        </div>
       
        
        
       </div>
      </div>
@include('fronted/include/footer')

