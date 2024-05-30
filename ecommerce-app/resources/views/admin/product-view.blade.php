<!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
  <style>
    .divCenter {
      display: flex;
      flex-direction: column;
      gap: 6px;
      text-align:center;
      padding: 12px 24px;
      background-color:#191c24;
      justify-content:center;
      align-items:center;
    }

    .h2font {
      font-size: 40px;
      padding: 12px 24px;
    }

    .showProductsTable {
        display: flex;
        flex-direction: column;
        justify-content:center;
        align-items:center;
        width: 100%;
    }

    .showProductsTable tr{
        border-bottom: 1px solid white;
        border-left: 1px solid white;
        border-right: 1px solid white;
        width: 100%;
    }

    .showProductsTable tr > th{
        padding: 12px 24px;
    }

    .tableHeaders{
        background-color: white;
        color:black;
        width: 100%;
    }

    .productImg {
        width: 100px;
        height: auto;
    }

    .alertBtn {
      background-color: red;
      padding: 12px 24px;
      text-align: center;
      border-radius: 6px;
      color: white;
    }

    .alertBtn:hover {
      text-decoration:none;
      color: white;
    }

    .blueBtn{
      background-color: blue;
      padding: 12px 24px;
      text-align: center;
      border-radius: 6px;
      color: white;
    }

    .blueBtn:hover {
      text-decoration:none;
      color: white;
    }

  </style>
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
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              {{session()->get('message')}}
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x </button>
            </div>
            @endif
            <div class="divCenter">
                <h2 class="h2font"> Show Products </h2>
                
                <table class="showProductsTable">
                    <tr class="tableHeaders">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th> Quantity</th>
                        <th> Category </th>
                        <th> Discount Price</th>
                        <th> Image </th>
                        <th> Action </th>
                        <th> Action </th>
                    </tr>    
                    @foreach ($data as $product)
                    <tr>
                        @if (strlen($product->title) > 49)
                            <th>{{substr($product->title,0,50).'...'}}</th>
                        @else
                            <th>{{$product->title}}</th>
                        @endif
                        @if (strlen($product->description) > 49)
                            <th>{{substr($product->description,0,50).'...'}}</th>
                        @else
                            <th>{{$product->description}}</th>
                        @endif
                        <th>{{$product->price}}</th>
                        <th>{{$product->quantity}}</th>
                        <th>{{$product->category}}</th>
                        <th>{{$product->discount_price}}</th>
                        <th><img class="productImg" src="/product/{{$product->img_name}}"/></th>
                        <th><a class="blueBtn" href="/editProduct/{{$product->id}}"> Edit </a> </th>
                        <th><a onclick="return confirm('Are you sure to delete this item?')" class="alertBtn" href="{{'/deleteProduct/'.$product->id}}"> Delete </a> </th>
                    </tr>
                    @endforeach
                </table>
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