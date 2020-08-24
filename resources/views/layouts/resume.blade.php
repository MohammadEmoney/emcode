<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.resume.heaed')
</head>

<body>
	<!-- Preloader -->
	<div id="tt-preloader">
		<div id="pre-status">
			<div class="preload-placeholder"></div>
		</div>
	</div>

	@yield('content')


	<!-- Footer Section -->
    <footer class="footer-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright text-center">
              <p>&copy; TrendyTheme 2019. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer><!-- End Footer Section -->


	<!-- Scroll-up -->
	<div class="scroll-up">
		<a href="#home"><i class="fa fa-angle-up"></i></a>
	</div>

	@include('layouts.resume.scripts')
</body>
</html>
