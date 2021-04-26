
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<script src="dist/js/global.js"></script>
<!-- CKEditor -->
<script src="ckeditor/ckeditor.js"></script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace( 'editor1',{filebrowserImageBrowseUrl : 'kcfinder'} );
  CKEDITOR.replace( 'editor2',{filebrowserImageBrowseUrl : 'kcfinder'} );

</script>
<!-- bootstrap datepicker -->
<script src="datepicker/js/bootstrap-datepicker.js"></script>
<script>
  //Date picker
  $('#datepicker-year').datepicker({
		format: "yyyy",
		orientation: "top auto",
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true
  });

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
<!-- realtimePasswordValidator -->
<script src="plugins/realtimePasswordValidator.js"></script>

<!-- eye password -->
<script>
$(document).ready(function() {
    $("#showHidePassword a").on('click', function(event) {
        event.preventDefault();
        if($('#showHidePassword input').attr("type") == "text"){
            $('#showHidePassword input').attr('type', 'password');
            $('#showHidePassword i').addClass( "fa-eye-slash" );
            $('#showHidePassword i').removeClass( "fa-eye" );
        }else if($('#showHidePassword input').attr("type") == "password"){
            $('#showHidePassword input').attr('type', 'text');
            $('#showHidePassword i').removeClass( "fa-eye-slash" );
            $('#showHidePassword i').addClass( "fa-eye" );
        }
    });
});
</script>

<?php
session_start();
if (basename($_SERVER['PHP_SELF']) == "profil.php" && $_SESSION['first']) {
  $_SESSION['first'] = false; ?>
  <!-- party.js -->
  <script src="plugins/party.min.js"></script>
  <script>
  let siteColors = ['#ffa68d', '#fd3a84'];
  $(document).ready(function () {
      party.screen({
          color: siteColors,
          size: party.minmax(6, 12),
          count: party.variation(300 * (window.innerWidth / 1980), 0.4),
          angle: -180,
          spread: 80,
          angularVelocity: party.minmax(6, 9)
      });
  });
  </script>
<?php } ?>