@include('fronted/include/header')
<div class="sa-enroll-details">
    <div class="container">
        <div class="sa-application d-flex justify-content-center">
            <h5 class="sa-color2 mb-4">THANK YOU!!</h5>
        </div>
        <div class="row d-flex justify-content-center">
            <div class=" col-md-6 pl-4">
                <div class="mitem3 text-center">
                    <div class="sr-card ">
                        <img src="{{asset('fronted/images/user.png')}}">
                    </div>
                    <p class="mt-3">Thank you for sharing your legal issue with us. We will contact you shortly to share the lawyer details with you.</p>
                    <a href="<?php echo URL::to('/') ?>/account/all-questions" type="submit" class="btn btn-outline-primary min-w120 ">Close</a>
                </div>
            </div>
        </div>

    </div>
</div>
@include('fronted/include/footer')