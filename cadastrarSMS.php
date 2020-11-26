<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA
	
	Cadastro Usuario SMS
-->
<html>
<head>
	<title>Projeto Estação de Controle de Temperatura</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>

 <script type="text/javascript">
/* Máscaras ER */  //Mascara Telefone
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeypress = function(){
		mascara( this, mtel );
	}

}
</script>
 
<?php
include("conecta_db.php");
$link=conecta();
?>
<center><h1><span style="color: #00969B">Projeto Estação de Controle de Temperatura <br> com Arduino</h1></center><br>

<form action='InserirAlertaSMS.php' method='post'>
<h2><font color=##336699>Cadastro Alerta SMS - Inclusão</font></h2>
<hr><br>
<table><tr></tr>
Nome:</td></tr>
<td><input name='nome' type='text' size=50></td></tr>
<td>Departamento:
<td>Celular :</td></tr>
<td><input name='setor' type='text' size=20>
<td><input name='celular' type='text' onkeyup='mascara( this, mtel )';' maxlength=15 '></td></tr>
</table>
<br></td><td>
<input type='submit' value='Salvar'> <input type='reset' value='Limpar'>
</form>
<a href="index.php"> <img src="images/sair.png" /></a>
<br>
<hr>

<?php include ("rodape.php");?>
			

</body>


