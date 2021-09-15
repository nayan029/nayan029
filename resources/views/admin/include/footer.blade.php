<footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="<?php echo URL::to('/') ?>/admin/home">Legal Bench</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <!-- <b>Version</b> 3.0.4 -->
  </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
<!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
  <script src="{{asset('fronted/js/toastr.min.js')}}"></script>
  <script src="{{ url('/ckeditor/ckeditor.js') }}"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('assets/js/demo.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  



  @if(Session::has('success'))
	<script>
	toastr.success('<?php echo Session::get('success') ?>', '', {timeOut: 5000});
	</script>
	@endif

	@if(Session::has('error'))
	<script>
	toastr.error('<?php echo Session::get('error') ?>', '', {timeOut: 5000});
	</script>
	@endif

  <script>
    function getLawyerNotification()
    {
            //lawyer notification

        $.ajax({
          url: "<?php echo URL::to('/'); ?>/notification/lawyer_notification",    
          type: "GET",
          data: {_token: "{{ csrf_token()}}"},
          success: function (response) {
            $('#lawyernotifcation').html(response);

          }
        });	

        //enquiry new notification
        
        $.ajax({
          url: "<?php echo URL::to('/'); ?>/notification/enquirynew_notification",    
          type: "GET",
          data: {_token: "{{ csrf_token()}}"},
          success: function (response) {

            if(response > 0)
            {
                $('#enquirynewnotifcation').show();  
                $('#enquirynewnotifcation').html(response);  
            }
            else{
               $('#enquirynewnotifcation').hide();  
            }

          }
        });

         //customer notification
         $.ajax({
          url: "<?php echo URL::to('/'); ?>/notification/customer_notification",    
          type: "GET",
          data: {_token: "{{ csrf_token()}}"},
          success: function (response) {

            if(response > 0)
            {
                $('#customernotifcation').show();  
                $('#customernotifcation').html(response);  
            }
            else{
               $('#customernotifcation').hide();  
            }

          }
        });	

       //leagal enquiry notification
       $.ajax({
          url: "<?php echo URL::to('/'); ?>/notification/enquiry_notification",    
          type: "GET",
          data: {_token: "{{ csrf_token()}}"},
          success: function (response) {

            if(response > 0)
            {
                $('#enquirynotifcation').show();  
                $('#enquirynotifcation').html(response);  
            }
            else{
               $('#enquirynotifcation').hide();  
            }

          }
        });	

       //leagal contact-enquiry notification
       $.ajax({
          url: "<?php echo URL::to('/'); ?>/notification/contactenquiry_notification",    
          type: "GET",
          data: {_token: "{{ csrf_token()}}"},
          success: function (response) {

            if(response > 0)
            {
                $('#contactenquirynotifcation').show();  
                $('#contactenquirynotifcation').html(response);  
            }
            else{
               $('#contactenquirynotifcation').hide();  
            }

          }
        });	

      }
      getLawyerNotification();
      setInterval(function () {
        getLawyerNotification();
      }, 200000);

  </script>
</body>
</html>