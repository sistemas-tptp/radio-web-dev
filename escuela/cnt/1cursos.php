
	<!--/w3_short-->
<div class="clearfix"> </div>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">

			<ul class="w3_short">
				<li><a href="/cap/inicio/">Inicio</a><span>|</span></li>
				<li>Cursos</li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
	<!-- /blog -->
	<div class="banner-bottom inner">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header w3_agileits_header">Cursos</h3>
			</div>
			<div class="agile_wthree_inner_grids">
                <!--filtros-->
                <div class="col-md-4 event-right wthree-event-right">
					<div class="event-right1 agileinfo-event-right1">
						<div class="search1 agileits-search1">
							<form action="#" id="frmBusqueda" name="frmBusqueda" method="post">
                                <input type="hidden" id="eCodCategoria" name="eCodCategoria" value="">
                                <input type="hidden" id="eCodEntidad" name="eCodEntidad" value="">
								<input type="search" class="form-control" name="tEntidad" id="tEntidad" placeholder="Capacitadora" onkeyup="buscarCapacitadora()" onkeypress="buscarCapacitadora()" onblur="buscar();">
								<input type="button" class="form-control btn btn-info" onclick="buscar();" value="Buscar">
							</form>
						</div>
						<div class="tags tags1 w3layouts-tags">
							<h3>Categor&iacute;as</h3>
							<ul>
                                <?
                                $select = "SELECT * FROM CatCategorias";
                                $rsCategorias = mysql_query($select);
                                while($rCategoria = mysql_fetch_array($rsCategorias)){ ?>
                                <li><a href="#" onclick="asignarCategoria(<?=$rCategoria{'eCodCategoria'};?>)"><?=base64_decode($rCategoria{'tNombre'});?></a></li>
                                <? } ?>
							</ul>
						</div>
					</div>
				</div>
				
                <!--contenido-->
				<div class="col-md-8 event-left w3-agile-event-left" id="divXHR">
					
					
                    <nav class="paging1 agileits-w3layouts-paging1" style="display:none">
						<ul class="pagination paging w3-agileits-paging">
							<li>
								<a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
							</li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //blog -->
