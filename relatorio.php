<!DOCTYPE html>
<html>

    <head>

        <title>Easy Access</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/estilo.css">
           </head>

    <body>

<div><h1>Relat&oacute;rio de acessos</h1></div>
<hr>
<div style="margin: 0 auto;width: 80%;">
<table cellspacing="10">
   <tr>
     <td>DATA</td>
       <td>HORA</td>
         <td>NOME</td>
           <td>DESCRI&Ccedil;&Atilde;O</td>
      </tr>
<?php
$data_inicial = date('Y-m-d', strtotime($_POST['data_inicio']));
$data_final = date('Y-m-d', strtotime($_POST['data_fim'])); 

 date_default_timezone_set('America/Sao_Paulo');
              $connect = mysqli_connect('localhost','root','','portaria');
           mysqli_set_charset($connect,'utf8');
                $query_select = "SELECT * FROM acessos where data between '$data_inicial' and '$data_final'";
                     $select = mysqli_query($connect,$query_select);
        while($valor = mysqli_fetch_assoc($select)){
        $data_dia = substr($valor['data'],8,2);
          $data_mes = substr($valor['data'],5,2);
            $data_ano = substr($valor['data'],0,4);
              $hora = $valor['hora']; 
                $foto = $valor['foto']; 
       echo "<tr>";  
            echo "<td>".$data_dia."/".$data_mes."/".$data_ano."</td>";
               echo "<td>".$hora."</td>";
              echo "&nbsp;&nbsp;<td>".$valor['nome']."</td>";
                   echo "&nbsp;&nbsp;<td>".$valor['dentro_fora']."</td>";	
                echo "</tr>";       
      }
        mysqli_close($connect);
          ?>        	
</table>
</div>
<input type="button" value="Imprimir" onclick="window.print();"
</body></html>