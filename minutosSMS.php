<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA

-->

<?php

	date_default_timezone_set('America/Sao_paulo');
	// Inicializa a Conexão com Banco de Dados
	//include("conecta_db.php");
	//$link=conecta();
?>

<html>
<head>
	<title>Projeto Estação de Controle de Temperatura</title>
</head>
<?php
	//banco de dados com tempo do ultimo registro SMS enviado		
	$mostra = mysql_query("SELECT * FROM monitora ORDER BY monitora_data_hora DESC LIMIT 1",$link);
	$row = mysql_fetch_array($mostra);
	
	//banco de dados com tempo do ultimo registro Temperatura
	$valor = mysql_query("SELECT * FROM log ORDER BY log_data_hora DESC LIMIT 1",$link);
	$linha = mysql_fetch_array($valor);
    
     // calcula diferença em minutos

	$data = $row["monitora_data_hora"];
	$hora_data_atual = $linha["log_data_hora"];
    $data = strtotime($data);
    $hora_data_atual = strtotime($hora_data_atual);
    $diferenca = $hora_data_atual - $data;
    $minutos = floor($diferenca / 60); // retorna valor em minutos
 
	//echo $linha["log_data_hora"],"  -   <br>"; //Mostra os tempos
	//echo $row["monitora_data_hora"]," -   <br>";
	//echo "<font size='2'>[Minutos]:</font>  <b>" . $minutos ."</b><br>";
	
	if ($minutos <= 4) { //verifica se o tempo é menor que 5 minutos
			//echo "Mensagem enviada.";
				} else {
				//echo "Mensagem não enviada";
				$tempoSMS=$linha["log_data_hora"];
				$sms = "INSERT INTO monitora (monitora_data_hora) 
				VALUES ('$tempoSMS')"; 
				mysql_query($sms,$link);
				//echo "SMS enviado com sucesso";
				include ("EnviarSMS.php");
			}
?>

</html>