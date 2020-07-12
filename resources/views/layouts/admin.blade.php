<!DOCTYPE html>
<html lang="id">
  <head>
    @include('layouts.admin.head')
  </head>
  <body>
        <div class="container-scroller">
            @include('layouts.admin.navbar')
            <div class="container-fluid page-body-wrapper">
                @include('layouts.admin.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
        @yield('script')
        <!-- plugins:js -->
        
        <script src={{ URL::asset('/vendors/js/vendor.bundle.base.js') }}></script>
        <script src={{ URL::asset('/vendors/js/vendor.bundle.addons.js') }}></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src={{ URL::asset('js/off-canvas.js') }}></script>
        <script src={{ URL::asset('js/misc.js') }}></script>
        <script src={{ URL::asset('js/file-upload.js') }}></script>
        <script src={{ URL::asset('js/editorDemo.js') }}></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src={{ URL::asset('js/dashboard.js') }}></script>
        <!-- End custom js for this page-->
  </body>
</html>