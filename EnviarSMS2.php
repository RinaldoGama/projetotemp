<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA

	Enviar SMS
-->

<html>
<head>
</head>

<body>
<?php
function soNumero($str) { //Remove caracteres e deixa somente numeros dos celular
return preg_replace("/[^0-9]/", "", $str);

}
include("conecta_db.php");
$link=conecta();
		// Mostra os registros castrados
		
		//Busca o ultimo valor da Umidade inserido pelo sensor
		$result = mysql_query("SELECT log_umidade FROM log ORDER BY log_data_hora DESC",$link);
					$row = mysql_fetch_array($result);
		
		
		$mostra = mysql_query("SELECT alerta_celular,alerta_nome FROM alerta WHERE alerta_ativo='SIM'",$link);
		//$celular_achado=mysql_fetch_assoc($sql); //posiciona no registo encontrado
		//$novo_celular = soNumero($celular_achado["motorista_celular"]); //Numero Celular Achado no banco de dados sem caracteres
		//$mensagem = "Entre em contato com o guiche de agendamento";
		
		while( $row = mysql_fetch_array($mostra) )//executo a query
			{
				$novo_celular = soNumero($row["alerta_celular"]);//remove os caracteres do celular
				$Usuario = $row["alerta_Nome"];
				
				echo '<br>';
				echo $novo_celular;
				echo '</tr>';
				// Enviar mensagem e receber retorno em JSON
				// URL de WebService
				$url = 'https://www.paposms.com/webservice/1.0/send/';
				
				// Dados para o SMS
				$fields = array(
					"user"=>'umidade99@bol.com.br',
					"pass"=>'rew*2011',
					"numbers"=>$novo_celular,
					"message"=>'$Usuario, Temperatura de Umidade está Abaixo do Permitido!!',
					"return_format"=>"json"
					);
					
				// Organizar dados para URL
				$postvars = http_build_query($fields);
				
				// Pedido de envio de SMS ao WebService
				$result = file_get_contents($url."?".$postvars);
				$result_xml=simplexml_load_string($result);
				if ($result_xml->result == 1) {
					echo "Mensagem enviada.";
				} else {
					echo "Mensagem não enviada";
			}
}
//header("Location: index.php")

			
		
?>