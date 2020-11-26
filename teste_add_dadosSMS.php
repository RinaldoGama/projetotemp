<html>
<meta http-equiv ="refresh" content = "6"> <!--Atualiza a pagina a cada 6 segundos-->
<head>


<?php
   	include("conecta_db.php");
   	
   	$link=conecta();

	$temp1=$_GET['temp1'];
	$um1=$_GET['um1'];

	$query = "INSERT INTO log (log_temperatura, log_umidade) 
		VALUES ('$temp1','$um1')"; 
   	mysql_query($query,$link);
	mysql_close($link);

	//header("Location: index.php");
?>
