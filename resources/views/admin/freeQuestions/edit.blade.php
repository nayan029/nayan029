  <!-- Edit Modal -->
  <!-- Modal -->
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Description</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="container">
          <form id="main_id1">

              <div class="form-group">
                  <div class="col-sm-12">
                      {{$data->short_description}}
                      <span style="color:red;" id="discription1_error"></span>
                  </div>
              </div>
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
                  type: type,
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