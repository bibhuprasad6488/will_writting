<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }} </title>

    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Add Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/8b15k9216emgvtcy3gcsicn7efwutzm0ddo31se6ji9anpwc/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app" class="sb-nav-fixed">
        @include('admin.layouts.header')
        <div id="layoutSidenav">
            @include('admin.layouts.sidebar')
            <div id="layoutSidenav_content">
                <main class="py-4">
                    @yield('content')
                </main>
                {{-- @include('admin.layouts.footer') --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script> --}}
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <!-- jQuery FIRST -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr SECOND -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- {!! Toastr::message() !!} --}}
    <script>
        toastr.options = {
            "closeButton": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if (Session::has('toastr'))
            var type = "{{ Session::get('toastr')['type'] }}";
            var message = "{{ Session::get('toastr')['message'] }}";
            var title = "{{ Session::get('toastr')['title'] }}";

            switch (type) {
                case 'info':
                    toastr.info(message, title);
                    break;

                case 'warning':
                    toastr.warning(message, title);
                    break;

                case 'success':
                    toastr.success(message, title);
                    break;

                case 'error':
                    toastr.error(message, title);
                    break;
            }
        @endif
        $('.btn-close').on('click', function() {
            $('#modal').modal('hide');
        });
    </script>
    {{-- @include('admin.layouts.toast') --}}

    <!-- Your custom script to toggle the dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the dropdown element
            let dropdownElement = document.getElementById('navbarDropdown');

            // Check if the dropdown element exists
            if (dropdownElement) {
                // Initialize the Bootstrap dropdown component
                let dropdown = new bootstrap.Dropdown(dropdownElement);

                // Add a click event listener to toggle the dropdown on click
                dropdownElement.addEventListener('click', function(e) {
                    // Prevent the default action of the anchor tag (i.e., navigation)
                    e.preventDefault();

                    // Toggle the dropdown using Bootstrap's API
                    dropdown.toggle();
                });
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Loop through all elements with the class 'tinymce-editor'
            document.querySelectorAll(".tinymce-editor").forEach(function(editor) {

                // Initialize TinyMCE for each editor
                tinymce.init({
                    target: editor, // Use 'target' to bind TinyMCE to the specific element
                    height: 500,
                    plugins: 'advlist autolink link image lists charmap preview code fullscreen',
                    toolbar: 'undo redo | blocks | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright | bullist numlist blockquote | link image | code fullscreen ',

                    // NEW: use "blocks" instead of "formatselect" in TinyMCE 6+
                    block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre; Blockquote=blockquote',

                    setup: function(editorInstance) {
                        // Sync content
                        editorInstance.on('change', function() {
                            editor.value = editorInstance.getContent();
                        });
                    }
                });
            });
        });
    </script>

    <script>
        window.onload = function() {
            let alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 3000);
            }
        };
    </script>
    <!-- Stack for page-level scripts -->
    @stack('scripts')



</body>

</html>
