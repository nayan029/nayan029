@include('fronted/include/header')
<!-- <link rel="stylesheet" href="{{URL::to('/')}}/fronted/css/datepicker.css"> -->
<!-- datepicker cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- ***************** -->
<div class="sa-enroll-details">
    <div class="container">
        <div class="sa-pills-design">
            <ul class="nav nav-pills " id="pills-tab" role="tablist">
                <li class="nav-item ">

                    <?php
                    // print_r($step['step']); die;
                    /*
                    if ($step['step'] == 0) {
                                            echo "active";
                                        }
                                        
                                         if ($step['step'] == 1) {
                                            echo "active";
                                        } 
                                        */
                    ?>
                    <a class="nav-link @if($step['step'] == 0) {{'active'}} @else {{''}} @endif" id="pills-personal-tab">Personal Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($step['step'] == 1) {{'active'}} @else {{''}} @endif">Specialization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($step['step'] == 2) {{'active'}} @else {{''}} @endif">Oath and Signature</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link <?php if ($step['step'] == 3) {
                                            echo "active show";
                                        } ?>">Confirm and Download form</a>
                </li> -->
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade  @if($step['step'] == 0) {{'active show'}} @else {{''}} @endif" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                <div class="sa-personal">
                    <div class="sa-application">
                        <!-- <p class="sa-color2">Application for enrolment</p>   -->
                    </div>
                    <form id="main_id" action="<?php echo URL::to('/'); ?>/lawyer/enrollment" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row pb-3">
                            <div class="col-md-6 sa-pr">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">First Name</label><span style="color: red;"> *</span>
                                        <input type="text" value="@if(isset($test->name)){{$test->name}}@endif" name="lname" class="form-control sa-form-font half-border-radius" id="ename" placeholder="Enter your first name">
                                        <span id="ename_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-12 col-lg-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Last Name</label><span style="color: red;"> </span>
                                        <input type="text" value="@if (isset($test->username)){{$test->username}}@endif" name="fathername" class="form-control sa-form-font half-border-radius" id="fathername" placeholder="Enter your Last Name">
                                        <span id="fathername_error" style="color: red;"></span>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 sa-pb">
                                        <label for="inputDate" class="form-label sa-color2 sa-label">DOB</label><span style="color: red;"> *</span>
                                        <!-- <input type="date" name="dob" class="form-control sa-form-font half-border-radius" id="dob"> -->
                                        <input type="text" name="ldob" id="inputDate" class="form-control date sa-form-font half-border-radius sr-cal" placeholder="dd/mm/yyy" autocomplete="off" readonly>
                                        <span id="dob_error" style="color: red;"></span>

                                    </div>

                                    <div class="col-md-8 col-lg-4 sa-pb">

                                        <label for="inputName" class="form-label sa-color2 sa-label">Attach your photo</label>
                                        <input type="file" name="profileimage" id="profileimage" style="display: none;">
                                        <p class="choose-imgs mb-7"><label for="profileimage" style="cursor: pointer;" class="sa-attach">Attach a pic</label></p>
                                        <span id="image_error" style="color:red;"></span>
                                    </div>
                                    <div class="col-md-4 col-lg-2 sa-bgs sa-pb">

                                        <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
                                        <!-- <img id="blah" src="{{asset('fronted/images/new-images/bgs-01.png')}}" alt="your image" id="blah" /> -->
                                        <img id="blah" src="{{asset('fronted/images/user.png')}}" alt="your image" id="blah" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="sa-qualification">
                                            <p class="sa-color2">Qualification of enrolment</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Degree Name</label><span style="color: red;"> *</span>
                                        <div class="row">
                                            <div class="col-md-12 pb-3">
                                                <input name="frollno" type="text" class="form-control sa-form-font half-border-radius" id="frollno" placeholder="Degree Name">
                                                <span id="frollno_error" style="color: red;"></span>
                                            </div>
                                            <div class="col-md-12 pb-3">
                                                <input name="srollno" type="text" class="form-control sa-form-font half-border-radius" id="srollno" placeholder="Degree Name">
                                                <span id="srollno_error" style="color: red;"></span>

                                            </div>
                                            <!-- <div class="col-md-12">
                                                <input name="trollno" type="text" class="form-control sa-form-font half-border-radius" id="trollno" placeholder="Degree Name">
                                                <span id="trollno_error" style="color: red;"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label ">Year</label><span style="color: red;"> *</span>
                                        <div class="row">
                                            <div class="col-md-12 pb-3">
                                                <input name="fyear" type="text" class="form-control sa-form-font half-border-radius" id="fyear" placeholder="Year">
                                                <span id="fyear_error" style="color: red;"></span>
                                            </div>
                                            <div class="col-md-12 pb-3">
                                                <input name="syear" type="text" class="form-control sa-form-font half-border-radius" id="syear" placeholder="Year">
                                                <span id="syear_error" style="color: red;"></span>
                                            </div>
                                            <!-- <div class="col-md-12">
                                                <input name="tyear" type="text" class="form-control sa-form-font half-border-radius" id="tyear" placeholder="LL.B Year">
                                                <span id="tyear_error" style="color: red;"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label ">Institution</label><span style="color: red;"> *</span>
                                        <div class="row">
                                            <div class="col-md-12 pb-3">
                                                <input name="finstitue" type="text" class="form-control sa-form-font half-border-radius" id="finsti" placeholder=" Institution">
                                                <span id="finsti_error" style="color: red;"></span>
                                            </div>
                                            <div class="col-md-12 pb-3">
                                                <input name="sinstitue" type="text" class="form-control sa-form-font half-border-radius" id="sinsti" placeholder=" Institution">
                                                <span id="sinsti_error" style="color: red;"></span>
                                            </div>
                                            <!-- <div class="col-md-12">
                                                <input name="tinstitue" type="text" class="form-control sa-form-font half-border-radius" id="tinsti" placeholder="LL.B Institution">
                                                <span id="tinsti_error" style="color: red;"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <!-- <div class="col-lg-6 col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label"> Nationality of applicant</label><span style="color: red;"> *</span>
                                        <select name="nationality" class="form-select sa-form-font border-radius-5px" id="nationality">
                                            <option value="">Select your nationality</option>
                                            <option value="1">India</option>
                                            <option value="2">U.S.A</option>
                                            <option value="3">Sri Lanka</option>
                                        </select>
                                        <span id="nationality_error" style="color: red;"></span>
                                    </div> -->
                                    <div class="col-lg-6 col-md-12 sa-pb">
                                        <label for="inputDate" class="form-label sa-color2 sa-label">NIC number <img class="ml-1" src="{{asset('fronted/images/svg/ant-design_info-circle-filled.svg')}}"></label><span style="color: red;"> *</span>
                                        <input name="nicno" type="text" class="form-control sa-form-font half-border-radius" id="nicno" placeholder="" maxlength="13">
                                        <span id="nicno_error" style="color: red;"></span>

                                        <!--   <input type="text" class="form-control sa-form-font sa-nic" maxlength="13">
                                 <div class="sa-span">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                 </div> -->
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12 sa-pb">
                                        <label for="inputDate" class="form-label sa-color2 sa-label">Location </label><span style="color: red;"> *</span>
                                        <select name="location" id="location" class="form-control sa-form-font half-border-radius">
                                            <option value="">Select Location</option>
                                            @foreach ($location as $data)
                                            <option value="{{$data->name}}">{{ucfirst($data->name)}}</option>
                                            @endforeach
                                        </select>
                                        <span id="location_error" style="color: red;"></span>
                                    </div> -->



                                    <div class="col-md-12 col-lg-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Mobile No</label><span style="color: red;"> *</span>
                                        <input type="number" name="mobile" class="form-control sa-form-font half-border-radius" id="emobile" placeholder="Enter your Mobile No">
                                        <span id="emobile_error" style="color: red;"></span>
                                    </div>

                                    <div class="col-md-12 col-lg-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Experience </label><span style="color: red;"> *</span>
                                        <input type="text" name="experience" class="form-control sa-form-font half-border-radius" id="experience" placeholder="Enter your experience" maxlength="20">
                                        <span id="experience_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-md-12 col-lg-6 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Price</label><span style="color: red;"> *</span>
                                        <input type="number" maxlength="11" name="basic_price" class="form-control sa-form-font half-border-radius" id="basic_price" placeholder="Enter price">
                                        <span id="basic_price_error" style="color: red;"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-12 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label"> Language</label><span style="color: red;"> *</span>

                                        <div class="sa-lang-check">
                                            <div class="pm-check ">
                                                <input class="form-check-input language" name="language[]" type="checkbox" value="english" id="one">
                                                <span class="real-checkbox"></span>
                                                <label class="form-check-label  sa-label" for="one">
                                                    English
                                                </label>
                                            </div>
                                            <div class="pm-check ">
                                                <input class="form-check-input language" name="language[]" type="checkbox" value="hindi" id="two">
                                                <span class="real-checkbox"></span>
                                                <label class="form-check-label  sa-label" for="two">
                                                    Hindi
                                                </label>
                                            </div>
                                        </div>
                                        <span id="language_error" style="color: red;"></span>
                                    </div>
                                    <!-- <div class="col-lg-4 sa-pb">
                                        <label for="inputName" class="form-label sa-color2 sa-label">Gender</label><span style="color:red;"> *</span>
                                        <select name="gender" class="form-select sa-form-font border-radius-5px" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="m">Male</option>
                                            <option value="f">female</option>
                                        </select>
                                        <span id="gender_error" style="color: red;"></span>
                                    </div> -->
                                    <!-- <div class="col-lg-4 sa-pb">
                                 <label for="inputName" class="form-label sa-color2 sa-label">Date</label>
                                 <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Date of last">
                              </div>
                              <div class="col-lg-4 sa-pb">
                                 <label for="inputName" class="form-label sa-color2 sa-label">Roll No</label>
                                 <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Your Roll No">
                              </div> -->
                                </div>

                            </div>
                        </div>
                </div>
                <div class="sa-form-next">
                    <button type="submit" id="" class="btn btn-primary sa-color3 sa-next-btn w150 poppins-light">Next</button>
                </div>
            </div>
            </form>
            <!-- tab2 -->
            <div class="tab-pane fade  @if($step['step'] == 1) {{'active show'}} @else {{''}} @endif" id="pills-special" role="tabpanel" aria-labelledby="pills-special-tab">
                <form id="main_idtwo" action="<?php echo URL::to('/'); ?>/lawyer/enrollment" method="POST">
                    @csrf
                    <div class="sa-personal">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="sa-color2">Practice Area</label><span style="color: red;"> *</span>
                            <textarea name="about" maxlength="250" class="form-control" id="about_data" rows="3"></textarea>
                            <span id="about_error" style="color:red"></span>
                        </div>


                        <div class="sa-application">
                            <p class="sa-color2">Specialization <span style="color: red;"> *</span></p>
                        </div>
                        <div class="row sr-pad1">

                            <div class="col-md-3">

                                <div class="pm-check " id="catcheck">
                                    <!-- <input class="form-check-input" name="category[]" type="radio" value="<?php echo $data->id; ?>" id="<?php echo $data->category_name; ?>">
                                        <label class="form-radio-label" for="<?php echo $data->category_name; ?>">
                                            <?php echo $data->category_name; ?>
                                        </label> -->

                                    <select name="category[]" id="specialization" class="form-control sa-form-font half-border-radius">
                                        <option value="">Select Specialization</option>
                                        @foreach ($category as $data)
                                        <option value="{{$data->id}}">{{ucfirst($data->category_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <span id="category_error" style="color:red"></span>
                            </div>




                        </div>
                        <div class="sa-application mt-2">
                            <label for="exampleFormControlTextarea1" class="sa-color2">Court</label><span style="color: red;"> *</span>
                        </div>
                        <div class="form-group">
                            <div class="row sr-pad1">
                                @foreach ($court as $data)
                                <div class="col-md-3">
                                    <div class="pm-check " id="courtcheck">
                                        <input class="form-check-input court" name="court[]" type="checkbox" value="<?php echo $data->id; ?>" id="<?php echo $data->name; ?>">
                                        <span class="real-checkbox"></span>
                                        <label class="form-check-label" for="<?php echo $data->name; ?>">
                                            <?php echo $data->name; ?>
                                        </label>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                            <span id="court_error" style="color:red"></span>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="sa-form-next">
                                    <!-- onclick=" if(!this.form.checkbox.checked){ alert('You must agree to the terms first.');return false;}" -->
                                    <button type="submit" class="btn btn-outline-primary min-w120">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end tab2 -->
            <!-- tab3 -->
            <div class="tab-pane fade  @if($step['step'] == 2) {{'active show'}} @else {{''}} @endif" id="pills-sign" role="tabpanel" aria-labelledby="pills-sign-tab">
                <form id="signature_frm" action="<?php echo URL::to('/'); ?>/lawyer/enrollment" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="sa-application d-flex justify-content-center">
                            <h5 class="sa-color2 mb-4">Oath and Signature</h5><span style="color: red;"> *</span>
                        </div>
                        <span>
                            <p>
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                            </p>
                        </span>
                        <div class="row d-flex justify-content-center">
                            <div class=" col-md-6 pl-4">
                                <div class="mitem3 text-center">
                                    <div class="sr-card ">
                                        <img id="signatureblah" class="sr-sign-img" src="{{asset('fronted/images/new-images/Sign.png')}}" alt="your image">
                                    </div>

                                    <div class=" sa-pb">
                                        <!-- <label for="inputName" class="form-label sa-color2 sa-label">Attach your photo</label> -->
                                        <input type="file" name="siganturepic" id="signatureimage" style="display: none;">
                                        <p class="choose-imgs mb-7"><label for="signatureimage" style="cursor: pointer;" class="sa-attach">Attach a signature</label></p>
                                        <span id="signatureimage_error" style="color:red;"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="sa-form-next">
                            <!-- <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Back</button> -->
                            <button type="submit" id="" class="btn btn-primary sa-color3 sa-next-btn w150 poppins-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end tab3 -->
            <!-- tab4 -->
            <div class="tab-pane fade ">

                <div class="sa-personal">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 ">
                            <div class="row sr-border3 sr-res-card mb-20">
                                <div class="col-md-12">
                                    <div class="sr-card2 ">
                                        <?php if ($lawyerDataNew->profileimage) {
                                        ?>
                                            <img id="blah sr-wh1" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$lawyerDataNew->profileimage}}" alt="your image">

                                        <?php
                                        } else {
                                        ?>
                                            <img id="blah sr-wh1" src="{{asset('fronted/images/new-images/gray-s.png')}}" alt="your image">

                                        <?php
                                        } ?>

                                    </div>
                                    <p class="sr-nam"><?php echo $lawyerDataNew->lname;  ?></p>
                                </div>
                                <div class="col-md-12 sr-bt">
                                    <div class="sa-application">
                                        <p class="sa-color2">Application for enrolment</p>
                                    </div>
                                </div>
                                <div class="col-md-12 pl-0 pr-0">
                                    <table class="table table-bordered sr-t-bordered">
                                        <!-- <tr>
                                      <td colspan="2"><p class="sa-color2 d-flex justify-content-center">Application for enrolment</p></td>
                                    </tr> -->
                                        <tr>
                                            <td class="sa-color2">DOB</td>
                                            <td class="sr-p-white sr-b-right"><?php echo date("d-m-Y", strtotime($lawyerDataNew->ldob));  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="sa-color2">Father/Spouse’s Name</td>
                                            <td class="sr-p-white sr-b-right"><?php echo $lawyerDataNew->fathername;  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="sa-color2"> Nationality of applicant</td>
                                            <td class="sr-p-white sr-b-right"><?php echo $lawyerDataNew->nationality;  ?>/td>
                                        </tr>
                                        <tr>
                                            <td class="sa-color2">NIC number </td>
                                            <td class="sr-p-white sr-b-right"><?php echo $lawyerDataNew->nicno;  ?> </td>
                                        </tr>
                                        <!-- <tr>
                                      <td colspan="3"><p class="sa-color2 d-flex justify-content-center">Qualification of enrolment</p></td>
                                    </tr> -->
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div class="sa-application">
                                        <p class="sa-color2">Qualification of enrolment</p>
                                    </div>
                                </div>
                                <div class="col-md-12 pl-0 pr-0">
                                    <table class="table table-bordered sr-t-bordered">
                                        <tr>
                                            <td class="sa-color2">Roll No</td>
                                            <td class="sa-color2">Year </td>
                                            <td class="sa-color2 sr-b-right">Institute </td>
                                        </tr>
                                        <tr>
                                            <td class="sr-p-white"><?php echo $lawyerDataNew->frollno;  ?></td>
                                            <td class="sr-p-white"><?php echo $lawyerDataNew->fyear;  ?> </td>
                                            <td class="sr-p-white sr-b-right"><?php echo $lawyerDataNew->finstitue;  ?> </td>
                                        </tr>
                                        <tr>
                                            <td class="sr-p-white"><?php echo $lawyerDataNew->srollno;  ?></td>
                                            <td class="sr-p-white"><?php echo $lawyerDataNew->syear;  ?></td>
                                            <td class="sr-p-white sr-b-right"><?php echo $lawyerDataNew->sinstitue;  ?> </td>
                                        </tr>
                                        <tr>
                                            <td class="sr-p-white"><?php echo $lawyerDataNew->trollno;  ?></td>
                                            <td class="sr-p-white"><?php echo $lawyerDataNew->tyear;  ?></td>
                                            <td class="sr-p-white sr-b-right"><?php echo $lawyerDataNew->tinstitue;  ?> </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end pt-3">
                                        <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Confirm</button>
                                        <button class="btn btn-outline-primary sa-color3 mr-4 w150 poppins-light">Download pdf</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  <div class="row">
                         <div class="col-md-6">
                          <div class="sa-application">
                           <p class="sa-color2">Application for enrolment</p>
                       </div>
                           <div class="row">
                             <div class="col-md-6">
                               <label for="inputName" class="form-label sa-color2 sa-label fs-16px">Name of applicant</label>
                                 <p class="fs-15px">Name Here</p>
                             </div>
                             <div class="col-md-6">
                               <label for="inputDate" class="form-label sa-color2 sa-label fs-16px">DOB</label>
                                 <p class="fs-15px">Birthdate here</p>
                             </div>
                             <div class="col-md-6">
                               <label for="inputDate" class="form-label sa-color2 sa-label fs-16px">Father/Spouse’s Name</label>
                                 <p class="fs-15px">Father/Spouse’s Name here</p>
                             </div>
                             <div class="col-md-6">
                               
                             </div>
                             <div class="col-md-6">
                               <label for="inputDate" class="form-label sa-color2 sa-label fs-16px">  Nationality of applicant</label>
                                 <p class="fs-15px">  Nationality</p>
                             </div>
                             <div class="col-md-6">
                               <label for="inputDate" class="form-label sa-color2 sa-label fs-16px">Father/Spouse’s Name</label>
                                 <p class="fs-15px">Father/Spouse’s Name here</p>
                             </div>

                           </div>
                         </div>
                         <div class="col-md-6">
                            <div class="sa-application">
                             <p class="sa-color2">Qualification of enrolment</p>
                            </div>
                            <div class="row">
                             <div class="col-md-4">
                               <label for="inputName" class="form-label sa-color2 sa-label fs-16px">Roll No</label>
                                 <p class="fs-15px">Name Here</p>
                                 <p class="fs-15px">Name Here</p>
                                 <p class="fs-15px">Name Here</p>

                             </div>
                             <div class="col-md-4">
                               <label for="inputName" class="form-label sa-color2 sa-label fs-16px">Year</label>
                                 <p class="fs-15px"> Name Here</p>
                                 <p class="fs-15px">Name Here</p>
                                 <p class="fs-15px">Name Here</p>
                             </div>
                             <div class="col-md-4">
                               <label for="inputName" class="form-label sa-color2 sa-label fs-16px">Institute</label>
                                 <p class="fs-15px">Name Here</p>
                                 <p class="fs-15px">Name Here</p>
                                 <p class="fs-15px">Name Here</p>
                             </div>
                           
                         </div>
                       </div>
                      
                      </div> -->
            </div>
        </div>
        <!-- end tab4 -->
    </div>
</div>
</div>

@include('fronted/include/footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script>
    $("#dob").datepicker({
        autoUpdateInput: false,
        autoclose: true,
        todayHighlight: true,
        endDate: new Date(),
        format: 'dd-mm-yyyy',

    });
</script> -->
<!-- datepicker script -->
<script>
    $("#inputDate").datepicker({
        //  autoUpdateInput: false,
        autoclose: true,
        // todayHighlight: true,
        endDate: new Date(),

        format: 'dd-mm-yyyy',

    });
</script>
<!-- End datepicker script -->

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').css({
                    height: '58px',
                    width: '58px'
                });
                $('#blah').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profileimage").change(function() {
        readURL(this);
    });

    function readURLsecond(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#signatureblah').css({
                    height: '58px',
                    width: '58px'
                });
                $('#signatureblah').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#signatureimage").change(function() {
        readURLsecond(this);
    });
