<?php

session_start();
$date = new DateTime();
$now = $date->getTimestamp();
if (!isset($_SESSION['ultimo_timestamp'])) {
  $_SESSION['ultimo_timestamp'] = $now;
} else {
  if($now - $_SESSION['ultimo_timestamp'] < 5 * 60) die('Ainda não se passaram 5 minutos...');
  else $_SESSION['ultimo_timestamp'] = $now;
  echo "enviando SMS";
  include ("enviarsms.php");
  
  
}

?>


  
  
