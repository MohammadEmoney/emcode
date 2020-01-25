<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.front.head')
    @yield('style')
</head>

<body>

    @include('layouts.front.header')

    <main class="site-main">
        <!-- portfolio div -->
        @yield('content')
        <!-- end portfolio div -->
    </main>
    
    @include('layouts.front.footer')

    @include('layouts.front.scripts')
    @yield('scripts')

</body>

</html>
