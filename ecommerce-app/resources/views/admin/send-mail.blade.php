<!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
  <style>
    .divCenter {
      text-align:center;
      padding: 12px 24px;
      background-color:#191c24;
    }

    .h2font {
      font-size: 40px;
      padding: 12px 24px;
    }

    .addProductForm {
        display: flex;
        flex-direction: column;
        gap: 6px;
        justify-content: center; /* y */
        align-items: center; /* x */
        width: 100%;
    }

    .addProductForm > input {
        width: 200px;
    }

    .addProductForm > div {
        width: 50%;
        padding: 12px 24px;
    }

    .addProductForm > div > input {
        width: 50%;
    }

    .addProductForm > div > label {
        width: 20%;
    }



    .category {
        width: 100%;

    }

  </style>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Corona Admin</title>
<!-- plugins:css -->
<link rel="stylesheet" href="../template/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../template/admin/assets/vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="../template/admin/assets/vendors/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="../template/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="../template/admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
<link rel="stylesheet" href="../template/admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="../template/admin/assets/css/style.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="../template/admin/assets/images/favicon.png" />
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
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              {{session()->get('message')}}
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x </button>
            </div>
            @endif
            <div class="divCenter">
                <h2 class="h2font"> Send Mail to {{$data["email"]}} </h2>
                <form action="{{route('sendMail')}}" method="POST">
                    @csrf
                    <div class="addProductForm">
                        <div>
                        <label for="title"> Email Greeting </label>
                        <input type="text" name="greetings" id="title" required/>
                        </div>
                        <div>
                        <label for="description"> Email First Line </label>
                        <input type="text" name="firstline" id="description" required/>
                        </div>
                        <div>
                        <label for="price"> Email Body </label>
                        <input type="text" name="body" id="price" required/>
                        </div>
                        <div>
                        <label for="quantity"> Email Button Name </label>
                        <input type="text" name="button_name" id="quantity" required/>
                        </div>
                        <div>
                        <label for="discount_price"> Email URL </label>
                        <input type="text" name="email_url" id="discount_price" required/>
                        </div>
                        <div>
                        <label for="discount_price"> Email Last Line </label>
                        <input type="text" name="lastline" id="discount_price" required/>
                        </div>
                        <input name="order_id" type="hidden" value="{{$data["order_id"]}}"/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Send Email"/>
                    </div>
                </form>
            </div>
          </div>
        </div>
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