<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

@include('templates.partials.head')

<body class="">
    <div class="wrapper ">
        <!-- Sidebar -->
        @include('templates.partials.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <!-- Navbar -->
            @include('templates.partials.navbar')
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                  @yield('content')
                </div>
            </div>
            <!-- Footer -->
            @include('templates.partials.footer')
            <!-- End Footer -->
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('templates.partials.scripts')
    @yield('js');
    <!--   End Core JS Files   -->
    @include('sweetalert::alert')
</body>

</html>