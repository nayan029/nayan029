<div id="footer"></div>
</body>
<script src="{{asset('fronted/js/jquery.min.js')}}"></script>
<script src="{{asset('fronted/js/popper.min.js')}}"></script>
<script src="{{asset('fronted/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fronted/js/select2.min.js')}}"></script>
<script src="{{asset('fronted/js/owl.carousel.js')}}"></script>
<script src="{{asset('fronted/js/custom.js')}}"></script>
<script src="{{asset('fronted/js/toastr.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
<!-- 
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script> -->

<script>
  $(".select2").select2({
    minimumResultsForSearch: -1
  });
</script>
<script>
  var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
    nav: true,
    // autoplay: true,
    //   autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  })
</script>
@if(Session::has('success'))
<script>
  toastr.success('<?php echo Session::get('success') ?>', '', {
    timeOut: 5000
  });
</script>
@endif

@if(Session::has('error'))
<script>
  toastr.error('<?php echo Session::get('error') ?>', '', {
    timeOut: 5000
  });
</script>
@endif


<script>
  $('#main_form').submit(function(e) {

    var name = $('#name').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();


    var cnt = 0;
    var f = 0;

    $('#name_error').html("");
    $('#email_error').html("");
    $('#mobile_error').html("");



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
    if (name.trim() == '') {
      $('#name_error').html("Please enter name");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#name').focus();
      }
    }


    function ValidateEmail(email) {
      var expr =
        /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      return expr.test(email);
    };

    if (email) {
      if (!ValidateEmail(email)) {
        $('#email_error').html("Please enter valid email");
        cnt = 1;
        f++;
        if (f == 1) {
          $('#email').focus();
        }
      }
    }

    if (mobile.trim() == '') {
      $('#mobile_error').html("Please enter mobile number");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#mobile').focus();
      }
    }
    if (mobile.length > 12) {
      $('#mobile_error').html("Please enter valid mobile ");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#mobile').focus();
      }
    }

    if (cnt == 1) {
      return false;
    } else {
      return true;
    }


  })
</script>

<script>
  function getsubcategory(type) {
    $.ajax({
      url: "{{ URL::to('/')}}/admin/getcategorybyname",
      type: "POST",
      data: {
        type: type,
        _token: "{{ csrf_token()}}"
      },
      success: function(response) {
        $('#name').html(response);

      }
    });
  }
</script>

</html>