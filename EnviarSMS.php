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
//include("conecta_db.php");
//$link=conecta();

		// Mostra os registros 
		$mostra = mysql_query("SELECT alerta_celular FROM alerta WHERE alerta_ativo='SIM'",$link);
		
		while( $row = mysql_fetch_array($mostra) )//executo a query
			{
				$novo_celular = soNumero($row["alerta_celular"]); //remove os caracteres do celular
				echo '<br>';
				//echo $novo_celular;
				echo '</tr>';
				// Enviar mensagem e receber retorno em JSON
				// URL de WebService
				$url = 'https://www.paposms.com/webservice/1.0/send/';
				
				// Dados para o SMS
				$fields = array(
					"user"=>'jrtntdias@gmail.com',
					"pass"=>'jr*2011',
					"numbers"=>$novo_celular,
					"message"=>'Umidade relativa do ar abaixo do permitido!!',
					"return_format"=>"json"
					);
					
				// Organizar dados para URL
				$postvars = http_build_query($fields);
				
				// Pedido de envio de SMS ao WebService
				file_get_contents($url."?".$postvars);
				//$result = file_get_contents($url."?".$postvars);
				//$result_xml=simplexml_load_string($result);
				//if ($result_xml->result == 1) {
				//	echo "Mensagem enviada.";
				//} else {
				//	echo "Mensagem não enviada";
			}
//}
header("Location: index.php")

			
		
?>