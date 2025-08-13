<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Login | Kehadiran Pengurusan Sekolah Kebangsaan Sungai Sireh</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('template/dist') }}/assets/images/Skss1.png" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/fonts/material.css">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/style-preset.css">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="auth-header" style="text-align: center; margin-bottom: 20px;">
                    <a href="/">
                        <img src="{{ asset('template/dist') }}/assets/images/Skss1.png" alt="img"
                            style="width: 150px; height: auto; display: block; margin-left: auto; margin-right: auto;">
                    </a>
                </div>
                <div>
                    <p style="margin-top: 10px; font-size: 24px;"><b>Kehadiran Pengurusan Sekolah Kebangsaan Sungai
                            Sireh</b></p>
                </div>

                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Log Masuk</b></h3>
                            <a href="{{ route('register') }}" class="link-primary">Tiada akaun?</a>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Alamat Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email')is-invalid @enderror " placeholder="Alamat Email"
                                    autocomplete="off">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Kata Laluan</label>
                                <input type="password" name="password"
                                    class="form-control @error('password')is-invalid @enderror "
                                    placeholder="Kata Laluan">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                        checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">Kekalkan Log
                                        Masuk</label>
                                </div>
                                <h5 class="text-secondary f-w-400">Lupa Kata Laluan?</h5>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Log Masuk</button>
                            </div>
                        </form>

                    </div>
                    <div class="auth-footer row">
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
        <!-- Required Js -->
        <script src="{{ asset('template/dist') }}/assets/js/plugins/popper.min.js"></script>
        <script src="{{ asset('template/dist') }}/assets/js/plugins/simplebar.min.js"></script>
        <script src="{{ asset('template/dist') }}/assets/js/plugins/bootstrap.min.js"></script>
        <script src="{{ asset('template/dist') }}/assets/js/fonts/custom-font.js"></script>
        <script src="{{ asset('template/dist') }}/assets/js/pcoded.js"></script>
        <script src="{{ asset('template/dist') }}/assets/js/plugins/feather.min.js"></script>





        <script>
            layout_change('light');
        </script>




        <script>
            change_box_container('false');
        </script>



        <script>
            layout_rtl_change('false');
        </script>


        <script>
            preset_change("preset-1");
        </script>


        <script>
            font_change("Public-Sans");
        </script>



</body>
<!-- [Body] end -->

</html>
