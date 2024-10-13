<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="source/Login_v2/css/util.css">
    <link rel="stylesheet" type="text/css" href="source/Login_v2/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <span class="login100-form-title p-b-26">
                            Welcome
                        </span>
                        <span class="login100-form-title p-b-48">
                            <img src="favicon.png" alt="Logo" style="width: 100px; height: auto; display: block; margin: 0 auto;">
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                            <input class="input100" type="text" name="email" :value="old('email')" required autofocus>
                            <span class="focus-input100" data-placeholder="Email"></span>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password" required>
                            <span class="focus-input100" data-placeholder="Password"></span>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn">
                                    Đăng nhập
                                </button>
                            </div>
                        </div>

                        <div class="text-center p-t-115">
                            <span class="txt1">
                                Chưa có tài khoản?
                            </span>
                            <a class="txt2" href="{{ route('register') }}">
                                Đăng ký
                            </a>
                        </div>
                        <div class="text-center p-t-15">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu ?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="source/Login_v2/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="source/Login_v2/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="source/Login_v2/vendor/bootstrap/js/popper.js"></script>
        <script src="source/Login_v2/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="source/Login_v2/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="source/Login_v2/vendor/daterangepicker/moment.min.js"></script>
        <script src="source/Login_v2/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="source/Login_v2/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="source/Login_v2/js/main.js"></script>

</body>
</html>
