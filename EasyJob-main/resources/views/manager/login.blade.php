<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta property="og:image" content="imgs/logo.png"> -->
    <META NAME="robots" CONTENT="noindex,nofollow">"
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/staff/css/style.css') }}">

    <!-- other -->
    <!-- <link rel="icon" href="imgs/icon.png"> -->
    <style>
        body {
            background-image: url({{ asset('assets/staff/imgs/background.png') }});
            background-repeat: no-repeat;
            background-size: cover;
        }

        .page {
            background-image: url({{ asset('assets/staff/imgs/dots.png') }});
        }

    </style>
    <title>EasyJob</title>

</head>

<body>
    <div class="page">
        <div class="container-fluid">
            <div class="page-content">
                <div class="row w-100">
                    <div class="col-md-3 mx-auto bg-light rounded p-4 shdow">
                        <h4 class="text-dark text-center">EasyJob</h4>
                        <h6 class="text-center">لوحة تحكم الإدارة</h6>
                        <div class="mt-4">
                            <form method="POST" action="{{ route('manager.Mlogin') }}">
                                @csrf

                                <div class="form-row">
                                    <div class="col-12 mb-3">
                                        <label for="staffLogin">البريد الإلكتروني:</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Email@name.com" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="staffPassword">كلمة المرور:</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="*****" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="col-12 clearfix">
                                        <div class="d-flex justify-content-center text-center mt-3 mb-4" id="Stest">
                                        </div>

                                        <button class="btn btn-primary float-right">تسجيل دخول</button>
                                    </div>
                
                                </div>
                            </form>
                            @if (Session::has('errors'))
                            <div class="text-center alert alert-danger mt-3 mx-auto">
                                {{ Session::get('errors')->first() }}
                            </div>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
        integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous">
    </script>
    <script>
        $('.page-content').css('height', $(window).height());

    </script>


</body>

</html>
