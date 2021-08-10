  <!-- Edit Modal -->
  <!-- Modal -->
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="container">
          <form id="main_id1" method="POST" action="<?php echo URL::to('/') ?>/admin/adviceCategory/{{$data->id}}">
              @method('PUT')
              @csrf
              <div class="form-group">
                  <div class="col-sm-12">
                      <label for="exampleInputEmail1">Type</label><span style="color: red;">*</span>
                      <select name="type" id="type1" class="form-control">
                          <option value="">Select Type</option>
                          <option value="question">Question & Answers</option>
                          <option value="guides">Guides</option>
                      </select>
                      <span style="color:red;" id="type_error1"></span>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                      <label for="exampleInputEmail1">Category</label><span style="color: red;">*</span>
                      <input type="text" maxlength="250" class="form-control" id="name1" value="{{$data->category_name}}" name="name" aria-describedby="emailHelp" placeholder="Enter email">
                      <span style="color:red;" id="name1_error"></span>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                      <label for="exampleInputEmail1">Discription</label><span style="color: red;">*</span>
                      <textarea class="form-control" value="{{$data->description}}" id="discription1" name="discription" aria-describedby="emailHelp" placeholder="Enter Discription">
                      {{$data->description}} </textarea>
                      <span style="color:red;" id="discription1_error"></span>
                  </div>
              </div>
              <button type="button" onclick="checkvalidation();" id="submitform" class="btn btn-primary">Update</button>
          </form>
      </div>
      <div class="modal-footer">
      </div>
  </div>

  <!-- Edit Modal -->
  <script>
      /*Validation*/
      function checkvalidation() {
          var name = $('#name1').val();
          var type = $('#type1').val();
          var id = '{{$data->id}}';

          $.ajax({
              url: "<?php echo URL::to('/'); ?>/admin/getexitadvicecategoryedit",
              type: "POST",
              data: {
                  name: name,
                  type : type,
                  id: id,
                  _token: "<?php echo csrf_token(); ?>"
              },
              success: function(response) {
                  if (response) {
                      getvalidation(response);
                  }


              }
          });

      }
      /*Validation*/
      function getvalidation(response) {


          $('#submitform').prop('disabled', true);
          var name = $('#name1').val();
          var discription = $('#discription1').val();
          var type = $('#type1').val();

          var cnt = 0;
          $('#name1_error').html("");
          $('#discription1_error').html("");
          $('#type_error1').html("");

          if (type.trim() == '') {
            $('#type_error1').html("Please Select Type");
            cnt = 1;
        }
          if (name.trim() == '') {
              $('#name1_error').html("Please enter Category");
              cnt = 1;
          }
          if (discription.trim() == '') {
              $('#discription1_error').html("Please enter Discription");
              cnt = 1;
          }
          if (response == 1) {
              $('#name1_error').html("This Category is Already Exit");
              cnt = 1;
          }

          if (cnt == 1) {
              $('#submitform').prop('disabled', false);
              return false;
          } else {
              $('#main_id1').submit();
          }
      }
  </script>