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
<meta http-equiv ="refresh" content = "20"><!--Atualiza a pagina a cada 20 segundos-->
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
			<a href="index.php"> <img src="images/sair.png" /></a>
	</div>
	<div id="conteudo-4">
	<?php include("grafico.php") ?>
	</div>
	<br>
	<?php include ("rodape.php");?>
    </body>
</html>