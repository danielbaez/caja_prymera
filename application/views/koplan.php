<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Koplan - Your way to success</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta http-equiv="refresh"          content="36000">
        <meta name="viewport"               content="width=device-width, initial-scale=1">
        <meta name="keywords"               content="A fast online advisory service for academical and professional targets">
        <meta name="robots"                 content="index,follow">
        <meta name="date"                   content="September 03, 2017">
        <meta name="author"                 content="softhy.pe">
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#FFFFFF">
        <meta name="description"            content="Koplan - Your way to success">
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>header/koplan-favicon.ico">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-3.3.6/css/bootstrap.min.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/css/material.min.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owlCarousel/assets/owl.carousel.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>owlCarousel/assets/owl.theme.default.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto_new.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top pintado">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button id="nav-icon3" type="button" class="navbar-toggle collapsed" onclick="MenuScrollPintado();" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand link" href="#inicio"><img alt="Modell fondo1" src="<?php echo RUTA_IMG?>header/logo_koplan.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="link" href="#about">NOSOTROS</a></li>
                        <li><a class="link" href="#partner">ALIANZAS</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="link" href="#">FAQs</a></li>
                        <li><a class="link" href="#">REGISTRATE</a></li>
                        <li><a href="Login" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect login">Iniciar Sesi&oacute;n</a>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="inicio">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img alt="Modell fondo1" src="<?php echo RUTA_IMG?>header/home-fondo1.jpg">
                </div>
                <div class="item">
                    <img alt="Modell fondo2" src="<?php echo RUTA_IMG?>header/home-fondo2.jpg">
                </div>
                <div class="item">
                    <img alt="Modell fondo3" src="<?php echo RUTA_IMG?>header/home-fondo3.jpg">
                </div>
                <div class="item">
                    <img alt="Modell fondo4" src="<?php echo RUTA_IMG?>header/home-fondo4.jpg">
                </div>
            </div> 
            <div class="contenido-imagen text-center">
                <div class="contenido-principal">
                    <h1 class="m-b-0">A fast online advisory service for academical and professional targets</h1>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Start achieving now&#33;</button>
                </div>
            </div>
            <div class="explorar">
                <a class="link" href="#about"><button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab"><i class="mdi mdi-arrow_downward"></i></button></a>
            </div>
        </section>
        <section id="about" class="background-yellow section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2>About us</h1>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="contenido">
                            <div class="icon-about">
                                <i class="mdi mdi-record_voice_over"></i>
                            </div>
                            <div class="contenido-about">
                                <h2>Qu&eacute; es Koplan&#63;</h1>
                                <p>Koplan es una plataforma profesional que conecta personas en b&uacute;squeda de nuevas oportunidades de aprendizaje profesional y personas que buscan compartir sus conocimientos en base a sus experiencias e intereses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="contenido">
                            <div class="icon-about">
                                <i class="mdi mdi-screen_share"></i>
                            </div>
                            <div class="contenido-about">
                                <h2>Porqu&eacute; Koplan&#63;</h1>
                            <p>Koplan provee una plataforma en la que podr&aacute;s encontrar a la persona indicada dispuesta a compartir sus experiencias contigo, eliminando el exhaustivo proceso tradicional de b&uacute;squeda de un asesor y brindando una nueva forma de aprender de tus contactos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="partner" class="background-white section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2>Partners</h2>
                    </div>
                    <div id="asociados" class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            <div class="item"><img src="<?php echo RUTA_IMG?>partner/partner-pucp.png" alt="koplan"></div>
                            <div class="item"><img src="<?php echo RUTA_IMG?>partner/partner-lima.png" alt="koplan"></div>  
                            <div class="item"><img src="<?php echo RUTA_IMG?>partner/partner-pacifico.jpg" alt="koplan"></div>
                        </div> 
                    </div> 
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <p class="m-0">&copy;2017 Koplan - Lima, Per&uacute;. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.1.0.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap-3.3.6/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/js/material.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>owlCarousel/owl.carousel.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsindex.js?v=<?php echo time();?>"></script>
    </body>
</html>