
<?php

echo "<h2><font color=##336699>Excluindo...</h2>";

$nome = $_POST['nome'];

include("conecta_db.php");

$link=conecta();

//mysql_query($query,$link)or die(mysql_error());

$sql = "DELETE FROM alerta WHERE alerta_id=".$nome;
mysql_query($sql, $link) or die ("Não foi possível realizar a exclusão dos dados.");
echo"<script language='javascript' type='text/javascript'>alert('Registro Usuario SMS Excluido');window.location.href='index.php';</script>";

?>