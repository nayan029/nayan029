@include('fronted/include/header')
<div class="sa-enroll-details">
  <div class="container">
    <!-- content 1 -->
    <div id="Section1" style="display:block;">
      <form action=" " method="POST">
        @csrf
        <div class="sa-application">
          <h5 class="sa-color2 mb-2">What kind of legal issue are you facing?</h5>
        </div>
        <div id="errorissue" class="text-center" style="color: red;" class="error"></div>
        <div class="row mt-30 sa-row-flex">
          @foreach($category as $data)
          <div class="col-md-3 ">
            <div class="mitem3 sr-radio-card ">
              <input type="radio" name="legal-issue1" class="sr-radio-card-inputs" value="{{$data->id}}" id="issueid">
              <i class="fa fa-check-square-o sr-radio-icon"></i>
              <p class="sr-title2 mb-3">
                {{$data->category_name}}
              </p>
            </div>
          </div>

          @endforeach
        </div>


        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <a href="#" class="btn btn-outline-primary" onclick="nextPrev(1)" id="nextbtn1">Next</a>

          </div>
        </div>
      </form>
    </div>
    <!-- end content1 -->
    <!-- content 2 -->
    <div id="Section2" style="display:none">
      <form action=" {{ URL::to('/')}} /legal-enquiry " method="POST">
        <div id="errorissueregard" style="color: red;" class="text-center"></div>
        <div class="sa-application">
          <h5 class="sa-color2 mb-2">What is your issue regarding?</h5>
        </div>

        <div class="row mt-30 sa-row-flex" id="subissuelist">

        </div>



        <div class="row">
          <div class="col-md-12 ">
            <a href="#" class="btn btn-outline-primary" id="prevbtn2">Prev</a>
            <a href="#" class="btn btn-outline-primary float-right" onclick="nextPrevtwo(1)" id="nextbtn2">Next</a>

          </div>
        </div>
      </form>
    </div>
    <!-- end content2 -->

    <!-- content 3 -->
    <div class="sr-sec3" id="Section3" style="display:none">
      <form method="POST">
        @csrf
        <div class="sa-application d-flex justify-content-center">
          <h5 class="sa-color2 mb-2">Get lawyer details by SMS and Email.</h5>
        </div>

        <div id="errorname" style="color:red" class="text-center"></div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 sr-border sr-res-card">
            <div class="row">
              <!-- <div class="col-md-12">
                <label for="inputName" class="form-label sa-color2 sa-label">Area of law</label><span style="color: red;">*</span>
                <select class="form-select sa-form-font border-radius-5px" id="location" name="location">
                  <option value="">Select Location</option>
                  @foreach ($location as $data)
                  <option value="{{$data->name}}">{{ucfirst($data->name)}}</option>
                  @endforeach
                </select>
              </div>
              <span id="location_error" style="color: red;"></span> -->

              <div class="col-md-12 mt-1">
                <div class="sa-pb">
                  <label for="inputName" class="form-label sa-color2 sa-label">Name</label><span style="color: red;">*</span>
                  <input type="text" class="form-control sa-form-font half-border-radius" placeholder="Enter your name" id="iname" name="name" maxlength="250">
                </div>
                <span id="name_error" style="color: red;"></span>
                <div class="sa-pb">
                  <label for="inputName" class="form-label sa-color2 sa-label">Contact no.</label><span style="color: red;">*</span>
                  <input type="number" class="form-control sa-form-font half-border-radius" placeholder="Enter your Contact No." name="mobile" id="imobile">
                </div>
                <span id="mobile_error" style="color: red;"></span>

                <div class="sa-pb mb-4">
                  <label for="inputName" class="form-label sa-color2 sa-label">Email</label>
                  <input type="email" class="form-control sa-form-font half-border-radius" placeholder="Enter your Email" id="email" name="email" maxlength="250">
                </div>
                <span id="email_error" style="color: red;"></span>

                <div>
                  <label for="inputName" class="form-label sa-color2 sa-label">Other Information</label>
                  <textarea class="form-control" placeholder="Question (Limit 1000 Characters)" rows="3" maxlength="1000" id="otherinfo" name="otherinfo"></textarea>
                </div>
                <span id="otherinfo_error" style="color: red;"></span>

              </div>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">
          <div class="col-md-8 p-0">
            <div class="row">
              <div class="col-md-12 ">
                <a href="#" class="btn btn-outline-primary" id="prevbtn3">Prev</a>
                <a href="#" class="btn btn-outline-primary float-right" onclick="nextPrevthree(1)" id="nextbtn3">Submit</a>

              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
    <!-- end content3 -->
    <!-- content 4 -->
    <!-- <div class="sr-sec4 mb-4" id="Section4" style="display:none">
      <div class="sa-application d-flex justify-content-center">
        <h5 class="sa-color2 mb-2">Any specific details you want to share? (Optional)</h5>
      </div>

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 sr-border sr-res-card">
          <div class="row">
            <div class="col-md-12 ">
              <div class="sa-pb mb-4">
                <label for="inputName" class="form-label sa-color2 sa-label">Email</label>
                <input type="text" class="form-control sa-form-font half-border-radius" id="" placeholder="Enter your Email">
              </div>
              <div>
                <label for="inputName" class="form-label sa-color2 sa-label">Other Information</label>
                <textarea class="form-control" placeholder="Question (Limit 1000 Characters)" rows="3" maxlength="1000"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-8 p-0">
          <div class="row">
            <div class="col-md-12 ">
              <a href="<?php echo URL::to('/') ?>/thank-you" class="btn btn-outline-primary">skip</a>
              <a href="<?php echo URL::to('/') ?>/thank-you" class="btn btn-outline-primary float-right">Next</a>

            </div>
          </div>

        </div>
      </div>

    </div> -->
    <!-- end content4 -->

  </div>
