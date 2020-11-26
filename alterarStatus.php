<?php
//Altera Status SMS Usuario

include("conecta_db.php");
$link=conecta();
$id = $_GET['id'];
$status = $_GET['status'];
if ($status == 'SIM')	{
	$status_novo='NAO';
   }else {
	$status_novo='SIM';
	$sql = "UPDATE alerta SET alerta_ativo='$status_novo' WHERE Alerta_id='$id'";
	$resultado = mysql_query($sql) or die ("Não foi possivel atualizar o banco de dados. -$id");
   } 
$sql = "UPDATE alerta SET alerta_ativo='$status_novo' WHERE Alerta_id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possivel atualizar o banco de dados. -$id");
echo"<script language='javascript' type='text/javascript'>alert('Status SMS Atualizado com sucesso');window.location.href='index.php';</script>"

?>

