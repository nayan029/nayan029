@include('admin/include/header')
@include('admin/include/nav')
<div class="content-wrapper" style="min-height: 40.0312px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><small>Add Service</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6 mt-2">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL::to('/') ?>/admin/legal-services">Manage Service</a></li>
            <li class="breadcrumb-item">Add Service</li>
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
            <form role="form" id="main_form" method="POST" action="<?php echo URL::to('/') ?>/admin/legal-services" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputContactNo">Type </label><span style="color: red;">*</span>
                    <Select class="form-control" id="category" name="category_id" onchange="getsubcategory(this.value);">
                      <option value="">Select Type</option>
                      <option value="1">Legal Aid</option>
                      <option value="2">Documentation</option>
                    </Select>
                    <span id="category_error" style="color: red;"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label for="exampleInputFirstName">Service Name</label><span style="color: red;">*</span>
                    <select class="form-control" name="name" id="name">
                      <option value="">Select Service Name</option>

                    </select>
                    <span style="color:red;" id="name_error"><?php echo $errors->profile_error->first('title'); ?></span>
                  </div>
                </div>
              </div>

              <div class="row">

                <!-- <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail">Service Title</label><span style="color: red;">*</span>
                    <input type="text" class="form-control" id="service_title" name="service_title" aria-describedby="emailHelp" placeholder="Enter Title">
                    <span style="color:red;" id="title_error"><?php echo $errors->profile_error->first('image'); ?></span>
                  </div>
                </div> -->
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputContactNo">Short Description</label>
                    <input type="text" maxlength="250" class="form-control" id="short_description" name="short_description" aria-describedby="numberHelp" placeholder="Enter Short Description">
                    <span style="color:red;" id="short_description_error"><?php echo $errors->profile_error->first('short_description'); ?></span>
                  </div>
                </div>
              </div>




              <div class="row">
                <div class="col-sm-4">
                  <label for="exampleInputContactNo">Image </label><span style="color: red;">*</span>
                  <input type="file" class="form-control" id="image" name="image" placeholder="select image">
                  <span style="color:red;" id="image_error"><?php echo $errors->profile_error->first('image'); ?></span>
                </div>
              </div>

              <div class="col-sm-12" style="display: none;" id="desc">
                <div class="form-group">
                  <label for="exampleInputEduction">Description</label><span style="color: red;">*</span>
                  <textarea class="form-control" id="description" name="description" aria-describedby="nameHelp" placeholder="User Description"></textarea>
                  <span style="color:red;" id="description_error"><?php echo $errors->customer_error->first('discription'); ?></span>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <a href="<?php echo URL::to('/') ?>/admin/legal-services"><button type="button" class="sa-btn-close p-2 float-right">Close</button></a>
              <button type="submit" class="sa-btn-submit p-2 float-right mr-2">Submit</button>
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
  $('#legal_service').addClass('active mm-active');

  function getsubcategory(type) {

    $.ajax({
      url: "<?php echo URL::to('/'); ?>/admin/getcategory",
      type: "POST",
      data: {
        type: type,
        _token: "<?php echo csrf_token(); ?>"
      },
      success: function(response) {
        $('#name').html(response);
        if (type == '2') {
          $('#desc').css('display', 'block');
          CKEDITOR.replace('description');
        } else {
          $('#desc').css('display', 'none');
        }
      }
    });
  }
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
    // var short_description = $('#short_description').val();
    // var description = $('#description').val();
    var image = $('#image').val();
    // var description = CKEDITOR.instances.description.getData();

    // var service_title = $('#service_title').val();
    var category = $('#category').val();

    var cnt = 0;
    var f = 0;
    $('#name_error').html("");
    // $('#short_description_error').html("");
    $('#description_error').html("");
    $('#title_error').html("");

    $('#image_error').html("");



    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;


    if (category.trim() == '') {
      $('#category_error').html("Please select type");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#category').focus();
      }
    }


    if (name.trim() == '') {
      $('#name_error').html("Please select service name ");
      cnt = 1;
      f++;
      if (f == 1) {
        $('#name').focus();
      }
    }

    if (name) {
      $.ajax({
        async: false,
        url: "<?php echo URL::to('/'); ?>/admin/getexitservicename",
        type: "POST",
        data: {
          name: name,
          _token: "<?php echo csrf_token(); ?>"
        },
        success: function(response) {
          if (response) {
            if (response == 1) {
              $('#name_error').html("This Service is Already Exit");
              cnt = 1;
              f++;
              console.log(f)
              if (f > 0) {
                console.log('tahy');
                $('#name').focus();
                // return false;

              }

            }
          }


        }
      });
    }

    // if (service_title.trim() == '') {
    //   $('#title_error').html("Please enter service title");
    //   cnt = 1;
    //   f++;
    //   if (f == 1) {
    //     $('#title_title').focus();
    //   }
    // }

    // if (short_description.trim() == '') {
    //   $('#short_description_error').html("Please enter Short description");
    //   cnt = 1;
    //   f++;
    //   if (f == 1) {
    //     $('#short_description').focus();
    //   }
    // }

    if (image.trim() == '') {
      $('#image_error').html("Please select Pictures");
      cnt = 1;
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

    if (cnt == 1) {
      return false;
    } else {
      return true;
    }

  })

  function showDescription() {
    alert('yes')
  }
</script>