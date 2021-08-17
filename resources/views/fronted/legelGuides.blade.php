@include('fronted/include/header')

<div class="sa-enroll-details">
    <div class="container">
        <div class="sa-application">
            <div id="databoxtitle">

            </div>
            <!-- tttt -->

            <h5 class="sa-color2 mb-4">Free <span id="catetitle"><?php if (isset($search_name)) {
                                                                        echo $search_name;
                                                                    } ?></span> Legal Advice from Top Lawyers in India</h5>

        </div>
        <div class="row">
            <div class="col-md-7 ">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <select class="form-select sa-form-font border-radius-5px" onchange="functest(this.value)" id="cattid">
                            <option selected="">Select city where you need a lawyer</option>
                            <?php foreach ($advicecategory as $data) { ?>
                                <option <?php if ($data==$data->slug) {
                                    echo "selected";
                                } ?> value="<?php echo $data->slug; ?>">{{{ ucfirst($data->category_name)}}} </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-8 d-flex">
                        <form class="form-inline mb-3" method="GET" action="<?php echo URL::to('/') ?>/indian-kanoon/free-legal-advice/answers">
                            <input type="text" value="" name="search_name" class="form-control sa-form-font half-border-radius mr-4" id="search" placeholder="Search Law Guides">
                            <button type="submit" class="btn btn-outline-primary sr-btn-search"><i class="fa fa-search fs-24"></i></button>
                        </form>
                    </div>
                </div>
                <div>
                    <div class="row mt-2" id="databox">
                        <?php
                        if (count($getquerys) > 0) {

                            foreach ($getquerys as $getquerysdata) {
                        ?>
                                <div class="col-md-12 ">
                                    <div class="mitem3">
                                    <a href="#">
                                                <h5 class="sr-title2 d-flex">
                                                    {{$getquerysdata->guide}}</h5>
                                            </a>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="sr-card">
                                            <?php
                                            if ($getquerysdata->image) {
                                            ?>
                                        
                                                <img style="    margin-bottom: 15px;border: 1px solid #ccc;" src="<?php echo URL::to('/'); ?>/uploads/guides/{{$getquerysdata->image}}" class="guidtext-image" />
                                            <?php } else {
                                            ?>
                                               
                                                
                                                <img style="border: 1px solid #ccc;"   src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="guidtext-image"  />
                                            <?php } ?>
                                            
                                        </div>
                                       
                                            </div>
                                            <div class="col-md-8">
                                            <div class="guidtext" style="    min-height: 118px;"> <?php echo substr($getquerysdata->guide_detail, 0, 150); ?>
                                            </div>
                                            <div class="text-right">
                                            <a href="<?php echo URL::to('/') ?>/indian-kanoon/legal-guides-details/{{$getquerysdata->id}}" class="btn btn-outline-primary">Read More</a>
                                            </div>
                                            </div>

                                        </div>
                                        
                                       
                                    </div>
                                </div>
                                <?php }
                        } else {

                            echo '
                            <div class="col-md-12">
                        <p class="">
                        0 Search results for answers related to Search';
                            $search_name ?><?php
                                            echo '</p>
                        <h1>
                        No Question Found.</h1>
                        </div>';
                                        } ?>
                    </div>
                    <div class="col-md-12">
                        <p class="">
                            Get<a href="" class="sa-color2 "> free legal advice </a>from top rated lawyers for matters pertaining to Divorce.
                        </p>
                    </div>
                    <div class="pagination">
                        {{ $getquerys->appends(request()->except('page'))->links("pagination::bootstrap-4") }}

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
                        Talk to a real lawyer about your legal issue.</p>
                    <a href="<?php echo URL::to('/') ?>/legal-enquiry">
                        <button type="submit" class="btn btn-outline-primary min-w120 ">Find a Lawyer Now</button></a>
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
                        <a href="<?php echo URL::to('/') ?>/free-legal-advice-phone" class="btn btn-outline-primary min-w120 mt-4 mb-4">Talk to a Lawyer</a>

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
                        <a href="{{URL::to('/')}}/legal-enquiry"  class="btn btn-outline-primary min-w120 mt-4 mb-4">Find a Lawyer</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('fronted/include/footer')

<script>    
    function functest(name) {
        var sel_val = name;
        // console.log(sel_val)
        // die();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>/indian-kanoon/" + sel_val + "-legal-advice/",
            type: "POST",
            data: {
                name: name,
                _token: "<?php echo csrf_token(); ?>"
            },
            success: function(response) {
                // console.log(response);
                // die();
                var res = JSON.toString(response);
                $('#databox').html(res.view);
                $('#catetitle').html(res.cat);
                // alert(res)
                window.location.href = "<?php echo URL::to('/'); ?>/indian-kanoon/" + sel_val + "-legal-advice";
            }
        });
    }
</script>

<!-- new script -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#cattid').on("change", function(e) {
            var sel_val = this.value;
            window.location.href = "<?php echo URL::to('/'); ?>/indian-kanoon/" + sel_val + "-legal-guides";
        });
    });
</script>