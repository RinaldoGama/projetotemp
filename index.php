<!--
	PROJETO ESTAÇÃO CONTROLE DE TEMPERATURA E UMIDADE USANDO ARDUINO
	Sistemas de Informação - Uniesp  Faculdade de Hortolandia
	
	LUIS ROBERTO DIAS JR
	RINALDO APARECIDO GAMA
	
	Função Ajax para atualizar parte da pagina

-->

<html>
<body>

<script type="text/javascript">
function Ajax(){
var xmlHttp;
        try{    
                xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
        }
        catch (e){
                try{
                        xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
                }
                catch (e){
                    try{
                                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        catch (e){
                                alert("No AJAX!?");
                                return false;
                        }
                }
        }

xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readyState==4){
             document.getElementById('ReloadThis').innerHTML=xmlHttp.responseText;
                setTimeout('Ajax()',5000);
        }
}
xmlHttp.open("GET","index1.php",true); // aqui configuramos o arquivo
xmlHttp.send(null);
}

window.onload=function(){
        setTimeout('Ajax()',5000); // aqui o tempo entre uma atualização e outra
}
</script>

<div id="ReloadThis"></div>

</body>
</html>