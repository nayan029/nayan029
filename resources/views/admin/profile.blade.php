@include('admin/include/header')
@include('admin/include/nav')


<div class="content-wrapper" style="min-height: 40.0312px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><small>Profile</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 mt-2">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
            <li class="breadcrumb-item">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="card card-outline sa-card-outlines">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">Super Admin</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"> {{ Auth::user()->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>MobileNo</b> <a class="float-right">{{ Auth::user()->mobile }}</a>
                </li>
                <li class="list-group-item">
                  <b>Location</b> <a class="float-right">Ahmedabad,India</a>
                </li>
                <li class="list-group-item">
                  <b>Last Updated</b> <a class="float-right"><?= date("d-M-Y", strtotime(Auth::user()->updated_at)); ?></a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link sa-nav-links active" href="#profile" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link sa-nav-links" href="#changepassword" data-toggle="tab">Change password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="profile">
                  <!-- Post -->
                  <form class="form-horizontal" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/profile" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$userdata->name}}">
                        <span style="color:red;" id="name_error"><?php echo $errors->profile_error->first('name'); ?></span>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$userdata->email}}" readonly>
                        <span style="color:red;" id="email_error"><?php echo $errors->profile_error->first('email'); ?></span>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Moblie No</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="MoblieNo" value="{{$userdata->mobile}}">
                        <span style="color:red;" id="mobile_error"><?php echo $errors->profile_error->first('mobile'); ?></span>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label for="inputExperience" class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="sel1">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div> -->
                    <!-- <div class="form-group row">
                      <label for="inputaddres" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="textarea" class="form-control" id="address" name="address" placeholder="Address">
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <label for="inputProfilepic" class="col-sm-3 col-form-label">ProfilePicture</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="profilepic" name="profilepic" placeholder="Profileimge">
                        <span style="color:red;" id="company_logo_error"><?php echo $errors->customer_error->first('company_logo'); ?></span>
                      </div>
                      <!-- <div class="form-group"> -->
                      <?php
                      if ($userdata->photo) {
                      ?>
                        <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/uploads/profile/{{$userdata->photo}}" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                      <?php } else {
                      ?>
                        <br>
                        <img style="border: 1px solid #ccc;" width="58px" height="58px" src="<?php echo URL::to('/'); ?>/assets/img/avatar5.png" class="site-stg-img site-stg-img2 sr-image" id="blah" />
                      <?php } ?>


                    </div>
                    <!-- <div class="form-group row">
                      <label for="inputSkills" class="col-sm-3 col-form-label">Role</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="sel1">
                          <option>SuperAdmin</option>
                          <option>Admin</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="changepassword">
                  <!-- TChange password -->
                  <form class="form-horizontal" id="change_password" method="POST" action="<?php echo URL::to('/') ?>/admin/change_password">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Old Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="oldpassword" name="old_password" placeholder="Old Password">
                        <span style="color:red;" id="old_password_error"><?php echo $errors->reset_password->first('old_password'); ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputnewpassword" class="col-sm-3 col-form-label">New
                        Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="newpassword" name="password" placeholder="New Password">
                        <span style="color:red;" id="password_error"><?php echo $errors->reset_password->first('password'); ?></span>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputconfirmpassword" class="col-sm-3 col-form-label">Confirm
                        Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirmpassword" name="confirm_password" placeholder="Confirm Password">
                        <span style="color:red;" id="confirm_password_error"><?php echo $errors->reset_password->first('confirm_password'); ?></span>

                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>


<!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

@include('admin/include/footer')
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

  $("#profilepic").change(function() {
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
    var gender = $('#gender').val();
    var address = $('#address').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();

    var cnt = 0;
    var f = 0;
    $('#name_error').html("");
    $('#email_error').html("");
    $('#mobile_error').html("");
    $('#gender_error').html("");
    $('#address_error').html("");
    $('#password_error').html(" ");
    $('#confirm_password_error').html(" ");

    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


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






  $('#change_password').submit(function(e) {


    var old_password = $('#oldpassword').val();
    var password = $('#newpassword').val();
    var confirm_password = $('#confirmpassword').val();

    var cnt = 0;

    $('#old_password_error').html(" ");
    $('#password_error').html(" ");
    $('#confirm_password_error').html(" ");

    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


    if (old_password.trim() == '') {
      $('#old_password_error').html("Please enter old password");
      cnt = 1;
    }
    if (old_password) {

      $.ajax({
        url: "<?php echo URL::to('/'); ?>/admin/check_oldpassword",
        type: "POST",
        data: {
          old_password: old_password,
          _token: "<?php echo csrf_token(); ?>"
        },
        success: function(response) {

          if (response == 1) {

          } else {
            $('#old_password_error').html("Old Password does not match");
            cnt = 1;
          }
        }
      });
    }
    if (password.trim() == '') {
      $('#password_error').html("Please enter Password");
      cnt = 1;
    }
    if (password) {
      if (password.length < 8) {
        $('#password_error').html("Password should be atleast 8 characters");
        cnt = 1;
      } else {
        if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {

        } else {
          $('#password_error').html(
            "Must contain min. 8 characters with at least 1 number and 1 special character");
          cnt = 1;
        }
      }
    }

    if (confirm_password.trim() == '') {
      $('#confirm_password_error').html("Please enter confirm password");
      cnt = 1;
    }
    if (confirm_password != password) {
      $('#confirm_password_error').html("Password and Confirm Password does not match");
      cnt = 1;
    }

    if (cnt == 1) {
      return false;
    } else {
      return true;
    }

  })
</script>