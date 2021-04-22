<?
$select = "	SELECT 
	ci.*
FROM
	BitCursos ci
	
WHERE ci.eCodCurso = ".$_GET['v1'];
//echo $select;
$rsPublicacion = mysql_query($select);
$rPublicacion = mysql_fetch_array($rsPublicacion);


 $select = "SELECT * FROM RelCursosModulos WHERE eCodCurso = ".$rPublicacion{'eCodCurso'}." ORDER BY fhFechaModulo ASC";
                $rsModulos = mysql_query($select);
$rsInscripcionModulos = mysql_query($select);

$arrModalidad = array();
$modalidades='';
$select = "SELECT cm.tNombre, cm.eCodModalidad FROM CatModalidades cm INNER JOIN RelCursosModalidades rcm ON rcm.eCodModalidad=cm.eCodModalidad WHERE rcm.eCodCurso=".$rPublicacion{'eCodCurso'}." ORDER BY rcm.eCodModalidad ASC";
                $rsModalidades = mysql_query($select);
while($rModalidad = mysql_fetch_array($rsModalidades))
{$arrModalidad[] = $rModalidad{'tNombre'}; $modalidades.= '<option value="'.$rModalidad{'eCodModalidad'}.'">'.$rModalidad{'tNombre'}.'</option>'; }

$select = "SELECT cc.tNombre FROM CatCategorias cc INNER JOIN RelCursosCategorias rc ON rc.eCodCategoria=cc.eCodCategoria WHERE rc.eCodCurso = ".$rPublicacion{'eCodCurso'};
$rsCategorias = mysql_query($select);
?>

	<!--/w3_short-->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">

			<ul class="w3_short">
				<li>
                    <a href="/cap/inicio/">Home</a><span>|</span>
                    <a href="/cap/cursos/">Cursos</a><span>|</span>
				<?=utf8_encode($rPublicacion{'tTitulo'});?></li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
	<!-- /blog -->
	<div class="banner-bottom inner">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header w3_agileits_header"><?=utf8_encode($rPublicacion{'tTitulo'});?></h3>
			</div>
			<div class="agile_wthree_inner_grids">
				<div class="col-md-8 single-left">
					<div class="single-left1">
						<img src="<?=obtenerURL();?>cla/<?=$rPublicacion{'tFlyer'};?>" alt=" " class="img-responsive" />
                        <br>
						<h3>Descripci&oacute;n</h3>
						
						<p><?=nl2br(utf8_encode($rPublicacion{'tDescripcion'}));?></p>
					</div>
                    <br>
                    <div class="single-left1">
						<h3>Objetivo</h3>
						
						<p><?=nl2br(utf8_encode($rPublicacion{'tObjetivo'}));?></p>
					</div>
					<div class="single-left2" <?=((mysql_num_rows($rsModulos)) ? '' : 'style="display:none;"' )?>>
						<div class="col-md-6 single-left2-left">
                            <br>
						<h3>M&oacute;dulos</h3>
							<ul>
                                
                                <?
                $i=1;
                while($rModulo = mysql_fetch_array($rsModulos))
                {?>               
                <li>
                    <i class="fa fa-check" aria-hidden="true"></i>
                    <a href="#"><?=date('d/m/Y H:i',strtotime($rModulo{'fhFechaModulo'}));?> - <?=$rModulo{'tNombre'};?></a>
                </li>
                <? $i++; ?>
                <? } ?>
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="col-md-4 event-right wthree-event-right">
					<div class="event-right1 agileinfo-event-right1">
						<div class="categories w3ls-categories">
							<h3>Detalles</h3>
							<ul>
                                <li><span style="font-weight:bold;">Duraci&oacute;n:</span> <span class="text-2"><?=$rPublicacion{'eHoras'};?> horas</span></li>
                                <li><span style="font-weight:bold;">Fecha:</span> <span class="text-2"><?=date('d/m/Y H:i',strtotime($rPublicacion{'fhFechaCurso'}))?></span></li>
                                <li><span style="font-weight:bold;">Modalidad(es):</span> <span ><?=implode(",",$arrModalidad);?></span></li>
                                <li><span style="font-weight:bold;">Ubicaci&oacute;n:</span> <span class="text-2"><?=($rPublicacion{'tUbicacion'})?></span></li>
							</ul>
						</div>
						<div class="posts w3l-posts">
							<h3>Registro</h3>
							<div class="posts-grids w3-posts-grids">
								<form action="" method="post" id="Datos" name="Datos">
                  <input type="hidden" name="eCodCurso" id="eCodCurso" value="<?=$_GET['v1'];?>">
                  <input type="email" id="tCorreo" name="tCorreo" placeholder="E-mail" class="form-control">
                  <br>
                  <select class="form-control" id="eCodModalidad" name="eCodModalidad">
                  <option value="">Selecciona una modalidad...</option>
                    <?=$modalidades;?>
                  </select>
                  <br>
                  <? if(mysql_num_rows($rsInscripcionModulos)) { $i=0; ?>
                  <ul>
                      <li><label><input type="checkbox" id="selector" onclick="todos();"> Seleccionar todos</label></li>
                  <? while($rModulo = mysql_fetch_array($rsInscripcionModulos)) { ?>
                      <li><label><input type="checkbox" id="modulo[<?=$i;?>][eCodRegistro]" name="modulo[<?=$i;?>][eCodRegistro]" value="<?=$rModulo{'eCodRegistro'};?>"> <?=utf8_encode($rModulo{'tNombre'})?> | <?=date('d-m-Y H:i',strtotime($rModulo{'fhFechaModulo'}));?></label></li>
                      <? $i++; } ?>
                  </ul>
                  <br>
                  <? } ?>
                  <label><input type="checkbox" name="bRequiereIVA" id="bRequiereIVA" value="1"> Requiero Factura</label><br>
                  <label><input type="checkbox" onclick="activarBoton();" id="bPolitica"> Acepto la </label><a href="#" data-toggle="modal" data-target="#aviso"> Pol&iacute;tica de Privacidad</a>
                  <input type="button" onclick="procesar();" value="Registrarme" class="btn btn-success form-control" id="registrar" disabled>
                  </form>
							</div>
						</div>
						<div class="tags tags1 w3layouts-tags">
							<h3>Categor&iacute;as</h3>
							<ul>
                                <? while($rCategoria = mysql_fetch_array($rsCategorias)){ ?>
                                <li><a href="#"><?=base64_decode($rCategoria{'tNombre'});?></a></li>
                                <? } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //blog -->

