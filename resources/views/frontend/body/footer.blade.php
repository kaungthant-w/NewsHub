<script src={{ asset("backend/assets/bower_components/jquery/dist/jquery.min.js" )}}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset("backend/assets/bower_components/jquery-ui/jquery-ui.min.js") }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type','info') }}"
                switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
                }
            @endif

       </script>
</body>
</html>
