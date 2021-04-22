<? //include("./cnx/swgc-mysql.php"); ?>
<? //include("/inc/fun-ini.php"); ?>
<? date_default_timezone_set('America/Mexico_City'); ?>
<? $hoy = date('Y-m-d'); ?>


	<div class="banner_top">
		<div class="slider">
			<div class="wrapper">
				<div class="agile_banner_text_info">
					
					
					<div class="w3-button">
						
						<div class="clearfix"> </div>
					</div>


				
				</div>
				<!-- Slideshow 3 -->
				<ul class="rslides" id="slider">
                     <?
                $select = "SELECT bc.*, ce.tNombre tEmpresa FROM BitCursos bc INNER JOIN CatEntidades ce ON ce.eCodEntidad=bc.eCodEntidad WHERE bc.eCodEstatus=3 AND bc.fhFechaCurso >= '".date('Y-m-d')." 23:59:59' ORDER BY bc.eCodCurso DESC LIMIT 0,12";
                
                $rsCursos = mysql_query($select);
                while($rCurso = mysql_fetch_array($rsCursos))
                { ?>
                 <li><a href="/cur/detalle/v1/<?=sprintf("%07d",$rCurso{'eCodCurso'});?>/"><img src="<?=obtenerURL();?>cla/<?=$rCurso{'tSlider'};?>" alt="<?=utf8_encode($rCurso{'tTitulo'});?>" data-selector="img"></a></li>   
                <? } ?>
					<!--<li></li>
					<li></li>
					<li></li>
					<li></li>-->
				</ul>
				<!-- Slideshow 3 Pager -->
				
			</div>
		</div>
	</div>
	<!-- //banner -->

	
	<!-- /services -->
	<div class="portfolio-agileinfo" id="portfolio">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header w3_agileits_header">Pr&oacute;ximos Cursos</h3>
			</div>
		</div>
		<div class="agile_wthree_inner_grids">
			<div class="agile_port_w3ls_info">
				<div class="portfolio-grids_main">
                    
                     <?
                $select = "SELECT bc.*, ce.tNombre tEmpresa FROM BitCursos bc INNER JOIN CatEntidades ce ON ce.eCodEntidad=bc.eCodEntidad WHERE bc.eCodEstatus=3 AND bc.fhFechaCurso >= '".date('Y-m-d')." 23:59:59' ORDER BY bc.eCodCurso DESC LIMIT 0,12";
                $rsCursos = mysql_query($select);
                while($rCurso = mysql_fetch_array($rsCursos))
                { ?>
                    
                    <div class="col-md-4 portfolio-grids gallery-grid1" onclick="window.location='/cur/detalle/v1/<?=sprintf("%07d",$rCurso{'eCodCurso'});?>/'">
						
								<img src="<?=obtenerURL();?>cla/<?=$rCurso{'tFlyer'};?>" alt="<?=utf8_encode($rCurso{'tTitulo'});?>" class="img-responsive" />
								<div class="p-mask">
									<h4><span><?=utf8_encode($rCurso{'tTitulo'});?></span></h4>
									<p><?=date('d/m/Y H:i',strtotime($rCurso{'fhFechaCurso'}));?></p>
								</div>

							
					</div>
                      
                <? } ?>
                    
					

					<div class="clearfix"> </div>
				</div>
				

			</div>
		</div>
	</div>
	<!--// Gallery -->
	