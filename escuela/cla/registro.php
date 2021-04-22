<? header('Access-Control-Allow-Origin: *');  ?>
<? header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method"); ?>
<? header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE"); ?>
<? header("Allow: GET, POST, OPTIONS, PUT, DELETE"); ?>
<? header('Content-Type: application/json'); ?>
<?

error_reporting(0);
ini_set('display_errors', 0);

date_default_timezone_set('America/Mexico_City');

if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

include("../cnx/swgc-mysql.php");
include("../inc/fun-ini.php"); 

session_start();

$errores = array();

$data = json_decode( file_get_contents('php://input') );

$eCodCurso = $data->eCodCurso;
$tCorreo = "'".$data->tCorreo."'";
$eCodModalidad = $data->eCodModalidad;
$bRequiereIVA = $data->bRequiereIVA ? $data->bRequiereIVA : 0;
$eCodEstatus=1;
$eCodEstatusPago=2;

$select = "SELECT * FROM RelCursosModalidades WHERE eCodCurso=$eCodCurso AND eCodModalidad=$eCodModalidad";
$rMonto = mysql_fetch_array(mysql_query($select));

$dMonto = $rMonto{'dPrecio'};

if($data->bRequiereIVA)
{
    $dMonto = $dMonto*1.16;
}

$bRedireccionar = 0;

$fhFechaRegistro = "'".date('Y-m-d H:i:s')."'";

if(!$eCodModalidad)
{
    $errores[] = "Seleccione una modalidad";
}

if(!$data->tCorreo)
{
    $errores[] = "Ingrese su e-mail";
}

$select = "SELECT * FROM SisUsuarios WHERE tCorreo=$tCorreo";
$rsUsuario = mysql_query($select);
$rUsuario = mysql_fetch_array($rsUsuario);

$eCodUsuario = $rUsuario{'eCodUsuario'};

if(!$eCodUsuario)
{
     
    $insert = "INSERT INTO SisUsuarios (tCorreo) VALUES($tCorreo)";
        $rsNuevo = mysql_query($insert);
        $eCodUsuario = mysql_insert_id();
    $bNuevo = true;
   
}
 
    
    
    $select = "SELECT * FROM BitRegistrosCursos WHERE eCodUsuario=$eCodUsuario AND eCodCurso=$eCodCurso";
    $rsCurso = mysql_query($select);
    
    if(mysql_num_rows($rsCurso))
    {
        $errores[] = "Usted ya se encuentra registrado(a) a este curso";
    }


/*Preparacion de variables*/
        
      if(!sizeof($errores))
      {
          $insert = "INSERT INTO BitRegistrosCursos (eCodCurso,eCodUsuario, fhFechaRegistro, eCodModalidad, eCodEstatus, eCodEstatusPago, dMonto, bRequiereIVA) VALUES ($eCodCurso,$eCodUsuario, $fhFechaRegistro, $eCodModalidad, $eCodEstatus, $eCodEstatusPago, $dMonto, $bRequiereIVA)";
          
          $rs = mysql_query($insert);
          $eCodRegistro = mysql_insert_id();
          if(!$rs)
          {
              $errores[] = "Error al guardar el registro ";
          }
          else
          {
              $modulos = $data->modulo;
              foreach($modulos as $modulo)
              {
                  $eCodModulo = $modulo->eCodRegistro;
                  $rs = "INSERT INTO RelRegistrosCursosModulos (eCodRegistro,eCodModulo) VALUES ($eCodRegistro,$eCodModulo)";
                  if(!mysql_query($rs))
                  {
                      $errores[] = "Error al adjuntar el modulo al registro "; 
                  }
              }
          }
      }
        
  

echo json_encode(array("exito"=>((!sizeof($errores)) ? 1 : 0), "codigo"=>sprintf("%07d",$eCodUsuario), "redireccionar"=>($bNuevo ? 1 : 0), 'errores'=>$errores));

?>