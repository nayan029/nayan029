@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><small>Edit Admin Profile</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 mt-2">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/manageAdmin">Manage Admin</a></li>
            <li class="breadcrumb-item">Edit Admin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <div class="card-body">
            <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/editAdmin/{{$userdata->id}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label for="exampleInputFirstName">First Name</label><span style="color: red;">*</span>
                    <input type="name" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter First Name" value="{{$userdata->name}}">
                    <span style="color:red;" id="name_error"><?php echo $errors->profile_error->first('name'); ?></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail">Email Id</label><span style="color: red;">*</span>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Id" value="{{$userdata->email}}">
                      <span style="color:red;" id="email_error"><?php echo $errors->profile_error->first('email'); ?></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputContactNo">Contact No</label><span style="color: red;">*</span>
                      <input type="number" class="form-control" id="mobile" name="phone" aria-describedby="numberHelp" placeholder="Enter Contact No" value="{{$userdata->mobile}}">
                      <span style="color:red;" id="mobile_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEduction">Profile Pic</label>
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="nameHelp" placeholder="User Profile">
                    <span style="color:red;" id="image_error"><?php echo $errors->customer_error->first('image'); ?></span>
                  </div>
                </div>

                <!-- <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" /> -->
              </div>
              <?php
              if ($userdata->photo) {
              ?>
                <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" class="site-stg-img site-stg-img2 sr-image" id="blah" />
              <?php } else {
              ?>
                <br>
                <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
              <?php } ?>


              <div class="row">
                <div class="col-sm-12">
                  
                  <a href="<?php echo URL::to('/') ?>/admin/manageAdmin"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>

                  <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Update</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
@include('admin/include/footer')
<script>
    $(document).ready(function () {
        
        //$('#admin_menu').addClass('nav-link active');
        // $('#admin_menu').addClass('nav-item active');
        // $('#master_menu').addClass('nav-link active');
        // $('#master_open').addClass('menu-open active');

        $('#category_menu').addClass('nav-item active');
        $('#categorymaster_menu').addClass('nav-link active');
        $('#categorymaster_open').addClass('menu-open active');


        $('#manage_admin').addClass('active mm-active');
       
    });
</script>
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

  $("#image").change(function() {
    readURL(this);
  });
</script>

<script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  $('#main_form').submit(function(e) {

    var name = $('#name').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    var image = $('#image').val();

    var cnt = 0;
    var f = 0;
    $('#name_error').html("");
    $('#email_error').html("");
    $('#mobile_error').html("");
    $('#image_error').html("");


    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


    function uniqueEmailCheck(email, id) {

      response = false;

      $.ajax({

        url: "<?php echo URL::to('/admin/check_admin_register_editEmail'); ?>",

        'async': false,

        'type': "POST",

        'global': false,

        'dataType': 'html',

        data: {
          email: email,
          editid: id,
          '_token': '<?php echo csrf_token(); ?>'
        },

        success: function(msg) {

          // alert(msg)
          //return data;

          var jsonData = JSON.parse(msg);

          if (jsonData.count == 1) {
            $('#email_error').html("This Email is Already exist.");

            response = true;

          } else {
            $("#email_error").html("");

            response = false;

          }

        },

        error: function(jqXHR, textStatus) {
          $("#email_error").html("");

          response = false;

        }

      });

      return response;

    }

    if (image) {
      var formData = new FormData();
      var file = document.getElementById('image').files[0];
      // var image = $('#image').val();
      formData.append("Filedata", file);
      var t = file.type.split('/').pop().toLowerCase();
      if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        $('#image_error').html("Only JPG, PNG and JPEG image are allowed");
        cnt = 1;
      }
    }
    if (name.trim() == '') {
      $('#name_error').html("Please enter Name");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#name').focus();
      }
    }
    if (email.trim() == '') {
      $('#email_error').html("Please enter Email");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#email').focus();
      }
    }
    if (uniqueEmailCheck(email, id) == false) {
      $('#email_error').html("Please enter Email");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#email').focus();
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
      $('#mobile_error').html("Please enter Mobile No");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#mobile').focus();
      }
    }
    if (mobile.length > 12) {
      $('#mobile_error').html("Please enter Valid Mobile ");
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