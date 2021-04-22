<?
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
?>
<? include("./cnx/swgc-mysql.php"); ?>
<? include("./inc/fun-ini.php"); ?>
<? date_default_timezone_set('America/Mexico_City'); ?>
<? $hoy = date('Y-m-d'); ?>
<? if(!$_GET['tCodSeccion']){ echo'<script>window.location="/cap/inicio/";</script>';} ?>
<!DOCTYPE html>
<html>
<head>
<title>Escuela HR</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="/js/jquery-1.11.1.min.js"></script>
<!-- //js -->

<!-- for bootstrap working -->
		<script src="/js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
<!-- Script -->
   <!-- <script src='/js/jquery-3.1.1.min.js' type='text/javascript'></script>-->

    <!-- jQuery UI -->
    <link href='/js/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='/js/jquery-ui.min.js' type='text/javascript'></script>
    <script type="text/javascript" src="/js/jquery.serializejson.js"></script>
    
    

</head>
	
<body>
<!-- banner-body -->
	<div class="banner-body">
		<div class="container">
<!-- header -->
			<div class="header">
				<div class="header-nav">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						   <a class="navbar-brand" href="/cap/inicio/">Escuela</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom"><a href="/cap/nosotros/">Nosotros</a></li>
							<li class="hvr-bounce-to-bottom"><a href="/cap/cursos/v1/basicos/">Cursos B&aacute;sicos</a></li>
							<li class="hvr-bounce-to-bottom"><a href="/cap/cursos/v1/profesionales/">Cursos Profesionales</a></li>
							<li class="hvr-bounce-to-bottom"><a href="/cap/nuevas-voces/">Nuevas Voces</a></li>
							<li class="hvr-bounce-to-bottom"><a href="/cap/contacto/">Contacto</a></li>
						  </ul>
						  <div class="sign-in" style="display:none;">
							<ul>
								<li><a href="https://app.historiadelaradio.com">Iniciar Sesi&oacute;n </a></li>
							</ul>
							</div>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
	
			
			</div>
<!-- //header -->
<!-- header-bottom -->
	<div class="header-bottom">
		<div class="header-bottom-top">
			<ul>
				<li><a href="#" class="g"> </a></li>
				<li><a href="#" class="p"> </a></li>
				
			</ul>
		</div>
		<div class="clearfix"> </div>

    <!--contenido-->
    <?
        $tArchivo = './cnt/'.$_GET['tCodSeccion'].'.php';
        if(file_exists($tArchivo))
            {
                include($tArchivo);
            }
        else
            {
                include('./404.php');
            }
    ?>
    <!--contenido-->

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-3 footer-grid">
					<h3>Nosotros</h3>
					<p style="color:#FFF;">El <b>Centro de Capacitación HR</b> abre sus puertas online en abril del 2020 para brindar cursos de locución, obteniendo el respaldo de grandes locutores... <a href="/cap/nosotros/">Leer m&aacute;s</a></p>
				</div>
				<div class="col-md-3 footer-grid">
					
				</div>
				<div class="col-md-3 footer-grid">
					
				</div>
				<div class="col-md-3 footer-grid">
					<h3>Navegaci&oacute;n</h3>
					<ul>
						<li><a href="/cap/nosotros/">Nosotros</a></li>
						<li><a href="/cap/cursos/v1/basicos/">Cursos B&aacute;sicos</a></li>
						<li><a href="/cap/cursos/v1/profesionales/">Cursos Profesionales</a></li>
						<li><a href="/cap/nuevas-voces/">Nuevas Voces</a></li>
						<li><a href="/cap/contacto/">Contacto</a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<p>© 2020 Todos los derechos reservados</p>
		</div>
	</div>
