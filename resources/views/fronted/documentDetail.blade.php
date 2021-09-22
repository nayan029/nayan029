@include('fronted/include/header')
<div class="header-title">
  <div class="inner">
    <div class="container">
      <div class="sa-application">
        <!-- <?php if ($getquerys == null) {
              } else {
              }
              ?> -->
        @php
        $auth = auth()->user();
        @endphp
        <div class="row">
          <div class="col-md-12">
            <h2 class="sa-color1 d-flex justify-content-between  res-lq-font">{{$getquerys->service_name}}

              @if($auth)
              <a data-toggle="modal" data-target="#enquiryModal" href="#" class="btn btn-primary"> Download Now</a>
              @else
              <a href="{{URL::to('/login')}}" class="btn btn-primary"> Enquiry Now</a>
              @endif

            </h2>
            <p class="fs-20 pt-3 pb-0 mb-0">{{$getquerys->short_description}}</p>
          </div>
          <div class="col-md-12">
          </div>
          <div class="col-md-3 d-flex align-items-center res-search-md">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="sa-enroll-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row sr-border2 sr-res-card mb-5">
          <div class="col-md-12 mt-1">
            <div class="">
              <p class="ls-1"></p>

            </div>

            @foreach($sub_service_list as $subService)
            <a href="{{ URL::to('legal-enquiry') }}/{{ $subService->id }}"><i class="fa fa-arrow-right"></i> {{ $subService->description }}</a> <br />
            @endforeach
            @if($getquerys->category_id == '2') {!! $getquerys->description !!} @endif


            <div class="mb-4 sr-l-space">
              <div class="row">
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>
                <div class="col-md-6 mb-3">

                </div>


              </div>

            </div>



          </div>
        </div>

      </div>
      <!-- modal start -->

      <div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="exampleModalLabel" style="color: #222;">Pay Now</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{URL::to('/')}}/insert-document" id="main_new_form">
              <div class="modal-body">
                <p style="color: #222;">
                  "But I must explain to you how all this mistaken idea of denouncing pleasure and
                  praising pain was born and I will give you a complete account of the system, and
                  expound the actual teachings of the great explorer of the truth, the master-builder
                  to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                  produces no resultant pleasure?" 2000$ PAY
                </p>
                @csrf
                <!-- <div class="form-group">
                  <input value="@if(isset($auth->name)){{$auth->name}}@endif" type="text" name="name" class="form-control border-radius-5px" id="ename" aria-describedby="nameHelp" placeholder="Name" autocomplete="off" maxlength="250">
                  <span id="ename_error" style="color: red;"></span>
                </div>
                <div class="form-group">
                  <input type="number" name="phone" class="form-control border-radius-5px" id="emobile" aria-describedby="nameHelp" placeholder="Mobile number" autocomplete="off" maxlength="12">
                  <span id="emobile_error" style="color: red;"></span>
                </div> -->
                <!-- <div class="form-group">
                  <input type="email" name="email" class="form-control border-radius-5px" id="eemail" aria-describedby="emailHelp" placeholder="Email (Optional)" autocomplete="off" maxlength="250">
                  <span id="eemail_error" style="color: red;"></span>
                </div> -->
                <div class="form-group">
                  <input type="hidden" name="doumnetid" value="{{$getquerys->id}}" class="form-control border-radius-5px" id="doumnetid" aria-describedby="emailHelp" placeholder="Email (Optional)" autocomplete="off" maxlength="250">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Pay Now</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- modal end -->


      <div class="row mb-5">
        <div class="col-md-12">
          <div>
          </div>

        </div>
      </div>
    </div>
  </div>
  @include('fronted/include/footer')
  <script>
    $('#main_new_form').submit(function(e) {

      // var ename = $('#ename').val();
      // var eemail = $('#eemail').val();
      // var emobile = $('#emobile').val();


      var cnt = 0;
      var f = 0;

      $('#ename_error').html("");
      // $('#eemail_error').html("");
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
      // if (ename.trim() == '') {
      //   $('#ename_error').html("Please enter name");
      //   cnt = 1;
      //   f++;
      //   if (f == 1) {
      //     $('#ename').focus();
      //   }
      // }


      // function ValidateEmail(eemail) {
      //   var expr =
      //     /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      //   return expr.test(eemail);
      // };

      // if (eemail) {
      //   if (!ValidateEmail(eemail)) {
      //     $('#eemail_error').html("Please enter valid email");
      //     cnt = 1;
      //     f++;
      //     if (f == 1) {
      //       $('#eemail').focus();
      //     }
      //   }
      // }

      // if (emobile.trim() == '') {
      //   $('#emobile_error').html("Please enter mobile number");
      //   cnt = 1;
      //   f++;
      //   if (f == 1) {
      //     $('#emobile').focus();
      //   }
      // }
      // if (emobile.length > 12) {
      //   $('#emobile_error').html("Please enter valid mobile ");
      //   cnt = 1;
      //   f++;
      //   if (f == 1) {
      //     $('#emobile').focus();
      //   }
      // }

      if (cnt == 1) {
        return false;
      } else {
        return true;
      }


    })
  </script>