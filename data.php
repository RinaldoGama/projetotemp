<?php

$con = mysql_connect("mysql.hostinger.com.br","u399718992_root","rew*2011");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("u399718992_temp", $con);

$sth = mysql_query("SELECT log_temperatura FROM log WHERE log_temperatura");
$rows = array();
$rows['name'] = 'temperatura';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['log_temperatura'];
}

$sth = mysql_query("SELECT log_umidade FROM log WHERE log_umidade");
$rows1 = array();
$rows1['name'] = 'umidade';
while($rr = mysql_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['log_umidade'];
}

$sth = mysql_query("SELECT log_data_hora as time_stamp FROM log WHERE log_umidade");
$rows2 = array();
$rows2['name'] = 'tempo';
while($rrr = mysql_fetch_assoc($sth)) {
    $rows2['data'][] = $rrr['time_stamp'];
}


$result = array();
array_push($result,$rows2);
array_push($result,$rows);
array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
