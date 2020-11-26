<!DOCTYPE html>
<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("tempdados", $con);

$sth = mysql_query("SELECT log_temperatura FROM log WHERE log_temperatura");
$rows = array();
$rows['name'] = 'Temperatura';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['log_temperatura'];
}

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

?>

<html>
<head>
<!--Script Reference[1]-->
<script src="http://cdn.zingchart.com/zingchart.min.js"></script>
<script>
	$.getJSON("data.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                ;
            }
			
  var chartData={
    "type":"bar",  // Specify your chart type here.
    "series":[  // Insert your series data here.
        { "values": options.series[0] = json[1]},
        { "values": [28, 40, 39, 36]}
    ]
  };
  window.onload=function(){  // Render Method[2]
    zingchart.render({ 
      id:'chartDiv',
      data:chartData,
      height:400,
      width:600
    });
  };
</script>
</head>
<body>
<!--Chart Placement[3]-->
<div id ='chartDiv'></div>
</body>
</html>