<? include("./cnx/swgc-mysql.php"); ?>
<? include("./inc/fun-ini.php"); ?>
<? date_default_timezone_set('America/Mexico_City'); ?>
<? $hoy = date('Y-m-d'); ?>
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
<!DOCTYPE html>
<html>

<head>
    <title>Escuela | Pagar</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="/pay/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="/pay/js/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <div class="content">

            <div class="payment-info" style="background-color: #FFF; padding:25px;">
                <h3 style="color:#000">Informaci&oacute;n de la inscripci&oacute;n</h3>
                <form action="/inscribirme/" method="post">
                    <div class="tab-for">
                        <h5>Curso</h5>
                        <?=($rPublicacion{'tTitulo'});?>
                        <input type="hidden" name="curso" value="<?=($rPublicacion{'tTitulo'});?>">	
                        <h5>Monto a pagar</h5>
                        $<?=number_format($rModalidad{'dPrecio'},2,',','.')?>
                   
                    </div>
                    <div class="tab-for">
                       <h5>Nombre</h5>
                       <input class="form-control" name="nombre" type="text" placeholder="Nombre:" required=" ">
                       <h5>Tel&eacute;fono</h5>
					<input class="form-control" name="telefono" type="text" placeholder="Teléfono:" required=" ">
					<h5>E-mail</h5>
					<input class="form-control" name="correo" type="text" placeholder="E-mail:" required=" ">
                     
                     <input type="submit" class="btn btn-success form-control" value="Registrarme">
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</body>

</html>