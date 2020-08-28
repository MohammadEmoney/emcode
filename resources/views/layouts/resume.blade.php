<!DOCTYPE html>
<html lang="@yield('lang', 'fa')">

<head>
    @include('layouts.resume.head')
    @yield('style')
</head>
<body id="top" dir="@yield('dir', 'ltr')">

    @yield('content')

	@include('layouts.resume.scripts')
  </body>
</html>
