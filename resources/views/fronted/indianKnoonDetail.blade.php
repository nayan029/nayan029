@include('fronted/include/header')
<?php
// return print_r( $getquerys);die;

?>
<style>
    .panel.panel-default {
        border: 1px solid #aeaeae;
        ;
        margin-bottom: 10px;
    }

    .panel.panel-default a {
        font-size: 16px;

        padding: 10px;
        display: block;
    }

    .panel-body {
        font-weight: normal;
        font-family: 'Poppins-Regular';
        padding: 10px;
        font-size: 14px;
        font-weight: 300;
    }
</style>
<div class="sa-enroll-details">
    <div class="container">
        <div class="row">
            <div class="sa-application">
                <h5 class="sa-color2 mb-4">IPC Sections - Indian Penal Code 1860 Sections</h5>
                <p>The Indian Penal Code (IPC) is the principal criminal code of India that defines crimes and provides punishments for almost all kinds of criminal and actionable wrongs. The IPC extends to the whole of India except the states of Jammu and Kashmir and is an extensive law that covers all the substantive aspects of criminal law from nuisance at public places to murder, rape, dacoity, etc.</p>



                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <?php foreach ($getquerysdata as  $val) {
                            // print_r($val); die;
                        ?>
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">

                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$val->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$val->question}}
                                    </a>

                                </h4>

                            </div>
                            <div id="collapse{{$val->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body"><?php echo $val->answer; ?>
                                </div>
                            </div>
                        <?php    } ?>
                    </div>
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                </a>
                            </h4>

                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                        </div>
                    </div> -->
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                </a>
                            </h4>

                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-7  ">

                <div class="row mt-3 ">
                    <div class="col-md-12 p-0 ">
                        <div class="mitem3">
                            <div class="sr-card">
                                <ul class="footer-ul">
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 1 - Title and extent of operation of the Code</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i>IPC Section 2 - Punishment of offences committed within India</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 3 - Punishment of offences committed beyond, but which by law may be tried within, India</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 4 - Extension of Code to extra-territorial offences</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 5 - Certain laws not to be affected by this Act</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 6 - Definitions in the Code to be understood subject to exceptions</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 7 - Sense of expression once explained</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 8 - Gender</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 9 - Number</a></li>
                                    <li><a href="#"><i class="fa fa-arrow-right"></i> IPC Section 10 - "Man" "Woman"</a></li>
                                </ul>
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
                    <a href="<?php echo URL::to('/') ?>/legal-enquiry">
                        <button type="submit" class="btn btn-outline-primary min-w120 ">Find a Lawyer Now</button></a>
                </div>


            </div>
        </div>




        <div class="row mb-5">
            <div class="col-md-12">
                <div>
                    <h2 class="sr-t">50,000 People Choose Every Day</h2>
                </div>
                <div class="row mt-5 sr-c ">
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

                        <h6 class="sr-sub-t">CONTACT A LAWYER</h6>
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