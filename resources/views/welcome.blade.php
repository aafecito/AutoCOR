<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="e-commerce">
    <meta name="author" content="Kevyn Falconi">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>AutoCor</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body class="antialiased">

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
        <div class="container" style="margin:0px;">
            <div class="row" style="width: 120%">
                <div class="col-md-5 col-xs-12">
                    <ul class="left-info">
                        <li><a href="#"><i class="fa fa-envelope"></i>contactoautocor@gmail.com</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>123-456-7890</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                {{-- <i class="fa fa-linkedin"></i> --}}
                                <a class="btn btn-outline-light text-light" href="{{ url('/dashboard') }}">
                                    <i class="fa fa-car mr-2"></i>Dashboard</a>
                            @else
                                <a class="btn btn-outline-light text-light" href="{{ route('login') }}"><i
                                        class="fa fa-car mr-2"></i>Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a class="btn btn-outline-light text-light" href="{{ route('register') }}"> <i
                                            class="fa fa-car mr-2"></i>Registrarse</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <h2>AutoCor<em> Venta de autos</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home.index') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('autos.index') }}">Autos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto.index') }}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item item-1">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>Consigue el auto que quieres!</h6>
                        <h4>Del año 2000 o 2023 <br> Para llevar a amigos </h4>
                        <p>Tenemos las mejores ofertas en autos de segunda mano para ti, que estas cansado/cansada de
                            pedirle el auto a tus padres!</p>
                        <a href="{{ route('contacto.index') }}" class="filled-button">Habla con nosotros</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-2">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>Precios accesibles a todos los bolsillos</h6>
                        <h4>Cuotas pequeñas <br> a bajos intereses</h4>
                        <p>Consigue el auto que quieres sin pagar enormes cifras y sin prestamos imposibles de pagar en
                            bancos con altisimos intereses. Tenemos muchas formas de pago</p>
                        <a href="{{ route('ofertas.index') }}" class="filled-button">Ofertas</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item item-3">
                <div class="img-fill">
                    <div class="text-content">
                        <h6>Autos de alta calidad</h6>
                        <h4>Muevete con estilo o<br> de forma clasica </h4>
                        <p>Tenemos autos de todos los gustos y sabores, desde un 4x4 para viajes largos, un sedán basico
                            para moverse por la ciudad, hasta una camioneta para los más aventureros. </p>
                        <a href="{{ route('autos.index') }}" class="filled-button">Nuestros autos</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Necesitas ayuda de nuestro personal en linea ?</h4>
                    <span>Contacta cuando desees con nuestros colaboradores -></span>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('contacto.index') }}" class="border-button">Contactanos</a>
                </div>
            </div>
        </div>
    </div>



    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Mira algunos de <em>nuestros autos</em></h2>
                        <span>Los autos más famosos los encuentras en AutoCor</span>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $limite = 3;
                    ?>
                    @foreach ($vehiculos as $vehiculo)
                        @if ($loop->iteration > $limite)
                        @break
                    @endif
                    <div class="col-md-4">
                        <div class="service-item">
                            <img src="{{ asset('storage') . '/autos' . '/' . $vehiculo->image }}" alt=""
                                width="200px" height="" alt="">
                            <div class="down-content">
                                <h4>{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h4>
                                <div style="margin-bottom:10px;">
                                    <span>Desde <sup>$</sup>{{ $vehiculo->precio }} </span>
                                </div>
                                <p>{{ $vehiculo->details1 }}<br>
                                    {{ $vehiculo->details2 }}<br>
                                    {{ $vehiculo->details3 }}</p>
                                <a href="{{ route('autos.index') }}" class="filled-button">Encontrar un auto</a>
                            </div>
                        </div>

                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="fun-facts">
    <div class="container">
        <div class="more-info-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-image">
                        <img src="assets/images/about-1-570x350.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="right-content">
                        <span>Quienes somos</span>
                        <h2>Venta de autos <em>AutoCor</em></h2>
                        <p>AutoCor es una tienda online donde puedes encontrar los mejores autos seminuevos del
                            mercado. Nuestra innovadora politica de tienda online te permite buscar tu auto favorito
                            en nuestra página para posteriormente agendar una cita en uno de nuestros locales más
                            cercanos a tu ubicacion. Sin embargo, AutoCor es más, mucho mas!</p>
                        <a href="about.html" class="filled-button">Saber mas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="more-info">
    <div class="container">
        <div class="section-heading">
            <h2>Read our <em>Blog</em></h2>
            <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
        </div>

        <div class="row" id="tabs">
            <div class="col-md-4">
                <ul>
                    <li><a href='#tabs-1'>Lorem ipsum dolor sit amet, consectetur adipisicing <br> <small>John Doe
                                &nbsp;|&nbsp; 27.07.2020 10:10</small></a></li>
                    <li><a href='#tabs-2'>Mauris lobortis quam id dictum dignissim <br> <small>John Doe
                                &nbsp;|&nbsp; 27.07.2020 10:10</small></a></li>
                    <li><a href='#tabs-3'>Class aptent taciti sociosqu ad litora torquent per <br> <small>John Doe
                                &nbsp;|&nbsp; 27.07.2020 10:10</small></a></li>
                </ul>

                <br>

                <div class="text-center">
                    <a href="blog.html" class="filled-button">Read More</a>
                </div>

                <br>
            </div>

            <div class="col-md-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="assets/images/blog-image-1-940x460.jpg" alt="">
                        <h4><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a>
                        </h4>
                        <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in,
                            tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo
                            mauris ante, quis posuere nibh vestibulum sit amet.</p>
                    </article>
                    <article id='tabs-2'>
                        <img src="assets/images/blog-image-2-940x460.jpg" alt="">
                        <h4><a href="blog-details.html">Mauris lobortis quam id dictum dignissim</a></h4>
                        <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in,
                            tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo
                            mauris ante, quis posuere nibh vestibulum sit amet</p>
                    </article>
                    <article id='tabs-3'>
                        <img src="assets/images/blog-image-3-940x460.jpg" alt="">
                        <h4><a href="blog-details.html">Class aptent taciti sociosqu ad litora torquent per</a>
                        </h4>
                        <p>Mauris lobortis quam id dictum dignissim. Donec pellentesque erat dolor, cursus dapibus
                            turpis hendrerit quis. Suspendisse at suscipit arcu. Nulla sed erat lectus. Nulla
                            facilisi. In sit amet neque sapien. Donec scelerisque mi at gravida efficitur. Nunc
                            lacinia a est eu malesuada. Curabitur eleifend elit sapien, sed pulvinar orci luctus
                            eget.
                        </p>
                    </article>
                </section>
            </div>
        </div>


    </div>
</div> --}}

