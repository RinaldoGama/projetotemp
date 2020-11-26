<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA
	
	Consulta Usuario SMS
-->
<html>
<head>
	<title>Projeto Estação de Controle de Temperatura</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/tabela.css">
</head>

<center><h1><span style="color: #00969B">Projeto Estação de Controle de Temperatura <br> com Arduino</h1></center><br>

<h2><font color=##336699>Cadastro Alerta SMS - Consulta</font></h2>	
<hr><br>

<table border="0" cellspacing="0" cellpadding="4">
			<tr>
					<td class="table_titles">Nome</td>
					<td class="table_titles">Setor</td>
					<td class="table_titles">Celular</td>
					<td class="table_titles">Status Ativo SMS</td>
			</tr>
 
 <?php 
include("conecta_db.php");
$link=conecta(); 

			// Mostra os registros castrados
			$mostra = mysql_query("SELECT * FROM alerta ORDER BY alerta_nome",$link);
	
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
				echo '   <td'.$css_class.'>'.$row["alerta_nome"].'</td>';
				echo '   <td'.$css_class.'>'.$row["alerta_setor"].'</td>';
				echo '   <td'.$css_class.'>'.$row["alerta_celular"].'</td>';
				echo '   <td'.$css_class.'>'.$row["alerta_ativo"].'</td>';
				echo '</tr>';
			}
?>
			</table>
<br>
<a href="index.php"> <img src="images/sair.png" /></a>
<br>
<hr>

<?php include ("rodape.php");?>

</body>
<?php 
header("refresh: 20; url=index.php");// volta pagina inicial após N segundos vc mudando o numero aumenta/diminue o tempo
?>
