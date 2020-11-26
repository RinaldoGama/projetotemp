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

<h2><font color=##336699>Cadastro Alerta SMS - Alteração</font></h2><p>
<hr><br>
		<table border="0" cellspacing="0" cellpadding="4">
			<tr>
					<td class="table_titles">Nome</td>
					<td class="table_titles">Setor</td>
					<td class="table_titles">Celular</td>
					<td class="table_titles">Status Ativo SMS</td>
					<td class="table_titles">Alterar Status SMS</td>
			</tr>
 
 <?php 
include("conecta_db.php");
$link=conecta();  

// Mostra os registros castrados
		$mostra = mysql_query("SELECT * FROM alerta ORDER BY alerta_nome",$link);
	
		// Conta o total ded resultados encontrados
		$total = mysql_num_rows($mostra); 
		
		// Gera o Loop com os resultados 
		while( $row = mysql_fetch_array($mostra))
		{
			$css_class=' class="table_cells"';
			//echo '   <td'.$css_class.'>'.$row["alerta_nome"].'</td>';
			echo '<tr>';
			echo '<center>';
			echo '  <td'.$css_class.'>'.$row["alerta_nome"].'</td>';
			echo '  <td'.$css_class.'>'.$row["alerta_setor"].'</td>';
			echo '  <td'.$css_class.'>'.$row["alerta_celular"].'</td>';
			echo '  <td'.$css_class.'>'.$row["alerta_ativo"].'</td>';
			$Status=$row["alerta_ativo"];
			$id=$row["alerta_id"];
			echo "<th width=><a href='AlterarStatus.php?status=$Status&id=$id'>Alterar</a><br></th>";
			echo '</tr>';
		}
		echo '</table>';
		echo '<br>';
		echo "Sua busca retornou '$total' resultados.";
?>	<br>
<br>
<a href="index.php"> <img src="images/sair.png" /></a>
<br>
<hr>

<?php include ("rodape.php");?>
</body>

