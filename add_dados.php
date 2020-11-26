<?php
	date_default_timezone_set('America/Sao_Paulo');
   	include("conecta_db.php");
   	$link=conecta();
	$dataLocal = date('y-m-d H:i:s', time()); //Insere valores data data e hora atual

	$temp1=$_GET['temp1'];
	$um1=$_GET['um1'];
	echo ($dataLocal);

	$query = "INSERT INTO log (log_temperatura, log_umidade, log_data_hora) 
		VALUES ('$temp1','$um1','$dataLocal')"; 
	mysql_query($query,$link);
	mysql_close($link);

	header("Location: index.php");
?>
