<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Reset Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="auth-bg-basic d-flex align-items-center min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 py-5 px-3">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="text-center text-muted mb-2">
                            <div class="pb-3">
                                <a href="index.html">
                                    <span class="logo-lg">
                                        <img src="{{ asset('assets/web/logo.png') }}" alt="" height="50">
                                    </span>
                                </a>
                                <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">Putar Pintar</p>
                            </div>
                        </div>
                        <!-- &amp; -->
                    </div>
                </div>

                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-7">
                        <div class="card bg-transparent shadow-none border-0">
                            <div class="card-body">
                                <div class="px-3 py-3 text-center">
                                    <h1 class="error-title"><span class="blink-infinite">200</span></h1>
                                    <h4 class="text-uppercase">Sukses</h4>
                                    <p class="font-size-15 mx-auto text-muted w-75 mt-4">Hasil reset berhasil, silakan
                                        login di aplikasi untuk melanjutkan</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- end row -->


            </div>
        </div>
        <!-- end container fluid -->
    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenujs/metismenujs.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>

</body>

</html>

