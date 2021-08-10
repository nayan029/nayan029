  <!-- Edit Modal -->
  <!-- Modal -->
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Issue</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="container">
          <form id="main_id1" method="POST" action="<?php echo URL::to('/') ?>/admin/legal-issue/{{$data->id}}">
              @method('PUT')
              @csrf
              <div class="form-group">
                  <div class="col-sm-12">
                      <label for="exampleInputEmail1">Category</label><span style="color: red;">*</span>
                      <select name="type" id="type1" class="form-control">
                          <option value="">Select Type</option>
                          @foreach($category as $datas)
                          <option @if($data->category_id == $datas->id) {{"selected"}}
                              @endif value="{{$datas->id}}">{{$datas->category_name}}</option>
                          @endforeach
                      </select>
                      <span style="color:red;" id="type_error1"></span>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                      <label for="exampleInputEmail1">Issue Name</label><span style="color: red;">*</span>
                      <input type="text" maxlength="250" class="form-control" id="name1" value="{{$data->issue_name}}" name="name" aria-describedby="emailHelp" placeholder="Enter issue name">
                      <span style="color:red;" id="name1_error"></span>
                  </div>
              </div>
              <div class="form-group">

              </div>
              <button type="button" onclick="getvalidation();" id="submitform" class="btn btn-primary">Update</button>
          </form>
      </div>
      <div class="modal-footer">
      </div>
  </div>

  <!-- Edit Modal -->
  <script>
      /*Validation*/
      //   function checkvalidation() {
      //       var name = $('#name1').val();
      //       var type = $('#type1').val();
      //       var id = '{{$data->id}}';

      //       $.ajax({
      //           url: "<?php echo URL::to('/'); ?>/admin/getexistisuueedit",
      //           type: "POST",
      //           data: {
      //               name: name,
      //               type: type,
      //               id: id,
      //               _token: "<?php echo csrf_token(); ?>"
      //           },
      //           success: function(response) {
      //               if (response) {
      //                   getvalidation(response);
      //               }


      //           }
      //       });

      //   }
      /*Validation*/
      function getvalidation(response) {


          $('#submitform').prop('disabled', true);
          var name = $('#name1').val();
          //   var discription = $('#discription1').val();
          var type = $('#type1').val();

          var cnt = 0;
          $('#name1_error').html("");
          //   $('#discription1_error').html("");
          $('#type_error1').html("");

          if (type.trim() == '') {
              $('#type_error1').html("Please Select Type");
              cnt = 1;
          }
          if (name.trim() == '') {
              $('#name1_error').html("Please enter issue name");
              cnt = 1;
          }

          if (response == 1) {
              $('#name1_error').html("This issue is Already Exit");
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