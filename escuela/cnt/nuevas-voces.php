<div class="about">
			<div class="about-text">
				<h3>Nuevas Voces</h3>
			</div>	
			<div class="about-info">
				
				<?
                $audios = array();
                $audios[]= "/aud/DMX4.mp3";
                $audios[]= "/aud/REEL-NRM.mp3";
                
                foreach($audios as $audio){?> 
                <div class="col-md-3">
                   <h3><?=str_replace(array("/aud/",".mp3"),"",$audio);?></h3>
                    <audio controls>
                      <source src="<?=$audio;?>" type="audio/mpeg">
                    Tu navegador no soporta la reproducci&oacute;n de medios
                    </audio>
                </div>
                <? } ?>
				
				<div class="clearfix"> </div>
				
			</div>
			
			
			
		</div>