<!-- //footer -->

    <!-- chat -->
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eac929e203e206707f8be57/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
    <!-- Latest compiled and minified JavaScript -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>-->

    <!-- (Optional) Latest compiled and minified JavaScript translation files --
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>-->
    <script src="/js/responsiveslides.min.js"></script>
				 <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider3").responsiveSlides({
				        auto: true,
				        pager: false,
				        nav: true,
				        speed: 500,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });
				
				    });
				  </script>

    <script>
          
    function procesar()
        {
           
            var obj = $('#Datos').serializeJSON();
          var jsonString = JSON.stringify(obj);
            
            var tCorreo = document.getElementById('tCorreo'),
                eCodModalidad = document.getElementById('eCodModalidad'),
                eModulos=0,
                bandera=false,
                mensaje="";
            
            var cmbModulos = document.querySelectorAll("input[id^=modulo]");
                cmbModulos.forEach(function(nodo){
                   if(nodo.checked==true)
                    { eModulos++; }
                });
            
            if(!tCorreo.value)
                {
                    mensaje +="* E-mail \n";
                    bandera=true;
                }
            if(!eCodModalidad.value)
                {
                    mensaje +="* Modalidad \n";
                    bandera=true;
                }
            if(eModulos==0)
                {
                    mensaje +="* Modulos \n";
                    bandera=true;
                }
            
           if(bandera) 
               {
                   alert("<-Valide la siguiente informacion->\n\n"+mensaje);
               }
          else
            {
              $.ajax({
                  type: "POST",
                  url: "/cla/registro.php",
                  data: jsonString,
                  contentType: "application/json; charset=utf-8",
                  dataType: "json",
                  success: function(data){
                      if(data.exito==1)
                      {
                        if(data.redireccionar==1)
                            {
                                alert("Vamos a completar su registro");
                                window.location="<?=obtenerUrl();?>completar/v1/"+data.codigo+"/";
                            }
                          else
                              {
                                  alert("Su registro ha sido completado");
                              }
                      }
                      else
                          {
                              var mensaje="";
                              for(var i=0;i<data.errores.length;i++)
                         {
                             mensaje += "-"+data.errores[i]+"\n";
                         }
                              alert("Error al procesar la solicitud.\n<-Valide la siguiente informacion->\n\n"+mensaje);
                             
                          }
                  },
                  failure: function(errMsg) {
                      alert('Error al enviar los datos.');
                  }
              }); 
            }
        }
        
    function buscar()
        {
           
            var obj = $('#frmBusqueda').serializeJSON();
            var jsonString = JSON.stringify(obj);
            
              $.ajax({
                  type: "POST",
                  url: "/cla/busqueda.php",
                  data: jsonString,
                  contentType: "application/json; charset=utf-8",
                  dataType: "json",
                  success: function(data){
                    document.getElementById('divXHR').innerHTML = data.tHTML;
                  },
                  failure: function(errMsg) {
                      alert('Error al enviar los datos.');
                  }
              }); 
            
        }
        
    function asignarCategoria(codigo)
        {
            document.getElementById('eCodCategoria').value=codigo;
            buscar();
        }
      
        function activarBoton()
          {
              var bPolitica = document.getElementById('bPolitica'),
                  registro = document.getElementById('registrar');
              
              if(bPolitica.checked==true)
              { registro.disabled=false; }
              if(bPolitica.checked==false)
              { registro.disabled=true; }
          }
          
          function todos()
		{	
			var selector = document.getElementById('selector');
            
            var cmbModulos = document.querySelectorAll("input[id^=modulo]");
                cmbModulos.forEach(function(nodo){
                   if(selector.checked==true)
                    {
                       nodo.checked=true; 
                    }
                    else
                    {
                       nodo.checked=false; 
                    }
                });
			
		}
        
        function buscarCapacitadora()
        {
            var eCodInventario = document.getElementById('eCodEntidad'),
                tInventario = document.getElementById('tEntidad');
            
            if(!tInventario.value || tInventario.value=="")
                { eCodInventario.value=""; }
             $( function() {
  
        $( "#tEntidad" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "/que/buscarEmpresas.php",
                    type: 'get',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#tEntidad').val(ui.item.label); // display the selected text
                $('#eCodEntidad').val(ui.item.value); // save selected id to input
                return false;
            }
        });

       
        }); 
        }

 
        $(document).ready(function () {
            $('select').selectpicker();
			if(document.getElementById('frmBusqueda') && document.getElementById('divXHR'))
                {
                    buscar();
                }
		});
        
        </script>
</body>
</html>