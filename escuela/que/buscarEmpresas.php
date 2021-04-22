<?

include("../cnx/swgc-mysql.php");


$response = array();

if($_POST['search'] || $_GET['search']){
    $search = $_POST['search'] ? $_POST['search'] : $_GET['search'];
    
    $terms = explode(" ",$search);
    
    $termino = "";
    
    for($i=0;$i<sizeof($terms);$i++)
    {
        $termino .= " AND tNombre like '%".$terms[$i]."%' ";
    }

    $select =   "	SELECT * FROM CatEntidades WHERE 1=1 ".$termino;

            $result = mysql_query($select);
    
    while($row = mysql_fetch_array($result)){
        $response[] = array("value"=>$row['eCodEntidad'],"label"=>$row['tNombre']);
    }

    echo json_encode($response);
}
 
?>