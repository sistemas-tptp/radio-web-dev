<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Historia de la Radio | Museo Virtual</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="./jquery.panorama.css" media="screen" />
<link rel="stylesheet" type="text/css" href="./jquery.fancybox-1.3.1.css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./jquery.panorama.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("img.advancedpanorama").panorama({
	                auto_start: 0,
			start_position: 0
	         });
	});
</script>
<script type="text/javascript" src="./cvi_text_lib.js"></script>
<script type="text/javascript" src="./jquery.advanced-panorama.js"></script>
<script type="text/javascript" src="./jquery.flipv.js"></script>
<script type="text/javascript" src="./jquery.fancybox-1.3.1.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.thickbox').fancybox();
	});
</script>

<style  type="text/css">
	body {
		background: #595959;
		text-align: center;
	}
	h1 {
		color: white;
		margin-bottom: 2em;
		font-family: Verdana;
		font-weight: normal;
		font-size: 25px;
	}
	#page {
		text-align: center;
		color: white;
	}
	#page a {
		color: white;
	}
	#page .panorama-viewport {
		border: 20px solid #414141;
		margin-left: auto;
		margin-right: auto;
	}
	#page p {
		margin-bottom: 1em;
	}
</style>


  
</head>
<body>
<h1>Museo Virtual</h1>

<? if(!$_GET['img']){ ?>
<div id="page">
	
	
	<img src="atelier.jpg" class="advancedpanorama" width="1450" height="375" usemap="testmap"  />
	<map id="testmap" name="testmap"> 
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=02" coords="33,162,75,226" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=01"  coords="111,162,152,226" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=04"  coords="562,115,667,278" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=05"  coords="771,164,815,228" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=06"  coords="838,164,882,231" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=07"  coords="989,118,1080,270" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=08"  coords="1296,110,1405,279" shape="rect">
		<area target="_blank" alt="Historia de la Radio" title="Historia de la Radio" href="http://museo.historiadelaradio.com/?img=03"  coords="254,122,352,273" shape="rect">
	</map>
	
	
</div>
<? } else { ?>
<center>
    <table width="100%">
       <tr>
           <td align="right"><a href="http://museo.historiadelaradio.com"><img src="https://icons.iconarchive.com/icons/iconsmind/outline/512/Close-icon.png" style="max-width:75px;"></a></td>
       </tr>
        <tr>
            <td align="center"><img src="pendones/<?=sprintf("%02d",$_GET['img']);?>.jpg" style="max-width:600px;"></td>
        </tr>
    </table>
</center>
<? } ?>

</body>
</html>