</div>
@include('fronted/include/footer')
<script>
  var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<script type="text/javascript">
  $("#nextbtn1").on('click', function() {
    // $("#Section1").hide();
    // $("#Section2").show();
    // $("#Section3").hide();
    // $("#Section4").hide();
    // $("#div1").toggle();
  });
</script>
<script type="text/javascript">
  $("#nextbtn2").on('click', function() {
    // $("#Section1").hide();
    // $("#Section2").hide();
    // $("#Section3").show();
    // $("#Section4").hide();

  });
</script>
<script type="text/javascript">
  $("#prevbtn2").on('click', function() {
    $("#Section1").show();
    $("#Section2").hide();
    $("#Section3").hide();
    $("#Section4").hide();

  });
</script>
<script type="text/javascript">
  $("#prevbtn3").on('click', function() {
    $("#Section1").hide();
    $("#Section2").show();
    $("#Section3").hide();
    $("#Section4").hide();

  });
</script>
<script type="text/javascript">
  $("#nextbtn3").on('click', function() {
    // $("#Section1").hide();
    // $("#Section2").hide();
    // $("#Section3").hide();
    // $("#Section4").show();

  });
</script>

<script>
  function nextPrev(n) {
    issue = $("input[name='legal-issue1']:checked").val();
    // alert(issue)
    if ((n == 1) && (issue == null)) {
      $("#errorissue").html("Please select one option");
      // alert("please select one option"); 
      $("#Section1").show();

      // console.log(false);
      return false;
    } else {
      $("#Section1").hide();
      $("#Section2").show();
      $("#Section3").hide();
      $("#Section4").hide();
      $("#subissuelist").empty();
      $.ajax({
        url: '{{ URL::to("/")}}/get-subissue',
        type: 'POST',
        data: {
          issue_id: issue,
          _token: '{{ csrf_token() }}'
        },
        success: function(data) {
          // console.log(data);
          $("#subissuelist").append(data);
        }
      });

    }
  }
</script>
<script>
  function nextPrevtwo(n) {
    issue = $("input[name='issue-regarding']:checked").val();
    // alert(issue)
    if ((n == 1) && (issue == null)) {
      $("#errorissueregard").html("Please select one option");
      $("#Section1").hide();
      $("#Section2").show();
      $("#Section3").hide();
      $("#Section4").hide();
      // console.log(false);
      return false;
    } else {

      $("#Section1").hide();
      $("#Section2").hide();
      $("#Section3").show();
      $("#Section4").hide();

    }
  }
</script>
<script>
  function nextPrevthree(n) {
    var iname = $('#iname').val();
    var phone = $('#imobile').val();
    var city = $('#location').val();
    var email = $('#email').val();
    // var issueid = $('#issueid').val();
    var issueid = $('input[name="legal-issue1"]:checked').val();

    var subissueid = $('#subissueid').val();
    //  alert(issueid);
    var otherinfo = $('#otherinfo').val();
    // alert(city)
    if (n == 1) {

      if (city == "") {
        $("#Section1").hide();
        $("#Section2").hide();
        $("#Section3").show();
        $("#Section4").hide();
        $("#errorname").html("Please select your city");
        return false;
      } else if (iname == "") {
        $("#Section1").hide();
        $("#Section2").hide();
        $("#Section3").show();
        $("#Section4").hide();
        $("#errorname").html("Please enter your name");
        return false;
      } else if (phone == "") {
        $("#Section1").hide();
        $("#Section2").hide();
        $("#Section3").show();
        $("#Section4").hide();
        $("#errorname").html("Please enter contact number");
        return false;
      } else if (isNaN(phone) || phone.length != 10) {
        $("#Section1").hide();
        $("#Section2").hide();
        $("#Section3").show();
        $("#Section4").hide();
        $('#errorname').html('Please enter valid contact number');
        return false;
      } else {
        console.log(issueid);
        $.ajax({
          url: '{{ URL::to("/")}}/insert-quer',
          type: 'POST',
          data: {
            name: iname,
            phone: phone,
            // city: city,
            email: email,
            issue_id: issueid,
            subissueid: subissueid,
            otherinfo: otherinfo,
            _token: '{{ csrf_token() }}'
          },
          success: function(data) {
            // console.log(data);
            window.location.href = " thank-you";

          }
        });
      }
    }
  }
</script>