</script>

<script>
    $('#main_id').submit(function(e) {

        var type = 2;
        var ename = $('#ename').val();
        var dob = $('#inputDate').val();
        var fathername = $('#fathername').val();
        var image = $('#profileimage').val();
        var experience = $('#experience').val();
        // var gender = $('#gender').val();
        var basic_price = $('#basic_price').val();

        var frollno = $('#frollno').val();
        var fyear = $('#fyear').val();
        var finsti = $('#finsti').val();

        var srollno = $('#srollno').val();
        var syear = $('#syear').val();
        var sinsti = $('#sinsti').val();
        var language = $('.language').val();


        //  alert(language)
        // var trollno = $('#trollno').val();
        // var tyear = $('#tyear').val();
        // var tinsti = $('#tinsti').val();
        // var location = $('#location').val();
        // var court = $('#court').val();


        // var nationality = $('#nationality').val();
        var nicno = $('#nicno').val();

        var language = $('input[name=language]:checked').val();

        var emobile = $('#emobile').val();
        // alert (language)

        var cnt = 0;
        var f = 0;

        $('#ename_error').html("");
        // $('#location_error').html();
        // $('#court_error').html();
        $('#dob_error').html("");
        $('#fathername_error').html("");
        $('#experience_error').html("");

        $('#basic_price_error').html("");
        // $('#gender_error').html("");


        $('#frollno_error').html("");
        $('#fyear_error').html("");
        $('#finsti_error').html("");

        $('#srollno_error').html("");
        $('#syear_error').html("");
        $('#sinsti_error').html("");

        // $('#trollno_error').html("");
        // $('#tyear_error').html("");
        // $('#tinsti_error').html("");

        // $('#nationality_error').html();
        $('#language_error').html("");
        $('#nicno_error').html();

        $('#emobile_error').html();

        // if (image.trim() == '') {
        //     $('#image_error').html("Please select Pictures");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#profileimage').focus();
        //     }
        // }
        // if(element.attr("language[]") == "check") error.appendTo("#nicno_error")

        if (image) {
            var formData = new FormData();
            var file = document.getElementById('profileimage').files[0];
            // var image = $('#image').val();
            formData.append("Filedata", file);
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
                $('#image_error').html("Only JPG, PNG and JPEG image are allowed");
                cnt = 1;
            }
        }
        // if (language.trim() == '') {
        //     $('#language_error').html("Please select language");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('.language').focus();
        //     }
        // }
        // if(element.attr("language") == "check") error.appendTo("#language_error ")
        if (ename.trim() == '') {
            $('#ename_error').html("Please enter firstname");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#ename').focus();
            }
        }


        if (basic_price.trim() == '') {
            $('#basic_price_error').html("Please enter price");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#basic_price').focus();
            }
        }
        // if (location.trim() == '') {
        //     $('#location_error').html("Please enter location");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#location').focus();
        //     }
        // }


        // if ((court == null)) {
        //   $("#court_error").html("Please select one option");
        //   // alert("please select one option"); 
        // }
        if (dob.trim() == '') {
            $('#dob_error').html("Please enter date of birth");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#inputDate').focus();
            }
        }

        if (fathername.trim() == '') {
            $('#fathername_error').html("Please enter lastname");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#fathername').focus();
            }
        }

        // if (!ValidateEmail(email)) {
        // 	$('#email_error').html("Please enter Valid Email");
        // 	cnt = 1;
        // 	f++;
        // 	if (f == 1) {
        // 		$('#email').focus();
        // 	}
        // }

        if (frollno.trim() == '') {
            $('#frollno_error').html("Please enter degree name");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#frollno').focus();
            }
        }
        if (fyear.trim() == '') {
            $('#fyear_error').html("Please enter year");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#fyear').focus();
            }
        }
        if (finsti.trim() == '') {
            $('#finsti_error').html("Please enter institute name");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#finsti').focus();
            }
        }

        // if (srollno.trim() == '') {
        //     $('#srollno_error').html("Please enter Degree Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#srollno').focus();
        //     }
        // }
        // if (syear.trim() == '') {
        //     $('#syear_error').html("Please enter year");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#syear').focus();
        //     }
        // }
        // if (sinsti.trim() == '') {
        //     $('#sinsti_error').html("Please enter institute name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#sinsti').focus();
        //     }
        // }

        // if (trollno.trim() == '') {
        //     $('#trollno_error').html("Please enter Degree Name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#trollno').focus();
        //     }
        // }
        // if (tyear.trim() == '') {
        //     $('#tyear_error').html("Please enter year");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#tyear').focus();
        //     }
        // }
        // if (tinsti.trim() == '') {
        //     $('#tinsti_error').html("Please enter institute name");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#tinsti').focus();
        //     }
        // }
        // if (nationality.trim() == '') {
        //     $('#nationality_error').html("Please select nationality");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#nationality').focus();
        //     }
        // }
        if (nicno.trim() == '') {
            $('#nicno_error').html("Please enter nic no");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#nicno').focus();
            }
        }

        if (emobile.trim() == '') {
            $('#emobile_error').html("Please enter mobile no");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#emobile').focus();
            }
        }
        if (emobile.length > 12) {
            $('#emobile_error').html("Please enter valid mobile ");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#emobile').focus();
            }
        }
        if (experience.trim() == '') {
            $('#experience_error').html("Please enter experience");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#experience').focus();
            }
        }
        // if (gender.trim() == '') {
        //     $('#gender_error').html("Please select gender");
        //     cnt = 1;
        //     f++;
        //     if (f == 1) {
        //         $('#gender').focus();
        //     }
        // }
        // var number = /([0-9])/;
        // var alphabets = /([a-zA-Z])/;
        // var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        // if (password) {
        // 	if (password.length < 8) {
        // 		$('#password_error').html("Password should be atleast 8 characters");
        // 		cnt = 1;
        // 	} else {
        // 		if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {

        // 		} else {
        // 			$('#password_error').html(
        // 				"Must contain min. 8 characters with at least 1 number and 1 special character");
        // 			cnt = 1;
        // 		}
        // 	}
        // }

        if (cnt == 1) {
            return false;
        } else {
            // $("#reg_btn").html("Loading...");
            // $(':input[type="submit"]').prop('disabled', true);
            return true;
        }

        // }
    })

    //signature validations
    $('#signature_frm').submit(function(e) {
        var signatureimage = $('#signatureimage').val();

        // alert(signatureimage);
        var cnt = 0;
        var f = 0;

        $('#signatureimage_error').html("");

        if (signatureimage.trim() == '') {
            $('#signatureimage_error').html("Please select pictures");
            cnt = 1;
        }
        if (signatureimage) {
            var formData = new FormData();
            var file = document.getElementById('signatureimage').files[0];
            // var image = $('#image').val();
            formData.append("Filedata", file);
            var t = file.type.split('/').pop().toLowerCase();
            if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
                $('#signatureimage_error').html("Only JPG, PNG and JPEG image are allowed");
                cnt = 1;
            }
        }

        if (cnt == 1) {
            return false;
        } else {
            // $("#reg_btn").html("Loading...");
            // $(':input[type="submit"]').prop('disabled', true);
            return true;
        }
    })
