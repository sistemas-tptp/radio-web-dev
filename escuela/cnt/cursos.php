<? //include("./cnx/swgc-mysql.php"); ?>
<? //include("/inc/fun-ini.php"); ?>
<? date_default_timezone_set('America/Mexico_City'); ?>
<? $hoy = date('Y-m-d'); ?>

		
<div class="blog">
            <form action="#" id="frmBusqueda" name="frmBusqueda" method="post">
                                <input type="hidden" id="eCodCategoria" name="eCodCategoria" value="">
                                <input type="hidden" id="eCodEntidad" name="eCodEntidad" value="">
                                <input type="hidden" id="tCodTipo" name="tCodTipo" value="<?=$_GET['v1'];?>">
							</form>
				<div class="col-lg-12" id="divXHR">
				
				</div>
				<div class="clearfix"> </div>
			</div>
<script>
		$(document).ready(function () {
			buscar();
		});
	</script>