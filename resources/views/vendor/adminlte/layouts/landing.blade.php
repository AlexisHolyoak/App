<!DOCTYPE html>
<!--

-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Instituto de gestión especializada de proyectos">
    <meta name="author" content="Equipo de desarrollo">

    <meta property="og:title" content="GESAP" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="GESAP - Gestión especializada ágil de proyectos" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>Gestión especializada ágil de proyectos</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/tab/tablogo.png')}}">
    <meta name="theme-color" content="#ffffff">
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{{asset('img/plain-logo-black.png')}}" alt=""></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#desc" class="smoothScroll">Cursos</a></li>
                    <li><a href="#showcase" class="smoothScroll">Galería</a></li>
                    <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="{{url('/home')}}">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <section id="home" name="home"></section>
    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-12">
                    <h1><b><a href="#"><img src="{{asset('img/logo.png')}}"alt=""></h1>
                    <h3><a href="{{ url('/register') }}" class="btn btn-lg btn-warning" style="background-color:#FFCF00;">COMIENZA</a></h3>
                    Si ya eres miembro
                    <h3><a href="{{ url('/login') }}" class="btn btn-lg btn-success" style="background-color:#00A65A;">Iniciar Sesión</a></h3>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                    <img class="img-responsive" src="{{ asset('/img/lego3.png') }}" alt="">
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->


    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-md-offset-5"><h2 style="color:#00C5FE; text-align:center; font-weight:bold;">NUESTROS CURSOS</h2></div>
            <div class="card col-md-6" >
                <div class="card-body" style="border-top: 5px solid #00AEA3;border-right: 2px solid #E4E4E4;border-left: 2px solid #E4E4E4;background-color: white; padding: 5px 5px 5px 5px; margin-bottom:5px;">
                  <h5 class="card-title" style="font-weight:bold;">TRANFORMACIÓN DIGITAL</h5>
                  <h6 class="card-subtitle mb-2 text-muted">_____________</h6>
                  <p class="card-text" style="text-align:justify;">Internet y las nuevas tecnologías ya no solo cambian la forma de cómo hacemos negocios sino, pueden cambiar toda la organización: nuevos productos, servicios, nuevos procesos e incluso nuevos modelos de negocio.</p>

                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body" style="border-top: 5px solid #F14E5A;border-right: 2px solid #E4E4E4;border-left: 2px solid #E4E4E4;background-color: white;padding: 5px 5px 5px 5px; margin-bottom:5px;">
                  <h5 class="card-title" style="font-weight:bold;">PRODUCT OWNER</h5>
                  <h6 class="card-subtitle mb-2 text-muted">_____________</h6>
                  <p class="card-text" style="text-align:justify;">Este curso está dirigido para los representantes del negocio, quienes definen los requisitos y criterios de aceptación del producto o funcionalidades del servicio que debe elaborar el equipo Scrum.</p>

                </div>
            </div>
            <div class="card col-md-6" style="" >
                <div class="card-body" style="border-top: 5px solid #234970;border-right: 2px solid #E4E4E4;border-left: 2px solid #E4E4E4;background-color: white;padding: 5px 5px 5px 5px; margin-bottom:5px;">
                  <h5 class="card-title" style="font-weight:bold;">SCRUM MASTER</h5>
                  <h6 class="card-subtitle mb-2 text-muted">_____________</h6>
                  <p class="card-text" style="text-align:justify;"><strong>Scrum </strong>ha demostrado importantes ventajas frente a las metodologías clásicas, principalmente por <strong>otorgar valor al cliente en tiempos más cortos</strong>. INCLUYE 3 Exámenes de Certificación respaldados por ScrumStudy: Scrum Fundamentals, Scrum Developer, Scrum Master.</p>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body" style="border-top: 5px solid #FCCD0E;border-right: 2px solid #E4E4E4;border-left: 2px solid #E4E4E4;background-color: white;padding: 5px 5px 5px 5px; margin-bottom:5px;">
                  <h5 class="card-title" style="font-weight:bold;">BIG DATA</h5>
                  <h6 class="card-subtitle mb-2 text-muted">_____________</h6>
                  <p class="card-text" style="text-align:justify;">El Big Data es la gestión y el análisis de grandes volúmenes de datos que no pueden ser tratados de manera convencional o con los métodos tradicionales o empleados hasta los últimos años, ya que superan las capacidades de procesamiento y gestión del software tradicional.</p>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body" style="border-top: 5px solid #F14E5A;border-right: 2px solid #E4E4E4;border-left: 2px solid #E4E4E4;background-color: white; padding: 5px 5px 5px 5px; margin-bottom:5px;">
                  <h5 class="card-title" style="font-weight:bold;">ITIL® Foundation - Curso Oficial</h5>
                  <h6 class="card-subtitle mb-2 text-muted">_____________</h6>
                  <p class="card-text" style="text-align:justify;">ITIL® es el enfoque más ampliamente aceptado de Gerencia de Servicios de TI (ITSM) del mundo, con más de 2,500,000 personas certificadas. Incluye el Examen Oficial de Certificación Itil® Foundation respaldado por Axelos y PeopleCert.</p>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body" style="border-top: 5px solid #00AEA3;border-right: 2px solid #E4E4E4;border-left: 2px solid #E4E4E4;background-color: white; padding: 5px 5px 5px 5px; margin-bottom:5px;">
                  <h5 class="card-title" style="font-weight:bold;">Curso Oficial PMP (48 Horas)</h5>
                  <h6 class="card-subtitle mb-2 text-muted">_____________</h6>
                  <p class="card-text" style="text-align:justify;">La certificación "Project Management Professional” (PMP)® reconoce la competencia de un individuo para desempeñar el rol de Director de Proyectos, específicamente través de su experiencia en la dirección de proyectos.</p>
                </div>
            </div>
          </div>
            <br>
            <hr>
        </div> <!--/ .container -->
    </div><!--/ #introwrap -->

    <!-- FEATURES WRAP -->
    <div id="features">
        <div class="container">

        </div><!--/ .container -->
    </div><!--/ #features -->


    <section id="showcase" name="showcase"></section>
    <div id="showcase">
        <div class="container">
            <div class="row">
                <h1 class="centered">Algunas imagenes</h1>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('/img/gesap-image.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('/img/gesap-image2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div><!-- /container -->
    </div>


    <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>{{ trans('adminlte_lang::message.address') }}</h3>
                <p>
                    Av. Javier prado<br/>
                    Lima,
                    Perú
                </p>
            </div>
            <div class="col-lg-7">
            </div>
        </div>
    </div>
    <div id="c">
        <div class="container">
            <p>
                <a href="https://github.com/acacha/adminlte-laravel"></a><b>Gesap</b></a>. {{ trans('adminlte_lang::message.descriptionpackage') }}.<br/>
                <strong>Copyright &copy; 2018 </strong> {{ trans('adminlte_lang::message.createdby') }} <a href="">El equipo de desarrollo de gesap</a>.
            </p>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.localScroll.min.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
