<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.head')
</head>
<body class="rtl">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.admin.header')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.admin.sidebar')

      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->
        @include('layouts.admin.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('layouts.admin.scripts')
  @yield('scripts')
  <!-- End custom js for this page-->
</body>

</html>


