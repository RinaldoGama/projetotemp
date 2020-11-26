<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA

-->

<?php 
	// Inicializa a Conexão com Banco de Dados
	include("conecta_db.php");
	$link=conecta();
?>

<html>
<meta http-equiv ="refresh" content = "6"><!--Atualiza a pagina a cada 6 segundos-->
<head>
	<title>Projeto Estação de Controle de Temperatura</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/tabela.css">
</head>
	<center><h1><span style="color: #00969B">Projeto Estação de Controle de Temperatura <br> com Arduino</h1></center><br>
    <body>
	<div id="conteudo-3">
				<h1><span style="color: #666">Registro de Temperaturas</h1>
			<table border="0" cellspacing="0" cellpadding="4">
			<tr>
					<td class="table_titles">Data e Hora</td>
					<td class="table_titles">Temperatura</td>
					<td class="table_titles">Umidade</td>
			</tr>
<?php
			// Mostra ultimos 10 registros
			$mostra = mysql_query("SELECT * FROM log ORDER BY log_data_hora DESC LIMIT 10",$link);
	
			// altenar a cores das linhas
			$oddrow = true;
	
			// Processa a pesquisa
			while( $row = mysql_fetch_array($mostra) )
			{
				if ($oddrow) 
				{ 
					$css_class=' class="table_cells_odd"'; 
				}
				else
				{ 
					$css_class=' class="table_cells_even"'; 
				}
		
				$oddrow = !$oddrow;
		
				echo '<tr>';
				echo '   <td'.$css_class.'>'.$row["log_data_hora"].'</td>';
				echo '   <td'.$css_class.'>'.$row["log_temperatura"].'</td>';
				echo '   <td'.$css_class.'>'.$row["log_umidade"].'</td>';
				echo '</tr>';
			}
?>
			</table>
	</div>
	<div id="conteudo-4">
	<?php include("grafico.php") ?>
	</div>
	<br>
	<div id="rodape">
		<center><label><b>Tecnologias utilizadas</b></label><br><br>
			<center><img src="images/arduino_logo.png" alt="Arduino" title="Arduino para aquisição da temperatura." >
			<img src="images/logomysql.png" alt="Banco de Dados MySql"  title="Banco de Dados MySql para WEB." ><img src="images/logoPHP.png" alt="Linguagem programação WEB" title="Programação Website." ></center>
			<center>
			<br>
			<center><a href=""><i>Desenvolvido por Luiz Roberto e Rinaldo Gama</i></a></p></center>
	</div>		
    </body>
</html>