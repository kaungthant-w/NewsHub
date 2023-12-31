<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>News Web Application</title>
  <link rel="icon" href="{{ asset('logo.png') }}">
  @vite('resources/css/app.css')
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-a377d245.css') }}"> --}}
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

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>


  <!-- Plugins css -->
  <link href="{{ asset("backend/assets/libs/mohithg-switchery/switchery.min.css") }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("backend/assets/libs/multiselect/css/multi-select.css") }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("backend/assets/libs/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("backend/assets/libs/selectize/css/selectize.bootstrap3.css") }}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{{ asset("frontend/assets/custom/css/style.css") }}">
  <link rel="stylesheet" href="{{ asset('build/assets/app-531e9bb6.css') }}">

  {{-- tiny cloud  --}}
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea',
   });
</script>

</head>
<body class="hold-transition skin-blue sidebar-mini container-fluid"  style="background:#222d32">
  <div class="wrapper">
   @include('admin.body.header')

        @include("admin.body.sidebar")

        <div class="content-wrapper">
            @yield("admin")
        </div>
    @include("admin.body.footer")

  </div>

<!-- jQuery 3 -->
<script src="{{ asset('backend/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('backend/assets/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/assets/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/assets/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('backend/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('backend/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('backend/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/assets/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('backend/assets/dist/js/demo.js') }}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/assets/custom/js/script.js') }}"></script>


<script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<link rel="stylesheet" href="{{ asset('build/assets/app-38d1fa96.js') }}">


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


    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });


</script>
</body>
</html>
