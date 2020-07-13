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
                    <footer class="footer">
                      <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">UAS Semester 4, Pemrograman Web Enterprise © 2020
                          <a href="https://github.com/vnxx" target="_blank">Kevin Adam</a>, <a href="https://github.com/ervanadiwijaya" target="_blank">Ervan Adi Wijaya</a>, Yanwar Afendi.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Universitas Mercu Buana
                        </span>
                      </div>
                    </footer>
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