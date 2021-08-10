  <!-- Edit Modal -->
  <!-- Modal -->
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="container">
          <form id="main_id1" method="POST" action="<?php echo URL::to('/') ?>/admin/manage-location/{{$data->id}}">
              @method('PUT')
              @csrf
              <div class="form-group">
                  <div class="col-sm-12">
                      <label for="exampleInputEmail1">Location</label><span style="color: red;">*</span>
                      <input type="text" maxlength="20" class="form-control" id="name1" value="{{$data->name}}" name="name" aria-describedby="emailHelp" placeholder="Enter email">
                      <span style="color:red;" id="name1_error"></span>
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
          var id = '{{$data->id}}';

          $.ajax({
              url: "<?php echo URL::to('/'); ?>/admin/getexitlocationedit",
              type: "POST",
              data: {
                  name: name,
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

          var cnt = 0;
          $('#name1_error').html("");


          if (name.trim() == '') {
              $('#name1_error').html("Please enter location");
              cnt = 1;
          }
          if (response == 1) {
              $('#name1_error').html("This location is Already Exit");
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