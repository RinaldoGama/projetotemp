
<?php

echo "<h2>Excluindo...</h2>";

$nome = $_POST['nome'];
echo $nome;

include("conecta_db.php");

$link=conecta();

//mysql_query($query,$link)or die(mysql_error());

$sql = "DELETE FROM alerta WHERE alerta_nome=".$nome;
mysql_query($sql, $link) or die ("Não foi possível realizar a exclusão dos dados.");
echo "<h2>A obra foi excluída com êxito!</h2>";

?>