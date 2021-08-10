@include('fronted/include/header')
<section class="sa-contact-details">
    <div class="container">
        <div class="row main-row">
            <div class="offset-md-1 col-md-5 col1">
                <h3 class="sa-contact">Contact us</h3>
                <p class="sa-color sa-feel pb-5">feel free to reach out us, we will<br>get back to you as soon as we can</p>
                <div class="form">
                    <form id="main_id" method="post" action="<?php echo URL::to('/contact-us/store'); ?>" onsubmit="return validation();">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control border-radius-5px" id="name" aria-describedby="nameHelp" placeholder="Name" autocomplete="off">
                            <span id="name_error" style="color: red;"></span>

                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control border-radius-5px" id="email" aria-describedby="emailHelp" placeholder="Email" autocomplete="off">
                            <span id="email_error" style="color: red;"></span>

                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message-contact" class="form-control border-radius-5px" placeholder="Enter message" rows="5"></textarea>
                            <span id="message_error" style="color: red;"></span>

                        </div>
                        <div class="text-center">
                            <button type="submit" id="submitBtn1" class="btn btn-outline-primary sa-btn-color sa-width">Submit</button>
                        </div>
                    </form>
                    <div class="sa-bottom ">
                        <ul class="social sa-social">
                            <li><a href="#" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#" target="_blank"><i class="ti-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="ti-linkedin"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="offset-md-1 col-md-5 sa-details col2">
                <div class="sa-opening pb-3">
                    <p class="sa-color">Opening Hours</p>
                    <p><span class="sa-date-time"> {{$getsettings->opning_day}} <br> {{$getsettings->opning_hours}}</span></p>
                </div>
                <div class="sa-add pb-3">
                    <p class="sa-color">Address</p>
                    <p class="sa-lorem-address">{{$getsettings->address}}</p>
                </div>
                <div class="sa-supp pb-4">
                    <p class="sa-color">Support</p>
                    <p class="supp-details"><span><a href="mailto:">{{$getsettings->support_email}}</a></span><br><span><a href="tel:">{{$getsettings->support_phone}}</a></span></p>
                </div>

                <div class="connect-details">
                    <p>Connect with us</p>
                </div>

                <div class="row pt-3 pb-3">
                    <div class="col-lg-6">
                        <p class="sa-color">Marketing</p>
                        <ul class="sa-social-details">
                            <li><img src="{{asset('fronted/images/new-images/user.png')}}">{{$getsettings->marketing_name}}</li>
                            <li><img src="{{asset('fronted/images/new-images/message.png')}}"><a href="mailto:">{{$getsettings->marketing_email}}</a></li>
                            <li><img src="{{asset('fronted/images/new-images/phone.png')}}"><a href="tel:">{{$getsettings->marketing_phone}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <p class="sa-color">Accounts payable</p>
                        <ul class="sa-social-details">
                            <li><img src="{{asset('fronted/images/new-images/user.png')}}">{{$getsettings->accountant_name}}</li>
                            <li><img src="{{asset('fronted/images/new-images/message.png')}}"><a href="mailto:">{{$getsettings->accountant_email}}</a></li>
                            <li><img src="{{asset('fronted/images/new-images/phone.png')}}"><a href="tel:">{{$getsettings->accountant_phone}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="sa-color">HR</p>
                        <ul class="sa-social-details">
                            <li><img src="{{asset('fronted/images/new-images/user.png')}}">{{$getsettings->hr_name}}</li>
                            <li><img src="{{asset('fronted/images/new-images/message.png')}}"><a href="mailto:">{{$getsettings->hr_email}}</a></li>
                            <li><img src="{{asset('fronted/images/new-images/phone.png')}}"><a href="tel:">{{$getsettings->hr_phone}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('fronted/include/footer')
<script>
	// $('#contact-us').addClass('active ');
    
    function validation() {
        // $('#submitBtn1').prop('disabled', true);
        var temp = 0;
        var f = 0;
        var name = $("#name").val();
        var email = $("#email").val();
        var message_contact = $("#message-contact").val();


        if (name.trim() == '') {
            $('#name_error').html("Please enter name");
            // cnt = 1;
            temp++;

        }

        function ValidateEmail(email) {
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            return expr.test(email);
        };
        if (email) {
            if (!ValidateEmail(email)) {
                $('#email_error').html("Please enter Valid Email ");
                temp++;
                cnt = 1;
                f++;
                if (f == 1) {
                    $('#email').focus();
                }
            }
        }

        if (email == "") {

            $('#email_error').html("Please enter email");

            temp++;

        }
        if (message_contact == "") {

            $('#message_error').html("Please enter message");

            temp++;

        }

        if (temp == 0) {
            // $("#submitBtn1").prop('disabled', false);
            $("#submitBtn1").show();
            return true;
        } else {
            $("#submitBtn1").show();
            return false;
            // $('#main_id').submit();
        }
    }
</script>