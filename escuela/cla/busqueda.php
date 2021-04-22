<? header('Access-Control-Allow-Origin: *');  ?>
<? header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method"); ?>
<? header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE"); ?>
<? header("Allow: GET, POST, OPTIONS, PUT, DELETE"); ?>
<? //header('Content-Type: application/json'); ?>
<?

error_reporting(1);
ini_set('display_errors', 1);

date_default_timezone_set('America/Mexico_City');

if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

include("../cnx/swgc-mysql.php");
include("../inc/fun-ini.php"); 



$errores = array();

$data = json_decode( file_get_contents('php://input') );

$tHTML = '';

$select = "SELECT DISTINCT ".
" 	bc.*, ".
" 	ce.tNombre tEmpresa  ".
" FROM ".
" 	BitCursos bc ".
" 	LEFT JOIN CatEntidades ce ON ce.eCodEntidad= bc.eCodEntidad  ".
" 	LEFT JOIN RelCursosCategorias rc ON rc.eCodCurso=bc.eCodCurso  ".
" WHERE ".
" 	bc.eCodEstatus=3 ".
(($data->eCodEntidad) ? " AND bc.eCodEntidad=".$data->eCodEntidad : "").
(($data->eCodCategoria) ? " AND rc.eCodCategoria=".$data->eCodCategoria : "").
(($data->tCodTipo) ? " AND bc.tCodTipo='".$data->tCodTipo."'" : "").
/*(($data->fhFecha) ? " AND DATE(bc.fhFechaCurso) = '".$data->fhFecha."'" : " AND DATE(bc.fhFechaCurso) >= '".date('Y-m-d')."'").*/
" ORDER BY bc.eCodCurso DESC";

$pf = fopen("logBusqueda.txt","a");
fwrite($pf,$select."\n\n");
fclose($pf);

 $rsCursos = mysql_query($select);
if(mysql_num_rows($rsCursos))
{
                while($rCurso = mysql_fetch_array($rsCursos))
                {
                    
$tHTML .= '<div class="blog-grid col-md-4" style="padding:5px;">';
$tHTML .= '<div class="thin">';
$tHTML .= '	<div class="blog-left-grid-left">';
$tHTML .= '		<h3><a href="/cur/detalle/v1/'.sprintf("%07d",$rCurso{'eCodCurso'}).'/">'.substr(($rCurso{'tTitulo'}),0,30).'</a></h3>';
$tHTML .= '	</div>';
$tHTML .= '	<div class="clearfix"> </div>';
$tHTML .= '	<a href="/cur/detalle/v1/'.sprintf("%07d",$rCurso{'eCodCurso'}).'/"><img src="'.obtenerURL().'cla/'.$rCurso{'tFlyer'}.'" alt=" " class="img-responsive" /></a>';
$tHTML .= '	<p class="para"> '.substr($rCurso{'tDescripcion'},0,100).'</p>';
$tHTML .= '	<div class="rd-mre">';
$tHTML .= '		<a href="/cur/detalle/v1/'.sprintf("%07d",$rCurso{'eCodCurso'}).'/" class="hvr-bounce-to-bottom quod">Ver m&aacute;s</a>';
$tHTML .= '	</div>';
$tHTML .= '	</div>';
$tHTML .= '</div>';
                }
}
else
{
    $tHTML = '<h3>Sin cursos por el momento</h3>';
}

echo json_encode(array("tHTML"=>$tHTML));
?>