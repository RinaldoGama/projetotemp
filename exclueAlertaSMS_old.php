
<?php

echo "<h2>Excluindo...</h2>";

$nome = $_POST['nome'];
echo $nome;

include("conecta_db.php");

$link=conecta();

//mysql_query($query,$link)or die(mysql_error());

$sql = "DELETE FROM alerta WHERE alerta_nome=".$nome;
mysql_query($sql, $link) or die ("N�o foi poss�vel realizar a exclus�o dos dados.");
echo "<h2>A obra foi exclu�da com �xito!</h2>";

?>