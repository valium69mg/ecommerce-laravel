<!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
<head>
 @include('admin.head')
 </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html --> 
        @include('admin.navbar')
        <!-- partial -->
        <!-- main-panel-->
        @include('admin.main-panel')
        <!-- main-panel ends -->
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="template/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="template/admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="template/admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="template/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="template/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="template/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="template/admin/assets/js/off-canvas.js"></script>
    <script src="template/admin/assets/js/hoverable-collapse.js"></script>
    <script src="template/admin/assets/js/misc.js"></script>
    <script src="template/admin/assets/js/settings.js"></script>
    <script src="template/admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="template/admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>