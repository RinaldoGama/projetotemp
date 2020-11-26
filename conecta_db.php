

<?php
	date_default_timezone_set('America/Sao_Paulo');
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

	function conecta(){
		$server="mysql.hostinger.com.br";
		$user="u399718992_root";
		$pass="rew*2011";
		$db="u399718992_temp";
	   	
		$conecta = mysql_connect($server, $user, $pass);

		if (!$conecta) {
	    	die('Não foi possivel conectar ao banco de dados:' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'Não foi possivel conectar ao banco de dados: '. mysql_error() );

		return $conecta;
	}
?>