<div class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Opiniones de <em>nuestros usuarios</em></h2>
                    <span>En AutoCor escuchamos a nuestros clientes</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-testimonials owl-carousel">

                    <div class="testimonial-item">
                        <div class="inner-content">
                            <h4>George Walker</h4>
                            <span>Cliente de AutoCor</span>
                            <p>"Recomiendo a AutoCor porque tiene una página entretenida y amigable. Los autos que
                                buscas siempre están disponibles. No dicen tenerlos y cuando vas te dicen "no
                                tenemos ese modelo pero..." eso les dá mucha credibilidad."</p>
                        </div>
                        <img src="http://placehold.it/60x60" alt="">
                    </div>

                    <div class="testimonial-item">
                        <div class="inner-content">
                            <h4>John Pazmiño</h4>
                            <span>Mecanico</span>
                            <p>"He recibido muchos vehiculos por reparaciones, la mayoria son autos viejos de antes
                                del año 2000 comprados en ferias de autos. AutoCor tiene sus propios mecánicos que
                                revisan los autos antes de vendertelos, si tienen algun problema igual te informan."
                            </p>
                        </div>
                        <img src="http://placehold.it/60x60" alt="">
                    </div>

                    <div class="testimonial-item">
                        <div class="inner-content">
                            <h4>David Lopez</h4>
                            <span>Diseñador web</span>
                            <p>"La página de AutoCor tiene una excelente seguridad. Trabajé un tiempo ahi y casi
                                nunca se recibio algun problema con autos que no estan en el inventario o cosas
                                parecidas, recomiendo comprar con ellos."</p>
                        </div>
                        <img src="http://placehold.it/60x60" alt="">
                    </div>

                    <div class="testimonial-item">
                        <div class="inner-content">
                            <h4>Lorenzo Benavides</h4>
                            <span>Cliente de AutoCor</span>
                            <p>"Compre mi primer auto en AutoCor y nunca me dio problemas, solo el radiador que tuvo
                                algunos problemas. Nos dijeron lo del radiador asi que separamos dinero para cuando
                                empieze a fallar."</p>
                        </div>
                        <img src="http://placehold.it/60x60" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="callback-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Cuentanos tu <em>experiencia</em></h2>
                    <span>Tus comentarios nos ayudan a mejorar</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nombre" type="text" class="form-control" id="nombre"
                                        placeholder="Nombre completo" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="tema" type="text" class="form-control" id="tema"
                                        placeholder="Tema" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="mensaje" rows="6" class="form-control" id="mensaje" placeholder="Tu mensaje aqui"
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="border-button">Enviar</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
    </div>
</div>

<!-- Footer Starts Here -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-item">
                <h4>AutoCor seminuevos</h4>
                <p>Encuentra el auto que quieres al mejor precio</p>
                <ul class="social-icons">
                    <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Te podria interesar</h4>
                <ul class="menu-list">
                    <li><a href="#">Nuestros talleres</a></li>
                    <li><a href="#">Sucursales en Quito</a></li>
                    <li><a href="#">Sucursales en Guayaquil</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Más informacion</h4>
                <ul class="menu-list">
                    <li><a href="#">Sobre nosotros</a></li>
                    <li><a href="#">Como es comprar en AutoCor?</a></li>
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#">Terminos y condiciones</a></li>
                    <li><a href="#">Trabaja con nosotros</a></li>
                </ul>
            </div>
            {{-- <div class="col-md-3 footer-item last-item">
                <h4>Contact Us</h4>
                <div class="contact-form">
                    <form id="contact footer-contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</footer>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    Copyright © 2024 AutoCor
                    - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>

</body>

</html>
