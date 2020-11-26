<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA
	
	Busca as informacões no banco de dados e cria array para gerar as dados para o grafico

-->


<?php

// Inicializa a Conexão com Banco de Dados
	include("conecta_db.php");
	$link=conecta();

//Cria uma Array com os resultados da Temperatura

$mostra = mysql_query("SELECT * FROM log",$link);

?>

<script>
<?php 
$info=mysqli_fetch_array($mostra);
    print $info;
?>