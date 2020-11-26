<?php
    
    date_default_timezone_set('America/Sao_paulo');
    
    class calculaTempo {

        // retorna diferença em dias, horas, minutos, segundos
        function completo($data){
            $hora_data_atual = date("Y-m-d H:i:s");
            $data = strtotime($data);
            $hora_data_atual = strtotime($hora_data_atual);
            $diferenca = $hora_data_atual - $data;
            $dias = floor($diferenca / 86400);
            $horas = floor($diferenca / 3600);
            $minutos = floor(($diferenca / 60) % 60);
            $segundos = floor($diferenca % 60);
            $resultado = "{$dias} dias e {$horas}:{$minutos}:{$segundos} horas";
            return $resultado;
        }
        
        // retorna diferença em horas, minutos, segundos
        function tempo($data){
            $hora_data_atual = date("Y-m-d H:i:s");
            $data = strtotime($data);
            $hora_data_atual = strtotime($hora_data_atual);
            $diferenca = $hora_data_atual - $data;
            $hora = floor($diferenca / 3600);
            $minutos = floor(($diferenca / 60) % 60);
            $segundos = floor($diferenca % 60);
            $resultado = "{$hora}:{$minutos}:{$segundos}";
            return $resultado;
        }
        
        // retorna diferença em dias
        function dias($data){
            $hora_data_atual = date("Y-m-d H:i:s");
            $data = strtotime($data);
            $hora_data_atual = strtotime($hora_data_atual);
            $diferenca = $hora_data_atual - $data;
            $dias = floor($diferenca / 86400);
            return $dias;        
        }
        
        // retorna diferença em horas
        function horas($data){
            $hora_data_atual = date("Y-m-d H:i:s");
            $data = strtotime($data);
            $hora_data_atual = strtotime($hora_data_atual);
            $diferenca = $hora_data_atual - $data;
            $horas = floor($diferenca / 3600);
            return $horas;        
        }

        // retorna diferença em minutos
        function minutos($data){
            $hora_data_atual = date("Y-m-d H:i:s");
            $data = strtotime($data);
            $hora_data_atual = strtotime($hora_data_atual);
            $diferenca = $hora_data_atual - $data;
            $minutos = floor($diferenca / 60);
            return $minutos;        
        }
        
        // retorna diferença em segundos
        function segundos($data){
            $hora_data_atual = date("Y-m-d H:i:s");
            $data = strtotime($data);
            $hora_data_atual = strtotime($hora_data_atual);
            $diferenca = $hora_data_atual - $data;
            $segundos = $diferenca;
            return $segundos;        
        }
    
    }

    $res = new calculaTempo();
    
    $data = '2016-08-29 14:34:00';
    
    $completo = $res->completo($data); // dias - horas , minutos e segundos
    $tempo = $res->tempo($data); // horas , minutos e segundos
    $dias = $res->dias($data); // dias
    $horas = $res->horas($data); // horas
    $minutos = $res->minutos($data); // minutos
    $segundos = $res->segundos($data); // segundos
    

    
    
    echo "<font size='2'>[dia] - [Hora][minutos][segundos]:</font> <b>" . $completo ."</b><br>";
    echo "<font size='2'>[Hora][minutos][segundos]:</font> <b>" . $tempo ."</b><br>";
    echo "<font size='2'>[Dias]:</font>  <b>" . $dias ."</b><br>";
    echo "<font size='2'>[Horas]:</font>  <b>" . $horas ."</b><br>";
    echo "<font size='2'>[Minutos]:</font>  <b>" . $minutos ."</b><br>";
    echo "<font size='2'>[Segundos]:</font>  <b>" . $segundos ."</b><br>";
    
   
    
?>
		
?>


		