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
      font-size: 24px;
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
        padding: 6px 12px;
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
      padding: 6px 12px;
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
      padding: 6px 12px;
      text-align: center;
      border-radius: 6px;
      color: white;
    }

    .blueBtn:hover {
      text-decoration:none;
      color: white;
    }

    .green {
        color:green;
    }
    .blue {
        color:lightblue;
    }

    .orange {
        color:orange;
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
                <h2 class="h2font"> Orders </h2>
                
                <table class="showProductsTable">
                    <tr class="tableHeaders">
                        <th> Name </th>
                        <th> Phone</th>
                        <th>Product Title</th>
                        <th>Product Quantity</th>
                        <th> Address </th>
                        <th> Email </th>
                        <th> Payment Method </th>
                        <th> Payment Status </th>
                        <th> Delivery Status </th>
                        <th> Total </th>
                        <th> Action </th>
                        <th> Action </th>
                        <th> Action </th>
                    </tr>    
                    @foreach ($orders as $order)
                    <tr>
                        <th> {{$order->name}}</th>
                        <th> {{$order->phone}}</th>
                        @if (strlen($order->product_title) > 30)
                        <th><a href="/productDetails/{{$order->product_id}}">{{substr($order->product_title,0,31).'...'}}</a></th>   
                        @else
                            <th><a href="/productDetails/{{$order->product_id}}">{{$order->product_title}}</a></th>
                        @endif
                        <th> {{$order->product_quantity}}</th>
                        <th> {{$order->address}}</th>
                        <th>{{$order->email}}</th>
                        @if ($order->payment_method === "card")
                        <th class="blue">{{$order->payment_method}}</th>
                        @elseif ($order->payment_method === "cash")
                        <th class="green">{{$order->payment_method}}</th>
                        @else
                        <th>{{$order->payment_method}}</th>
                        @endif
                        @if ($order->payment_status === "completed")
                        <th class="green">{{$order->payment_status}}</th>
                        @elseif ($order->payment_status === "pending")
                        <th class="orange">{{$order->payment_status}}</th>
                        @else
                        <th>{{$order->payment_status}}</th>
                        @endif
                        @if ($order->delivery_status === "completed")
                        <th class="green">{{$order->delivery_status}}</th>
                        @elseif ($order->delivery_status === "pending")
                        <th class="orange">{{$order->delivery_status}}</th>
                        @else
                        <th>{{$order->delivery_status}}</th>
                        @endif
                        <th>${{$order->total}}</th>
                        <th><a class="blueBtn" href="/updateOrder/{{$order->id}}"> Update </a> </th>
                        <th><a onclick="return confirm('Are you sure to delete this order?')" class="alertBtn" href="/deleteOrder/{{$order->id}}"> Delete </a> </th>
                        <th>
                          <form method="post" action="{{route('getSendMail')}}">
                            @csrf
                            <input name="email" type="hidden" value="{{$order->email}}"/>
                            <input name="id" type="hidden" value="{{$order->id}}"/>
                            <button class="blueBtn" type="subtmit"> Send Email </button>
                          </form>
                        </th>
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