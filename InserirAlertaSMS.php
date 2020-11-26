<?php
//Inclusão Alerta SMS Usuario

include("conecta_db.php");
$link=conecta();
$ativo="SIM"; 
if (getenv("REQUEST_METHOD") == "POST")   {
   // Configura as variáveis do método POST para virarem variáveis normais do PHP (Requer apenas nas versões do PHP acima da 4.1)  
	$nome = $_POST['nome'];
	$setor = $_POST['setor']; 
	$celular = $_POST['celular'];
   if ($nome and $setor and $celular)	{
		$link=conecta();	
		$query = "INSERT INTO alerta (alerta_nome, alerta_setor, alerta_celular, alerta_ativo)
						VALUES('$nome','$setor','$celular','$ativo')";
		mysql_query($query,$link)or die(mysql_error());
		
		echo"<script language='javascript' type='text/javascript'>alert('Cadastro Efetuado com sucesso');window.location.href='index.php';</script>";
	  }
   else {
	   echo"<script language='javascript' type='text/javascript'>alert('Preencha Todos os Dados');window.location.href='cadastrarSMS.php';</script>";
      }
}


?>
