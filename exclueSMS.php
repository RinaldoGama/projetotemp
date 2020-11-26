<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA
	
	Exclue Usuario SMS
-->
<html>
<head>
	<title>Projeto Estação de Controle de Temperatura</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>

 
<form action='ExclueAlertaSMS.php' TARGET='_self' method='post' >

<center><h1><span style="color: #00969B">Projeto Estação de Controle de Temperatura <br> com Arduino</h1></center><br>

<h2><font color=##336699>Cadastro Alerta SMS - Exclusão</font></h2>	
<hr><br>

Nome Usuario:<tr><td>
<select name="nome" style=width: 400><option>Selecione....</option>
 <?php 
include("conecta_db.php");
$link=conecta(); 
	  
	  //Consulta com a tabela

$consulta=mysql_query("SELECT * FROM alerta order by alerta_nome ASC"); 
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
   echo "<option value='" . $dados['alerta_id']. "'>" .$dados['alerta_nome']. "</option>";
}
?>
</select><br><p>
<br></td><td>
<input type='Submit' value='Elimina SMS'></form>
<a href="index.php"> <img src="images/sair.png" /></a>
<br>
<hr>
<div id="rodape">
	<center><label><b>Tecnologias utilizadas</b></label><br><br>
	<center><img src="images/arduino_logo.png" alt="Arduino" title="Arduino para aquisição da temperatura." >
	<img src="images/logomysql.png" alt="Banco de Dados MySql"  title="Banco de Dados MySql para WEB." ><img src="images/logoPHP.png" alt="Linguagem programação WEB" title="Programação Website." ><img src="images/logopapo.png" alt="PAPO SMS"  title="API Envio SMS." ></center>
	<center>
	<br>
	<center><a href=""><i>Desenvolvido por Luiz Roberto e Rinaldo Gama</i></a></p></center>
</body>


