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
$select = "SELECT cm.tNombre, cm.eCodModalidad, rcm.dPrecio FROM CatModalidades cm INNER JOIN RelCursosModalidades rcm ON rcm.eCodModalidad=cm.eCodModalidad WHERE rcm.eCodCurso=".$rPublicacion{'eCodCurso'}." ORDER BY rcm.eCodModalidad ASC";
                $rsModalidades = mysql_query($select);
$eModalidades = mysql_num_rows($rsModalidades);
if($eModalidades>1)
{
    while($rModalidad = mysql_fetch_array($rsModalidades))
    {$arrModalidad[] = $rModalidad{'tNombre'}; $modalidades.= '<option value="'.$rModalidad{'eCodModalidad'}.'">'.$rModalidad{'tNombre'}.'</option>'; }
}
else
{ $rModalidad = mysql_fetch_array($rsModalidades); }

$select = "SELECT cc.tNombre FROM CatCategorias cc INNER JOIN RelCursosCategorias rc ON rc.eCodCategoria=cc.eCodCategoria WHERE rc.eCodCurso = ".$rPublicacion{'eCodCurso'};
$rsCategorias = mysql_query($select);
?>
    <div class="blog">
       
        <div class="col-md-6">
		<div class="artical-content">
			<img class="img-responsive" src="<?=obtenerURL();?>cla/<?=$rPublicacion{'tFlyer'};?>" alt=" " />
			
		</div>
	</div>
   <div class="col-md-6">
		<div class="artical-content">
			<p class="titulo"><?=($rPublicacion{'tTitulo'});?></p>
			<h4>Dirigido a:</h4>
			<p><?=nl2br(($rPublicacion{'tObjetivo'}));?></p>
			<h4>Objetivo</h4>
			<p><?=nl2br(($rPublicacion{'tDescripcion'}));?></p>
			<p class="precio">Costo del Curso: $<?=number_format($rModalidad{'dPrecio'},2,',','.')?> MXN</p>
		</div>
	</div>
    <div class="clearfix"></div>
    <div class="row" style="background-image: url(/images/textura.jpg); background-size:cover; padding: 10px;">
        <!--detalles-->
        <div class="card card-body col-md-6">
							<h3 class="notacion">¿Te gustar&iacute;a Participar?</h3>
							
                                <p><span style="font-weight:bold;">Duraci&oacute;n:</span> <span class="text-2"><?=$rPublicacion{'eHoras'};?> horas</span></p>
                                <p><span style="font-weight:bold;">Fecha de inicio:</span> <span class="text-2"><?=date('d/m/Y H:i',strtotime($rPublicacion{'fhFechaCurso'}))?></span></p>
                                <p><span style="font-weight:bold;">Dias que se imparte:</span> <span class="text-2"><?=$rPublicacion{'tDias'};?> </span></p>
                                <p><span style="font-weight:bold;">Modalidad:</span> <span >Online</span></p>
                                <p><span style="font-weight:bold;">Costo:</span> <span class="text-2">$<?=number_format($rModalidad{'dPrecio'},2,',','.')?></span></p>
                                <p><span style="font-weight:bold;">Pagar con PAYPAL</span> <span class="text-2"><?=base64_decode($rPublicacion{'tPaypal'})?></span></p>
							<h3 class="vivo">TODOS NUESTROS CURSOS SON EN VIVO</h3>
						</div>
						<div class="card card-body col-md-6">
							<h3>Registro</h3>
							<div>
								<img src="/pay/images/bg.jpg" class="img-responsive">
							</div>
						</div>
        <!--detalles-->
    </div>
    <div class="row"><a href="/pagar/v1/<?=sprintf("%07d",$_GET['v1']);?>/" class="btn btn-info btn-xl form-control" style="text-align:center;">Pagar Curso</a></div>
    <div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>