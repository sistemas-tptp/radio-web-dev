<? header('Access-Control-Allow-Origin: *');  ?>
<? header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method"); ?>
<? header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE"); ?>
<? header("Allow: GET, POST, OPTIONS, PUT, DELETE"); ?>
<? header('Content-Type: application/json'); ?>
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

$resultados = array();

$errores = array();

$data = json_decode( file_get_contents('php://input') );

$tToken         = $data->token      ? $data->token      : false;
$tAccion        = $data->accion     ? $data->accion     : false;
$eCodCurso      = $data->codigo     ? $data->codigo     : false;
$eCodCategoria  = $data->categoria  ? $data->categoria  : false;

if($tToken && $tAccion)
{
    $select = "SELECT * FROM CatEntidades WHERE tUUID = '$tToken'";
    $rsEntidad = mysql_query($select);
    $rEntidad = mysql_fetch_array($rsEntidad);
    $eCodEntidad = $rEntidad{'eCodEntidad'};
    
    if($eCodEntidad)
    {
        switch($tAccion)
        {
            case 'consultarCategorias':
                $select = "SELECT * FROM CatCategorias";
                $rsCategorias = mysql_query($select);
                while($rCategoria = mysql_fetch_array($rsCategorias))
                { 
                    $resultados[] = array('codigo'=>$rCategoria{'eCodCategoria'},'nombre'=>base64_decode($rCategoria{'tNombre'}));
                }
                break;
                
            case 'consultarDetalle':
                if($eCodCurso)
                {
                    //consultar detalle
                    $select =   " SELECT DISTINCT ".
                            " 	bc.*, ".
                            " 	ce.tNombre tEmpresa  ".
                            " FROM ".
                            " 	BitCursos bc ".
                            " 	INNER JOIN CatEntidades ce ON ce.eCodEntidad= bc.eCodEntidad  ".
                            " 	LEFT JOIN RelCursosCategorias rc ON rc.eCodCurso=bc.eCodCurso  ".
                            " WHERE ".
                            " 	bc.eCodEstatus=3 ".
                            "   AND bc.eCodCurso = $eCodCurso ".
                            "   AND bc.eCodEntidad=".$data->eCodEntidad;

                $rsCursos = mysql_query($select);
                $rCurso = mysql_fetch_array($rsCursos);
                
                    $arrCategorias = array();
                    $select = "SELECT eCodCategoria codigo FROM RelCursosCategorias WHERE eCodCurso = ".$rCurso{'eCodCurso'};
                    $rsCategorias = mysql_query($select);
                    while($rCategoria = mysql_fetch_object($rsCategorias))
                    { $arrCategorias[] = $rCategoria; }
                    
                    $arrModalidades = array();
                    $select = "SELECT cm.eCodModalidad codigo,cm.tNombre nombre,  rm.eLugares lugares, rm.dPrecio precio FROM CatModalidades cm INNER JOIN RelCursosModalidades rm ON rm.ecodModalidad=cm.eCodModalidad WHERE rm.eCodCurso = ".$rCurso{'eCodCurso'};
                    $rsModalidades = mysql_query($select);
                    while($rModalidad = mysql_fetch_object($rsModalidades))
                    { $arrModalidades[] = $rModalidad; }
                    
                    $arrModulos = array();
                    $select = "SELECT eCodRegistro codigo, eModulo secuencia, tNombre nombre, fhFechaModulo fecha FROM RelCursosModulos WHERE eCodCurso = ".$rCurso{'eCodCurso'}." ORDER BY eModulo ASC";
                    $rsModulos = mysql_query($select);
                    while($rModulo = mysql_fetch_object($rsModulos))
                    { $arrModulos[] = $rModulo; }
                    
                    $resultados[] = array(
                    'codigo'=>$rCurso{'eCodCurso'},
                    'titulo'=>$rCurso{'eCodCurso'},
                    'descripcion'=>$rCurso{'tDescripcion'},
                    'objetivo'=>$rCurso{'tObjetivo'},
                    'horas'=>$rCurso{'eHoras'},
                    'fecha'=>date('d-m-Y H:i',strtotime($rCurso{'fhFechaCurso'})),
                    'ubicacion'=>$rCurso{'tUbicacion'},
                    'flyer'=>obtenerURL().'cla/'.$rCurso{'tFlyer'},
                    'slider'=>obtenerURL().'cla/'.$rCurso{'tSlider'},
                    'modalidades'=>$arrModalidades,
                    'categorias'=>$arrCategorias,
                    'modulos'=>$arrModulos
                    );
                
                    //consultar detalle
                }
                else
                { $errores[] = "El código del curso es obligatorio"; }
                break;
            
            case 'consultarCursos':
                $select =   " SELECT DISTINCT ".
                            " 	bc.*, ".
                            " 	ce.tNombre tEmpresa  ".
                            " FROM ".
                            " 	BitCursos bc ".
                            " 	INNER JOIN CatEntidades ce ON ce.eCodEntidad= bc.eCodEntidad  ".
                            " 	LEFT JOIN RelCursosCategorias rc ON rc.eCodCurso=bc.eCodCurso  ".
                            " WHERE ".
                            " 	bc.eCodEstatus=3 ".
                            " AND bc.eCodEntidad=".$eCodEntidad.
                            (($data->eCodCategoria) ? " AND rc.eCodCategoria=".$data->eCodCategoria : "").
                            (($data->fhFecha) ? " AND DATE(bc.fhFechaCurso) = '".$data->fhFecha."'" : " AND bc.fhFechaCurso >= '".date('Y-m-d')." 23:59:59'").
                            " ORDER BY bc.eCodCurso DESC";

                $rsCursos = mysql_query($select);
                
                if(!mysql_num_rows($rsCursos))
                {
                    $errores[] = "La búsqueda no arrojó ningún resultado";
                }
                
                while($rCurso = mysql_fetch_array($rsCursos))
                {
                    $arrCategorias = array();
                    $select = "SELECT eCodCategoria codigo FROM RelCursosCategorias WHERE eCodCurso = ".$rCurso{'eCodCurso'};
                    $rsCategorias = mysql_query($select);
                    while($rCategoria = mysql_fetch_object($rsCategorias))
                    { $arrCategorias[] = $rCategoria; }
                    
                    $arrModalidades = array();
                    $select = "SELECT cm.eCodModalidad codigo,cm.tNombre nombre,  rm.eLugares lugares, rm.dPrecio precio FROM CatModalidades cm INNER JOIN RelCursosModalidades rm ON rm.ecodModalidad=cm.eCodModalidad WHERE rm.eCodCurso = ".$rCurso{'eCodCurso'};
                    $rsModalidades = mysql_query($select);
                    while($rModalidad = mysql_fetch_object($rsModalidades))
                    { $arrModalidades[] = $rModalidad; }
                    
                    $arrModulos = array();
                    $select = "SELECT eCodRegistro codigo, eModulo secuencia, tNombre nombre, fhFechaModulo fecha FROM RelCursosModulos WHERE eCodCurso = ".$rCurso{'eCodCurso'}." ORDER BY eModulo ASC";
                    $rsModulos = mysql_query($select);
                    while($rModulo = mysql_fetch_object($rsModulos))
                    { $arrModulos[] = $rModulo; }
                    
                    $resultados[] = array(
                    'codigo'=>$rCurso{'eCodCurso'},
                    'titulo'=>$rCurso{'eCodCurso'},
                    'descripcion'=>$rCurso{'tDescripcion'},
                    'objetivo'=>$rCurso{'tObjetivo'},
                    'horas'=>$rCurso{'eHoras'},
                    'fecha'=>date('d-m-Y H:i',strtotime($rCurso{'fhFechaCurso'})),
                    'ubicacion'=>$rCurso{'tUbicacion'},
                    'flyer'=>obtenerURL().'cla/'.$rCurso{'tFlyer'},
                    'slider'=>obtenerURL().'cla/'.$rCurso{'tSlider'},
                    'modalidades'=>$arrModalidades,
                    'categorias'=>$arrCategorias,
                    'modulos'=>$arrModulos
                    );
                }
                break;
        }
    }
    else
    { $errores[] = "El token ingresado NO es válido"; }
}
else
{
    $errores[] = "El token y acción son obligatorios";
}

echo json_encode(array('resultado'=>$resultados,'errores'=>$errores));
?>