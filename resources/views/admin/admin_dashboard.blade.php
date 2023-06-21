<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>News Web Application</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/bootstrap/dist/css/bootstrap.min.css") }}>
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/font-awesome/css/font-awesome.min.css") }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/Ionicons/css/ionicons.min.css") }}>
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href={{ asset("backend/assets/dist/css/AdminLTE.min.css") }}> --}}
  <link rel="stylesheet" href={{ asset("backend/assets/dist/css/AdminLTE.css") }}>
  <!-- AdminLTE Skins-->
  <link rel="stylesheet" href={{ asset("backend/assets/dist/css/skins/_all-skins.min.css") }}>
  <!-- Morris chart -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/morris.js/morris.css") }}>
  <!-- jvectormap -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/jvectormap/jquery-jvectormap.css") }}>
  <!-- Date Picker -->
  <link rel="stylesheet" href={{ "backend/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" }}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ "backend/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css" }}>
  <link rel="stylesheet" href={{ "backend/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" }}>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href={{ asset("backend/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  <link rel="stylesheet" href="{{ asset("frontend/assets/custom/css/style.css") }}">

</head>
<body class="hold-transition skin-blue sidebar-mini container-fluid">
  <div class="wrapper">

   @include('admin.body.header')

    @include("admin.body.sidebar")

    <div class="content-wrapper">
        @yield("admin")
    </div>
    @include("admin.body.footer")

  </div>
<!-- jQuery 3 -->
<script src={{ asset("backend/assets/bower_components/jquery/dist/jquery.min.js" )}}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{ asset("backend/assets/bower_components/jquery-ui/jquery-ui.min.js") }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src={{ asset("backend/assets/bower_components/bootstrap/dist/js/bootstrap.min.js") }}></script>
<!-- Morris.js charts -->
<script src={{ asset("backend/assets/bower_components/raphael/raphael.min.js")}}></script>
<script src={{ asset("backend/assets/bower_components/morris.js/morris.min.js")}}></script>
<!-- Sparkline -->
<script src={{ asset("backend/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js") }}></script>
<!-- jvectormap -->
<script src={{ asset("backend/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}></script>
<script src={{ asset("backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}></script>
<!-- jQuery Knob Chart -->
<script src={{ asset("backend/assets/bower_components/jquery-knob/dist/jquery.knob.min.js") }}></script>
<!-- daterangepicker -->
<script src={{ asset("backend/assets/bower_components/moment/min/moment.min.js") }}></script>
<script src={{ asset("backend/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js") }}></script>
<!-- datepicker -->
<script src={{ asset("backend/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}></script>
<!-- Bootstrap WYSIHTML5 -->
<script src={{ asset("backend/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}></script>
<!-- Slimscroll -->
<script src={{ asset("backend/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}></script>
<!-- FastClick -->
<script src={{ asset("backend/assets/bower_components/fastclick/lib/fastclick.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("backend/assets/dist/js/adminlte.min.js") }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset("backend/assets/dist/js/pages/dashboard.js") }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("backend/assets/dist/js/demo.js") }}></script>
<script src={{ asset("backend/assets/bower_components/datatables.net/js/jquery.dataTables.min.js") }}></script>
<script src={{ asset("backend/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('frontend/assets/custom/js/script.js') }}"></script>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })

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


    // category js code
    $(document).ready(function() {
        $('a[data-toggle="modal"]').on('click', function() {
            var categoryId = $(this).data('category-id');
            var categoryName = $(this).closest('tr').find('td:nth-child(2)').text();

            $('#category_name').val(categoryName);
            var formAction = '{{ route("update#category", ["id" => "__id__"]) }}';
            formAction = formAction.replace('__id__', categoryId);
            $('#editCategoryForm').attr('action', formAction);
        });
    });

    $(document).ready(function() {
    $('a[data-toggle="modal"]').on('click', function() {
        var categoryId = $(this).data('subcategory-id');
        var categoryName = $(this).closest('tr').find('td:nth-child(2)').text();
        var subcategoryName = $(this).closest('tr').find('td:nth-child(3)').text();

        $('#category_id').val(categoryId); // Set the selected category ID
        $('#subcategory_name').val(subcategoryName); // Set the subcategory name

        // Set the selected category in the <select> element
        $('#category_id option').each(function() {
            if ($(this).text() === categoryName) {
                $(this).prop('selected', true);
            }
        });

        var formAction = '{{ route("update#subcategory", ["id" => "__id__"]) }}';
        formAction = formAction.replace('__id__', categoryId);
        $('#editSubcategoryForm').attr('action', formAction);
        });
    });

</script>
</body>
</html>
