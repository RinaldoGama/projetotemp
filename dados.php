<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA
	
	Busca as informacões no banco de dados e cria array para gerar as dados para o grafico

-->


<?php


include("conecta_db.php");
$db=conecta();



//$db = mysql_connect("localhost","root","");

if (!$db) {
  die('Não foi possivel conectar ao banco de dados: ' . mysql_error());
}

//mysql_select_db("tempdados", $db);

//Cria uma Array com os resultados da Temperatura
$sth = mysql_query("SELECT log_temperatura FROM log WHERE log_temperatura");
$rows = array();
$rows['name'] = 'Temperatura';
while($r = mysql_fetch_array($sth)) {
$rows['data'][] = $r['log_temperatura'];
}
//Cria uma Array com os resultados da Umidade
$sth = mysql_query("SELECT log_umidade FROM log WHERE log_umidade");
$rows1 = array();
$rows1['name'] = 'Umidade';
while($rr = mysql_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['log_umidade'];
}

$sth = mysql_query("SELECT log_data_hora as time_stamp FROM log WHERE log_umidade");
$rows2 = array();
$rows2['name'] = 'Tempo';
while($rrr = mysql_fetch_assoc($sth)) {
    $rows2['data'][] = $rrr['time_stamp'];
	
}

//tranferi os dados para uma Array
$result = array();
array_push($result,$rows2);
array_push($result,$rows);
array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($db); //fecha o banco de dados
?>
