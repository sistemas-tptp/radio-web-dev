<?php
$conexion = mysql_connect("localhost","emicapac_root","B@surto91");
$database = mysql_select_db("emicapac_ehr");

$query = "ALTER TABLE BitCursos ADD tDias TEXT NULL FIRST;";
$rs = mysql_query($query);

print $rs ? 'exito' : mysql_error();
?>