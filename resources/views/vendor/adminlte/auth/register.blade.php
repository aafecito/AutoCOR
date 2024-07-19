<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->

    <!--===============================================================================================-->

    <!--===============================================================================================-->

    <!--===============================================================================================-->

    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util_1.css">
    <link rel="stylesheet" type="text/css" href="css/main_1.css">
    <!--===============================================================================================-->
</head>

<body>
    @php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
    @php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))

    @if (config('adminlte.use_route_url', false))
        @php($login_url = $login_url ? route($login_url) : '')
        @php($register_url = $register_url ? route($register_url) : '')
    @else
        @php($login_url = $login_url ? url($login_url) : '')
        @php($register_url = $register_url ? url($register_url) : '')
    @endif

    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

            <form action="{{ $register_url }}" method="post">
                @csrf
                <span class="login100-form-title p-b-49">
                    Registro
                </span>

                {{-- NOMBRE --}}

                <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Nombre completo</span>
                    <input type="text" name="name" class="input100 @error('name') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:darkred;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- EMAIL --}}

                <div class="wrap-input100 m-b-23" data-validate="Se requiere email">
                    <span class="label-input100">Email</span>
                    <input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                        placeholder="{{ __('adminlte::adminlte.email') }}" value="{{ old('email') }}">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:darkred;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- CONTRASEÑA --}}

                <div class="wrap-input100 m-b-23" data-validate="Password is required">
                    <span class="label-input100">Contraseña</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="{{ __('adminlte::adminlte.password') }}">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:darkred;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- REPETIR CONTRASEÑA --}}

                <div class="wrap-input100 m-b-23" data-validate="Password is required">
                    <span class="label-input100">Repetir Contraseña</span>
                    <input class="input100 @error('password_confirmation') is-invalid @enderror" type="password"
                        name="password_confirmation" placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- CONTRA OLVIDADA --}}

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Contraseña olvidada?
                    </a>
                </div>

                {{-- BOTON --}}

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            {{ __('adminlte::adminlte.register') }}
                        </button>
                    </div>
                </div>

                {{-- LOG IN --}}

                <div class="txt1 text-center p-t-54 p-b-20">
                    <span>
                        O registrate con
                    </span>
                </div>

                {{-- SOCIAL --}}

                <div class="flex-c-m">

                    <a href="{{ url('/auth/redirect') }}" class="login100-social-item bg3">
                        <i class="fa fa-google"></i>
                    </a>
                </div>

                <p class="my-0">
                    <a href="{{ $login_url }}">
                        {{ __('adminlte::adminlte.i_already_have_a_membership') }}
                    </a>
                </p>

            </form>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
