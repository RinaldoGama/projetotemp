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

	<div id="geral">
			<script language='javascript' src='js/exemplo.js'></script>
			<div id="conteudo-1">
				<ul id="nav">  
					<li><a href="monitoramento.php">Monitoramento</a></li> 
					<li><a href="#">Alerta</a> 
						<ul> 
							<li><a href="cadastrarSMS.php">Cadastra Usuario SMS</a></li>
							<li><a href="exibiusuarioSMS.php">Altera Usuario SMS</a></li>	
							<li><a href="exclueSMS.php">Exclui Usuario SMS</a></li>
							<li><a href="consultaSMS.php">Consulta Usuario SMS</a></li>	
						</ul> 
					</li>
					<li><a href="config.php">Configuração</a></li> 
				</ul>
			</div>
			<div id="conteudo-2">
				
				<fieldset id="caixa_temp"> <!--cria um retangulo com legenda-->
					<center><legend><b><span style="color: #777BB4">Temperatura e Umidade</b></legend></span></center>
					<?php
					//Busca informações do Banco para exibir na tela o ultimo registro da temperatura
					include("conecta_db.php"); 	
					$link=conecta();
					$result = mysql_query("SELECT * FROM log ORDER BY log_data_hora DESC",$link);
					$row = mysql_fetch_array($result);
					
		
					?>
					<!-------------------------------------------------------------------------------------------------->
						
						<center>
						<span style="color: #777BB4" ><?php
						date_default_timezone_set('America/Sao_Paulo');
						echo date('d/m/Y - H:i:s')?>
						</span>
						</center>
					
					<!-------------------------------------------------------------------------------------------------->
		
					<div style="text-align: center"></div><p></p> <!--Cria uma tabela onde divide-se em 1 coluna e 2 linhas-->
						<table align="center" border="0" cellpadding="1" cellspacing="1" style="height: 88px; width: 111px">
						<tbody>
						<tr>
							<td rowspan="2">
							<img alt="" src="images/termo.png" style="height: 210px; width: 140px" /></td>
							<td>Temperatura</p>
							<p style="text-align: center">
								<span style="font-family: tahoma, geneva, sans-serif"><strong><span style="font-size: 48px"><span style="color: #777BB4"><?PHP echo $row["log_temperatura"]?>°C</span></span></strong></span></p>
							<p></p>
							</td>
						</tr>
						<tr>
							<td>
								<p style="text-align: center">Umidade</p><p style="text-align: center">
								<span style="font-family: tahoma, geneva, sans-serif"><strong><span style="font-size: 48px"><span style="color: #777BB4"><?PHP echo $row["log_umidade"]?>%</span></span></strong></span></p>
							</td>
						</tr>
						</tbody>
						</table>
					</fieldset>
				<br>
			</div>
			
			
			
	</div>
	<br>
	<?php include ("rodape.php");?>
			

</body>
</html>

<!----------------------------------

Envia SMS a caso temperatura se for menor que a do arquivo de config>

<?php
$result = mysql_query("SELECT * FROM log ORDER BY log_data_hora DESC",$link);
$row = mysql_fetch_array($result);


$limite = mysql_query("SELECT * FROM start ORDER BY start_time DESC",$link);
$temperatura_atual = mysql_fetch_array($limite);

If ($temperatura_atual["start_temp"] > $row["log_umidade"]){
	include ("MinutosSMS.php");
}

?>