</script>
<script>
    function validation() {
        if (!this.form.checkbox.checked) {
            alert('Please check any one checkbox');
            return false;
        }
        // alert('y')
    }
</script>
<script>
    $('#main_idtwo').submit(function(e) {
        var about = $('#about_data').val();
        var court = $(".court").val();
        var length = $("#courtcheck input[type=checkbox]:checked").length;
        // var category = $("#catcheck input[type=checkbox]:checked").length;
        var specialization = $("#specialization").val();


        var cnt = 0;
        var f = 0;

        $('#about_error').html("");
        $('#court_error').html("");
        $('#category_error').html("");

        if (about.trim() == '') {
            $('#about_error').html("Please enter about");
            cnt = 1;
            f++;
            if (f == 1) {
                $('#about').focus();
            }
        }
        if (length < 1) {
            $("#court_error").html("Please select court");
        } else {
            $("#court_error").html("");
        }
        // if (category < 1) {
        //     $("#category_error").html("Please select category");
        // } else {
        //     $("#category_error").html("");
        // }

        if (specialization.trim() == '') {
            $("#category_error").html("Please select specialization");
        } else {
            $("#category_error").html("");
        }

        if (cnt == 1) {
            return false;
        } else {
            // $("#reg_btn").html("Loading...");
            // $(':input[type="submit"]').prop('disabled', true);
            return true;
        }
    })
</script>