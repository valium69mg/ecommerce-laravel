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

    .showCategoriesTable {
        margin: auto;
        margin-top: 24px;
        width: 50%;
        text-align: center;
        padding: 12px 24px;
        border: 1px solid white;
    }

    .showCategoriesTable tr{
        border-bottom: 1px solid white;
    }

    .showCategoriesTable tr > td{
        padding: 12px 24px;
    }


    .tableHeaders{
        background-color: white;
        color:black;
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
            <h2 class="h2font"> Add category </h2>
            <form action="{{url('/addCategory')}}" method="POST">
              @csrf
              <input type="text" name="category_name" placeholder="Write category name"/>
              <input type="submit" class="btn btn-primary" name="submit" value="Add to Category"/>
            </form>
            <table class="showCategoriesTable">
              <tr class="tableHeaders"> 
                <td> Category Name </td>
                <td> Action </td>
              </tr>
              @foreach($data as $category)
              <tr> 
                <td>{{$category->category_name}}</td>
                <td><a onclick="return confirm('Are you sure to delete category?')" class="btn btn-danger"href="{{url('deleteCategory',$category->id)}}"> Delete </a></td>
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