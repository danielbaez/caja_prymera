<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Caja prymera</title>
    <meta charset="utf-8">    
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">   
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
    <style>
      .div_image img {
        max-width: 80px;
      }
    </style>    
  </head>
  <body>

      <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header-first"><a >Cr&eacute;dito Vehicular</a></h1>
          <h1 class="title-header-second"><a >Auto de Prymera</a></h1>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <h1 style="display: none">Dashboard</h1>
        </div>
      </div>    
    </div>            
  </div>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed btn-collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>    
    <div class="collapse navbar-collapse custom-menu-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(_getSesion('rol') == 'asesor'){ ?>
            <li><a href="/C_reporteAsesor/agenteCliente">Ver Reportes</a></li>
        <?php } ?>
          <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>        
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
      <div class="row text-center">
        <div class="col-xs-12 m-t-20 m-b-20">
          <div class="hidden-xs col-sm-3"></div>
          <div class="col-xs-12 col-sm-6">
                    <h1 class="titulo-vista">Seleccione el Tipo de Crédito</h1>            
                  </div>
                  <div class="hidden-xs col-sm-3 text-right">
                    <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">                   
                                  <?php if(_getSesion('rol') == 'asesor'){ ?>
                                      <li><a href="/C_reporteAsesor/agenteCliente">Ver Reportes</a></li>
                                  <?php } ?>
                                    <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                                </ul>
                              </li>
                          </ul>
                    </div>


                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 m-t-10">
                      <div class="panel panel-primary" style="border: 1px solid #337ab7;border-top-right-radius: 0px;border-top-left-radius: 40px;border-bottom-left-radius: 0px;border-bottom-right-radius: 40px;"><br>
                        <div class="panel-body" style="margin-top: 15px; margin-bottom: 20px">
                              <div class="col-xs-12 col-sm-6" style="border-right: 1px solid #a3a4a6;">
                                <a style="color:black" onclick="getTipoCredito('camp')"><!--<i class="fa fa-car fa-5x" aria-hidden="true"></i> --><div class="div_image"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNDguOTk3IDQ4Ljk5OCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDguOTk3IDQ4Ljk5ODsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxwYXRoIGQ9Ik00NS45NjEsMTguNzAyYy0wLjAzMy0wLjAzOC0wLjA2MS0wLjA3NS0wLjEtMC4xMTJsLTEuNzE3LTEuNjU3YzEuNDI0LTAuMzIzLDIuOTU3LTEuNTE2LDIuOTU3LTIuNzQgICBjMC0xLjQyNi0xLjk3OS0xLjkzMi0zLjY2OC0xLjkzMmMtMS43NjYsMC0xLjk3MSwxLjIxLTEuOTkyLDIuMDY1bC00LjQzLTQuMjcxYy0wLjktMC44OTEtMi42MDctMS41OTItMy44ODMtMS41OTJIMjQuNWgtMC4wMDIgICBoLTguNjNjLTEuMjc1LDAtMi45ODEsMC43MDEtMy44ODIsMS41OTJsLTQuNDI5LDQuMjcxYy0wLjAyMy0wLjg1NS0wLjIyOC0yLjA2NS0xLjk5Mi0yLjA2NWMtMS42OTEsMC0zLjY2OSwwLjUwNi0zLjY2OSwxLjkzMiAgIGMwLDEuMjI0LDEuNTM0LDIuNDE3LDIuOTU4LDIuNzRsLTEuNzE3LDEuNjU3Yy0wLjAzOSwwLjAzNy0wLjA2NiwwLjA3NC0wLjEsMC4xMTJDMS4yLDIwLjI3MiwwLDIzLjE4NCwwLDI1LjI5N3Y2LjI3OSAgIGMwLDEuNTI0LDAuNjAxLDIuOTA3LDEuNTcyLDMuOTM4djIuNDM1YzAsMS40MjQsMS4xOTIsMi41ODUsMi42NTgsMi41ODVoMy4yMTRjMS40NjYsMCwyLjY1Ny0xLjE1OSwyLjY1Ny0yLjU4NXYtMC42MjNoMTQuMzk3ICAgSDI0LjVoMTQuMzk2djAuNjIzYzAsMS40MjYsMS4xOSwyLjU4NSwyLjY1OCwyLjU4NWgzLjIxM2MxLjQ2NywwLDIuNjU3LTEuMTYxLDIuNjU3LTIuNTg1di0yLjQzNSAgIGMwLjk3Mi0xLjAzMSwxLjU3Mi0yLjQxNCwxLjU3Mi0zLjkzOHYtNi4yNzlDNDguOTk4LDIzLjE4NCw0Ny43OTgsMjAuMjcyLDQ1Ljk2MSwxOC43MDJ6IE0xMy42MTMsMTEuOTUzICAgYzAuNjIzLTAuNTE5LDEuNzEyLTAuOTEzLDIuMjU1LTAuOTEzaDguNjNIMjQuNWg4LjYzYzAuNTQzLDAsMS42MzIsMC4zOTQsMi4yNTUsMC45MTNsNS44MDksNS42M0gyNC41aC0wLjAwMkg3LjgwNUwxMy42MTMsMTEuOTUzICAgeiBNMS45OTMsMjQuMzQ3YzAtMS41NDYsMS4yMS0yLjgwMSwyLjcwNC0yLjgwMWMxLjQ5MywwLDYuMzcyLDIuODY0LDYuMzcyLDQuNDFzLTQuODc5LDEuMTg4LTYuMzcyLDEuMTg4ICAgQzMuMjAzLDI3LjE0NCwxLjk5MywyNS44OTQsMS45OTMsMjQuMzQ3eiBNMTAuMTAyLDM0LjU3M0g5LjU4N0g5LjA3MmwtMy4wNTUsMC4wMDVjLTAuODQ4LTAuMjY0LTEuNDQ2LTAuNTcyLTEuODY5LTAuOTAzICAgYy0wLjIxNC0wLjE2Ny0wLjM3OC0wLjM0MS0wLjUwNi0wLjUxNGMtMC4xMjktMC4xNzUtMC4yMjMtMC4zNDctMC4yODQtMC41MTljLTAuMzgtMS4wNzQsMC40MDUtMi4wNjEsMC40MDUtMi4wNjFoNS4yMTQgICBsMy40NzYsMy45OUwxMC4xMDIsMzQuNTczTDEwLjEwMiwzNC41NzN6IE0zMS45OTYsMzQuNTc1SDI0LjVoLTAuMDAyaC03LjQ5NmMtMS41NjMsMC0yLjgzMi0xLjI2OS0yLjgzMi0yLjgzMWgxMC4zMjhIMjQuNWgxMC4zMjggICBDMzQuODI4LDMzLjMwOCwzMy41NTksMzQuNTc1LDMxLjk5NiwzNC41NzV6IE0zMi42NTQsMjkuODEySDI0LjVoLTAuMDAyaC04LjE1NGMtMS43LDAtMy4wOC0yLjA5Ni0zLjA4LTQuNjgxaDExLjIzNEgyNC41aDExLjIzNCAgIEMzNS43MzQsMjcuNzE3LDM0LjM1NCwyOS44MTIsMzIuNjU0LDI5LjgxMnogTTQ1LjY0MSwzMi42NDRjLTAuMDYyLDAuMTcyLTAuMTU2LDAuMzQ0LTAuMjg1LDAuNTE4ICAgYy0wLjEyNywwLjE3My0wLjI5MSwwLjM0Ny0wLjUwNiwwLjUxNGMtMC40MjIsMC4zMzEtMS4wMjEsMC42NDEtMS44NjksMC45MDNsLTMuMDU1LTAuMDA1aC0wLjUxNWgtMC41MTVoLTIuMzUzbDMuNDc4LTMuOTloNS4yMTMgICBDNDUuMjM0LDMwLjU4Myw0Ni4wMiwzMS41NjgsNDUuNjQxLDMyLjY0NHogTTQ0LjMwMSwyNy4xNDRjLTEuNDkyLDAtNi4zNzEsMC4zNTYtNi4zNzEtMS4xODhzNC44NzktNC40MSw2LjM3MS00LjQxICAgYzEuNDk0LDAsMi43MDQsMS4yNTUsMi43MDQsMi44MDFDNDcuMDA1LDI1Ljg5Miw0NS43OTUsMjcuMTQ0LDQ0LjMwMSwyNy4xNDR6IiBmaWxsPSIjMDA2REYwIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /></div></a><br>
                                <h5 style="color: #005aa6;font-family: 'quicksandbold'"><!--<i class="fa fa-star-o" aria-hidden="true"></i>-->Auto de Prymera</h5>
                                <p style="    margin-top: -14px;font-family: quicksandregular;">-Campañas-</p>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <a style="color:black" onclick="getTipoCredito('eva')"><div class="div_image"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNDguOTk3IDQ4Ljk5OCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDguOTk3IDQ4Ljk5ODsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxwYXRoIGQ9Ik00NS45NjEsMTguNzAyYy0wLjAzMy0wLjAzOC0wLjA2MS0wLjA3NS0wLjEtMC4xMTJsLTEuNzE3LTEuNjU3YzEuNDI0LTAuMzIzLDIuOTU3LTEuNTE2LDIuOTU3LTIuNzQgICBjMC0xLjQyNi0xLjk3OS0xLjkzMi0zLjY2OC0xLjkzMmMtMS43NjYsMC0xLjk3MSwxLjIxLTEuOTkyLDIuMDY1bC00LjQzLTQuMjcxYy0wLjktMC44OTEtMi42MDctMS41OTItMy44ODMtMS41OTJIMjQuNWgtMC4wMDIgICBoLTguNjNjLTEuMjc1LDAtMi45ODEsMC43MDEtMy44ODIsMS41OTJsLTQuNDI5LDQuMjcxYy0wLjAyMy0wLjg1NS0wLjIyOC0yLjA2NS0xLjk5Mi0yLjA2NWMtMS42OTEsMC0zLjY2OSwwLjUwNi0zLjY2OSwxLjkzMiAgIGMwLDEuMjI0LDEuNTM0LDIuNDE3LDIuOTU4LDIuNzRsLTEuNzE3LDEuNjU3Yy0wLjAzOSwwLjAzNy0wLjA2NiwwLjA3NC0wLjEsMC4xMTJDMS4yLDIwLjI3MiwwLDIzLjE4NCwwLDI1LjI5N3Y2LjI3OSAgIGMwLDEuNTI0LDAuNjAxLDIuOTA3LDEuNTcyLDMuOTM4djIuNDM1YzAsMS40MjQsMS4xOTIsMi41ODUsMi42NTgsMi41ODVoMy4yMTRjMS40NjYsMCwyLjY1Ny0xLjE1OSwyLjY1Ny0yLjU4NXYtMC42MjNoMTQuMzk3ICAgSDI0LjVoMTQuMzk2djAuNjIzYzAsMS40MjYsMS4xOSwyLjU4NSwyLjY1OCwyLjU4NWgzLjIxM2MxLjQ2NywwLDIuNjU3LTEuMTYxLDIuNjU3LTIuNTg1di0yLjQzNSAgIGMwLjk3Mi0xLjAzMSwxLjU3Mi0yLjQxNCwxLjU3Mi0zLjkzOHYtNi4yNzlDNDguOTk4LDIzLjE4NCw0Ny43OTgsMjAuMjcyLDQ1Ljk2MSwxOC43MDJ6IE0xMy42MTMsMTEuOTUzICAgYzAuNjIzLTAuNTE5LDEuNzEyLTAuOTEzLDIuMjU1LTAuOTEzaDguNjNIMjQuNWg4LjYzYzAuNTQzLDAsMS42MzIsMC4zOTQsMi4yNTUsMC45MTNsNS44MDksNS42M0gyNC41aC0wLjAwMkg3LjgwNUwxMy42MTMsMTEuOTUzICAgeiBNMS45OTMsMjQuMzQ3YzAtMS41NDYsMS4yMS0yLjgwMSwyLjcwNC0yLjgwMWMxLjQ5MywwLDYuMzcyLDIuODY0LDYuMzcyLDQuNDFzLTQuODc5LDEuMTg4LTYuMzcyLDEuMTg4ICAgQzMuMjAzLDI3LjE0NCwxLjk5MywyNS44OTQsMS45OTMsMjQuMzQ3eiBNMTAuMTAyLDM0LjU3M0g5LjU4N0g5LjA3MmwtMy4wNTUsMC4wMDVjLTAuODQ4LTAuMjY0LTEuNDQ2LTAuNTcyLTEuODY5LTAuOTAzICAgYy0wLjIxNC0wLjE2Ny0wLjM3OC0wLjM0MS0wLjUwNi0wLjUxNGMtMC4xMjktMC4xNzUtMC4yMjMtMC4zNDctMC4yODQtMC41MTljLTAuMzgtMS4wNzQsMC40MDUtMi4wNjEsMC40MDUtMi4wNjFoNS4yMTQgICBsMy40NzYsMy45OUwxMC4xMDIsMzQuNTczTDEwLjEwMiwzNC41NzN6IE0zMS45OTYsMzQuNTc1SDI0LjVoLTAuMDAyaC03LjQ5NmMtMS41NjMsMC0yLjgzMi0xLjI2OS0yLjgzMi0yLjgzMWgxMC4zMjhIMjQuNWgxMC4zMjggICBDMzQuODI4LDMzLjMwOCwzMy41NTksMzQuNTc1LDMxLjk5NiwzNC41NzV6IE0zMi42NTQsMjkuODEySDI0LjVoLTAuMDAyaC04LjE1NGMtMS43LDAtMy4wOC0yLjA5Ni0zLjA4LTQuNjgxaDExLjIzNEgyNC41aDExLjIzNCAgIEMzNS43MzQsMjcuNzE3LDM0LjM1NCwyOS44MTIsMzIuNjU0LDI5LjgxMnogTTQ1LjY0MSwzMi42NDRjLTAuMDYyLDAuMTcyLTAuMTU2LDAuMzQ0LTAuMjg1LDAuNTE4ICAgYy0wLjEyNywwLjE3My0wLjI5MSwwLjM0Ny0wLjUwNiwwLjUxNGMtMC40MjIsMC4zMzEtMS4wMjEsMC42NDEtMS44NjksMC45MDNsLTMuMDU1LTAuMDA1aC0wLjUxNWgtMC41MTVoLTIuMzUzbDMuNDc4LTMuOTloNS4yMTMgICBDNDUuMjM0LDMwLjU4Myw0Ni4wMiwzMS41NjgsNDUuNjQxLDMyLjY0NHogTTQ0LjMwMSwyNy4xNDRjLTEuNDkyLDAtNi4zNzEsMC4zNTYtNi4zNzEtMS4xODhzNC44NzktNC40MSw2LjM3MS00LjQxICAgYzEuNDk0LDAsMi43MDQsMS4yNTUsMi43MDQsMi44MDFDNDcuMDA1LDI1Ljg5Miw0NS43OTUsMjcuMTQ0LDQ0LjMwMSwyNy4xNDR6IiBmaWxsPSIjMDA2REYwIi8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /></div></a><br>
                                <h5 style="color: #005aa6;font-family: 'quicksandbold'"><!--<i class="fa fa-heart-o" aria-hidden="true"></i>-->Auto de Prymera</h5>
                                <p style="    margin-top: -14px;font-family: quicksandregular;">-Evaluación-</p>
                              </div>
                        </div>


                      </div>
                    </div>

                </div>
          </div>
        <br>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" async src="<?php echo RUTA_JS?>jstipocredito.js?v=<?php echo time();?>"></script>
    </body>
</html>
