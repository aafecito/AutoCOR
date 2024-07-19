<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util_1.css">
    <link rel="stylesheet" type="text/css" href="css/main_1.css">
    <!--===============================================================================================-->
</head>

<body>
    @php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
    @php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
    @php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

    @if (config('adminlte.use_route_url', false))
        @php($login_url = $login_url ? route($login_url) : '')
        @php($register_url = $register_url ? route($register_url) : '')
        @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
    @else
        @php($login_url = $login_url ? url($login_url) : '')
        @php($register_url = $register_url ? url($register_url) : '')
        @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
    @endif
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                {{-- FORMULARIO --}}

                <form action="{{ $login_url }}" method="post" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    {{-- EMAIL --}}

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                        <span class="label-input100">Correo electrónico</span>
                        <input class="input100  @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- CONTRASEÑA --}}

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password"
                            placeholder="{{ __('adminlte::adminlte.password') }}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- REMEMBER CHECK --}}

                    <div class="row"
                        style="
                    margin-top: 20px;
                    margin-bottom:50px;
                    display:flex;
                    justify-content:space-between;
                    ">
                        <div class="col-7">
                            <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label for="remember">
                                    {{ __('adminlte::adminlte.remember_me') }}
                                </label>
                            </div>
                        </div>

                        {{-- OLVIDASTE PASSWORD --}}

                        @if ($password_reset_url)
                            <div style="
                        display:flex;">
                                <p class="my-0">
                                    <a href="{{ $password_reset_url }}">
                                        {{ __('adminlte::adminlte.i_forgot_my_password') }}
                                    </a>
                                </p>
                            </div>
                        @endif

                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    {{-- Register link --}}

                    @if ($register_url)
                        <div
                            style="
                        margin-top:20px;
                        display: flex;
                        justify-content:center;
                        ">
                            <p class="my-0">
                                <a href="{{ $register_url }}">
                                    {{ __('adminlte::adminlte.register_a_new_membership') }}
                                </a>
                            </p>
                        </div>
                    @endif

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            O ingresa usando
                        </span>
                    </div>

                    <div class="flex-c-m">

                        <a href="{{ url('/auth/redirect') }}" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
