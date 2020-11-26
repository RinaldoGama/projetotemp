<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/style-light.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/glight.css" type="text/css" media="all" />
</head>
<body >

<script type="text/javascript" src="js/light.js" ></script>

<div id='borda'>
	<div id="envelope">
		<div id="caixa" onclick="javascript:gotoNTP();" onmouseover="this.style.cursor='pointer';">
			<div id="boxhc"> 
			<div id="mensagem">HORA CERTA</div>
			<div id="horacerta">--:--:--</div>
			</div>
			<div id="boxpc"> 
			<div id="mensagempc">SUA HORA</div>
			<div id="horapc">--:--:--</div>
			<div id="UTC">UTC 0</div>
			</div>
			<img id="img_estado" src="img/glight/hora_certa.png">
			<div id="alerta">A hora do seu computador est&aacute; correta</div>
		</div>
	
		<div id="twitter">
			<a id="twitterlink" href="javascript:openTwitterPopUp();"> <img id="twitimg" alt="" onclick="setImgTwitG(2);" onmouseout="setImgTwitG(0);" onmouseover="setImgTwitG(1);" src="img/glight/twit_glight.png"> </a>
		</div>
			<a href="http://ntp.br" target="_blank"><img  id="logo" alt="" src="img/glight/logo-ntpbr.png"></a>
	</div>
</div>
<script type="text/javascript">
<!--
setGMT();
buscarTempo();
setInterval("buscarTempo()", 1000);
//-->
</script>

<ul id="id_relogio">	
	   <li id="id_segundos"></li>
	   <li id="id_horas"></li>
		<li id="id_minutos"></li>
</ul>

</body>
</html>
