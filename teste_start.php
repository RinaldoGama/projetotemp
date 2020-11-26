<?php

include("conecta_db.php"); 	
$link=conecta();
$result = mysql_query("SELECT * FROM log ORDER BY log_data_hora DESC",$link);
$row = mysql_fetch_array($result);


$limite = mysql_query("SELECT * FROM start ORDER BY start_time DESC",$link);
$temperatura_atual = mysql_fetch_array($limite);

If ($temperatura_atual["start_temp"] > $row["log_umidade"]){
	echo $row["log_umidade"];
	echo '<p>';
	echo $temperatura_atual["start_temp"];
	//include ("tempoenvioSmS.php");
	//$limite["start_temp"];
	echo "sms startado";
}

?>
