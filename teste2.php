<html>


<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA

-->

<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<meta name="description" content="Projeto Estação de controle de Temperatura" />	
	<link rel="stylesheet" href="css/estilo.css">
	<title>Projeto Estação de Controle de Temperatura</title>
</head>

<body>
<center><h1><span style="color: #00969B">Projeto Estação de Controle de Temperatura <br> com Arduino</h1></center><br>
<hr>
	<br>
<fieldset id="caixa_config">
</center>
<?php
//Busca informações do Banco para exibir na tela o ultimo registro da temperatura
include("conecta_db.php"); 	
$link=conecta();
$result = mysql_query("SELECT * FROM log ORDER BY log_data_hora DESC",$link);
$row = mysql_fetch_array($result);
?>
<!-------------------------------------------------------------------------------------------------->
						
<table style="text-align: left; width: 210px; height: 71px;" border="0"cellpadding="0" cellspacing="2">

<td style="vertical-align: top; text-align: center;">Temperatura<br></td>
<td style="vertical-align: top; text-align: center;">Umidade<br></td>

<tr>
<td style="font-size: 30px" style="color: #00969B" style="vertical-align: top; text-align: center;"><?PHP echo $row["log_temperatura"]?>°C<br></td>
<td style="font-size: 30px" style="color: #777BB4" style="vertical-align: top; text-align: center;"><?PHP echo $row["log_umidade"]?>%<br>
</td>
</tr>
</table><p><br>
</fieldset>
<br>
Ativar envio SMS quando umidade atingir abaixo de </p>
<form action='arquivoconf.php' method='post'>
<input style="font-size: 48px" name='min' type='text' font size='2' maxlength='2'>%
</font> <br />
<input type='submit' value='Salvar'> <input type='reset' value='Limpar'> </form>
<a href="index.php"> <img src="images/sair.png" /></a>
<br>
<hr>
<br>
	<div id="rodape">
		<center><label><b>Tecnologias utilizadas</b></label><br><br>
		<center><img src="images/arduino_logo.png" alt="Arduino" title="Arduino para aquisição da temperatura." >
		<img src="images/logomysql.png" alt="Banco de Dados MySql"  title="Banco de Dados MySql para WEB." ><img src="images/logoPHP.png" alt="Linguagem programação WEB" title="Programação Website." ></center>
		<center>
		<br>
		<center><a href=""><i>Desenvolvido por Luiz Roberto e Rinaldo Gama</i></a></p></center>
</body>


</html>


