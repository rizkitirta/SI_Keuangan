<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>SI Managemen Keuangan</title>
    @include('layouts.css')
</head>

<body>
    <!-- Sidenav -->
    @include('layouts.sideBar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('layouts.topBar')
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Card stats -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluit ml-9">
        <div class="card-footer bg-light p-4">
            <div class="col-md-12 text-center mt-9">
                <h2 class="font-weight-bold">Contacts</h2>
                <a href="https://www.instagram.com/rizkitirta07/"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="https://www.facebook.com/rizkitirta07"><i class="fab fa-facebook ml-3 fa-2x"></i></a>
                <a href="https://wa.me/083169228005/?text=Hallo Rizki!"><i class="fab fa-whatsapp ml-3 fa-2x"></i></a>
                <h5 class="text-center font-weight-bold mt-2">&copycopyright2021</h5>
            </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        @include('layouts.javascript')
        @yield('script')
</body>

</html>
