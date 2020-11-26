<?php
//Grava parametro para start envio SMS

include("conecta_db.php");
$link=conecta();
if (getenv("REQUEST_METHOD") == "POST")   {
   // Configura as variáveis do método POST para virarem variáveis normais do PHP (Requer apenas nas versões do PHP acima da 4.1)  
	$min = $_POST['min'];
   if ($min){
		$link=conecta();	
		$query = "INSERT INTO start (start_temp)
						VALUES('$min')";
		mysql_query($query,$link)or die(mysql_error());
		
		echo"<script language='javascript' type='text/javascript'>alert('Cadastro Efetuado com sucesso');window.location.href='index.php';</script>";
	  }
   else {
	   echo"<script language='javascript' type='text/javascript'>alert('Preencha Todos os Dados');window.location.href='config.php';</script>";
      }
}


?>
