<? //include("./cnx/swgc-mysql.php"); ?>
<? //include("/inc/fun-ini.php"); ?>
<? date_default_timezone_set('America/Mexico_City'); ?>
<? $hoy = date('Y-m-d'); ?>

<div class="banner">
<!-- Slider-starts-Here -->
				
			<!--//End-slider-script -->
				<div  id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
					<ul class="rslides" id="slider3">
					<?
                $select = "SELECT bc.*, ce.tNombre tEmpresa FROM BitCursos bc INNER JOIN CatEntidades ce ON ce.eCodEntidad=bc.eCodEntidad WHERE bc.eCodEstatus=3 ".
                /*" AND bc.fhFechaCurso >= '".date('Y-m-d')." 23:59:59' ".*/
                " ORDER BY bc.eCodCurso DESC LIMIT 0,12";
                
                $rsCursos = mysql_query($select);
                while($rCurso = mysql_fetch_array($rsCursos))
                { ?>
                <li>
                <img src="<?=obtenerURL();?>cla/<?=$rCurso{'tSlider'};?>" class="img-responsive">
						</li>
                <? } ?>
						
					</ul>
				</div>
		</div>
<div class="row" style="height:50px;"></div>		
<div class="blog">
            <div class="row" style="height:50px;"></div>
				<div class="col-lg-12">
				<div class="row" style="height:50px;"></div>
				<?
                $select = "SELECT bc.*, ce.tNombre tEmpresa FROM BitCursos bc INNER JOIN CatEntidades ce ON ce.eCodEntidad=bc.eCodEntidad WHERE bc.eCodEstatus=3 AND bc.fhFechaCurso >= '".date('Y-m-d')." 23:59:59' ORDER BY bc.eCodCurso DESC LIMIT 0,12";
                $rsCursos = mysql_query($select);
                while($rCurso = mysql_fetch_array($rsCursos))
                { ?>
                   
                   <div class="blog-grid col-md-4" style="padding:10px;">
                       <div class="thin">
						<div class="blog-left-grid-left">
							<h3><a href="/cur/detalle/v1/<?=sprintf("%07d",$rCurso{'eCodCurso'});?>/"><?=substr(($rCurso{'tTitulo'}),0,20);?>...</a></h3>
						</div>
						<div class="clearfix"> </div>
						<a href="/cur/detalle/v1/<?=sprintf("%07d",$rCurso{'eCodCurso'});?>/"><img src="<?=obtenerURL();?>cla/<?=$rCurso{'tFlyer'};?>" alt=" " class="img-responsive" /></a>
						<p class="para"> <?=substr($rCurso{'tDescripcion'},0,100);?></p>
						<div class="rd-mre">
							<a href="/cur/detalle/v1/<?=sprintf("%07d",$rCurso{'eCodCurso'});?>/" class="hvr-bounce-to-bottom quod">Ver m&aacute;s</a>
						</div>
				       </div>
					</div>
                <? } ?>
                
				</div>
				<div class="clearfix"> </div>
			</div>
