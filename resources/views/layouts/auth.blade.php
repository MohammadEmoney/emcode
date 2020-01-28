<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.head')
</head>
<body>
  <div class="container-scroller">

    <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

        @yield('content')
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->
        @include('layouts.admin.footer')

    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('layouts.admin.scripts')
  @yield('scripts')
  <!-- End custom js for this page-->
</body>

</html>


