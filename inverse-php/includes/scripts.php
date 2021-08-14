    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="../assets/node_modules/moment/moment.js"></script>
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/node_modules/wizard/jquery.steps.min.js"></script>
  
    <script>
        $(document).ready( function() {
    	    $(document).on('change', '.btn-file :file', function() {
          var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
          input.trigger('fileselect', [label]);
          });

              $('.btn-file :file').on('fileselect', function(event, label) {
              
              var input = $(this).parents('.input-group').find(':text'),
                  log = label;
              
              if( input.length ) {
                  input.val(log);
              } else {
                  if( log ) alert(log);
              }
            
          });
              function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function (e) {
                      $('#img-upload').attr('src', e.target.result);
                  }
                  
                  reader.readAsDataURL(input.files[0]);
              }
          }

          $("#imgInp").change(function(){
          readURL(this);
          }); 	
        });
    </script>
